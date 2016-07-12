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

}
