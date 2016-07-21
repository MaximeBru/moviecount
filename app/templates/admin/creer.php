<?php $this->layout('layout_admin', ['title' => 'Créer un nouvel utilisateur']) ?>

<?php $this->start('main_content') ?>
		  
	<section role="section">

		<form method="POST">

			<!-- <p><label for="titre">Titre :</label>
			<input type="text" id="titre" name="myform[titre]"/></p>
			
			<p><label for="corps">Corps :</label>
			<textarea id="corps" name="myform[corps]"></textarea></p>

			<p><input type="submit" name="creer" value="Créer"></p> -->
	

	  <div class="myform myform-container">
	    <form class="form-horizontal" method="POST">

	      <div class="form-group">
	        <div class="col-sm-12">
	          <input type="text" class="form-control" name="myform[nom]" placeholder="Nom" autofocus>
	        </div>
	      </div>

	      <div class="form-group">
	        <div class="col-sm-12">
	          <input type="text" class="form-control" name="myform[prenom]" placeholder="Prénom">
	        </div>
	      </div>

	      <div class="form-group">
	        <div class="col-sm-12">
	          <input type="email" name="myform[email]" class="form-control" placeholder="Email">
	        </div>
	      </div>


	      <div class="form-group">
	        <div class="col-sm-12">
	          <input type="pseudo" name="myform[username]" class="form-control" placeholder="Pseudo">
	        </div>
	      </div>

	      <div class="form-group">
	        <div class="col-sm-12">
	          <input type="password" name="myform[password]" class="form-control" placeholder="Mot de passe">
	        </div>
	      </div>

	      <div class="form-group">
	        <div class="col-sm-12">
	          <button type="submit" name="inscrire" class="btn btn-default">ajout utilisateur</button>
	        </div>
	      </div>
	    </form>
	  </div>
		</form>
		
	</section>
<?php $this->stop('main_content') ?>