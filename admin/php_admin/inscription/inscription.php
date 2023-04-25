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
    <title>Inscription</title>
</head>
<link rel="stylesheet" href="../../css_admin/style_header.css">
<link rel="stylesheet" href="../../css_admin/style_inscription.css">


<!--- HEADER --->
<header>
<div class="header_logo">
    <a href = "../accueil_admin.php"><img class="container-logo" src="../../../img/logo.png">
</div>
<div class="header_menu">
    <a href="../inscription/inscription.php">Inscription</a>
    <a href="liste_inscrit.php">Liste des inscriptions</a>
    <a href="../stock/gestion_stock-admin.php">Liste des stocks</a>
    <a href="../stock/formulaire/formulaire_admin_stock.php">Formulaire des stocks</a>
    <a href="../../../connexion/deconnexion.php" class="container-menu" onclick="alert('Vous venez de vous déconnecter')" <button>Se déconnecter</button></a><br>

</div>
</header>
<!--- FIN DU HEADER --->

<!-- Formulaire d'inscription -->
<body>
<div class="inscription">
    <form method="post" action="requete_inscription.php" enctype="multipart/form-data">
        <h2>Inscription</h2>
        <input type="text" id="login" name="identifiant" placeholder="Identifiant" required><br><br>
        <input type="password" id="password" name="mdp" placeholder="Mot de passe" required><br><br>
        <input type="text" id="niveau" name="grade" placeholder="Grade : Stagiaire ou Admin" required><br><br>
        <input type="submit"  name="valider" value="Vous inscrire">
    </form>
</div>
<!-- Fin formulaire d'inscription -->

</body>
</html>