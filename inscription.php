<!doctype html>
<html lang="fr">
  <head>
    
    <meta charset="utf-8">
       
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="./style.css">
<h1>Inscrivez-vous !</h1>
        <h2>Entrez les données demandées :</h2>
        <form name="inscription" method="post" action="form.php">
            <label for = "nom">Entrez votre nom : </label><input type="text" name="nom"/> <br/>
            <label for = "email">Entrez votre email : </label><input type="text" name="email" /><br/>
            <label for = "mdp">Entrez votre mot de passe : </label><input type="text" name="mdp"/><br/>
            <label for = "confmdp">Entrez a nouveau votre mot de passe : </label><input type="text" name="confmdp"/><br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
        <?php
        if(isset($erreur)) {
           echo '<font color="red">'.$erreur."</font>";
        }
        ?>
    </body>
</html>