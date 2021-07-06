<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\TrickImage;
use App\Entity\TrickVideo;
use App\Form\TrickType;
use App\Repository\TrickImageRepository;
use App\Repository\TrickVideoRepository;
use App\Service\FileUploader;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class TricksController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function getHome()
    {
        $trickList = $this->getDoctrine()
            ->getRepository(Trick::class)
            ->findall();

        return $this->render('tricks/home.html.twig', [
            'title' => 'Home',
            'trickList' => $trickList
        ]);
    }

    /**
     * @Route("/trick_list", name="trick_list")
     */
    public function getTrickList(): Response
    {
        $trickList = $this->getDoctrine()
            ->getRepository(Trick::class)
            ->findall();

        return $this->render('tricks/trick_list.html.twig', [
            'title' => 'Liste des Tricks',
            'trickList' => $trickList
        ]);
    }


    /**
     * @Route("/tricks/{slug}", name="trick_details", methods={"GET", "POST"})
     */
    public function getTrick(Trick $trick, CommentController $commentController, Request $request, PaginatorInterface $paginator) : Response
    {
        $commentsData = $trick->getComments();
        $comments = $paginator->paginate($commentsData, $request->query->getInt('page', 1), 8);

        return $this->render('tricks/trick_details.html.twig', [
            'trick' => $trick,
            'commentForm' => $commentController->createComment($trick, $request),
            'comments' => $comments
        ]);
    }



    /**
     * @Route("/create_trick", name="create_trick", methods={"GET", "POST"})
     * You must be connected in order to create a pin
     * @Security("is_granted('ROLE_USER')")
     */
    public function createTrick(Request $request, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {

        $user = $this->getUser();

        $newTrick = new Trick();
        
        $form = $this->createForm(TrickType::class, $newTrick);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            // Fill the trick Information
            $newTrick->setCreatedAt(new \DateTime()); 
            $newTrick->setModifiedAt(new \DateTime());
            $newTrick->setUser($user);

            // Create the slug

            $slug= $slugger->slug($newTrick->getTrickName());

            $newTrick->setSlug($slug);

          // Get the uploaded images
            $trickImages = $form['trickImages']->getData();
            
            if($trickImages)
            {
               // Boucle sur les images
               foreach ($trickImages as $image)
               {
                    // Use the fileUploader service to save the image in the upload folder
                    $newFilename = $fileUploader->upload($image->getFile());
                   // Save the image name in the database
                   $image->setMediaName($newFilename);   
               }

            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newTrick);
            $entityManager->flush();

            $this->addFlash('success', 'Votre trick a bien été créé !');

            return $this->redirectToRoute('trick_details', ['slug' => $newTrick->getSlug()]);
        }


        return $this->render('tricks/trick_form.html.twig', [
            'formTrick' => $form->createView(),
            'editMode' => $newTrick->getId() !== null
        ]);
    }

    /**
     * @Route("/trick_{id}/edit_trick", name="edit_trick", methods={"GET", "POST"})
     * @Security("is_granted('TRICK_MANAGE', trick) || is_granted('ROLE_ADMIN')")
     */
    public function updateTrick(Trick $trick, TrickImageRepository $trickImageRepository, TrickVideoRepository $trickVideoRepository, Request $request, FileUploader $fileUploader): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(TrickType::class, $trick);
        // Get images already stock in Database
        //$trickImages = $trick->getTrickImages();
        $trickImages = $trickImageRepository->findBy(array('trick' => $trick->getId()));
        $trickVideos = $trickVideoRepository->findBy(array('trick' => $trick->getId()));
        $form->get('trickImages')->setData($trickImages);
        $form->get('trickVideos')->setData($trickVideos);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            
            // Fill the trick Information
            $trick->setModifiedAt(new \DateTime());
            $trick->setUser($user);


          // Get the uploaded images

            $newImages = $form['trickImages']->getData();
            
            $this->deleteTrickImage($trickImages, $newImages);
            
            // Manage images - former images AND new images
            if($newImages)
            {
                // Boucle sur les images
                foreach ($newImages as $image)
                {
                    
                    if($image->getFile())
                    {
                        // Use the fileUploader service to save the image in the upload folder
                        $newFilename = $fileUploader->upload($image->getFile());
                        // Save the image name in the database
                        $image->setMediaName($newFilename);   
                    }
                
                }
            }
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($trick);
            $entityManager->flush();

            $this->addFlash('success', 'Le trick a bien été modifié !');

            return $this->redirectToRoute('trick_details', ['slug' => $trick->getSlug()]);
        }

        return $this->render('tricks/trick_form.html.twig', [
            'trick' => $trick,
            'formTrick' => $form->createView(),
            'editMode' => $trick->getId() !== null
        ]);
    }

    /**
     * @Route("/trick_{id}/delete", name="delete_trick", methods={"GET","POST"})
     * @Security("is_granted('TRICK_MANAGE', trick)")
     */
    public function deleteTrick(Request $request, Trick $trick): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trick->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trick);
            $entityManager->flush();
        }

        $this->addFlash('danger', 'Ce trick a bien été supprimé !');

        return $this->redirectToRoute('home');
    }


    public function deleteTrickImage($trickImages, $newImages)
    {
        foreach($trickImages as $image)
        {
            $currentName = $image->getMediaName();
            $saveImage = false;
            
            // Compare the batch of images submit with the form with the trick Images already saved.
            foreach($newImages as $currentNewImages)
            {
                // Check that the already saved images are still here.
                if($currentName == $currentNewImages->getMediaName())
                {
                    $saveImage = true;
                    break;
                }
            }

            //If we can't find the old trick Images in the new batch - we need to delete it.
            if ($saveImage ==false)
            {
                // Get the name of the old image to delete
                $imageName = $image->getMediaName();
                unlink($this->getParameter('images_directory'). '/' . $imageName);

                // Delete it from the database
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($image);
                $entityManager->flush();
            }

        }

    }
        
}
