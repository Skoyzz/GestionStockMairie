<?php
session_start();
if($_SESSION['connecte'] !="oui")
{
    header("Location:../../connexion/login.php"); //Cette ligne sert à faire la redirection si tu es pas connecté à un compte
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification</title>
</head>
<link rel="stylesheet" href="../../../../css_admin/style_header.css">
<link rel="stylesheet" href="../../../../css_admin/style_inscription.css">


<!--- HEADER --->
<header>
    <div class="header_logo">
        <a href = "../../../accueil_admin.php"><img class="container-logo" src="../../../../../img/logo.png">
    </div>
    <div class="header_menu">
        <a href="../../gestion_stock-admin.php" class="container-menu">Gestion des stocks</a>
        <a href="../formulaire_admin_stock.php">Formulaire des stocks</a>
        <a href="../../../../../connexion/deconnexion.php" class="container-menu" onclick="alert('Vous venez de vous déconnecter')" <button>Se déconnecter</button></a><br>

    </div>
</header>
<!--- FIN DU HEADER --->
<!-- debut DU BODY-->
<body>

    <form method="post" action="requete_modifier.php" enctype="multipart/form-data">

<?php
// connexion à la base de données
$user = "gestion_stock_st_martin";
$pass = "gestion_stock_st_martin";
$pdo = 'mysql:dbname=gestion_stock_st_martin;host=localhost;charset=utf8';
$bdd = new PDO($pdo, $user, $pass);

    // récupération de l'ID à partir de l'URL ou d'un autre moyen
    $id = $_GET['id'];

// préparation de la requête pour récupérer les informations du matériel
$requete = "SELECT * FROM materiel WHERE id = :id";
$stmt = $bdd->prepare($requete);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// récupération des informations du matériel
$materiel = $stmt->fetch();

// récupération des types d'appareils
$requete1 = 'SELECT * FROM type_appareil ORDER BY appareil ASC';
$resultat = $bdd->prepare($requete1);
$resultat->execute();

// affichage des types d'appareils liste déroulante
echo "Type d'appareil : <select name='appareil'>";
while($ligne = $resultat->fetch()) {
    echo "<option value='".$ligne['id']."'";
    if ($materiel['type_appareil'] == $ligne['id']) {
        echo " selected";
    }
    echo ">" .$ligne['appareil']."</option>";
}
echo "</select>";
$resultat->closeCursor();

// récupération des marques
$requete2 = 'SELECT * FROM marque ORDER BY marque ASC';
$resultat = $bdd->prepare($requete2);
$resultat->execute();

// affichage des marques liste déroulante
echo "<br><br>Marque : <select name='marque'>";
while($ligne = $resultat->fetch()) {
    echo "<option value='".$ligne['id']."'";
    if ($materiel['marque'] == $ligne['id']) {
        echo " selected";
    }
    echo ">".$ligne['marque']."</option>";
}
echo "</select>";
$resultat->closeCursor();

// affichage du modèle
echo "<br><br>Modèle de l'appareil : <input type='text' id='modele' name='modele' placeholder='Modèle de l'appareil' required value='".$materiel['modele']."'>";

// affichage du modèle
echo "<br><br>Numéro de serie : <input type='text' id='nserie' name='nserie' placeholder='Numéro de série' required value='".$materiel['nserie']."'>";


// récupération des processeurs
$requete3 = 'SELECT * FROM processeur ORDER BY processeur ASC';
$resultat = $bdd->prepare($requete3);
$resultat->execute();

// affichage des processeurs liste déroulante
echo "<br><br>Processeur : <select name='processeur'>";
    while($ligne = $resultat->fetch()) {
    echo "<option value='".$ligne['id']."'";
    if ($materiel['processeur'] == $ligne['id']) {
    echo " selected";
    }
    echo ">".$ligne['processeur']."</option>";
    }
    echo "</select>";
$resultat->closeCursor();


// récupération des disques durs
$requete4 = 'SELECT * FROM disque_dur ORDER BY disque_dur ASC';
$resultat = $bdd->prepare($requete4);
$resultat->execute();

// affichage des disques durs liste déroulante
echo "<br><br>Disque Dur : <select name='disque_dur'>";
while($ligne = $resultat->fetch()) {
    echo "<option value='".$ligne['id']."'";
    if ($materiel['disque_dur'] == $ligne['id']) {
        echo " selected";
    }
    echo ">".$ligne['disque_dur']."</option>";
}
echo "</select>";
$resultat->closeCursor();


// récupération site
$requete5 = 'SELECT * FROM site ORDER BY site ASC';
$resultat = $bdd->prepare($requete5);
$resultat->execute();

// affichage des disques durs liste déroulante
echo "<br><br>Site : <select name='site'>";
while($ligne = $resultat->fetch()) {
    echo "<option value='".$ligne['id']."'";
    if ($materiel['site'] == $ligne['id']) {
        echo " selected";
    }
    echo ">".$ligne['site']."</option>";
}
echo "</select>";
$resultat->closeCursor();

// affichage ncommande
echo "<br><br>Numéro de commande : <input type='text' id='ncommande' name='ncommande' placeholder='Modèle de l'appareil' required value='".$materiel['ncommande']."'>";


// affichage fonctionnel
echo "<br><br>Fonctionnel : <select name='fonctionnel'>
  <option value='1'";
    if ($materiel['fonctionnel'] == 1) { echo 'selected'; }
        echo ">Oui</option>
  <option value='0'";
    if ($materiel['fonctionnel'] == 0) { echo 'selected'; }
        echo ">Non</option>
</select>";

// affichage date achat
echo "<br><br> Commentaire: <input type='text' id='commentaire' name='commentaire' placeholder='commentaire' required value='".$materiel['commentaire']."'>";


// affichage date achat
echo "<br><br> Date d'achat : <input type='date' id='date_achat' name='date_achat' placeholder='Date d\'achat' required value='".$materiel['date_achat']."'>";

// affichage date installation
echo "<br><br> Date d'installation : <input type='date' id='date_installation' name='date_installation' placeholder='Date d\'installation' required value='".$materiel['date_installation']."'>";

?>
<br><br><input type="submit" value="Modifier">
<!-- fin DU BODY-->
</body>
</html>