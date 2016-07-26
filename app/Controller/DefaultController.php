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
		
		$call = "http://api.themoviedb.org/3/movie/" . $film['id_film_api'] . "/casts?api_key=a2992ed9d3f8b932cc90a57972f676dc";
		$json = file_get_contents($call);
		$tab = (array)json_decode($json);
		$cast = (array)$tab['cast'];
		$crew = (array)$tab['crew'];

		$call2 = "http://api.themoviedb.org/3/movie/" . $film['id_film_api'] . "?api_key=a2992ed9d3f8b932cc90a57972f676dc&language=fr";
		$json2 = file_get_contents($call2);
		$tab2 = (array)json_decode($json2);
		$genre = (array)$tab2['genres'];

		$moyenne = $manager->noteMoyenne($id);

		foreach ($crew as $value) {
			if ($value->job == 'Director') {
				$id_assoc = $value->id; break;
			}
		}
		$call3 = "http://api.themoviedb.org/3/person/" . $id_assoc . "/movie_credits?api_key=a2992ed9d3f8b932cc90a57972f676dc";
		$json3 = file_get_contents($call3);
		$tab3 = (array)json_decode($json3);
		$crew3 = (array)$tab3['crew'];
		$films_assoc = [];
		foreach ($crew3 as $value2) {
			if(!in_array( $manager->getFilmAssoc($value2->id) , $films_assoc )) {
				$films_assoc[] = $manager->getFilmAssoc($value2->id);
			}
		}
		//$films_assoc = $manager->getRandomFilms(5);
		
		$this->show('default/detail', ['film'=>$film, 'release_date'=>$tab2['release_date'], 'genre'=>$genre, 'crew'=>$crew, 'cast'=>$cast, 'moyenne'=>$moyenne, 'films_assoc'=>$films_assoc]);
	}	

	public function profil($id)
	{
		$manager = new UserManager();
		$user = $manager->find($id);

		$manager2 = new FilmManager();
		$dejaVu = $manager2->totalVoir($id, 1);
		$veuxVoir = $manager2->totalVoir($id, 2);
		$listeDejaVu = $manager2->dernierAjout($id, 1, 3);
		$listeVeuxVoir = $manager2->dernierAjout($id, 2, 3);
		$top5profil = $manager2->top5profil($id, 5);
		$flop5profil = $manager2->flop5profil($id, 5);
		
		$this->show('default/profil', ['user'=>$user, 'dejaVu'=>$dejaVu, 'veuxVoir'=>$veuxVoir, 'listeDejaVu'=>$listeDejaVu, 'listeVeuxVoir'=>$listeVeuxVoir, 'top5profil'=>$top5profil, 'flop5profil'=>$flop5profil]);
	}

	public function decouvrir()
	{
		$manager = new FilmManager();
		$vingt_films = $manager->getRandomFilms(20);
		$this->show('default/decouvrir', ['vingt_films'=>$vingt_films]);
	}

	public function dejavu($id_user, $id_film)
	{
		$manager = new FilmManager();
		$manager->voir($id_user, $id_film, 1);
		$this->redirectToRoute('home');
	}

	public function jveuxvoir($id_user, $id_film)
	{
		$manager = new FilmManager();
		$manager->voir($id_user, $id_film, 2);
		$this->redirectToRoute('home');
	}

	public function dejavu_vu()
	{
		$manager = new FilmManager();
		$manager->voir($_GET['id_user'], $_GET['id_film'], 1);
		$this->showJson([true]);
	}


	public function vote($note, $id_user, $id_film)
	{
		$manager = new FilmManager();
		$manager->vote($id_user, $id_film, $note);
		$this->redirectToRoute('home');
	}

	// public function vote2($id_user, $id_film)
	// {
	// 	$manager = new FilmManager();
	// 	$manager->vote($id_user, $id_film, 2);
	// 	$_SESSION['message'] = "Merci";
	// 	$this->redirectToRoute('home');
	// }

	// public function vote3($id_user, $id_film)
	// {
	// 	$manager = new FilmManager();
	// 	$manager->vote($id_user, $id_film, 3);
	// 	$_SESSION['message'] = "Merci";
	// 	$this->redirectToRoute('home');
	// }

	// public function vote4($id_user, $id_film)
	// {
	// 	$manager = new FilmManager();
	// 	$manager->vote($id_user, $id_film, 4);
	// 	$_SESSION['message'] = "Merci";
	// 	$this->redirectToRoute('home');
	// }

	// public function vote5($id_user, $id_film)
	// {
	// 	$manager = new FilmManager();
	// 	$manager->vote($id_user, $id_film, 5);
	// 	$_SESSION['message'] = "Merci";
	// 	$this->redirectToRoute('home');
	// }

}