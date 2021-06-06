<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController
{   
    /**
     * @Route("/register", name="security_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder) : Response
    {
        $newUser = new User();

        $form = $this->createForm(RegistrationType::class, $newUser);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            $hashPassword = $encoder->encodePassword($newUser, $newUser->getPassword());
            $newUser->setPassword($hashPassword);

            // On récupère les images transmises
            $profilePicture = $form->get('profilePicture')->getData();

            if ($profilePicture)
            {
                //On génère un nouveau nom de fichier
                $imageFile = uniqid(). '.' . $profilePicture->guessExtension();
                
                //On copie le fichier dans le dossier Upload
                $profilePicture->move(
                $this->getParameter('images_directory'),
                $imageFile
                );
            
                // On enregistre le nom de l'image dans la base de donnée
                $newUser->setProfilePicture($imageFile);

            }
            
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($newUser);
            $entityManager->flush();
            
            return $this->redirectToRoute('app_login');
        }
        return $this->render('security/security_register.html.twig', [
            'title' => 'S\'inscrire',
            'registrationForm' => $form->createView()
            ]);
    }

    /**
     * @Route("/login", name="app_login", methods= {"GET", "POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/security_login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
