<?php
session_start();
if($_SESSION['connecte'] !="oui")
{
    header("Location:../../../../connexion/login.php"); //Cette ligne sert à faire la redirection si tu es pas connecté à un compte
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire Stock</title>
    <link href="../../../css_user/style_header.css" rel="stylesheet">

</head>
<!--- DEBUT DU HEADER --->
<header>
    <div class="header_logo">
        <a href="../../accueil_user.php"><img class="container-logo" src="../../../../img/logo.png">
    </div>
    <div class="header_menu">
        <a href="../gestion_stock.php">Liste des stocks</a>
        <a href="../../formulaire_user_stock.php">Formulaire des stocks</a>
        <a href="../../../../connexion/deconnexion.php" class="container-menu" onclick="alert('Vous venez de vous déconnecter')" <button>Se déconnecter</button></a><br>    </div>
</header>
<!--- FIN DU HEADER --->

<form action="" method="post">
    <label for="nom_marque">Type de l'appareil :</label>
    <input type="text" name="appareil" id="appareil">
    <input type="submit" name="ajouter_appareil" value="Ajouter un appareil">
</form>
<!--- FIN DU HEADER --->
<body>

<form action="" method="post">
    <label for="nom_ram">Ram :</label>
    <input type="text" name="nom_ram" id="nom_ram">
    <input type="submit" name="ajouter_ram" value="Ajouter Ram">
</form>
<?php
$user = "gestion_stock_st_martin";
$pass = "gestion_stock_st_martin";
$pdo = 'mysql:dbname=gestion_stock_st_martin;host=localhost;charset=utf8';
$bdd = new PDO($pdo, $user, $pass);

if (isset($_POST['ajouter_ram'])) {
    $ram = $_POST['nom_processeur'];
    $requete = "INSERT INTO ram (ram) VALUES ('$ram')";
    $resultat = $bdd->prepare($requete);
    $resultat->execute();
    header("Location:../../formulaire_user_stock.php");
}
?>

</body>
</html>