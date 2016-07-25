<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>
	
	<section id="resultat">
		<h2>Votre Recherche :</h2>
		<?php if(!empty($search)) { ?>
			<?php foreach ($search as $film): ?>
				<article>
					<a href="<?= $this->url('detail', ['id' => $film['id']]) ?>">
						<img class="" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $film['img'] ?>"  alt="">
						<h3><?= mb_strimwidth($film['titre'], 0, 23, "...") ?></h3>
					</a>
					<?php if(isset($_SESSION['user'])) { ?>
						<div class="btn">
							<a href="<?= $this->url('dejavu', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id']])?>" title="j'ai déjà vu !"><i class="fa fa-eye" aria-hidden="true"></i></a>
							<a href="<?= $this->url('jveuxvoir', ['id_user' => $_SESSION['user']['id'], 'id_film' => $film['id']])?>" title="j'veux voir !"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
						</div>
					<?php } else { ?>
						<div class="btn">
							<a><i class="fa fa-eye" aria-hidden="true"></i></a>
							<a><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
						</div>
					<?php } ?>
				</article>
			<?php endforeach ?>
		<?php } else { ?>
			<p>Il n'y a aucun resultat pour votre recherche...</p>
		<?php } ?>
	</section>

<?php $this->stop('main_content') ?>