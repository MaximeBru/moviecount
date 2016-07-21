<?php $this->layout('layout_admin', ['title' => 'Modifier un utilisateur']) ?>

<?php $this->start('main_content') ?>
	<section role="section">
		<form method="POST">

			<p><label for="nom">nom :</label>
			<input type="text" id="nom" name="myform[nom]" value="<?= $this->e($edition_wusers['nom']); ?>" /></p>
			
			<p><label for="prenom">prenom :</label>
			<textarea id="prenom" name="myform[prenom]"><?= $this->e($edition_wusers['prenom']); ?></textarea></p>

			<p><input type="submit" name="modifier" value="Modifier"></p>

		</form>
		
	</section>
<?php $this->stop('main_content') ?>