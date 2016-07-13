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

	public function getTopFilm($limit = 5)
	{
		$sql = "SELECT id_film_api, id_film, avg(vote_count)as moyenne FROM users_stats as u_s LEFT JOIN " . $this->table . " as f ON u_s.id_film = f.id group by id_film order by moyenne desc limit ". $limit;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

}
