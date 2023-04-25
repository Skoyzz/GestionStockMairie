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
    <link href="../../../../css_admin/style_header.css" rel="stylesheet">
    <link href="../style_formulaire_admin.css" rel="stylesheet">

</head>
<!--- DEBUT DU HEADER --->
<header>
    <div class="header_logo">
        <a href="../../../accueil_admin.php"><img class="container-logo" src="../../../../../img/logo.png">
    </div>
    <div class="header_menu">
        <a href="../../../inscription/inscription.php">Inscription</a>
        <a href="../../../inscription/liste_inscrit.php">Liste des inscriptions</a>
        <a href="../../../stock/gestion_stock-admin.php">Liste des stocks</a>
        <a href="../../../stock/formulaire/formulaire_admin_stock.php">Formulaire des stocks</a>
        <a href="../../../../../connexion/deconnexion.php" class="container-menu" onclick="alert('Vous venez de vous déconnecter')" <button>Se déconnecter</button></a><br>    </div>    </div>
</header>
<!--- FIN DU HEADER --->

<form action="" method="post">
    <label for="nom_disque_dur">Disque dur :</label>
    <input type="text" name="disque_dur" id="disque_dur">
    <input type="submit" name="ajouter_disque_dur" value="Ajouter un disque dur">
</form>
<?php
$user = "gestion_stock_st_martin";
$pass = "gestion_stock_st_martin";
$pdo = 'mysql:dbname=gestion_stock_st_martin;host=localhost;charset=utf8';
$bdd = new PDO($pdo, $user, $pass);

if (isset($_POST['ajouter_disque_dur'])) {
    $disque_dur = $_POST['disque_dur'];
    $requete = "INSERT INTO disque_dur (disque_dur) VALUES ('$disque_dur')";
    $resultat = $bdd->prepare($requete);
    $resultat->execute();
    header("Location:../formulaire_admin_stock.php");
}
?>

</body>
</html>