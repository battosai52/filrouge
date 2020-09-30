

<?php
$servername = 'localhost';
$username = 'root';
$password = '';

//On s'inscrit
try {
    $conn = new PDO("mysql:host=$servername;dbname=filrouge", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

/*On capture les exceptions si une exception est lancée et on affiche
      *les informations relatives à celle-ci*/ catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST['valider'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prénom = htmlspecialchars($_POST['prénom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['mdp']);
    $confmdp = sha1($_POST['confmdp']);
    if (!empty($_POST['nom']) and !empty($_POST['prénom']) and !empty($_POST['email']) and !empty($_POST['mdp']) and !empty($_POST['confmdp'])) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if ($mailexist == 0) {
                if ($mdp == $confmdp) {
                    $insertmbr = $conn->prepare("INSERT INTO utilisateur(nom, prénom, email, mdp) VALUES(?, ?, ?, ?)");
                    $insertmbr->execute(array($nom, $prénom, $email, $mdp));
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