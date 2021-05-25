<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\TrickGroup;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TricksController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function getTrickList(): Response
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
     * @Route("/tricks&{id}", name="trick_details", methods={"GET"})
     */
    public function getTrick(Trick $trick) : Response
    {
        return $this->render('tricks/trick_details.html.twig', [
            'trick' => $trick
        ]);
    }

    /**
     * @Route("/create_trick_test", name="create_trick_test", methods={"GET", "POST"})
     */
    public function createTrickTest(Request $request, Trick $newTrick) : Response
    {
        $newTrick = new Trick();

        $form = $this->createFormBuilder($newTrick)
            ->add('trickName')
            ->add('trickDescription', TextareaType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newTrick->setCreatedAt(new \DateTime());
            $newTrick->setModifiedAt(new \DateTime());

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newTrick);
            $manager->flush();

            return $this->redirectToRoute('trick_details', ['id' => $newTrick->getId()]);
        }

        return $this->render('tricks/create_trick.html.twig', [
            'title' => 'Créer un trick',
            'formTrick' => $form->createView(),
        ]);
    }

    /**
     * @Route("/create_trick", name="create_trick", methods={"GET", "POST"})
     */
    public function createTrick(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $newTrick = new Trick();
        $form = $this->createFormBuilder($newTrick, ['csrf_protection' => false])
            ->add('trickName')
            ->add('trickDescription', TextareaType::class)
            ->getForm();
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $newTrick->setModifiedAt(new \DateTime())
                    ->setCreatedAt(new \DateTime());

            $entityManager->persist($newTrick);
            $entityManager->flush();

            return $this->redirectToRoute('trick_details', ['id' => $newTrick->getId()]);
        }

        return $this->render('tricks/create_trick.html.twig', [
            'title' => 'Créer un trick',
            'formTrick' => $form->createView(),
        ]);
    }
}
