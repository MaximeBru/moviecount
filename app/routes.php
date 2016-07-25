<?php
	
	$w_routes = array(
		# Front
		['GET', '/', 'Default#home', 'home'],
		['GET|POST', '/recherche', 'Default#recherche', 'recherche'],
		['GET', '/detail/[i:id]', 'Default#detail', 'detail'],
		['GET|POST', '/profil/[i:id]', 'Default#profil', 'profil'],
		['GET', '/decouvrir', 'Default#decouvrir', 'decouvrir'],
		['GET', '/dejavu/[i:id_user]/[i:id_film]', 'Default#dejavu', 'dejavu'],
		['GET', '/dejavu_vu', 'Default#dejavu_vu', 'dejavu_vu'],
		['GET', '/jveuxvoir/[i:id_user]/[i:id_film]', 'Default#jveuxvoir', 'jveuxvoir'],
		['GET', '/vote/[i:note]/[i:id_user]/[i:id_film]', 'Default#vote', 'vote'],

		# Login, Inscription etc
		['GET|POST', '/inscription', 'Login#inscription', 'inscription'],
		['GET|POST', '/connexion', 'Login#connexion', 'connexion'],
		['GET', '/deconnexion', 'Login#deconnexion', 'deconnexion'],
		// ... réinitialisation, etc

		# Admin du site
		['GET', '/admin', 'Admin#index', 'admin'],
		['GET|POST', '/admin/creer', 'Admin#creer', 'creer'],
		['GET|POST', '/admin/editer/[i:id]', 'Admin#editer', 'editer'],
		['GET', '/admin/supprimer/[i:id]', 'Admin#supprimer', 'supprimer'],

		# API
		['GET', '/api/random_films/[i:n]', 'Api#getRandomFilms', 'api_random'],
		['GET', '/api/topfilms/[i:n]', 'Api#topFilms', 'api_topfilms'],
		['GET', '/api/importation', 'Api#importDatabase', 'api_import'],

	);