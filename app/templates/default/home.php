<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<section id="newFilm">
	<h2>Top 5</h2>
</section>
<!-- section avec video -->
<section id="lastRealease">
	<h2>Derniere sorties</h2>
	<h3>batman vs super man dawn of justice</h3>

	<article  id="filmVideo">
		<div class="video-container">
			<iframe width="" height="" src="//www.youtube.com/embed/1iK44Bjajh4?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>

	</article>

	<article  >
		<h4>realisateur</h4>
		<p>zack znyder</p>
	</article>

	<article  >
		<h4>acteurs</h4>
		<p>henry cavil</p>
		<p>Gal Gadot</p>
		<p>Ben Afleck</p>
	</article>

	<article>
		<h4>synopsis</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
		</article>

		<article>
			<a href="#" class="waves-effect waves-light btn">vus</a>
			<a href="#" class="waves-effect waves-light btn">a voir</a>
		</article>
	</section>
	<section>
		<h2>dernieres activitées de la communauté</h2>
		<ul>
			<li><p>hadji a suivi .......yanis</p></li>
			<li><p>marcus a vu .......1200 films</p></li>
			<li><p>maxime a vus.......500 films</p></li>
			<li><p>jeremi a vus  .......400 films</p></li>
			<li><p>yanis a vus .......150 films</p></li>
			<li><p>mame.......3 films</p></li>
		</ul>
	</section>


	<!-- section top 5 ajout a la liste vu -->
	<section id="newFilm2">
		<h2>top5 ajout a la liste vu</h2>

	</section>
	<!-- section le top de la communauté -->
	<section>
		<h2>le top de la communanuté</h2>
		<ul>
			<li><p>hadji a vus .......5300 films</p></li>
			<li><p>marcus a vu .......1200 films</p></li>
			<li><p>maxime a vus.......500 films</p></li>
			<li><p>jeremi a vus  .......400 films</p></li>
			<li><p>yanis a vus .......150 films</p></li>
			<li><p>mame.......3 films</p></li>
		</ul>
	</section>
	<!-- section decouvrir -->
	
	<section id="newFilm">
		<h2>decouvrir</h2>

	</section>
	<?php //var_dump($cinq_films) ?>
	<?php //var_dump($results) ?>
	<?php 
	//foreach($results as $film):
		//var_dump($film);
	?>
	<!-- <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['poster_path'] ?>" alt=""> -->
	<?php //endforeach ?>
	<?php $this->stop('main_content') ?>
