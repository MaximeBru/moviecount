<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<section id="DetailsFilm">
		<!-- ======== AFFICHE FilM ======== -->
		<article>
		<img src="<?= $this->assetUrl('img/affiche_batman.jpg') ?>">
		</article>

		<!-- ======== BLOC DETAILS ======== -->
		<article>
		<!--  tITRE / DATE  -->
		<h3>Batman Vs Superman - Dawn Of Justice <span>2016</span></h3>

			<!-- SYNOPSIS  -->
			<h4>Synopsis</h4>
			<p>Craignant que Superman n'abuse de sa toute-puissance, le Chevalier noir décide de l'affronter : le monde a-t-il davantage besoin d'un super-héros aux pouvoirs sans limite ou d'un justicier à la force redoutable mais d'origine humaine ? Pendant ce temps-là, une terrible menace se profile à l'horizon…</p>

			<!-- REAL  -->
			<h4>Realisateur</h4>
			<p>Zack Znyder</p>

			<!-- GENRE  -->
			<h4>Genres</h4>
			<p>Action / Aventure / Fantastique</p>

			<!-- CASTING  -->
			<div id="cast">
				<h4>Acteurs</h4>
				<p>- Henry Cavil</p>
				<p>- Gal Gadot</p>
				<p>- Ben Afleck</p>
				<p>- Amy Adams</p>
				<p>- Jesse Eisenberg</p>
				<p>- Diane Lane</p>
				<p>- Laurence Fishburne</p>
				<p>- Jeremy Irons</p>
				<p>- Holly Hunter</p>
			</div>

			<!-- BTN  -->
			<div id="btn">
				<a href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
			</div>
		</article>

	</section>
	<section id="newFilm">
		<h2>Film Associés</h2>
		<?php foreach ($top5 as $film): ?>
		<article>
			<a href="#">
				<img class="" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>"  alt="">
				<h3><?= $film['titre'] ?></h3>
			</a>
			<div id="btn">
				<a href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
			</div>
		</article>
		<?php endforeach ?>
	</section>

<?php $this->stop('main_content') ?>