<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue.html', name: 'catalogue')]
    public function index(): Response
    {
        return $this->render('catalogue/catalogue.html.twig', [
            
        ]);
    }
}
