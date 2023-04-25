<?php
include '../../../connexion/dbconnexion.php';
if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes'){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM user WHERE id=?";
        $sth = $conn->prepare($sql);
        $sth->execute(array($id));
        header("location: liste_inscrit.php");
    } else {
        echo "L'ID n'a pas été trouvé";
    }
}
?>