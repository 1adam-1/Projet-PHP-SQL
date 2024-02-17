<?php
include('conn.php');
include('movies.php');
include('series.php');
include('favmovie.php');

$cnx=new Connection();
$cnx->selectDatabase("datauser");

if ( isset($_GET["idu"]) && isset($_GET["idm"])) {
    $idu = $_GET["idu"];
    $idm = $_GET["idm"];

    $tableName = "favmovies"; 
    $conn = $cnx->conn; 
    Favmovie::updatefav($tableName, $conn, $idu, $idm);

    header("Location: page.php?iduser=$idu#movies");
    exit();
}
?>
