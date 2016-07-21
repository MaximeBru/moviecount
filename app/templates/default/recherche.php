<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>
	<section id="resultat">
		<h2>Votre Recherche :</h2>
		<?php var_dump($search) ?>
		<!-- <p>Il n'y a aucun resultat pour votre recherche...</p>/ -->
	</section>

<?php $this->stop('main_content') ?>