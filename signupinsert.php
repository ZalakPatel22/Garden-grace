<?php
// Include the database connection
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data from POST request
    $firstName = $_POST['signupFirstName'];
    $lastName = $_POST['signupLastName'];
    $email = $_POST['signupEmail'];
    $password = password_hash($_POST['signupPassword'], PASSWORD_BCRYPT);  // Hash the password for security

    // Check if the email already exists
    $stmt = $pdo->prepare("SELECT * FROM register WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Email already exists.";
    } else {
        // Insert new user data into the register table
        $sql = "INSERT INTO register (fname, lastname, email, password) VALUES (:fname, :lastname, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['fname' => $firstName, 'lastname' => $lastName, 'email' => $email, 'password' => $password]);

        if ($stmt) {
            echo "Sign Up successful!";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}
?>
