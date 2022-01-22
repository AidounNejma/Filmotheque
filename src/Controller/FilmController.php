<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class FilmController extends AbstractController
{
    public function __construct(HttpClientInterface $client, private ManagerRegistry $doctrine)
    {
        $this->client = $client;
    }
    
    /* ---------------------------------------------------------------------------- */

    /* Route pour la gestion des films (ROLE ADMIN) */
    #[Route('/gestion-des-films.html', name: 'films_admin')]
    #[IsGranted("ROLE_ADMIN")]
    public function adminFilms(): Response
    {
        return $this->render('film/admin_films.html.twig', [
        ]);
    }
    /* ---------------------------------------------------------------------------- */

      /* Fonction Search (pour la barre de recherche) */

    public function search($search, $page): array
    {
        if($search){
            $response = $this->client->request(
                'GET',
                "https://api.themoviedb.org/3/search/movie?api_key=5daff8553d854c2631ec780f6d5b10d6&language=fr&query={$search}&page={$page}"
            );
        }
        else{
            $response = $this->client->request(
                'GET',
                "https://api.themoviedb.org/3/discover/movie/?api_key=5daff8553d854c2631ec780f6d5b10d6&page={$page}&language=fr"
            );
        }

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

    /* ---------------------------------------------------------------------------- */

    /* Route pour visualiser tous les films que l'on peut ajouter (ROLE ADMIN)*/
    #[Route('/ajouter-un-film/search/{$search}/page/{$page}.html', name: 'admin_search_page', methods:['GET'])]
    #[Route('/ajouter-un-film.html', name: 'admin_search', methods: ['POST'])]
    #[Route('/ajouter-un-film.html', name: 'admin_add_film')]
    #[IsGranted("ROLE_ADMIN")]
    public function addFilm(Request $request): Response
    {
        /* echo '<script>console.log('.json_encode($request->get('page')).')</script>'; */
        
        if($request->get('page')){
            $page = $request->get('page');
        }
        else{
            $page = 1;
        }

        if($request->get('search')){
            $search = $request->get('search');
        }
        else{
            $search = 0;
        }

        /*  echo '<script>console.log('.json_encode($request->get('search')).')</script>'; */
        $content = $this->search($search, $page);
        /* echo '<script>console.log('.json_encode($content).')</script>'; */


        foreach ($content as $i => $f) {
            $film[$i] = new Film();
            $film[$i]->setIdApi($f['id']);
            $film[$i]->setTitle($f['title']);
            $film[$i]->setSummary($f['overview']);
            $film[$i]->setReleasedAt(new \DateTime($f['release_date']));
            
            if($f['poster_path']){
                $film[$i]->setPictures($f['poster_path']);
            }
        }


        return $this->render('film/admin_add_films.html.twig', [
            "films" => $film,
            "page" => $page,
            "search" => $search 
        ]);
    }
    /* ---------------------------------------------------------------------------- */

        /* Fetch des films par l'Id */
    public function fetchFilmById($id): array
        {
            $response = $this->client->request(
                'GET',
                "https://api.themoviedb.org/3/movie/{$id}?api_key=5daff8553d854c2631ec780f6d5b10d6&language=fr"
            );

            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            $content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
            
            $contentGenre = $content['genres'];
            $genre = "";

            foreach ($contentGenre as $g) {
                $genre .= $g['name'].", ";
            }

            $content['genres'] = $genre;

            $response = $this->client->request(
                'GET',
                "https://api.themoviedb.org/3/movie/{$id}/credits?api_key=5daff8553d854c2631ec780f6d5b10d6&language=fr"
            );

            $contentActors = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            $contentActors = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

            $contentActors = $contentActors['cast'];
            $actors = "";

            for($i = 0; $i < 5 ; $i++){
                $actors .= $contentActors[$i]['name'].", ";
            }

            $content['actors'] = $actors;

            return $content;
        }
    /* ---------------------------------------------------------------------------- */

    /* Route pour ajouter un film au clic */
    #[Route('/ajouter-un-film/{idApi}', name: 'film_added', methods:["GET", "POST"] )]
    #[IsGranted("ROLE_ADMIN")]
    public function saveFilmDB(Request $request, ManagerRegistry $doctrine, FilmRepository $fRepo): Response
    {
        #Requête pour éviter les doublons en BDD
        $idApi = $request->attributes->get('idApi');
        $reqSQL= $fRepo->createQueryBuilder('f')->where('f.idApi LIKE :idApi')->setParameter('idApi', "%$idApi%")->getQuery()->getResult();

        #Condition pour savoir si le film est déjà présent dans BDD
        if(!$reqSQL){
            
            #Récupération des données du film
            $f = $this->fetchFilmById($request->attributes->get('idApi'));
            /* echo '<script>console.log('.json_encode($f).')</script>';*/

            # Copie de la data sélectionnée dans la BDD
            $newFilm = new Film();
            $newFilm->setIdApi($f['id']);
            $newFilm->setTitle($f['title']);
            $newFilm->setSummary($f['overview']);
            $newFilm->setReleasedAt(new \DateTime($f['release_date']));
            $newFilm->setPictures($f['poster_path']);
            $newFilm->setActors($f['actors']);
            $newFilm->setGenre($f['genres']);
            $newFilm->setCountry($f['production_countries'][0]['name']);
            $newFilm->setDuration($f['runtime']);

            # Sauvegarde dans la BDD
            $doctrine = $this->doctrine->getManager();
            $doctrine->persist($newFilm);
            $doctrine->flush();

            # Notification de confirmation
            $this->addFlash("success", "Le film a bien été ajouté à la BDD.");
            
        }
        else{
            # Notification d'erreur
            $this->addFlash("error", "Erreur: Le film existe déjà dans la BDD.");
        }


        
        # Redirection
        return $this->redirectToRoute('admin_add_film');

    }
    
    /* ---------------------------------------------------------------------------- */

    /* Route pour visualiser un seul film (ROLE USER OU ADMIN)*/
    #[Route('/voir-un-film/{id}.html', name: 'show_one_film', methods: ['GET'])]
    public function showOneFilm(Film $film): Response
    {
        return $this->render('film/show_one_film.html.twig', [
            'film' => $film,
        ]);
    }


}
