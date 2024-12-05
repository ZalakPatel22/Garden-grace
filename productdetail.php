<?php
    include('db.php');
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $sql = "SELECT * FROM product WHERE id = $productId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            echo "Product not found!";
            exit;
        }
    } else {
        echo "Invalid product!";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Product Details</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php include('header.php');?>

        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="../productimage/<?=$product['image'];?>" class="img-fluid" alt="Product Image">
                </div>
                <div class="col-md-6">
                    <h1><?=$product['name'];?></h1>
                    <p><?=$product['description'];?></p>
                    <p class="text-dark fs-5 fw-bold"><?=$product['price'];?></p>
                    <form action="insertcart.php" method="POST">
                        <input type="hidden" name="productid" value="<?=$product['id'];?>">
                        <input type="hidden" name="price" value="<?=$product['price'];?>">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>

        <?php include('footer.php');?>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
