<?php
include('conn.php');
include('movies.php');
include('series.php');
include('favseries.php');

$cnx=new Connection();
$cnx->selectDatabase("datauser");

if (isset($_GET["idu"]) && isset($_GET["ids"])) {
    $idu = $_GET["idu"];
    $ids = $_GET["ids"];

    $tableName = "favseries"; 
    $conn = $cnx->conn; 
    FavSeries::updatefav($tableName, $conn, $idu, $ids);

    header("Location: profilepage.php?iduser=$idu#series");
    exit();
}
?>
