<?php


if($_SERVER['REQUEST_METHOD']=='GET'){
    $id=$_GET['id'];

 include("conn.php");
$cnx=new Connection();
$cnx->selectDatabase('datauser');
include("movies.php");
Movie::deleteMovie('movies',$cnx->conn,$id);
header("location:readmovie.php");

}
?>
