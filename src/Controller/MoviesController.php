<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{

	#[Route('/', )]
	public function home(ManagerRegistry $doctrine): Response
	{
		$movies = $doctrine->getRepository(Movie::class)->findAll();
		return $this->render('movies/index.html.twig', [
			'movies' => $movies,
		]);
	}

	#[Route('/movies', name: 'movie_list')]
	public function index(ManagerRegistry $doctrine): Response
	{
		$movies = $doctrine->getRepository(Movie::class)->findAll();
		return $this->render('movies/index.html.twig', [
			'movies' => $movies,
		]);
	}

	#[Route('/movie_show/{id}', name: 'movie_show')]
	public function show(Movie $movie): Response
	{
		// forEach( $movie->getActors() as $actor) {
		// 	echo $actor->getName();
		// 	echo "<br/>";
		// }
		// dd($movie->getActors());    
		return $this->render('movies/show.html.twig', [
			'movie' => $movie,
		]);
	}

	#[Route('/movie_create', name: 'movie_create')]
	public function create(): Response
	{
		return $this->render('movies/create.html.twig');
	}

	// store movie
	#[Route('/movie_store', name: 'movie_store' , methods: ['POST'])]
	public function store(ManagerRegistry $doctrine, Request $request): Response
	{
		// create new movie
		$entityManager = $doctrine->getManager();
		$movie = new Movie();
		$movie->setTitle($request->get('title'));
		$movie->setReleaseYear($request->get('release_year'));
		$movie->setDescription($request->get('description'));
		$entityManager->persist( $movie );
		$entityManager->flush();
		// return movie_show route 
		return $this->redirectToRoute('movie_show', [
			'id' => $movie->getId(),
		]);
	}

	#[Route('/movie_edit/{id}', name: 'movie_edit')]
	public function edit(Movie $movie): Response
	{
		
		return $this->render('movies/edit.html.twig', [
			'movie' => $movie,
		]);
	}

	#[Route('/movie_update/{id}', name: 'movie_update' , methods: ['POST'])]
	public function update( ManagerRegistry $doctrine, Request $request,  int $id ): Response
	{
		// update movie data
		$entityManager = $doctrine->getManager();
        $movie = $entityManager->getRepository(Movie::class)->find($id);
		$movie->setTitle($request->get('title'));
		$movie->setDescription($request->get('description'));
		$entityManager->persist($movie);
		$entityManager->flush();
		// return movie_edit route 
		return $this->redirectToRoute('movie_edit', [
			'id' => $movie->getId(),
		]);
	}


	#[Route('/movie_delete/{id}', name: 'movie_delete')]
	public function delete(Movie $movie): Response
	{
		return $this->render('movies/delete.html.twig', [
			'movie' => $movie,
		]);
	}



	
}
