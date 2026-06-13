<?php
session_start();
include("../config/db.php");

$error = "";

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();

    if($user) {

        if(password_verify($password, $user['password'])) {

            $_SESSION['userId'] = $user['userId'];
            $_SESSION['username'] = $user['username'];

            header("Location: ../wishlist/dashboard.php");
            exit();

        } else {
            $error = "Wrong password!";
        }

    } else {
        $error = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <link rel="stylesheet" href="../assets/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="auth-container">

    <div class="auth-box">

        <h1>Welcome Back 💖</h1>

        <p class="subtitle">
            Login to continue your wishlist journey ✨
        </p>

        <?php if($error != "") { ?>

            <div class="error-message">
                <?= $error ?>
            </div>

        <?php } ?>

        <form method="POST">

            <label>Email</label>

            <input type="email"
                   name="email"
                   placeholder="Enter your email"
                   required>

            <label>Password</label>

            
            <div class="password-box">

                <input type="password"
                    name="password"
                    id="loginPassword"
                    placeholder="Enter your password"
                    required>

                <span class="toggle-password" onclick="togglePassword('loginPassword')">
                    👁️
                </span>

            </div>

            <button type="submit" name="login">
                Login
            </button>

        </form>

        <p class="bottom-text">
            Don't have an account?

            <a href="register.php">
                Register Here
            </a>
        </p>

    </div>

</div>
<script>
function togglePassword(id){

    let input = document.getElementById(id);

    if(input.type === "password"){
        input.type = "text";
    } else {
        input.type = "password";
    }
}
</script>
</body>
</html>