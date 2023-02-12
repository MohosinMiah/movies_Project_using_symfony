<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'movie_list')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $movies = $doctrine->getRepository(Movie::class)->findAll();
// dd($movies);
        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    
}
