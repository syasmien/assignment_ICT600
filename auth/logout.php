<?php
session_start();

if(isset($_GET['confirm'])) {

    session_destroy();

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Logout</title>

    <link rel="stylesheet" href="../assets/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="auth-container">

    <div class="auth-box">

        <h2>Logout Confirmation 🚪</h2>

        <p class="subtitle">
            Are you sure you want to logout?
        </p>

        <div class="modal-buttons">

            <a href="?confirm=true" class="btn delete">
                Yes, Logout
            </a>

            <a href="../wishlist/dashboard.php" class="btn edit">
                Cancel
            </a>

        </div>

    </div>

</div>

</body>
</html>