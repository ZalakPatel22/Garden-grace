<?php
// Include the database connection
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['indexEmail'];
    $password = $_POST['indexPassword'];

    // Retrieve the user record from the login table
    $stmt = $pdo->prepare("SELECT * FROM login WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    // Check if the user exists and the password matches
    if ($user && password_verify($password, $user['password'])) {
        echo "Sign In successful!";
    } else {
        echo "Invalid email or password.";
    }
}
?>
