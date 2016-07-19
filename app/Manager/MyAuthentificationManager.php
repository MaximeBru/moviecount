<?php

namespace Manager;

use W\Security\StringUtils;
use W\Manager\UserManager;
use W\Security\AuthentificationManager;

class MyAuthentificationManager extends AuthentificationManager
{
	public static function deconnexion() {
		unset($_SESSION['user']);

	}
}