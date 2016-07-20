<?php

namespace Manager;

class FilmManager extends \W\Manager\Manager {
	
	public function getRandomFilms($limit = 5)
	{
		$sql = "SELECT * FROM " . $this->table . " ORDER BY RAND() LIMIT $limit";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function getTopFilm($limit = 5)	//Top 5 films les mieux notés
	{
		$sql = "SELECT id_film_api, id_film, titre, img, avg(vote_count)as moyenne FROM users_stats as u_s LEFT JOIN " . $this->table . " as f ON u_s.id_film = f.id WHERE u_s.stat_view = 1 group by id_film order by moyenne desc limit ". $limit;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function topListeVu($limit = 5) 	//Top 5  des films ajoutés à la liste vu (stat_view = 1)
	{
		$sql = "SELECT id_film_api, id_film, titre, img, COUNT(*)as topAjout FROM users_stats as u_s LEFT JOIN " . $this->table . " as f ON u_s.id_film = f.id WHERE u_s.stat_view = 1 group by id_film order by topAjout desc limit " . $limit;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function topListeVeutvoir($limit = 5)	//Top 5 des films ajoutés à la liste "veut voir" (stat_view = 2)
	{
		$sql = "SELECT id_film_api, id_film, COUNT(*)as topAjout FROM users_stats as u_s LEFT JOIN " . $this->table . " as f ON u_s.id_film = f.id WHERE u_s.stat_view = 2 group by id_film order by topAjout desc limit" . $limit;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function topUsers($limit = 6)	//Top 6 des personnes qui ont vu le plus de films
	{
		$sql = "SELECT username, id_user, COUNT(*)as topUser FROM users_stats as u_s LEFT JOIN wusers as u ON u_s.id_user = u.id WHERE u_s.stat_view = 1 group by id_user order by topUser desc limit $limit";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();

	}

	public function lastActivity($limit = 6)	//Dernières activités de la communauté
	{
		$sql = "SELECT u.username, u_s.id_user, u_s.date_ajout, u_s.stat_view, f.titre FROM users_stats u_s, wusers u, films f WHERE u_s.id_user = u.id and u_s.id_film = f.id order by u_s.date_ajout desc limit $limit";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}
	
}
