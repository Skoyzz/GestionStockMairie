<?php
include '../../../../../connexion/dbconnexion.php';
if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes'){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM materiel WHERE id=?";
        $sth = $conn->prepare($sql);
        $sth->execute(array($id));
        header("location: ../../gestion_stock-admin.php");
    } else {
        echo "L'ID n'a pas été trouvé";
    }
}
?>