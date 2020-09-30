<!doctype html>
<html lang="fr">

<head>

	<meta charset="utf-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" href="./style.css">
</head>

<body class="bg-danger">
	<div class="banniere row">
		<img src="./images/banniere.jpg" class="mx-auto images" alt="Responsive image">
	</div>
	<div id="navbar">
		<nav class="navbar navbar-expand-lg bg-primary">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a class=" h1 nav-link text-danger" href="index.php">Accueil </a>
					</li>
					<li class="nav-item">
						<a class="h1 nav-link text-danger" href="attractions.html">Attractions</a>
					</li>

					<li class="nav-item">
						<a class="h1 nav-link text-danger" href="reservation.php">Réservation</a>
					</li>
					<li class="nav-item">
						<a class="h1 nav-link text-danger" href="inscription.php">Inscription</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="container">
	<div id="container"><h1>réserver !</h1>
	<h2>Entrez les données demandées :</h2>
	<form name="reservation" method="post" action="processRéservation.php">
		<label for="nom">Entrez votre nom : </label><input type="text" name="nom" /> <br />
		<label for="prénom">Entrez votre prénom : </label><input type="text" name="prénom" /> <br />
		<label for="email">Entrez votre email : </label><input type="text" name="email" /><br />
		<label for="mdp">Entrez votre mot de passe : </label><input type="text" name="mdp" /><br />
		<label for="date">Entrez la date de réservation : </label><input type="text" name="date" /><br />
		<input type="submit" name="valider" value="OK" />
	</form>
</div>
</div>
	<?php
	if (isset($erreur)) {
		echo '<font color="red">' . $erreur . "</font>";
	}
	?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>