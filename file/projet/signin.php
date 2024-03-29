<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign IN</title>
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
            <span>Sign IN</span>
        </div>
        
        <form action="logintest.php" method="post">

        <div class="input_box">
                <input type="text" id="name" class="input-field" name="name" required>
                <label for="pass" class="label">Name</label>
                <i class="bx bx-user icon"></i>
            </div>

            <div class="input_box">
                <input type="email" id="email" class="input-field" name="email" required>
                <label for="pass" class="label">Email</label>
                <i class="bx bx-user icon"></i>
            </div>

            <div class="input_box">
                <input type="password" id="pass1" class="input-field" name="password" required>
                <label for="pass" class="label">Password</label>
                <i class="bx bx-lock-alt icon"></i>
            </div>

            
            <label for="showPassword">Show Password</label>
            <input type="checkbox" id="showPassword" onchange="showPass()">
            

            <div class="input_box">
                <input type="submit" class="input-submit" value="Login" name="Login"> <!-- Added name attribute -->
            </div>

            <div class="register">
                <span>Don't have an account? <a href="signup.php">Sign UP</a></span>
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
