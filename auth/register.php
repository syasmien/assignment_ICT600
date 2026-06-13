<?php
include("../config/db.php");

$error = "";

if(isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // check email duplicate
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($check->num_rows > 0){

        $error = "Email already exists!";

    } else {

        $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username', '$email', '$password')";

        $conn->query($sql);

        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Register</title>

    <link rel="stylesheet" href="../assets/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="auth-container">

    <div class="auth-box">

        <h1>Create Account 🌸</h1>

        <p class="subtitle">
            Start building your shopping wishlist ✨
        </p>

        <?php if($error != "") { ?>

            <div class="error-message">
                <?= $error ?>
            </div>

        <?php } ?>

        <form method="POST">

            <label>Username</label>

            <input type="text"
                   name="username"
                   placeholder="Enter your username"
                   required>

            <label>Email</label>

            <input type="email"
                   name="email"
                   placeholder="Enter your email"
                   required>

            <label>Password</label>

            <div class="password-box">

                <input type="password"
                    name="password"
                    id="registerPassword"
                    placeholder="Enter your password"
                    required>

                <span class="toggle-password" onclick="togglePassword('registerPassword')">
                    👁️
                </span>

            </div>

            <button type="submit" name="register">
                Register
            </button>

        </form>

        <p class="bottom-text">
            Already have an account?

            <a href="login.php">
                Login Here
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