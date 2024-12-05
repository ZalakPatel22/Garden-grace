  <html>
    <head>
    <style>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        /* Additional styling for modal */
        #searchResults {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>
    <body>
  
  <!-- Navbar start -->
        <div class="container-fluid fixed-top">
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
                            <a href="home.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="review.php" class="nav-item nav-link">Review</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.php" class="dropdown-item">Cart</a>
                                    <a href="chackout.php" class="dropdown-item">Chackout</a>
                                    <!-- <a href="testimonial.php" class="dropdown-item">Testimonial</a> -->
                                    <!-- <a href="product-detail.php" class="nav-item nav-link">Product Detail</a>
                                    <a href="product-detail2.php" class="nav-item nav-link">Shop Detail</a> -->
                                    <a href="changeaddress.php" class="nav-item nav-link">Change Address</a>
                                    
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="cart.php" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <!-- <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"></span> -->
                            </a>
                            <a href="user-profile.php" class="position-relative me-4 my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a></br>
                            <a href="index.php" class="my-auto">
                        <i class="fas fa-sign-out-alt fa-2x"></i>
                        </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="searchInput" class="form-control" placeholder="Search for products..." onkeyup="searchProducts()">
                <div id="searchResults" class="mt-2"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function searchProducts() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const resultsContainer = document.getElementById('searchResults');
        resultsContainer.innerHTML = ''; // Clear previous results

        // Get all product items
        const products = document.querySelectorAll('.product-item');

        // Filter products based on the input
        products.forEach(product => {
            if (product.textContent.toLowerCase().includes(input)) {
                const li = document.createElement('li');
                li.classList.add('list-group-item', 'list-group-item-action');
                li.textContent = product.textContent;
                resultsContainer.appendChild(li);
            }
        });

        if (resultsContainer.innerHTML === '') {
            const li = document.createElement('li');
            li.classList.add('list-group-item');
            li.textContent = 'No results found';
            resultsContainer.appendChild(li);
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        <!-- Navbar End -->