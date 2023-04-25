<?php
include 'dbconnexion.php';

$req = $conn->prepare ("SELECT * FROM user WHERE compte_identifiant = ?");

$req->execute(array($_POST['identifiant']));
$result = $req ->fetchAll();
$mdp=$result [0]["compte_password"];
if (password_verify($_POST['mdp'], $mdp)) {
    echo "Connexion réussie";
    session_start();
    $_SESSION['connecte'] = true;

    if ($result[0]['compte_grade'] == 'Admin') {
        header("location: ../admin/php_admin/accueil_admin.php");
    } else {
        header("location: ../user/php_user/accueil_user.php");
    }
}
else
{
    header("location: login.php");
}
?>