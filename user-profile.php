<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            padding: 20px;
            text-align: right;
        }

        .user-info {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <header>
        <!-- Profile Logo -->
        <a href="javascript:void(0);" class="position-relative me-4 my-auto" id="profileLogo">
            <i class="fas fa-user fa-2x"></i>
        </a>
    </header>

    <!-- User Info Section -->
    <div id="userInfo" class="user-info">
        <h2>User Information</h2>
        <p><strong>Email:</strong> <span id="userEmail"></span></p>
        <p><strong>Password:</strong> <span id="userPassword"></span></p>
    </div>

    <script src="script.js"></script>
    <script>
        // Simulated user data
        const userData = {
            email: "zalakptael@gmail.com",       // Replace with actual user email
            password: "1234"               // Replace with actual user password
        };

        // Function to display user information automatically when the page loads
        function displayUserInfo() {
            document.getElementById("userEmail").innerText = userData.email;
            document.getElementById("userPassword").innerText = userData.password;
        }

        // Call displayUserInfo function on page load
        window.onload = displayUserInfo;
    </script>

</body>
</html>
