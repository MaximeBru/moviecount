<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FilmManager;
use \W\Manager\UserManager;

class DefaultController extends Controller
{
	// ['GET', '/', 'Default#home', 'home'],
	// 	['GET', '/recherche', 'Default#recherche', 'recherche'],
	// 	['GET', '/detail/[i:id]', 'Default#detail', 'detail'],
	// 	['GET|POST', '/profil/[i:id]', 'Default#profil', 'profil'],
	// 	['GET', '/decouvrir', 'Default#decouvrir', 'decouvrir'],

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$manager = new FilmManager();
		$top5 = $manager->getTopFilm();
		$top5Vu = $manager->topListeVu();
		$lastActivity = $manager->lastActivity();
		$topUsers = $manager->topUsers();
		$trois_films = $manager->getRandomFilms(3);
		
		$this->show('default/home', ['top5'=>$top5, 'top5Vu'=>$top5Vu, 'lastActivity'=>$lastActivity, 'topUsers'=>$topUsers, 'trois_films'=>$trois_films]);
	}

	public function recherche()
	{
		$manager = new FilmManager();
		$search = $manager->search($_POST['recherche']);
		$this->show('default/recherche', ['search'=>$search]);
	}

	public function detail($id)
	{
		$manager = new FilmManager();
		$film = $manager->find($id);
		$films_assoc = $manager->getRandomFilms(5);
		//$this->show('default/home',['films_assoc'=>$films_assoc]);
		$this->show('default/detail', ['film' => $film, 'films_assoc'=>$films_assoc]);
	}	

	public function profil($id)
	{
		$manager = new UserManager();
		$user = $manager->find($id);
		$this->show('default/profil', ['user'=>$user]);
	}

	public function decouvrir()
	{
		$this->show('default/decouvrir');
	}

	public function dejavu($id_user, $id_film)
	{
		$manager = new FilmManager();
		$manager->voir($id_user, $id_film, 1);
		$_SESSION['message'] = "merci";
		$this->redirectToRoute('home');
	}

	public function jveuxvoir($id_user, $id_film)
	{
		$manager = new FilmManager();
		$manager->voir($id_user, $id_film, 2);
		$_SESSION['message'] = "merci";
		$this->redirectToRoute('home');
	}

}