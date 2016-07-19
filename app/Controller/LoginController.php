<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;
use \Manager\MyAuthentificationManager;

class LoginController extends Controller
{

	public function inscription()
	{
		if (isset($_POST['inscrire'])) {
			// on instancie un objet pour gérer l'accès à la table "wusers"
			$manager = new UserManager();
			$_POST['myform']['role'] = 'user';
			$_POST['myform']['password'] = password_hash($_POST['myform']['password'], PASSWORD_DEFAULT);
			$manager->insert($_POST["myform"]);
			$this->redirectToRoute('home');
		}

		$this->show('login/inscription');
	}


	public function connexion()
	{
		if (isset($_POST['connexion'])) {
			// pour réaliser la connexion d'un utilisateur, nous avons besoin de deux "managers" :
			// un pour l'authentification et l'autre pour récupérer les informations de l'utilisateur (role, username, email, id)
			$authManager = new MyAuthentificationManager();
			$userManager = new UserManager();

			// On teste via le manager de l'authentification si les informations entrées par l'utilisateur sont valides
			if($authManager->isValidLoginInfo($_POST['myform']['email'], $_POST['myform']['password'])) {

				// je récupère les infos de l'utilisateur
				$user = $userManager->getUserByUsernameOrEmail($_POST['myform']['email']);

				// on logue l'utilisateur
				$authManager->LogUserIn($user);

				// on redirige vers son profil
				$this->redirectToRoute('home');
			}
		}

		$this->show('login/connexion');

	}


	public function deconnexion()
	{
		unset($_SESSION['user']);
		$this->redirectToRoute('home');
	}

}