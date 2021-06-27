<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CommentController extends AbstractController
{
    
    /**
     * @Route("/create_comment", name="create_comment", methods={"POST"})
     * You must be connected in order to leave a comment
     * @Security("is_granted('ROLE_USER')")
     */
    public function createComment(Trick $trick, Request $request) : FormView
    {
        $newComment = new Comment();

        $form = $this->createForm(CommentType::class, $newComment);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $newComment->setCommentDate(new \DateTime());
            $newComment->setTrick($trick);
            $newComment->setUser($this->getUser());
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newComment);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a bien été créé !');
            
        } 

        return $form->createView();
    }

    /**
     * @Route("/delete_comment/comment_{id}}", name="delete_comment", methods={"POST", "GET"})
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function deleteComment( Request $request, Comment $comment) : Response
    {

        $trick = $comment->getTrick();
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        $this->addFlash('danger', 'Le commentaire a été supprimé !');

        return $this->redirectToRoute('trick_details', ['slug' => $trick->getSlug()]);

    }

    
}
