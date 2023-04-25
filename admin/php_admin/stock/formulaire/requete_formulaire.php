<?php
// connexion à la base de données
include '../../../../connexion/dbconnexion.php';

$appareil = $_POST['appareil'];
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$nserie = $_POST['nserie'];
$processeur = $_POST['processeur'];
$ram = $_POST['ram'];
$disque_dur = $_POST['disque_dur'];
$site = $_POST['site'];
$ncommande = $_POST['ncommande'];
$fonctionnel = $_POST['fonctionnel'];
$commentaire = $_POST['commentaire'];
$date_achat = $_POST['date_achat'];
$date_installation = $_POST['date_installation'];

$requete = "INSERT INTO materiel(type_appareil, marque, modele, nserie, processeur, ram, disque_dur, site, ncommande, fonctionnel, commentaire, date_achat, date_installation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";

$resultat = $conn->prepare($requete);
$resultat->execute(array($appareil, $marque, $modele, $nserie, $processeur, $disque_dur, $ram, $site, $ncommande, $fonctionnel, $commentaire, $date_achat, $date_installation));

$resultat->closeCursor();

header("location: ../gestion_stock-admin.php");

?>