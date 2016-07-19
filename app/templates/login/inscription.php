<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
	<h2>Inscription</h2>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	  <style>
	    .myform-container.myform {
	      max-width: 600px;
	      padding: 40px 40px;
	    }

	    .btn {
	      font-weight: 700;
	      height: 36px;
	      -moz-user-select: none;
	      -webkit-user-select: none;
	      user-select: none;
	      cursor: default;
	    }

	    .myform {
	      background-color: #F7F7F7;
	      padding: 20px 25px 30px;
	      margin: 0 auto 25px;
	      margin-top: 50px;
	      -moz-border-radius: 2px;
	      -webkit-border-radius: 2px;
	      border-radius: 2px;
	      -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	      -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	    }
	  </style>

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
	          <button type="submit" name="inscrire" class="btn btn-default">S'inscrire</button>
	        </div>
	      </div>
	    </form>
	  </div>
	  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<?php $this->stop('main_content') ?>