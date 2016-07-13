<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MovieCount</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<header>

		<nav>
			<div id="logo">
				<li><a href="<?= $this->url('home') ?>" ><h1><img id="logoNav" src="<?= $this->assetUrl('img/logo.svg') ?>"></h1></a></li>
			</div>
			<div id="coIns">
				<ul>
					<li><a href="<?= $this->url('connexion') ?>">connexion</a></li>
					<li><a href="<?= $this->url('inscription') ?>">inscription</a></li>
				</ul>
			</div>
			<div id="searchNav">
				<form action="<?= $this->url('recherche') ?>">
					<input id="search" type="search" required>
					<label for="search">
						<i class="fa fa-search" aria-hidden="true"></i>
					</form>
				</div>
			</nav>
		</header>

		<main >
			<!--affiche des nouveautés-->
			<?= $this->section('main_content') ?>

		</main>

		<footer>
			<p>petit footer</p>
		</footer>






		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>
	</body>
	</html>