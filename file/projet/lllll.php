<?php
include('conn.php');

$cnx = new Connection();
$cnx->selectDatabase('datauser');

$query = "
CREATE TABLE favmovies (
  idu INT,
  idm VARCHAR(20)
)
";

$cnx->createTable($query);
?>
