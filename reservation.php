<!doctype html>
<html lang="fr">
  <head>
    
    <meta charset="utf-8">
       
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="./style.css">
<div class="banniere"><img src="./images/banniere.jpg"class="img-fluid" alt="Responsive image"></div>
  </head>
  <body>
 <div id="navbar">   
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class=" h1 nav-link text-danger"  href="index.php">Accueil </a>
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
<h1>réserver !</h1>
        <h2>Entrez les données demandées :</h2>
        <form name="reservation" method="post" action="processRéservation.php">
            <label for = "nom">Entrez votre nom : </label><input type="text" name="nom"/> <br/>
            <label for = "prénom">Entrez votre prénom : </label><input type="text" name="prénom"/> <br/>
            <label for = "email">Entrez votre email : </label><input type="text" name="email" /><br/>
            <label for = "mdp">Entrez votre mot de passe : </label><input type="text" name="mdp"/><br/>
            <label for = "date">Entrez la date de réservation : </label><input type="text" name="date"/><br/>
                        <input type="submit" name="valider" value="OK"/>
        </form>
        <?php
        if(isset($erreur)) {
           echo '<font color="red">'.$erreur."</font>";
        }
        ?>
    </body>
</html>