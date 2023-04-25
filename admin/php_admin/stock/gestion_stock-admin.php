<?php
global $resultat;
session_start();
if($_SESSION['connecte'] !="oui")
{
    header("Location:../../../../connexion/login.php"); //Cette ligne sert à faire la redirection si tu es pas connecté à un compte
}
?>

<?php
$user = "gestion_stock_st_martin";
$pass = "gestion_stock_st_martin";
$pdo = 'mysql:dbname=gestion_stock_st_martin;host=localhost';
$bdd = new PDO($pdo, $user, $pass);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion Stock Admin</title>
    <link href="../../css_admin/style_header.css" rel="stylesheet">
    <link href="../../css_admin/style_stock.css" rel="stylesheet">

</head>

<!--- DEBUT DU HEADER --->
<header>
    <div class="header_logo">
        <a href = "../accueil_admin.php"><img class="container-logo" src="../../../img/logo.png">
    </div>
    <div class="header_menu">
        <a href="../inscription/inscription.php">Inscription</a>
        <a href="../inscription/liste_inscrit.php">Liste des inscriptions</a>
        <a href="../stock/gestion_stock-admin.php">Liste des stocks</a>
        <a href="../stock/formulaire/formulaire_admin_stock.php">Formulaire des stocks</a>
        <a href="../../../connexion/deconnexion.php" class="container-menu" onclick="alert('Vous venez de vous déconnecter')" <button>Se déconnecter</button></a><br>    </div>

    </div>
</header>
<!--- FIN DU HEADER --->

<!-- DEBUT DU BODY-->
    <table border="2">
        <tbody>
        <tr>
            <td>Type appareil</td>
            <td>Marque</td>
            <td>Modèle</td>
            <td>Numéro de série</td>
            <td>Processeur</td>
            <td>Ram</td>
            <td>Disque dur</td>
            <td>Site</td>

            <?php

            $user = "gestion_stock_st_martin";
            $pass = "gestion_stock_st_martin";
            $pdo = 'mysql:dbname=gestion_stock_st_martin;host=localhost;charset=utf8';
            $bdd = new PDO($pdo, $user, $pass);

            $requete1 = 'SELECT materiel.id, materiel.modele, materiel.nserie, materiel.ncommande, materiel.fonctionnel, materiel.commentaire, materiel.date_achat, materiel.date_installation, type_appareil.appareil, marque.marque, processeur.processeur, ram.ram, disque_dur.disque_dur, site.site
            FROM materiel
            INNER JOIN type_appareil ON materiel.type_appareil = type_appareil.id
            INNER JOIN marque ON materiel.marque = marque.id
            INNER JOIN processeur ON materiel.processeur = processeur.id
            INNER JOIN ram ON materiel.ram = ram.id

            INNER JOIN disque_dur ON materiel.disque_dur = disque_dur.id
            INNER JOIN site ON materiel.site = site.id
            ORDER BY appareil ASC;';

            $resultat = $bdd->prepare($requete1);
            $resultat->execute();

            $nbreResult = $resultat->rowCount();
            $colcount = $resultat->columnCount();

            if (!$resultat) {
            echo "Problème de requete";
            }
            ?>

            <td>Numéro de commande </td>
            <td>Fonctionnel</td>
            <td>Commentaire</td>
            <td>Date d'achat</td>
            <td>Date d'installation</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>

        <?php
        while($ligne = $resultat->fetch()) {
            "<tr>";
            echo "<td>" . $ligne['appareil'] . "</td>";
            echo "<td>" . $ligne['marque'] . "</td>";
            echo "<td>" . $ligne['modele'] . "</td>";
            echo "<td>" . $ligne['nserie'] . "</td>";
            echo "<td>" . $ligne['processeur'] . "</td>";
            echo "<td>" . $ligne['ram'] . "</td>";
            echo "<td>" . $ligne['disque_dur'] . "</td>";
            echo "<td>" . $ligne['site'] . "</td>";
            echo "<td>" . $ligne['ncommande'] . "</td>";
            echo "<td>";
            if ($ligne['fonctionnel'] == 1) {
                echo "Oui";
            } else {
                echo "Non";
            }
            echo "</td>";
            echo "<td>" . $ligne['commentaire'] . "</td>";
            echo "<td>" . $ligne['date_achat'] . "</td>";
            echo "<td>" . $ligne['date_installation'] . "</td>";

            echo "<td>" . "<a href='formulaire/modifier/modif_ligne_admin.php?id=" . $ligne['id'] . "'><button>Modifier</button></a>" . "</td>";
                echo "<tr+>" . "<td>" . "<a href='formulaire/supprimer/supprimer.php?id=" . $ligne['id'] . "'><button>Supprimer</button></a>" . "</td>" . "</tr>";

        }
        ?>
        </tr>
        </tbody>
    </table>
    </ul>
</div>
</body>
<!-- FIN DU BODY -->
</html>