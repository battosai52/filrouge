
    <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servername;dbname=filrouge", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        
      ?>

<?php
	 $servername = 'localhost';
     $username = 'root';
     $password = '';
     
     //On essaie de se connecter
     try{
         $conn = new PDO("mysql:host=$servername;dbname=filrouge", $username, $password);
         //On définit le mode d'erreur de PDO sur Exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         echo 'Connexion réussie';
     }
     
     /*On capture les exceptions si une exception est lancée et on affiche
      *les informations relatives à celle-ci*/
     catch(PDOException $e){
       echo "Erreur : " . $e->getMessage();
     }

	if(isset($_POST['valider'])) {
	   $nom = htmlspecialchars($_POST['nom']);
	   $email = htmlspecialchars($_POST['email']);
	   $mdp = sha1($_POST['mdp']);
	   $confmdp = sha1($_POST['confmdp']);
	   if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['confmdp'])) {
	      
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
                if($mdp == $confmdp) {
                    $insertmbr = $conn->prepare("INSERT INTO utilisateur(nom, email, mdp) VALUES(?, ?, ?)");
                    $insertmbr->execute(array($nom, $email, $mdp));
                    $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                } else {
                    $erreur = "Vos mots de passes ne correspondent pas !";
                }
            } else {
                $erreur = "Adresse mail déjà utilisée !";
            }
        } else {
            $erreur = "Votre adresse mail n'est pas valide !";
        }
        

	   } else {
	      $erreur = "Tous les champs doivent être complétés !";
	   }
	}
	?>