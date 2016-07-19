<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<section id="newFilm">
	<h2>Top 5</h2>
	<?php foreach ($top5 as $film): ?>
		<article>
			<img class="" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>"  alt="">
			<h3><?= $film['titre'] ?></h3>
			<a href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
		</article>
	<?php endforeach ?>
</section>

<div id="SorAct">
	<!-- section avec video -->
	<section id="lastRealease">
		<h2>Derniere sorties</h2>
		<h3>Batman Vs Superman - Dawn Of Justice <span>2016</span></h3>

		<div class="video-container">
			<iframe src="//www.youtube.com/embed/1iK44Bjajh4?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>

		<article id="SidVid">
			<h4>Realisateur</h4>
			<p>Zack Znyder</p>

			<h4>Acteurs</h4>
			<p>-Henry Cavil</p>
			<p>-Gal Gadot</p>
			<p>-Ben Afleck</p>

			<h4>Synopsis</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>

				<a href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
			</article>
		</section>

		<!-- 2eme section de la div -->
		<section id="activity">
			<h2>Activitées de la communauté</h2>
			<ul>
				<li><p>Hadji <span>a suivi .......</span> Yanis</p></li>
				<li><p>Marcus <span>a vu .......</span> 1200 films</p></li>
				<li><p>Maxime <span>a suivi ......</span>Yanis</p></li>
				<li><p>Jeremi <span>a suivi ......</span>Simon</p></li>
				<li><p>Yanis <span>a vus .......</span>150 films</p></li>
				<li><p>Simon <span>a vus .......</span>300 films</p></li>
			</ul>
		</section>

	</div>


	<!-- section top 5 ajout a la liste vu -->
	<section id="newFilm2">
		<h2>top5 ajout a la liste vu</h2>
	</section>

	<div id="TopDisc">
		<!-- section le top de la communauté -->
		<section id="TopCom">
			<h2>le top de la communanuté</h2>
			<ul>
				<li><p>hadji <span>a vus .......</span>5300 films</p></li>
				<li><p>marcus <span>a vu .......</span>1200 films</p></li>
				<li><p>maxime <span>a vus.......</span>500 films</p></li>
				<li><p>jeremi <span>a vus  .......</span>400 films</p></li>
				<li><p>yanis <span>a vus .......</span>150 films</p></li>
				<li><p>yanis <span>a vus .......</span>150 films</p></li>
				<li><p>maxime <span>a vus.......</span>500 films</p></li>
				<li><p>jeremi <span>a vus  .......</span>400 films</p></li>
			</ul>
		</section>

		<!-- section decouvrir -->
		<section id="Disco">
			<h2>decouvrir</h2>
		</section>
	</div>


	<?php $this->stop('main_content') ?>
