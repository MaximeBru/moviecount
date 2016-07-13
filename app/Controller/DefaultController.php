<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FilmManager;

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
		//$manager = new FilmManager();
		//$cinq_films = $manager->getRandomFilms(5);
		//$this->show('default/home',['cinq_films'=>$cinq_films]);
		$this->show('default/home');
	}

	public function recherche()
	{
		$this->show('default/recherche');
	}

	public function detail($id)
	{
		$this->show('default/detail');
	}	

	public function profil($id)
	{
		$this->show('default/profil');
	}

	public function decouvrir()
	{
		$this->show('default/decouvrir');
	}

}