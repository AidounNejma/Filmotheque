<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/inscription', name: 'register')]
    public function registration(): Response
    {
        $user = new User();
        $form = $this->createForm(user/form);
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
