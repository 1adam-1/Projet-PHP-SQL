<?php


if($_SERVER['REQUEST_METHOD']=='GET'){
    $id=$_GET['id'];

 include("conn.php");
$cnx=new Connection();
$cnx->selectDatabase('datauser');
include("user.php");
User::deleteUser('users',$cnx->conn,$id);
header("location:readusers.php");

}
?>
