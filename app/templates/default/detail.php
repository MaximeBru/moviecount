<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<section id="DetailsFilm">
		<!-- ======== AFFICHE FilM ======== -->
		<article>
			<?php //var_dump($film) ?>
			<img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>">
		</article>

		<!-- ======== BLOC DETAILS ======== -->
		<article>
			<!--  tITRE / DATE  -->
			<h3><?= $film['titre'] ?><span><?= strftime('%Y', strtotime($release_date)) ?></span></h3>

			<!-- SYNOPSIS  -->
			<h4>Synopsis</h4>
			<p><?= $film['synopsis'] ?></p>

			<!-- REAL  -->
			<h4>Realisateur(s)</h4>
			<?php foreach ($crew as $value): ?>
				<?php if ($value->job == 'Director') { ?>
					<p><?= $value->name ?></p>
				<?php } ?>
			<?php endforeach ?>

			<!-- GENRE  -->
			<h4>Genres</h4>
			<p>
				<?php foreach ($genre as $value): 
					echo $value->name . " / ";
				endforeach ?>
			</p>

			<!-- CASTING  -->
			<div id="cast">
				<h4>Acteurs</h4>
				<?php $cpt=0 ?>
				<?php foreach ($cast as $value): ?>
					<p>- <?= $value->name ?></p>
					<?php $cpt++; if($cpt==10) break; ?>
				<?php endforeach ?>
				
			</div>

			<!-- BTN  -->
			<?php if(isset($_SESSION['user'])) { ?>
				<div id="btn">
					<a href="<?= $this->url('jveuxvoir', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id']])?>" title="j'veux voir !"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
					<a href="<?= $this->url('dejavu', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id']])?>" title="j'ai déjà vu""><i class="fa fa-eye" aria-hidden="true"></i></a>
				</div>
			<?php } else { ?>
				<div id="btn">
					<a><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
					<a><i class="fa fa-eye" aria-hidden="true"></i></a>
				</div>
			<?php } ?>
			<?php if(isset($_SESSION['user'])) { ?>
				<div class="rating">
		 			<a href="<?= $this->url('vote', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id'], 'note' => 5])?>" title="Donner 5 étoiles" ><i class="fa fa-star" aria-hidden="true"></i></a>
					<a href="<?= $this->url('vote', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id'], 'note' => 4])?>" title="Donner 4 étoiles" ><i class="fa fa-star" aria-hidden="true"></i></a>
		  			<a href="<?= $this->url('vote', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id'], 'note' => 3])?>" title="Donner 3 étoiles" ><i class="fa fa-star" aria-hidden="true"></i></a>
		  			<a href="<?= $this->url('vote', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id'], 'note' => 2])?>" title="Donner 2 étoiles" ><i class="fa fa-star" aria-hidden="true"></i></a>
		  			<a href="<?= $this->url('vote', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id'], 'note' => 1])?>" title="Donner 1 étoile" ><i class="fa fa-star" aria-hidden="true"></i></a>
				</div>
			<?php } ?>

		</article>

	</section>
	<section id="newFilm">
		<h2>Film Associés</h2>
		<?php foreach ($films_assoc as $film): ?>
			<article>
				<a href="<?= $this->url('detail', ['id' => $film['id']]) ?>">
					<img class="" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>"  alt="">
					<h3><?= mb_strimwidth($film['titre'], 0, 23, "...") ?></h3>
				</a>
				<?php if(isset($_SESSION['user'])) { ?>
					<div id="btn">
						<a href="<?= $this->url('dejavu', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id']])?>" title="j'ai déjà vu !""><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a href="<?= $this->url('jveuxvoir', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id']])?>" title="j'veux voir !"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
					</div>
				<?php } else { ?>
					<div id="btn">
						<a><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
					</div>
				<?php } ?>
			</article>
		<?php endforeach ?>

	</section>

<?php $this->stop('main_content') ?>