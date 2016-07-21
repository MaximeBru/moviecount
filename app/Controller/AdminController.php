<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;

class AdminController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	
	public function home()
	{
		$this->show('default/home');
	}
	



	public function index() {
		$this->allowTo('admin');
		$manager = new UserManager();
		$wuser = $manager->findAll();
		$this->show('admin/index', [ 'liste_des_users' => $wuser ]);
	}


	// créer un utilisateur
	public function creer() {
		if(isset($_POST['creer'])) {
			$manager = new UserManager();
			$manager->insert($_POST["myform"]);
			$this->redirectToRoute('admin');
		}
		
		$this->show('admin/creer');
	}

	// éditer
	public function editer($id) {
		$manager = new UserManager();
		$user = $manager->find($id);

		if(isset($_POST['modifier'])) {
			$manager->update($_POST['myform'], $id);
			$this->redirectToRoute('admin');
		}

		$this->show('admin/editer', ['user' => $user]);
	}

	public function supprimer($id) {
		$manager = new UserManager();
		$manager->delete($id);
		$this->redirectToRoute('admin');
	}

	//fonction back pour les films

}
