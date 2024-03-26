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

// Get the form data from the AJAX request
$formData = json_decode(file_get_contents('php://input'), true);

// Extract the form values
$name = $formData['name'];
$email = $formData['email'];
$query = $formData['query'];

// Perform form validation if needed

// Store the form data in the database
$sql = "INSERT INTO contacts (name, email, query) VALUES ('$name', '$email', '$query')";

$response = array('success' => false, 'message' => '');

if ($conn->query($sql) === TRUE) {
  // Form data stored successfully
  $response['success'] = true;
} else {
  // Failed to store the form data
  $response['message'] = 'An error occurred while submitting the form. Please try again later.';
}

// Close the database connection
$conn->close();

// Send the response back to the JavaScript code
header('Content-Type: application/json');
echo json_encode($response);
?>
