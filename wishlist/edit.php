<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['userId'])) {
    header("Location: ../auth/login.php");
    exit();
}

/* 🌸 detect previous page */
$from = isset($_GET['from']) ? $_GET['from'] : "dashboard";

if($from == "purchased"){
    $backPage = "purchased.php";
} else {
    $backPage = "dashboard.php";
}

//get item from db, auto filled with existing data
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM wishlist WHERE wishlistId='$id'");
$row = $result->fetch_assoc();

//runs when update button is clicked
if(isset($_POST['update'])) {

    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $product_link = $_POST['product_link'];
    $status = $_POST['status'];

    // keep old image
    $imageName = $row['image'];

    // upload new image
    if(!empty($_FILES['image']['name'])) {

        $imageName = time() . "_" . $_FILES['image']['name'];

        $target = "../uploads/" . $imageName;

        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $sql = "UPDATE wishlist SET
        item_name='$item_name',
        price='$price',
        category='$category',
        product_link='$product_link',
        status='$status',
        image='$imageName'
        WHERE wishlistId='$id'";

    $conn->query($sql);

    header("Location: " . $backPage);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Item</title>

    <link rel="stylesheet" href="../assets/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="navbar">

    <h2>Edit Wishlist ✏️</h2>

    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="add.php">Add Item</a>
        <a href="purchased.php">Purchased</a>
        <a href="../auth/logout.php" class="logout-btn">Logout</a>
    </div>

</div>

<div class="form-container">

    <form method="POST" enctype="multipart/form-data">

        <h1>Edit Item 💖</h1>

        <label>Item Name</label>

        <input type="text"
               name="item_name"
               value="<?= $row['item_name'] ?>"
               required>

        <label>Price</label>

        <input type="number"
               name="price"
               value="<?= $row['price'] ?>"
               step="0.01"
               min="0"
               required>

        <label>Category</label>

        <select name="category">

            <option <?= $row['category']=="Electronics"?"selected":"" ?>>
                Electronics
            </option>

            <option <?= $row['category']=="Beauty"?"selected":"" ?>>
                Beauty
            </option>

            <option <?= $row['category']=="Fashion"?"selected":"" ?>>
                Fashion
            </option>

            <option <?= $row['category']=="Home"?"selected":"" ?>>
                Home
            </option>

            <option <?= $row['category']=="Others"?"selected":"" ?>>
                Others
            </option>

        </select>

        <label>Product Link</label>

        <input type="text"
               name="product_link"
               value="<?= $row['product_link'] ?>">

        <label>Status</label>

        <select name="status">

            <option <?= $row['status']=="Not Purchased"?"selected":"" ?>>
                Not Purchased
            </option>

            <option <?= $row['status']=="Purchased"?"selected":"" ?>>
                Purchased
            </option>

        </select>

        <!-- 🌸 CURRENT IMAGE -->
        <label>Current Image</label>

        <?php if($row['image'] != "") { ?>

            <img src="../uploads/<?= $row['image'] ?>"
                 width="120"
                 style="border-radius:10px; margin-bottom:10px;">

        <?php } else { ?>

            <p>No image</p>

        <?php } ?>

        <label>Change Image (optional)</label>

        <input type="file"
               name="image"
               accept="image/*">

        <!-- 🌸 BUTTONS -->
        <div class="form-buttons">

            <button type="submit" name="update">
                Update Item
            </button>

            <button type="button"
                    onclick="window.location.href='<?= $backPage ?>'">

                Cancel

            </button>

        </div>

    </form>

</div>

</body>
</html>