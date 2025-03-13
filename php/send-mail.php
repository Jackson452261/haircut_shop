
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
    exit;
  }

  if (empty($name) || empty($message)) {
    echo "Name and message fields cannot be empty";
    exit;
  }

  $to = "johndoe123@example.com";
  $subject = "Contact Form Submission from $name";

  $body = "
    <html>
      <head>
        <title>Contact Form Submission</title>
      </head>
      <body>
        <p>You have received a new message from the contact form:</p>
          <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
            <tr>
              <th style='background-color: #f2f2f2;'>Field</th>
              <th style='background-color: #f2f2f2;'>Details</th>
            </tr>
            <tr>
              <td><strong>Name</strong></td>
              <td>{$name}</td>
            </tr>
            <tr>
              <td><strong>Email</strong></td>
              <td>{$email}</td>
            </tr>
            <tr>
              <td><strong>Message</strong></td>
              <td>{$message}</td>
            </tr>
          </table>
        </body>
    </html>
  ";

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
  $headers .= "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully!";
  } else {
    echo "Failed to send email.";
  }
}
