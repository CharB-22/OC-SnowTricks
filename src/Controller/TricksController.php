<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\TrickImage;
use App\Entity\TrickVideo;
use App\Form\TrickType;
use App\Form\CommentType;
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
    public function getTrick(Trick $trick, Request $request) : Response
    {
        $newComment = new Comment();
        $user = $this->getUser();
        
        $form = $this->createForm(CommentType::class, $newComment);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $newComment->setCommentDate(new \DateTime());
            $newComment->setTrick($trick);
            $newComment->setUser($user);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newComment);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a bien été créé !');
            
        } 


        return $this->render('tricks/trick_details.html.twig', [
            'trick' => $trick,
            'formComment' => $form->createView(),
        ]);
    }



    /**
     * @Route("/create_trick", name="create_trick", methods={"GET", "POST"})
     * You must be connected in order to create a pin
     * @Security("is_granted('ROLE_USER')")
     */
    public function createTrick(Request $request, SluggerInterface $slugger): Response
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

            // Create a slug
            $urlName = $newTrick->getTrickName() . '-'. $newTrick->getId();
            $slug= $slugger->slug($urlName);
            $newTrick->setSlug($slug);

          // Get the uploaded images
            $trickImages = $form['trickImages']->getData();
            
            if($trickImages)
            {
               // Boucle sur les images
               foreach ($trickImages as $image)
               {

                   $newFilename = uniqid().'.'.$image->getFile()->guessExtension();

                   //On copie le fichier dans le dossier Upload
                   $image->getFile()->move(
                       $this->getParameter('images_directory'),
                       $newFilename
                       );
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
    public function updateTrick(Trick $trick, Request $request): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(TrickType::class, $trick);
        // Get images already stock in Database
        $trickImages = $trick->getTrickImages();
        $trickVideos = $trick->getTrickVideos();
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

            // Manage images - former images AND new images
            if($trickImages)
            {
                // Boucle sur les images
                foreach ($newImages as $image)
                {
                    if($image->getFile())
                    {
                        $newFilename = uniqid().'.'.$image->getFile()->guessExtension();

                        //On copie le fichier dans le dossier Upload
                        $image->getFile()->move(
                            $this->getParameter('images_directory'),
                            $newFilename
                            );
        
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

    /**
     * @Route("/tricks/delete_comment/comment_{id}", name="delete_comment", methods={"POST", "GET"})
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function deleteComment(Comment $comment, Request $request) : Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        $this->addFlash('danger', 'Le commentaire a été supprimé !');

        return $this->redirectToRoute('home');

    }

    /**
     * @Route("/tricks/delete_image/image_{id}", name="delete_trickImage", methods={"POST", "GET"})
     */
    public function deleteTrickImage(Request $request, TrickImage $trickImage) : Response
    {

            // Delete it from the uploads folder
            $imageName = $trickImage->getMediaName();
            unlink($this->getParameter('images_directory'). '/' . $imageName);
            
            // Delete it from the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trickImage);
            $entityManager->flush();

        return $this->redirectToRoute('edit_trick', ['id' => $trickImage->getTrick()->getId()]);
    }
    
    /**
     * @Route("/tricks/delete_video/video_{id}", name="delete_trickVideo", methods={"POST", "GET"})
     */
    public function deleteTrickVideo(Request $request, TrickVideo $trickVideo) : Response
    {
            
            // Delete it from the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trickVideo);
            $entityManager->flush();
            
        return $this->redirectToRoute('edit_trick', ['id' => $trickVideo->getTrick()->getId()]);
    }    
}
