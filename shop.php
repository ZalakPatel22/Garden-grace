<?php
    include('db.php');
    include('admin.php');
    $sql2 = 'SELECT * FROM shop';
    $result2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Garden Grace - Flower & Bouquets</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar start -->
        <?php include('header.php'); ?>
        <!-- Navbar End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">index</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh Flower & Bouquet shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <!-- <form action="insertcart.php" method="POST" class="cart-form"> -->
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <?php  
                                            if ($result2->num_rows > 0) {
                                                while($row = $result2->fetch_assoc()) {
                                        ?>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <a href="product-detail2.php?id=<?=$row['id'];?>">
                                                    <div class="Gift Items-img">
                                                        <img src="../productimage/<?=$row['image'];?>" class="img-fluid w-100 rounded-top" alt="productimage">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?=$row['category'];?></div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4><?=$row["name"];?></h4>
                                                        <p><?=$row["description"];?></p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                            <p class="text-dark fs-5 fw-bold mb-0">&#8377;<?=$row["price"];?></p>
                                                            <button type="button" data-shopid="<?=$row['id']?>" data-price="<?=$row['price']?>" class="fa fa-shopping-bag me-2 text-primary add-to-cart">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <?php  
                                                }
                                            } 
                                        ?>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->

        <!-- Footer Start -->
        <?php include('footer.php'); ?>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <script>
            $(document).ready(function() {
                $('.add-to-cart').on('click', function() {
                    var shopid = $(this).data('shopid');
                    var price = $(this).data('price');
                    var quantity = 1;  // Add quantity logic if needed

                    $.ajax({
                        type: 'POST',
                        url: 'insertcart2.php',
                        data: {shopid: shopid, price: price, quantity: quantity},
                        success: function(data) {
                            alert("Successfully added item to cart!");
                        }
                    });
                });
            });
        </script>
    </body>
</html>
