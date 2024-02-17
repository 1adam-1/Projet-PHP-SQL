<?php

$emailValue = "";
$lnameValue = "";
$fnameValue = "";
$passwordValue = "";
$errorMesage = "";
$successMesage = "";

if (isset($_POST["Login"])) {
    $emailValue = $_POST["email"];
    $lnameValue = $_POST["lastName"];  // Corrected the input name
    $fnameValue = $_POST["firstName"];
    $passwordValue = $_POST["password"];
    $usernameValue = $_POST['username'];

    if (empty($emailValue) || empty($fnameValue) || empty($lnameValue) || empty($passwordValue)) {
        $errorMesage = "All fields must be filled out!";
    } else if (strlen($passwordValue) < 8) {
        $errorMesage = "Password must contain at least 8 characters.";
    } else if (preg_match("/[A-Z]+/", $passwordValue) == 0) {
        $errorMesage = "Password must contain at least one capital letter!";
    } else {
        include('conn.php');

        $cnx = new Connection();
        $cnx->selectDatabase('datauser');

        include('user.php');

        $user = new User($fnameValue, $lnameValue, $emailValue, $passwordValue, $usernameValue);

        $user->insertUser('users', $cnx->conn);

        $successMesage = User::$successMsg;

        $errorMesage = User::$errorMsg;

        $emailValue = "";
        $lnameValue = "";
        $fnameValue = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign UP</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="csslogin.css">
</head>
<body>

<div class="wrapper">
    <div class="login_box">
        <div class="login-header">
            <span>Sign UP</span>
        </div>
        <?php
            if (!empty($errorMesage)) {
               echo "<p style='color: red'> $errorMesage</p>";
                        
            } elseif (!empty($successMesage)) {
                echo "<p style='color: green'>$successMesage</p>";
                        
            }
            ?>
        <form method="post">
            <div class="input_box">
                <input type="text" id="user" class="input-field" name="firstName">
                <label for="user" class="label">Firstname</label>
                <i class="bx bx-user icon"></i>
            </div>

            <div class="input_box">
                <input type="text" id="pass" class="input-field" name="lastName">
                <label for="pass" class="label">Lastname</label> <!-- Corrected the input name -->
                <i class="bx bx-user icon"></i>
            </div>

            <div class="input_box">
                <input type="text" id="pass" class="input-field" name="username">
                <label for="pass" class="label">Username</label>
                <i class="bx bx-user icon"></i>
            </div>

            <div class="input_box">
                <input type="text" id="pass" class="input-field" name="email">
                <label for="pass" class="label">Email</label>
                <i class="bx bx-user icon"></i>
            </div>

            <div class="input_box">
                <input type="password" id="pass1" class="input-field" name="password">
                <label for="pass" class="label">Password</label>
                <i class="bx bx-lock-alt icon"></i>
            </div>

            
            <label for="showPassword">Show Password</label>
            <input type="checkbox" id="showPassword" onchange="showPass()">
            

            <div class="input_box">
                <input type="submit" class="input-submit" value="Register" name="Login"> <!-- Added name attribute -->
            </div>

            <div class="register">
                <span>Already have an account? <a href="signin.php">Sign In</a></span>
            </div>
        </form>
    </div>
</div>

</body>


<script>
    function showPass() {
        var passwordInput = document.getElementById('pass1');

        if (passwordInput.type==='password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    }
</script>



</html>
