<?php
include '../../../connexion/dbconnexion.php';

session_start();
$req = $conn->prepare ("INSERT INTO user(compte_identifiant, compte_password, compte_grade) 
                VALUES(?, ?, ?)");

$req->execute(array($_POST['identifiant'], password_hash($_POST['mdp'], PASSWORD_DEFAULT), $_POST['grade']));

$_SESSION['connecte'] = "oui";
header("location: liste_inscrit.php");
?>