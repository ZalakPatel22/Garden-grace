<?php
include('db.php'); // Include your database connection file

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM product WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the product exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Product Details</title>
            <!-- Include necessary CSS and JS -->
        </head>
        <body>
            <div class="container">
            <form action="changeaddress.php">
            <center style="color:#008000;"><b>Your product has been saved sucessfully in cart.<a href="cart.php"></b>Go to Cart page</a></center>
                <h1>Product Details</h1>
                <h2><?=$row['name'];?></h2>
                <img src="../productimage/<?=$row['image'];?>" alt="<?=$row['name'];?>" style="width:300px; height:300px;">
                <p>Category: <?=$row['category'];?></p>
                <p>Description: <?=$row['description'];?></p>
                <p>Price: <?=$row['price'];?></p>
                <button>Change Address</button>
                <!-- You can add more product details if needed -->
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
