<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<section id="profilUser">
				<!-- ========= IMG / NOM / BTN ========= -->
				<article id="User">
					<img id="imgDeProfil" src="<?= $this->assetUrl('img/imagedeprofil.jpg') ?>">
					<p>Maxime Bru</p>
					<a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
				</article>
				<!-- ========= LISTE MOVIE 1 ========= -->
				<article>
				<div class="listMovie">
					<p class="titleProf">Votre liste de film s'eleve a :</p>
					<p class="number">3412</p>
				</div>
				<div class="movActu">
					<ul>
						<li><p><span>Vous avez ajouter : </span> Batman begins</p></li>
						<li><p><span>Vous avez ajouter : </span> Batman begins</p></li>
						<li><p><span>Vous avez ajouter : </span> Batman begins</p></li>
					</ul>
				</div>
				</article>
				<!-- ========= LISTE MOVIE 2 ========= -->
				<article>
					<div class="listMovie">
						<p class="titleProf">Votre liste d'envie :</p>
						<p class="number">3412</p>
					</div>
					<div class="movActu">
						<ul>
							<li><p><span>vous avez ajouter : </span> Batman begins</p></li>
							<li><p><span>vous avez ajouter : </span> Batman begins</p></li>
							<li><p><span>vous avez ajouter : </span> Batman begins</p></li>
						</ul>
					</div>
				</article>
				<!-- ========= ABONNEMENT ========= -->
				<article>
					<div id="follow">
						<div class="separate">
							<p class="titleProf">Abonnées :</p>
							<p class="littleNumber">500</p>
						</div>
						<div class="separate">
							<p class="titleProf">Suivi :</p>
							<p class="littleNumber">500</p>
						</div>
					</div>
					<div class="movActu">
						<ul>
							<li><p>Hadji <span>suit desomais </span> Yanis</p></li>
							<li><p>Hadji <span>suit desomais </span> Yanis</p></li>
							<li><p>Hadji <span>suit desomais </span> Yanis</p></li>
						</ul>
					</div>
				</article>
			</section>
			
			<!-- ========= TOP FLOP PROFIL ========= -->
			<section id="newFilm2">
				<h2>top5/flop5</h2>
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