<?php
include '../../../../../connexion/dbconnexion.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo "<script>
    if(confirm('Voulez-vous vraiment supprimer cet élément ?')){
        window.location.href = 'delete.php?confirm=yes&id=$id';
    }
    else{
        window.location.href = 'liste_inscrit.php';
    }
    </script>";
}