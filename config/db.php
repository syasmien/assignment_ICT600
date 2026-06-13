<?php
$conn = new mysqli("localhost", "root", "", "shopping_wishlist");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>