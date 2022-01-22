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
        $genre = $request->get("select");
        $word = $request->get("search");

        if($word || $genre){
            $film = $filmRepository->searchFilm($word, $genre);
        }
        else{
            $film = $filmRepository->findAll();
        }
        $genreJson = json_decode('[{"id":28,"name":"Action"},{"id":12,"name":"Aventure"},{"id":16,"name":"Animation"},{"id":35,"name":"Comédie"},{"id":80,"name":"Crime"},{"id":99,"name":"Documentaire"},{"id":18,"name":"Drame"},{"id":10751,"name":"Familial"},{"id":14,"name":"Fantastique"},{"id":36,"name":"Histoire"},{"id":27,"name":"Horreur"},{"id":10402,"name":"Musique"},{"id":9648,"name":"Mystère"},{"id":10749,"name":"Romance"},{"id":878,"name":"Science-Fiction"},{"id":10770,"name":"Téléfilm"},{"id":53,"name":"Thriller"},{"id":10752,"name":"Guerre"},{"id":37,"name":"Western"}]');
        /* echo '<script>console.log('.json_encode($genre).')</script>'; */

        return $this->render('catalogue/catalogue.html.twig', [
            "films" => $film,
            "genres"=> $genreJson
        ]);
    }
}
