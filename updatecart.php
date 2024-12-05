<?php
include('db.php');

if (isset($_POST['id']) && isset($_POST['quantity'])) {
  $productid = $_POST['id'];
  $quantity = $_POST['quantity'];
  
  $sql = "UPDATE cart SET quantity = '$quantity' WHERE productid = '$productid'";
  $conn->query($sql);
  
  // Update total price
  $sql = "SELECT price FROM product WHERE id = '$productid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $price = $row['price'];
  $total = $price * $quantity;
  
  $sql = "UPDATE cart SET total = '$total' WHERE productid = '$productid'";
  $conn->query($sql);
}
?>
