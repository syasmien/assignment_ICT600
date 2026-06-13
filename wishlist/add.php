<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['userId'])) {
    header("Location: ../auth/login.php");
    exit();
}

$userId = $_SESSION['userId'];

//code inside this block will run only when user submit the form
if(isset($_POST['add'])) {

    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $product_link = $_POST['product_link'];

    // auto default status
    $status = "Not Purchased";

    $imageName = "";

    // upload image 
    //If user upload image → system will process it
    //If no image → it will stay empty
    //img renamed using timestamp
    if($_FILES['image']['name'] != ""){

        $imageName = time() . "_" . $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/" . $imageName
        );
    }

    $sql = "INSERT INTO wishlist 
    (userId, item_name, price, category, product_link, status, image)
    VALUES 
    ('$userId', '$item_name', '$price', '$category', '$product_link', '$status', '$imageName')";

    $conn->query($sql);

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>

    <link rel="stylesheet" href="../assets/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<div class="navbar">
    <h2>Add Item ➕</h2>

    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="add.php" class="active">Add Item</a>
        <a href="purchased.php">Purchased</a>
        <a href="../auth/logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<div class="form-container">

<form method="POST" enctype="multipart/form-data">

    <h1>Add Wishlist Item 💖</h1>

    <label>Item Name</label>
    <input type="text" name="item_name" required>

    <label>Price</label>
    <input type="number" name="price" step="0.01" min="0" required>

    <label>Category</label>
    <select name="category">
        <option>Electronics</option>
        <option>Beauty</option>
        <option>Fashion</option>
        <option>Home</option>
        <option>Others</option>
    </select>

    <label>Product Link</label>
    <input type="text" name="product_link">

    <label>Item Image</label>
    <input type="file" name="image" accept="image/*">

    <div class="form-buttons">

        <button type="submit" name="add">
            Add Item
        </button>

        <button type="button"
                onclick="window.location.href='dashboard.php'">

            Cancel

        </button>

    </div>

</form>

</div>

</body>
</html>