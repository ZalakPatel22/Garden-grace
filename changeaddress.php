<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Basic styles */
body {
    font-family: Arial, sans-serif;
}

.checkout {
    margin: 20px;
}

/* Modal styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    position: relative;
}

.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <!-- Checkout Section -->
    <div class="checkout">
        <h2>Shipping Address</h2>
        <p id="display-address">123 Main St, City, Country</p>
        <button id="change-address-btn">Change Address</button>
    </div>

    <!-- Hidden Modal for Changing Address -->
    <div id="change-address-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Change Address</h3>
            <form id="change-address-form">
                <label for="new-address">New Address:</label>
                <input type="text" id="new-address" name="new-address" placeholder="Enter your new address" required>
                <button type="submit">Save Address</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        // Get modal element and change address button
const modal = document.getElementById("change-address-modal");
const changeAddressBtn = document.getElementById("change-address-btn");
const closeBtn = document.querySelector(".close");
const form = document.getElementById("change-address-form");
const displayAddress = document.getElementById("display-address");

// Open the modal when "Change Address" is clicked
changeAddressBtn.onclick = function() {
    modal.style.display = "flex";
};

// Close the modal when the "X" is clicked
closeBtn.onclick = function() {
    modal.style.display = "none";
};

// Close the modal when user clicks outside the modal content
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

// Handle form submission
form.onsubmit = function(event) {
    event.preventDefault(); // Prevent page from refreshing
    const newAddress = document.getElementById("new-address").value;
    if (newAddress) {
        displayAddress.textContent = newAddress; // Update displayed address
        modal.style.display = "none"; // Close modal
    }
};

    </script>
</body>
</html>
