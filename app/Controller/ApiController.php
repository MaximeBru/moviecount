<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FilmManager;

class ApiController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */

	public function importDatabase() {

		$manager = new FilmManager();

		$call = "http://api.themoviedb.org/3/discover/movie?language=fr&api_key=a2992ed9d3f8b932cc90a57972f676dc";
		$json = file_get_contents($call);
		$tab = (array)json_decode($json);
		$results = (array)$tab['results'];
		$nb_pages = $tab['total_pages'];
		for($i=1;$i<=$nb_pages;$i++) {
			$json = file_get_contents($call . "&page=$i");
			$tab = (array)json_decode($json);
			$results = (array)$tab['results']; 
			foreach ($results as $film) {
				// echo $film->id, $film->title;
				$manager->insert(['id_film_api' => $film->id, 'titre' => $film->title]);
			}
		}
		$this->show('default/home');
	}

}