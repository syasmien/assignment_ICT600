<?php
session_start();
include("../config/db.php");


if(!isset($_SESSION['userId'])) {
    header("Location: ../auth/login.php");
    exit();
}

//get user info
$userId = $_SESSION['userId'];
$username = $_SESSION['username'];

//Get filter value (category)
$category = $_GET['category'] ?? '';

$sql = "SELECT * FROM wishlist 
        WHERE userId='$userId' 
        AND status='Not Purchased'";

//Add filter if category selected
if($category != ""){
    $sql .= " AND category='$category'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<div class="navbar">
    <h2>Personal Shopping Wishlist System 💖</h2>

    <div class="nav-links">
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="add.php">Add Item</a>
        <a href="purchased.php">Purchased</a>
        <a href="../auth/logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<div class="welcome-section">

    <h1>Welcome, <?= $username ?> 💖</h1>

    <p>Here's your wishlist items ✨</p>

</div>

<!-- 🌸 FILTER CATEGORY SECTION -->
<div style="margin-bottom:25px;">

    <form method="GET">
        <p style="margin-bottom:8px; font-size:14px; color:#888;">
                🔎 Filter your wishlist by category (to make it easier to find items)
        </p>
        <select name="category"
            onchange="this.form.submit()"
            style="padding:10px; border-radius:10px; border:1px solid #ddd; min-width:200px;">

            <option value="">📂 All Categories</option>

            <option value="Electronics" <?= ($category=="Electronics")?"selected":"" ?>>
                📱 Electronics
            </option>

            <option value="Beauty" <?= ($category=="Beauty")?"selected":"" ?>>
                💄 Beauty
            </option>

            <option value="Fashion" <?= ($category=="Fashion")?"selected":"" ?>>
                👗 Fashion
            </option>

            <option value="Home" <?= ($category=="Home")?"selected":"" ?>>
                🏠 Home
            </option>

            <option value="Others" <?= ($category=="Others")?"selected":"" ?>>
                📦 Others
            </option>

        </select>

    </form>

</div>

<div class="card-container">

<?php while($row = $result->fetch_assoc()) { ?>

<div class="card"

onclick="openModal(
'<?= $row['wishlistId'] ?>',
'<?= htmlspecialchars($row['item_name'], ENT_QUOTES) ?>',
'<?= $row['price'] ?>',
'<?= htmlspecialchars($row['category'], ENT_QUOTES) ?>',
'<?= $row['status'] ?>',
'<?= htmlspecialchars($row['product_link'], ENT_QUOTES) ?>',
'<?= $row['image'] ?>'
)">

    <!-- IMAGE -->
    <?php if($row['image'] != "") { ?>
        <img src="../uploads/<?= $row['image'] ?>" class="card-image">
    <?php } else { ?>
        <img src="../assets/no-image.png" class="card-image">
    <?php } ?>

    <h3><?= $row['item_name'] ?></h3>

    <p>RM <?= $row['price'] ?></p>

    <p><?= $row['category'] ?></p>

    <p class="status not">
        <?= $row['status'] ?>
    </p>

</div>

<?php } ?>

</div>

<!-- 🌸 MODAL -->
<div id="modal" class="modal">

    <div class="modal-content">

        <span class="close" onclick="closeModal()">×</span>

        <img id="mImage" class="wishlist-image">

        <h2 id="mName"></h2>

        <p id="mPrice"></p>

        <p id="mCategory"></p>

        <p id="mStatus"></p>

        <a id="mLink" target="_blank">View Product</a>

        <br><br>

        <a id="editBtn" class="btn edit">Edit</a>

        <a id="deleteBtn"
           class="btn delete"
           onclick="return confirm('Delete this item?')">
           Delete
        </a>

    </div>

</div>

<script>

function openModal(id, name, price, category, status, link, image){

    document.getElementById("modal").style.display = "block";

    document.getElementById("mName").innerText = name;
    document.getElementById("mPrice").innerText = "RM " + price;
    document.getElementById("mCategory").innerText = category;

    document.getElementById("mStatus").innerHTML =
        `<span class="status not">${status}</span>`;

    document.getElementById("mLink").href = link;

    if(image != ""){
        document.getElementById("mImage").src = "../uploads/" + image;
        document.getElementById("mImage").style.display = "block";
    } else {
        document.getElementById("mImage").style.display = "none";
    }

    document.getElementById("editBtn").href = "edit.php?id=" + id;
    document.getElementById("deleteBtn").href = "delete.php?id=" + id;
}

function closeModal(){
    document.getElementById("modal").style.display = "none";
}

</script>

</body>
</html>