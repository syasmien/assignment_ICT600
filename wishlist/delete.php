<?php
session_start();
include("../config/db.php");

// check login
if(!isset($_SESSION['userId'])) {
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

// delete item
$conn->query("DELETE FROM wishlist WHERE wishlistId='$id'");

header("Location: dashboard.php");
exit();
?>