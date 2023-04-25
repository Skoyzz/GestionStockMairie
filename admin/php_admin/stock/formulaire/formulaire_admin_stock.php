<?php
session_start();
if($_SESSION['connecte'] !="oui")
{
    header("Location:../../../../../../connexion/login.php"); //Cette ligne sert à faire la redirection si tu es pas connecté à un compte
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire Stock</title>
    <link href="../../../css_admin/style_header.css" rel="stylesheet">
    <link href="style_formulaire_admin.css" rel="stylesheet">

</head>
<!--- DEBUT DU HEADER --->
<header>
    <div class="header_logo">
        <a href="../../accueil_admin.php"><img class="container-logo" src="../../../../img/logo.png">
    </div>
    <div class="header_menu">
        <a href="../../inscription/inscription.php">Inscription</a>
        <a href="../../inscription/liste_inscrit.php">Liste des inscriptions</a>
        <a href="../../stock/gestion_stock-admin.php">Liste des stocks</a>
        <a href="../../stock/formulaire/formulaire_admin_stock.php">Formulaire des stocks</a>
        <a href="../../../../connexion/deconnexion.php" class="container-menu" onclick="alert('Vous venez de vous déconnecter')" <button>Se déconnecter</button></a><br>    </div>
    </div>
</header>
<!--- FIN DU HEADER --->
<form action="requete_formulaire.php" method="post">

<!-- Formulaire -->
<?php
// connexion bdd
$user = "gestion_stock_st_martin";
$pass = "gestion_stock_st_martin";
$pdo = 'mysql:dbname=gestion_stock_st_martin;host=localhost;charset=utf8';
$bdd = new PDO($pdo, $user, $pass);

// recuperation données triées en ordre alphabétique
$requete1 = 'SELECT * FROM type_appareil ORDER BY appareil ASC';

// preparation (avec le execute) est comme un query mais beaucoup plus sécurisé
$resultat = $bdd->prepare($requete1);
$resultat->execute();

if (!$resultat) {
    echo "Problème de requete ville";
} else {
    ?>

<!-- Affichage des appareil liste déroulante -->
    Type d'appareil :
    <select name="appareil">
        <?php
        while($ligne = $resultat->fetch()) {
            echo "<option value='".$ligne['id']."'>" .$ligne['appareil']."</option>";

        }
        ?>
    </select>
    <?php
}
$resultat->closeCursor();
?>

<a href="ajouter/add_appareil.php">Ajouter un type d'appareil</a>

<!------------------------------------->

      <?php
    $requete2 = 'SELECT * FROM marque ORDER BY marque ASC';

    // preparation (avec le execute) est comme un query mais beaucoup plus sécurisé
    $resultat = $bdd->prepare($requete2);
    $resultat->execute();

    if (!$resultat) {
        echo "Problème de requete marque";
    } else {
        ?>

        <!-- Affichage des marques liste déroulante -->
        <br><br>Marque :
        <select name="marque">
            <?php
            while($ligne = $resultat->fetch()) {
                echo "<option value='".$ligne['id']."'>".$ligne['marque']."</option>";
            }
            ?>
        </select>
        <?php
    }
    $resultat->closeCursor();
    ?>

<a href="ajouter/add_marque.php">Ajouter une marque</a>

<!------------------------------------->
<br><br><input type="text" id="modele" name="modele" placeholder="Modèle de l'appareil" required>

<br><br><input type="text" id="nserie" name="nserie" placeholder="Numéro de serie" required>
<!------------------------------------->

<?php
$requete4 = 'SELECT * FROM site ORDER BY site ASC';

// preparation (avec le execute) est comme un query mais beaucoup plus sécurisé
$resultat = $bdd->prepare($requete4);
$resultat->execute();

if (!$resultat) {
echo "Problème de requete site";
}
else {
?>

<!-- Affichage des marques liste déroulante -->
<br><br>Site :
<select name="site">
<?php
while($ligne = $resultat->fetch()) {
echo "<option value='".$ligne['id']."'>".$ligne['site']."</option>";
}
?>
</select>
<?php
}
$resultat->closeCursor();
?>

<a href="ajouter/add_site.php">Ajouter un emplacement</a>

<!------------------------------------->

<?php
$requete5 = 'SELECT * FROM processeur ORDER BY processeur ASC';

// preparation (avec le execute) est comme un query mais beaucoup plus sécurisé
$resultat = $bdd->prepare($requete5);
$resultat->execute();

if (!$resultat) {
    echo "Problème de requete site";
} else {
    ?>


<!-- Affichage des marques liste déroulante -->
    <br><br>Processeur  :
    <select name="processeur">
        <?php
        while($ligne = $resultat->fetch()) {
            echo "<option value='".$ligne['id']."'>".$ligne['processeur']."</option>";
        }
        ?>
    </select>
    <?php
}
$resultat->closeCursor();
?>

<a href="ajouter/add_processeur.php">Ajouter un processeur</a>
<!------------------------------------->

    <?php
    $requete6 = 'SELECT * FROM ram ORDER BY ram DESC';

    // preparation (avec le execute) est comme un query mais beaucoup plus sécurisé
    $resultat = $bdd->prepare($requete6);
    $resultat->execute();

    if (!$resultat) {
        echo "Problème de requete site";
    } else {
        ?>


        <!-- Affichage des marques liste déroulante -->
        <br><br>Ram  :
        <select name="ram">
            <?php
            while($ligne = $resultat->fetch()) {
                echo "<option value='".$ligne['id']."'>".$ligne['ram']."</option>";
            }
            ?>
        </select>
        <?php
    }
    $resultat->closeCursor();
    ?>

    <a href="ajouter/add_ram.php">Ajouter ram</a>
    <!------------------------------------->
<?php
$requete7 = 'SELECT * FROM disque_dur';


// preparation (avec le execute) est comme un query mais beaucoup plus sécurisé
$resultat = $bdd->prepare($requete7);
$resultat->execute();

if (!$resultat) {
    echo "Problème de requete site";
}
else {
?>

<!-- Affichage des marques liste déroulante -->
<br><br>Disque dur  :
<select name="disque_dur">
<?php
    while($ligne = $resultat->fetch()) {
        echo "<option value='".$ligne['id']."'>".$ligne['disque_dur']."</option>";
            }
?>
</select>
<?php
   }
$resultat->closeCursor();
?>

<a href="ajouter/add_disque_dur.php">Ajouter un disque dur</a>

<!------------------------------------->
<br><br><input type="text" id="ncommande" name="ncommande" placeholder="Numéro de commande" required>
<!------------------------------------->

<br><br>Fonctionnel :
<select name="fonctionnel">
    <option value='1'>Oui</option>
    <option value='0'>Non</option>
    <?php
    $fonctionnel = $_POST['fonctionnel'];
    if ($fonctionnel == 1){
        echo"oui";
    }
    else{
        echo"non";
}
?>
</select>

<!------------------------------------->
<br><br><input type="text" id="commentaire" name="commentaire" placeholder="Commentaire facultatif" size="60">
<!------------------------------------->
<br><br> Date d'achat : <input type="date" id="date_achat" name="date_achat" required>
<!------------------------------------->
<br><br> Date d'installation : <input type="date" id="date_installation" name="date_installation" required>
<!------------------------------------->

<!--------------------------------->
<br><br><input type="submit"  name="valider" value="Envoyer votre formulaire">
</form>
</html>