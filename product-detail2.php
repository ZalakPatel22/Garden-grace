<?php
include('db.php'); // Include your database connection file

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $shop_id = $_GET['id'];

    // Fetch product details from the database
    $sql1 = "SELECT * FROM shop WHERE id = ?";
    $stmt1 = $conn->prepare($sql1); // Use $sql1 instead of $sql
    if ($stmt1 === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error)); // Handle preparation error
    }

    $stmt1->bind_param("i", $shop_id); // Bind 'id' parameter
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    // Check if the product exists
    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Shop Details</title>
            <!-- Include necessary CSS and JS -->
        </head>
        <body>
            <div class="container">
        <form action="changeaddress.php">
                <center style="color:#008000;"><b>Your product has been saved sucessfully in cart.<a href="cart.php"></b>Go to Cart page</a></center>
                <h1>Product Details</h1>
                <h1><?= htmlspecialchars($row['name']); ?></h1>
                <img src="../productimage/<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['name']); ?>" style="width:300px; height:300px;">
                <p>Category: <?= htmlspecialchars($row['category']); ?></p>
                <p>Description: <?= htmlspecialchars($row['description']); ?></p>
                <p>Price: <?= htmlspecialchars($row['price']); ?></p>
                <button >Change Address</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Product not found!";
    }
} else {
    echo "Invalid product ID!";
}
?>
