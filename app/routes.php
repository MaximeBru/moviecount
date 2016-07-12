<?php
	
	$w_routes = array(
		# Front
		['GET', '/', 'Default#home', 'home'],
		['GET', '/profil', 'Default#profil', 'profil'],

		# Login, Inscription etc
		['GET|POST', '/inscription', 'Login#inscription', 'inscription'],
		['GET|POST', '/connexion', 'Login#connexion', 'connexion'],
		['GET', '/deconnexion', 'Login#deconnexion', 'deconnexion'],

		# Admin du site
		['GET', '/admin', 'Admin#index', 'admin'],

		# API
		['GET', '/api/random_films/[i:n]', 'Api#getRandomFilms', 'api_random'],
		['GET', '/api/importation', 'Api#importDatabase', 'api_import'],

	);