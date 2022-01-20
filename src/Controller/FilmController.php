<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
    public function __construct(HttpClientInterface $client, private ManagerRegistry $doctrine)
    {
        $this->client = $client;
    }
    
    /* Route pour la gestion des films (ROLE ADMIN) */
    #[Route('/gestion-des-films.html', name: 'films_admin')]
    #[IsGranted("ROLE_ADMIN")]
    public function adminFilms(): Response
    {
        return $this->render('film/admin_films.html.twig', [
        ]);
    }

    /* Route pour visualiser un seul film (ROLE USER OU ADMIN)*/
    #[Route('/voir-un-film.html', name: 'show_one_film')]
    public function showOneFilm(): Response
    {
        return $this->render('film/show_one_film.html.twig', [
        ]);
    }

    /* Fetch des films */
    public function fetchFilmsByPage(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.themoviedb.org/3/discover/movie/?api_key=5daff8553d854c2631ec780f6d5b10d6&language=fr'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content["results"];
    }

    /* Route pour visualiser tous les films que l'on peut ajouter (ROLE ADMIN)*/
    #[Route('/ajouter-un-film.html', name: 'admin_add_film')]
    #[IsGranted("ROLE_ADMIN")]
    public function addFilm(): Response
    {
        $content = $this->fetchFilmsByPage();
        
        foreach ($content as $i => $f) {
            $film[$i] = new Film();
            $film[$i]->setIdApi($f['id']);
            $film[$i]->setTitle($f['title']);
            $film[$i]->setSummary($f['overview']);
            $film[$i]->setReleasedAt(new \DateTime($f['release_date']));
            $film[$i]->setPictures($f['poster_path']);
            
        }
        return $this->render('film/admin_add_films.html.twig', [
            "films" => $film
        ]);
    }

     /* Fetch des films */
        public function fetchFilmById($id): array
        {
            $response = $this->client->request(
                'GET',
                "https://api.themoviedb.org/3/movie/{$id}?api_key=5daff8553d854c2631ec780f6d5b10d6&language=fr"
            );
    
            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            $content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
    
            return $content;
        }

    /* Route pour ajouter un film au clic */
    #[Route('/{idApi}', name: 'film_added', methods:["GET", "POST"] )]
    #[IsGranted("ROLE_ADMIN")]
    public function saveFilmDB(Request $request, ManagerRegistry $doctrine): Response
    {
        #Récupération des données du film
       /*  echo '<script>console.log('.json_encode($request->attributes->get('idApi')).')</script>'; */
        $f = $this->fetchFilmById($request->attributes->get('idApi'));

        # Copie de la data sélectionnée dans la BDD
        $newFilm = new Film();
        $newFilm->setIdApi($f['id']);
        $newFilm->setTitle($f['title']);
        $newFilm->setSummary($f['overview']);
        $newFilm->setReleasedAt(new \DateTime($f['release_date']));
        $newFilm->setPictures($f['poster_path']);
        /* $newFilm->setActors($f['actors']); */
        /* $newFilm->setGenre($f['genres']['name']); */
       /*  $newFilm->setCountry($f['production_countries']['name']); */
        $newFilm->setDuration($f['runtime']);

        # Sauvegarde dans la BDD
        $doctrine = $this->doctrine->getManager();
        $doctrine->persist($newFilm);
        $doctrine->flush();

        # Redirection
        return $this->redirectToRoute('home');

    }
    

}
