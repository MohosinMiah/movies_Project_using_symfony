<?php

namespace App\Controller;

use App\Entity\Actor;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actor')]
class ActorController extends AbstractController
{

	#[Route('/', name: 'actor_list')]
	public function home(ManagerRegistry $doctrine): Response
	{
		$actors = $doctrine->getRepository(Actor::class)->findAll();
		return $this->render('actors/index.html.twig', [
			'actors' => $actors,
		]);
	}

	

	#[Route('/actor_show/{id}', name: 'actor_show')]
	public function show(Actor $movie): Response
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

	
}