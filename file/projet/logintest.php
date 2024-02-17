<?php
session_start();
include('conn.php');
include('user.php');
$cnx = new Connection();
$cnx->selectDatabase('datauser');


if(isset($_POST['Login'])){
    $passvalue = $_POST['password'];
    $emailvalue = $_POST['email'];
    $_SESSION["name"]=$_POST["name"];
    $row = User::UserCheck('users', $cnx->conn, $emailvalue);

    if ($row && password_verify($passvalue, $row['password'])) {
        header("Location: page.php?iduser={$row['id']}");
        exit();
    } else {
        echo "<p style='color: red;'>Invalid email or password</p>";
    }
}
?>
