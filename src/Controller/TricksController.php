<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TricksController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    /**
     * @Route("/tricks", name="tricks")
     */
    public function getTrickList(): Response
    {
        return $this->render('tricks/home.html.twig', [
            'title' => 'Home'
        ]);
    }
}
