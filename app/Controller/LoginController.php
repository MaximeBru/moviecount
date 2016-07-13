<?php

namespace Controller;

use \W\Controller\Controller;

class LoginController extends Controller
{


	public function connexion()
	{
		$this->show('login/connexion');
	}

	public function inscription()
	{
		$this->show('login/inscription');
	}

	public function deconnexion()
	{
		unset($_SESSION['user']);
		$this->redirectToRoute('home');
	}

}