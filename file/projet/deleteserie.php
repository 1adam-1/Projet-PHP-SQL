<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    include("conn.php");
    $cnx = new Connection();
    $cnx->selectDatabase('datauser');
    include("series.php");  
    
    Serie::deleteSerie('series', $cnx->conn, $id);  
    header("location:readserie.php"); 
}
?>
