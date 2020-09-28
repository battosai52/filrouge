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
    $dateResa = htmlspecialchars($_POST['date']);
    if (!empty($_POST['nom']) and !empty($_POST['prénom']) and !empty($_POST['email']) and !empty($_POST['mdp']) and !empty($_POST['date'])) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $conn->prepare("SELECT * FROM utilisateur WHERE nom = ? AND prénom = ? AND email = ? AND mdp = ?");
            $reqmail->execute(array($nom, $prénom, $email, $mdp));
            $mailexist = $reqmail->rowCount();
            if ($mailexist !== 0) {
                $user = $reqmail->fetch();
                $insertmbr = $conn->prepare("INSERT INTO réservation(date, id_user) VALUES(?,?)");
                $insertmbr->execute(array($dateResa, $user['id']));
                header("Location: index.php");
                exit;
            }
        } else {
            $erreur = "Votre adresse mail n'est pas valide !";
            echo $erreur;
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
        echo $erreur;
    }
}
