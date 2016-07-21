<?php $this->layout('layout_admin', ['title' => 'Bienvenue Patron !']) ?>

<?php $this->start('main_content') ?>
	<section role="section" class="col-md-12">
		<h2>Liste des utilisateurs</h2>
		<table border="1" style="text-align:center;" class="table">
				<th>id</th>
				<th>nom</th>
				<th>prenom</th>
				<th>email</th>
				<th>password</th>
				<th>supression</th>
			<?php foreach ($liste_des_users as $wusers): ?>

				<tr>
					<td><?= $this->e($wusers['id']); ?></td>
					<td><?= $this->e($wusers['nom']); ?></td>
					<td><?= $this->e($wusers['prenom']); ?></td>
					<td><?= $this->e($wusers['email']); ?></td>
					<td><?= $this->e($wusers['password']); ?></td>
					<td><a href="<?= $this->url('supprimer', [ 'id' => $wusers['id'] ]); ?>" onClick="return(confirm('En etes vous certain ?'))">Supprimer</a></td>
				</tr>
			<?php endforeach; ?>
			<!-- tr>
				<td colspan="5"><a href="<?= $this->url('creer'); ?>">Creer un utilisateur</a></td>
			</tr> -->
		</table>
		<a href="<?= $this->url('creer'); ?>">Creer un utilisateur</a>
	</section>
<?php $this->stop('main_content') ?>
