<?php
$dbname = "gestion_stock_st_martin";
$dbuser = "gestion_stock_st_martin";
$dbhost = "localhost";
$dbpassword = "gestion_stock_st_martin";
try{
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",
        $dbuser ,$dbpassword);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}
?>