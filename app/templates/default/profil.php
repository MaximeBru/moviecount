<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Profil</h2>
	<?= var_dump($user) ?>

<?php $this->stop('main_content') ?>