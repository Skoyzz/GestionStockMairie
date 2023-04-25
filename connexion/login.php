<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../user/css_user/style_header.css" rel="stylesheet">
    <link href="../user/css_user/style_login.css" rel="stylesheet">

    <title>Connexion</title>
</head>
<body>

<!--- HEADER --->
<div class="header_logo">
    <a href = "../index.php"><img class="container-logo" src="../img/logo.png"></a>
</div>
<!--- FIN DU HEADER --->

<!-- DEBUT DU BODY -->
<!-- Formulaire de connexion -->
<body>
<div class="connexion">
    <form action="requete_connexion.php" method="post">
        <h2>Connexion au compte</h2>
        <input type="text" class="inputstyle" id="login" name="identifiant" placeholder="Identifiant" required><br><br>
        <input type="password" class="inputstyle" id="password" name="mdp"  placeholder="Mot de passe" required><br><br>
        <input type="submit" value="Connnectez vous">
    </form>
    <!-- fin du formulaire de connexion -->
</div>
<!-- FIN DU BODY -->
</body>
</html>