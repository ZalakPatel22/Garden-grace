<?php
// profile.php
session_start();
include('db.php'); // Database connection

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    header('Location: home.php'); // Redirect to login if not logged in
    exit();
}

// Fetch user details from the database if needed (optional)
$user_id = $_SESSION['login_id'];
$sql = "SELECT * FROM login WHERE id = '$login_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
        <img src="<?php echo htmlspecialchars($user['productimage']); ?>" alt="Profile Picture" class="profile-picture" />
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <!-- Add more user information as needed -->
    </div>
</body>
</html>

?>