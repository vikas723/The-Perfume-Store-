<?php
// Database connection configuration
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  // Get form values
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $card = $_POST['card'];
  $expiry = $_POST['expiry'];
  $cvv = $_POST['cvv'];

  // Perform form validation if needed

  // Store the order information in the database
  $sql = "INSERT INTO Place Order (name, email, address, city, state, zip, card, expiry, cvv) VALUES ('$name', '$email', '$address', '$city', '$state', '$zip', '$card', '$expiry', '$cvv')";

  if ($conn->query($sql) === TRUE) {
    // Order stored successfully
    echo "Order placed successfully!";
  } else {
    // Failed to store the order
    echo "An error occurred while placing the order. Please try again later.";
  }
}

// Close the database connection
$conn->close();
?>
