<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Entity\TrickImage;
use App\Form\TrickType;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


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
     * @Route("/tricks/{id}", name="trick_details", methods={"GET", "POST"})
     */
    public function getTrick(Trick $trick, Request $request) : Response
    {
        $newComment = new Comment();
        $user = $this->getUser();
        
        $form = $this->createForm(CommentType::class, $newComment, ['csrf_protection' => false]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $newComment->setCommentDate(new \DateTime());
            $newComment->setTrick($trick);
            $newComment->setUser($user);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newComment);
            $entityManager->flush();
            
        } 

        $trickComments = $trick->getComments();
        $trickImages = $trick->getTrickImages();

        return $this->render('tricks/trick_details.html.twig', [
            'trick' => $trick,
            'formComment' => $form->createView(),
            'comments' => $trickComments,
            'trickImage' => $trickImages
        ]);
    }



    /**
     * @Route("/create_trick", name="create_trick", methods={"GET", "POST"})
     * @Route("/{id}/edit_trick", name="edit_trick", methods={"GET", "POST"})
     */
    public function manageTrickForm(Trick $newTrick = null, Request $request): Response
    {

        $user = $this->getUser();

        if (!$newTrick)
        {
            $newTrick = new Trick();
        }  
        
        $form = $this->createForm(TrickType::class, $newTrick, ['csrf_protection' => false]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            if(!$newTrick->getId())
            {
                $newTrick->setCreatedAt(new \DateTime()); 
            }

            $newTrick->setModifiedAt(new \DateTime());
            $newTrick->setUser($user);

            // On récupère les images transmises
            $trickImage = $form->get('trickImage')->getData();
            // Boucle sur les images
            foreach($trickImage as $image)
            {
                // New file name
                $newImageName = md5(uniqid()) . '.' . $image->getExtension();

                // Save file in the upload folder
                $image->move(
                    $this->getParameter('images_directory', $newImageName)
                );

                // Save the image name in the database
                $trickImg = new TrickImage();
                $trickImg->setMediaName($newImageName);
                $newTrick->addTrickImage($trickImg);


            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newTrick);
            $entityManager->flush();

            return $this->redirectToRoute('trick_details', ['id' => $newTrick->getId()]);
        }

        return $this->render('tricks/trick_form.html.twig', [
            'formTrick' => $form->createView(),
            'editMode' => $newTrick->getId() !== null
        ]);
    }

    /**
     * @Route("/{id}/delete", name="delete_trick", methods={"GET","POST"})
     */
    public function deleteTrick(Request $request, Trick $trick): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trick->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trick);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/tricks/delete_comment/{id}", name="delete_comment", methods={"POST", "GET"})
     */
    public function deleteComment(Comment $comment, Request $request) : Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comment);
            $entityManager->flush();
        }


        return $this->redirectToRoute('home');

    }

    /**
     * @Route("/tricks/delete_image/{id}", name="delete_trickImage", methods={"POST", "GET"})
     */
    public function deleteTrickImage(Request $request, TrickImage $trickImage)
    {
        if ($this->isCsrfTokenValid('delete'.$trickImage->getId(), $request->request->get('_token'))) {
            // Delete it from the uploads folder
            $imageName = $trickImage->getMediaName();
            unlink($this->getParameter('images_directory'). '/' . $imageName);
            
            // Delete it from the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trickImage);
            $entityManager->flush();
        }
    }    
}
