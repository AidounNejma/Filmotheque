<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    
    public function __construct(private ManagerRegistry $doctrine) {}

    /** 
     * Inscription d'un utilisateur
     * @param Request $request
     * @param UserPasswordHasherInterface $passwordHasher
     * @return RedirectResponse|Response
     * 
    */
    #[Route('/inscription.html', name: 'register', methods:["GET","POST"] )]
    public function registration(Request $request, UserPasswordHasherInterface $passwordHasher,): Response
    {
        # Création d'un utilisateur
        $user = new User();

        # Création du formulaire
        $form = $this->createForm(UserFormType::class,$user)    
        ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            # Encodage du mot de passe
            $clearPassword = $form->get('password')->getData();
            $user->setPassword($passwordHasher->hashPassword($user, $clearPassword));

            # Sauvegarde dans la BDD
            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
    
            # Notification de confirmation
            $this->addFlash("success", "Votre inscription a été validée");

            # Redirection
            return $this->redirectToRoute('app_login');
        }

        return $this->render('user/registration.html.twig', [
            "registrationForm"=>$form->createView()
        ]); 
        
    }
}