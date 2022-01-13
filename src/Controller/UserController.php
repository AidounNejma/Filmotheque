<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class UserController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}
    #[Route('/inscription', name: 'register', methods:["GET","POST"] )]
    public function registration(Request $request): Response
    {
        
        $user = new User();
        $form = $this->createForm(UserFormType::class,$user)    
        ->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
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