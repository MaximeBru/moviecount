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
		$sql = "SELECT id_film_api, id_film, titre, img, avg(vote_count)as moyenne FROM users_stats as u_s LEFT JOIN " . $this->table . " as f ON u_s.id_film = f.id WHERE u_s.stat_view = 1 AND u_s.vote_count IS NOT NULL GROUP BY id_film ORDER BY moyenne desc limit ". $limit;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function topListeVu($limit = 5) 	//Top 5 des films ajoutés à la liste vu (stat_view = 1)
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

	public function topUsers($limit = 8)	//Top 8 des personnes qui ont vu le plus de films
	{
		$sql = "SELECT username, id_user, COUNT(*)as topUser FROM users_stats as u_s LEFT JOIN wusers as u ON u_s.id_user = u.id WHERE u_s.stat_view = 1 group by id_user order by topUser desc limit $limit";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();

	}

	public function lastActivity($limit = 6)	//Dernières activités de la communauté
	{
		$sql = "SELECT u.username, u_s.id_user, u_s.date_ajout, u_s.stat_view, f.titre, f.id FROM users_stats u_s, wusers u, films f WHERE u_s.id_user = u.id and u_s.id_film = f.id order by u_s.date_ajout desc limit $limit";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function search($search)		//Recherche par titre du film
	{
		$sql = "SELECT id_film_api, id, titre, img FROM " . $this->table . " WHERE titre LIKE '%$search%'";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function voir($id_user, $id_film, $stat)
	{
		// vérifier si l'enregistrement pour ce film et cet utilisateur n'est pas déjà dans la table
		$sql2 = "SELECT stat_view from users_stats WHERE id_user = $id_user AND id_film = $id_film";
		$sth2 = $this->dbh->prepare($sql2);
		$sth2->execute();
		if($sth2->rowCount() == 0 )	//si l'enregistrement n'existe pas on l'ajoute dans la table users_stats
		{
			$sql = "INSERT INTO users_stats (`id_user`, `id_film`, `stat_view`, `date_ajout` ) VALUES (:id_user, :id_film, :stat, NOW())";
			$sth = $this->dbh->prepare($sql);
		    $sth->bindValue(":id_user", $id_user);
		    $sth->bindValue(":id_film", $id_film);
		    $sth->bindValue(":stat", $stat);
			return $sth->execute();
		}
		elseif($sth2->rowCount() != 0 )	//Si l'enregistrement existe on fait une éventuelle mise à jour
		{
			$result = $sth2->fetch();
			if($result['stat_view'] != $stat)
			{
				$sql = "UPDATE users_stats SET stat_view = $stat, date_ajout = NOW() WHERE id_user = $id_user AND id_film = $id_film";
				$sth = $this->dbh->prepare($sql);
				return $sth->execute();
			}
		}
	}
	
	public function totalVoir($id_user, $stat)	//Total des films vus (stat_view 1) ou à voir (stat_view 2) par l'utilisateur connecté 
	{
		$sql ="SELECT count(*)as total FROM users_stats WHERE stat_view=$stat and id_user=$id_user";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetch();
	}

	public function dernierAjout($id_user, $stat, $limit) // Derniers ajouts "dejà vu" ou "veux voir" par l'utilisateur
	{
		$sql = "SELECT f.id, f.titre FROM users_stats AS u_s LEFT JOIN films AS f ON u_s.id_film = f.id WHERE u_s.id_user = $id_user AND stat_view = $stat ORDER BY u_s.date_ajout DESC LIMIT $limit";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function vote($id_user, $id_film, $note)		//Vote de 1 à 5 (maj de vote_count dans users_stats)
	{
		$sql = "UPDATE users_stats SET vote_count = :note WHERE id_user = :id_user AND id_film = :id_film";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":note", $note);
		$sth->bindValue(":id_user", $id_user);
		$sth->bindValue(":id_film", $id_film);
		$sth->execute();
	}

	public function afficheVote($id_user, $id_film, $note) //Affiche la note donné par un utilisateur(id_user) à un film(id_film)
	{
		$sql = "SELECT vote_count FROM users_stats WHERE id_user = $id_user AND id_film = $id_film";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetch();
	}

	public function top5profil($id_user, $limit = 5)
	{
		$sql = "SELECT id_film_api, id_film, titre, img FROM users_stats as u_s LEFT JOIN " . $this->table . " as f ON u_s.id_film = f.id WHERE u_s.stat_view = 1 AND id_user = $id_user AND u_s.vote_count IS NOT NULL ORDER BY vote_count desc limit ". $limit;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function flop5profil($id_user, $limit = 5)
	{
		$sql = "SELECT id_film_api, id_film, titre, img FROM users_stats as u_s LEFT JOIN " . $this->table . " as f ON u_s.id_film = f.id WHERE u_s.stat_view = 1 AND id_user = $id_user AND u_s.vote_count IS NOT NULL ORDER BY vote_count asc limit ". $limit;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

}
