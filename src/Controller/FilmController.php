<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    #[Route('/gestion-des-films.html', name: 'films_admin')]
    #[IsGranted("ROLE_ADMIN")]
    public function adminFilms(): Response
    {
        return $this->render('film/admin_films.html.twig', [
        ]);
    }

    #[Route('/voir-un-film.html', name: 'show_one_film')]
    public function showOneFilm(): Response
    {
        return $this->render('film/show_one_film.html.twig', [
        ]);
    }
}
