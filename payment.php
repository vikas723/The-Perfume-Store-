<?php
require_once('vendor/autoload.php');

\Stripe\Stripe::setApiKey('YOUR_STRIPE_API_KEY');

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$card = $_POST['card'];
$expiry = $_POST['expiry'];
$cvv = $_POST['cvv'];

// Create Stripe payment charge
$charge = \Stripe\Charge::create([
  'amount' => 1000, // Replace with the actual amount in cents
  'currency' => 'usd',
  'source' => $card,
  'description' => 'Perfume purchase',
  'receipt_email' => $email
]);

// If payment is successful
if ($charge->status === 'succeeded') {
  // Save order details to the database or perform other necessary actions

  // Redirect the user to a thank you page
  header('Location: thank_you.php');
  exit;
} else {
  // If payment fails, display an error message
  echo 'Payment failed. Please try again.';
}
?>