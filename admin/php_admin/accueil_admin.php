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
    <title>Accueil Administrateur</title>
    <link href="../css_admin/style_header.css" rel="stylesheet">
</head>
<!--- DEBUT DU HEADER --->
<header>
    <div class="header_logo">
        <a href = "accueil_admin.php"><img class="container-logo" src="../../img/logo.png">
    </div>
    <div class="header_menu">
        <a href="inscription/inscription.php">Inscription</a>
        <a href="inscription/liste_inscrit.php">Liste des inscriptions</a>
        <a href="stock/gestion_stock-admin.php">Liste des stocks</a>
        <a href="stock/formulaire/formulaire_admin_stock.php">Formulaire des stocks</a>
        <a href="../../connexion/deconnexion.php" class="container-menu" onclick="alert('Vous venez de vous déconnecter')" <button>Se déconnecter</button></a><br>

    </div>
</header>
<!--- FIN DU HEADER --->

<!-- DEBUT DU BODY --->
<body>


</body>
<!-- FIN DU BODY -->
</html>