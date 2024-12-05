<?php
    include('db.php');
    include('admin.php');
   $sql = 'SELECT c.productid,p.image,p.name,p.price,c.quantity,c.total FROM cart c INNER JOIN product p ON c.productid = p.id';
   $sql2 = 'SELECT c.shopid,s.image,s.name,s.price,c.quantity,c.total FROM cart c INNER JOIN shop s ON c.shopid = s.id';
   $result = $conn->query($sql);
   $result2 = $conn->query($sql2);

   if ($result2 === false) {
    // If the query fails, display an error message
    echo "Error: " . $conn->error;
    exit; // Stop further execution if the query fails
}
//   print_r($result1);
//   exit;
//    echo "hello";
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
        <!-- <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">477, Marutidham, Amroli.Surat</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">zalakpatel@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Graden Grace</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.html" class="nav-item nav-link">index</a>
                            <a href="shop.html" class="nav-item nav-link">Shop</a>
                            <a href="review.php.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.html" class="dropdown-item active">Cart</a>
                                    <a href="chackout.html" class="dropdown-item">Chackout</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="#" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a>
                            <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div> -->
        <?php include('header.php');?>
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
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">index</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <form method="POST">
                   
                    <table class="table">
                    
                        <thead>
                       
                                    <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php  if ($result->num_rows > 0) 
                                {
                                    while($row = $result->fetch_assoc()) {
                                       // print_r($row); ?>
                                       
                            <tr class="cart-item">
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="../productimage/<?=$row['image'];?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?=$row["name"];?></p>
                                </td>
                                <td>
                                <p class="mb-0 mt-4" data-price="<?=$row["price"]?>">$<?=$row["price"]?></p>

                                    
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <!-- <div class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border-0">
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div> -->
                                        <input type="text" data-quantity="cc" class="form-control form-control-sm text-center border-0 quantity-input" value="2" min="1">
                                        <!-- <div class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border ">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div> -->
                                    </div>
                                </td>
                            <td>
                            <p class="mb-0 mt-4 item-total">$<?=$row["total"]?></p>
                        

                                </td> 
                              

                                <td>
                                    <button  type="button"  data-productid="<?=$row['productid']?>"  class="btn btn-md rounded-circle bg-light border mt-4 delete-to-cart" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            
                            </tr>
                            <?php  }
                } ?>
                        </tbody>
            </form action="insertcart.php" class="">
                    </table>
                    

                    <!-- Display all products from the Product table -->
<h2>All Products</h2>
<form method="POST">
<table class="table">
    <thead>
    <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
    </thead>
    <tbody>
        <?php if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) { ?>
           <tr class="cart-item">
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="../productimage/<?=$row['image'];?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?=$row["name"];?></p>
                                </td>
                                <td>
                                <p class="mb-0 mt-4" data-price="<?=$row["price"]?>">$<?=$row["price"]?></p>

                                    
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <!-- <div class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border-0">
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div> -->
                                        <input type="text" data-quantity="cc" class="form-control form-control-sm text-center border-0 quantity-input" value="2" min="1">
                                        <!-- <div class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border ">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div> -->
                                    </div>
                                </td>
                            <td>
                            <p class="mb-0 mt-4 item-total">$<?=$row["total"]?></p>
                        

                                </td> 
                              

                                <td>
                                    <button  type="button"  data-shopid="<?=$row['shopid']?>"  class="btn btn-md rounded-circle bg-light border mt-4 delete-to-cart" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            
                            </tr>
        <?php }
        } else  ?>
           
    </tbody>
    </form action="insertcart2.php" class="">
</table>
                    

                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                
                                
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 mt-4 grand-total &#8377;" ></p>
                            </div>
                            <a href="chackout.php"><button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4 " type="button">Proceed Checkout</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    


      
        <?php include('footer.php');?>
      
        <?php include('copyright.php'); ?>


        


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
    <!-- <script>
        $(document).ready(function() {
    //console.log('zalk');
    $('.delete-to-cart').on('click', function(e) {
        console.log('dixa');
        var productid = $(this).data('productid');
       
        console.log(productid);
       //return;
        $.ajax({
            type: 'POST',
            url: 'deletecart.php',
            data: {id: productid},
            success: function() {
                alert("Successfully item deleted from cart!!");
                window.location.reload();
            }
        });
    });
});


    </script>
     <script>
        $(document).ready(function() {
    //console.log('zalk');
    $('.delete-to-cart').on('click', function(e) {
        console.log('dixa');
        var shopid = $(this).data('shopid');
       
        console.log(shopid);
       //return;
        $.ajax({
            type: 'POST',
            url: 'deletecart2.php',
            data: {id: shopid},
            success: function() {
                alert("Successfully item deleted from cart!!");
                window.location.reload();
            }
        });
    });
});


    </script> -->
    <script>

$(document).ready(function() {
    $('.delete-to-cart').on('click', function() {
        var id;
        var type = $(this).data('productid') ? 'product' : 'shop';
        id = type === 'product' ? $(this).data('productid') : $(this).data('shopid');

        $.ajax({
            type: 'POST',
            url: type === 'product' ? 'deletecart.php' : 'deletecart2.php',
            data: { id: id },
            success: function() {
                alert("Successfully item deleted from cart!!");
                window.location.reload();
            }
        });
    });
});

        </script>

    <script>
$(document).ready(function() {
    // Function to update total price for each item
    function updateTotal($itemRow) {
        var price = parseFloat($itemRow.find('.price').data('price')); // Get item price
        var quantity = parseInt($itemRow.find('.quantity-input').val()); // Get item quantity
        var Total = price * quantity; // Calculate total for the item
        $itemRow.find('.item-total').text('\u20B9' + Total.toFixed(2)); // Update item total
      
    }

    // Function to update grand total
    function updateGrandTotal() {
        var grandTotal = 0;
        $('.cart-item').each(function() {
            var Total = parseFloat($(this).find('.item-total').text().replace('$','')); // Get the item's total
            grandTotal += Total; // Add to the grand total
        });
        $('.grand-total').text('\u20B9' + grandTotal.toFixed(2)); // Update the grand total in UI
    }

    // Handle plus button click
    $('.btn-plus').click(function() {
        var $input = $(this).closest('.cart-item').find('.quantity-input');
        var val = parseInt($input.val());
        $input.val(val + 1); // Increase by 1
        var $itemRow = $(this).closest('.cart-item');
        updateTotal($itemRow); // Update total for this item
        updateGrandTotal(); // Update the grand total
    });

    // Handle minus button click
    $('.btn-minus').click(function() {
        var $input = $(this).closest('.cart-item').find('.quantity-input');
        var val = parseInt($input.val());
        if (val > 1) { // Ensure the quantity doesn't go below 1
            $input.val(val - 1); // Decrease by 1
            var $itemRow = $(this).closest('.cart-item');
            updateTotal($itemRow); // Update total for this item
            updateGrandTotal(); // Update the grand total
        }
    });

    // Trigger total update on manual quantity input change
    $('.quantity-input').on('change', function() {
        var $itemRow = $(this).closest('.cart-item');
        updateTotal($itemRow); // Update total for this item
        updateGrandTotal(); // Update the grand total
    });

    // Initial calculation on page load
    updateGrandTotal();
});

</script>
    </body>

</html>