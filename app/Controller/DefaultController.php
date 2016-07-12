<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FilmManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$manager = new FilmManager();
		$cinq_films = $manager->getRandomFilms(5);

		$this->show('default/home',['cinq_films'=>$cinq_films]);
	}

}