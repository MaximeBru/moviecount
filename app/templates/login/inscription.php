<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
	<section id="inscription">

		<h2>Inscription</h2>
		<form method="POST">
		    <input type="text" class="form-control" name="myform[nom]" placeholder="Nom" autofocus>
			<input type="text" class="form-control" name="myform[prenom]" placeholder="Prénom">
			<input type="email" name="myform[email]" class="form-control" placeholder="Email">
			<input type="pseudo" name="myform[username]" class="form-control" placeholder="Pseudo">
			<input type="password" name="myform[password]" class="form-control" placeholder="Mot de passe">
			<button type="submit" name="inscrire">S'inscrire</button>
		</form>
	</section>
<?php $this->stop('main_content') ?>