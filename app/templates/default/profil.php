<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


	<section id="profilUser">
				<!-- ========= IMG / NOM / BTN ========= -->
				<article id="User">
					<img id="imgDeProfil" src="<?= $this->assetUrl('img/imagedeprofil.jpg') ?>">
					<!-- <p>Maxime Bru</p> -->
					<p><?= $user['prenom']. ' ' . $user['nom'] ?></p>
					<a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
				</article>
				<!-- ========= LISTE MOVIE 1 ========= -->
				<article>
					<div class="listMovie">
						<p class="titleProf">Votre liste de films s'élève à :</p>
						<p class="number"><?= $dejaVu['total']?></p>
					</div>
					<div class="movActu">
						<?php foreach ($listeDejaVu as $film): ?>
							<ul>
								<li><p><span>Vous avez ajouté :  </span><a href="<?= $this->url('detail', ['id' => $film['id']]) ?>"><?= mb_strimwidth($film['titre'], 0, 12, "...") ?></a></p></li>
							</ul>
						<?php endforeach ?>
					</div>
				</article>
				<!-- ========= LISTE MOVIE 2 ========= -->
				<article>
					<div class="listMovie">
						<p class="titleProf">Votre liste d'envie :</p>
						<p class="number"><?= $veuxVoir['total']?></p>
					</div>
					<div class="movActu">
						<?php foreach ($listeVeuxVoir as $film): ?>
							<ul>
								<li><p><span>Vous avez ajouté :  </span><a href="<?= $this->url('detail', ['id' => $film['id']]) ?>"><?= mb_strimwidth($film['titre'], 0, 12, "...") ?></a></p></li>
							</ul>
						<?php endforeach ?>
							
					</div>
				</article>
				<!-- ========= ABONNEMENT ========= -->
				<article>
					<div id="follow">
						<div class="separate">
							<p class="titleProf">Abonnées :</p>
							<p class="littleNumber">0</p>
						</div>
						<div class="separate">
							<p class="titleProf">Suivi :</p>
							<p class="littleNumber">0</p>
						</div>
					</div>
					<div class="movActu">
						<ul>
							<li><p><?= $user['username'] ?> <span>suit desomais </span></p></li>
							<li><p><?= $user['username'] ?> <span>suit desomais </span></p></li>
							<li><p><?= $user['username'] ?> <span>suit desomais </span></p></li>
						</ul>
					</div>
				</article>
			</section>
			
			<!-- ========= TOP PROFIL ========= -->
			<section id="newFilm2">
				<h2>top5</h2>
				<?php foreach ($top5profil as $film): ?>
					<article>
						<a href="<?= $this->url('detail', ['id' => $film['id_film']]) ?>">
							<img class="" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>"  alt="">
							<h3><?= mb_strimwidth($film['titre'], 0, 23, "...") ?></h3>
						</a>
						<?php if(isset($_SESSION['user'])) { ?>
							<div class="btn">
								<a href="<?= $this->url('dejavu', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id_film']])?>" title="j'ai déjà vu !"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="<?= $this->url('jveuxvoir', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id_film']])?>" title="j'veux voir !"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
							</div>
						<?php } else { ?>
							<div class="btn">
								<a><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
							</div>
						<?php } ?>

					</article>
				<?php endforeach ?>
			</section>
			
			<!-- ========= TOP REAL / ACT / GENRE ========= -->
			<div id="TopAwa">
				<section id="TopReaActGen">
				<h2>Top realisateur, Acteur, Actrice</h2>
					<!-- REAL -->
					<article>
						<img src="<?= $this->assetUrl('img/nolan.jpg') ?>">
						<h3>Christopher Nolan</h3>
					</article>
					<!-- ACT -->
					<article>
						<img src="<?= $this->assetUrl('img/bale.jpg') ?>">
						<h3>Christian Bale</h3>
					</article>
					<!-- GENRE -->
					<article>
						<img src="<?= $this->assetUrl('img/green.jpg') ?>">
						<h3>Eva Green</h3>
					</article>
				</section>
				<!-- ========= AWARDS ========= -->
				<section id="Awa">
					<h2>Awards</h2>
					<P>Fonction a venir !</P>
				</section>
			</div>
	

<?php $this->stop('main_content') ?>