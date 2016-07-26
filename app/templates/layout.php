<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MovieCount</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<!-- <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css"  media="screen,projection"/> -->
	<link href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<header>
		<nav>
			<div id="logo">
				<li><a href="<?= $this->url('home') ?>"><h1><img id="logoNav" src="<?= $this->assetUrl('img/logo.svg') ?>"></h1></a></li>
			</div>
			<div id="coIns">
				<ul>
					<?php
					
					if (!isset($_SESSION['user'])){ 
						echo '<li><a href="'. $this->url('connexion').'">connexion</a></li>';
						echo '<li><a href="' . $this->url('inscription'). '">inscription</a></li>';
					} else {

						echo '<li><a href="'. $this->url('profil',['id'=>$_SESSION['user']['id']]).'">profil</a></li>';
						echo '<li><a href="' . $this->url('deconnexion'). '">deconnexion</a></li>';
						/*echo '<li><a href="' . $this->url('home'). '">home</a></li>';*/
					}

					?>
					
				</ul>
			</div>
			<div id="searchNav">
				<form method="POST" action="<?= $this->url('recherche') ?>">
					<input id="search" type="search" name="recherche" required>
					<label for="search">
						<i class="fa fa-search" aria-hidden="true"></i>
					</form>
				</div>
			</nav>
		</header>

		<main >

			<!-- Message de connexion -->
			<!-- <div id="messageCo">
				<section id="messagedeco">
					<h2>Attention !</h2>
					<p>Vous devez vous inscrire ou vous connecter à Moviecount pour profiter de cette fonctionnalité.</p>
				</section>
			</div> -->

			<div id="myModal" class="modal">
				<!-- Modal content -->
				<div class="modal-content">
					<section id="">
						<div class="modal-header">
							<span class="close">×</span>
							<h2>Attention !</h2>
						</div>
						<div class="modal-body">
							<p>Vous devez vous <a href="<?= $this->url('inscription')?>"> inscrire</a> ou vous <a href="<?= $this->url('connexion')?>">connecter</a> à Moviecount pour profiter de cette fonctionnalité.</p>
						</div>
					</section>
				</div>
			</div>

		<!-- <div id="messageAdd" style="display: none;background:green;color:white;">
			Ajout OK
		</div> -->

		<!--affiche des nouveautés-->
		<?= $this->section('main_content') ?>
	</main>

	<footer>
		<p>MovieCount ©</p>
	</footer>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

	<!-- Message De Connexion -->
	<?php if(!isset($_SESSION['user'])) { ?>
		<script>
			// $('.btn').on('click', function() {
			// 	$('#messageCo').slideUp( 300 ).show().delay( 3000 )/*.fadeOut( 500 )*/;
			// })
		</script>

		<script>
			$('.btn, .rating').on('click', function() {
				$('.modal').show();
			});
			$('.close').on('click', function() {
				$('.modal').hide();
			});

			// $(document).on('click', function() {
			// 	$('.modal').hide();
			// })
		</script>

		<?php } ?>
		<?= $this->section('javascripts') ?>

	</body>
	</html>