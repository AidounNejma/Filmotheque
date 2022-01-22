<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{   
    #[Route('/catalogue/search.html', name: 'catalogue_search_post', methods: ['POST'])]
    #[Route('/catalogue/search.html', name: 'catalogue_search_get', methods: ['GET'])]
    #[Route('/catalogue.html', name: 'catalogue')]
    public function indexCatalogue(FilmRepository $filmRepository, Request $request): Response
    {   
        
        $word = $request->get("search");
        echo '<script>console.log('.json_encode($word).')</script>';

        if($word){
            $film = $filmRepository->searchFilm($word);
        }
        else{
            $film = $filmRepository->findAll();
        }

        return $this->render('catalogue/catalogue.html.twig', [
            "films" => $film
        ]);
    }
}
