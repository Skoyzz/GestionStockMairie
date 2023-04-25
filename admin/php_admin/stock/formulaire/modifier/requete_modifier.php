<?php
// connexion à la base de données
$user = "gestion_stock_st_martin";
$pass = "gestion_stock_st_martin";
$pdo = 'mysql:dbname=gestion_stock_st_martin;host=localhost;charset=utf8';
$bdd = new PDO($pdo, $user, $pass);

// Récupération des données du formulaire
$appareil = $_POST['appareil'];
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$nserie = $_POST['nserie'];
$processeur = $_POST['processeur'];
$disque_dur = $_POST['disque_dur'];
$site = $_POST['site'];
$ncommande = $_POST['ncommande'];
$fonctionnel = $_POST['fonctionnel'];
$commentaire = $_POST['commentaire'];
$date_achat = $_POST['date_achat'];
$date_installation = $_POST['date_installation'];

// Préparation de la requête UPDATE
$requete = "UPDATE materiel SET type_appareil = :appareil, marque = :marque, modele = :modele, processeur = :processeur, disque_dur = :disque_dur, site = :site, ncommande = :ncommande, fonctionnel = :fonctionnel, commentaire = :commentaire, date_achat = :date_achat, date_installation = :date_installation WHERE nserie = :nserie";

// Exécution de la requête avec des variables nommées
$resultat = $bdd->prepare($requete);
$resultat->execute(array(
    ':appareil' => $appareil,
    ':marque' => $marque,
    ':modele' => $modele,
    ':nserie' => $nserie,
    ':processeur' => $processeur,
    ':disque_dur' => $disque_dur,
    ':site' => $site,
    ':ncommande' => $ncommande,
    ':fonctionnel' => $fonctionnel,
    ':commentaire' => $commentaire,
    ':date_achat' => $date_achat,
    ':date_installation' => $date_installation
));
    

// Redirection vers la page gestion_stock-admin.php
header("location: ../../gestion_stock-admin.php");

// Fermeture du curseur
$resultat->closeCursor();

?>
