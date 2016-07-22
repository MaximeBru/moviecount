<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<section id="connexion">
	<h2>connexion</h2>
		<form method="POST">
			<input type="email" name="myform[email]" class="form-control" placeholder="Email" autofocus>
			<input type="password" name="myform[password]" class="form-control" placeholder="Mot de passe">
			<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="connexion">Se connecter</button>
		</form>
	</section>
<?php $this->stop('main_content') ?>