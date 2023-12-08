<?php
use AfricasTalking\SDK\AfricasTalking;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/Exception.php";
require_once "PHPMailer/src/SMTP.php";
require_once "vendor/autoload.php";

$mail = new PHPMailer(true);
$email=$_POST['email'];
$message=$_POST['message'];
$subject=$_POST['subject'];
$name=$_POST['name'];
$new_password=rand(10000,20000);
try {
	$html='<!DOCTYPE html>
	<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Your Fancy Email</title>
	  <style>
		body {
		  font-family:sans-serif;
		  background-color: #f4f4f4;
		  margin: 0;
		  padding: 0;
		}
	
		.container {
		  max-width: 600px;
		  margin: 20px auto;
		  background-color: #fff;
		  border-radius: 10px;
		  overflow: hidden;
		  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
	
		header {
		  background-color: #007bff;
		  padding: 20px;
		  color: #fff;
		  text-align: center;
		  font-size: 24px;
		}
	
		main {
		  padding: 20px;
		}
	
		footer {
		  background-color: #007bff;
		  color: #fff;
		  text-align: center;
		  padding: 10px;
		}
	  </style>
	</head>
	<body>
	  <div class="container">
		<header>
		  <h1>'.$subject.'</h1>
		</header>
		<main>
		<h3>FROM:'.$email.'</h3>
		  <h3>Message</h3>
		  <p>'.$message.'</p>
		  <p>Best regards,<br>'.$name.'</p>
		</main>
		<footer>
		  <p>&copy; 2023 www.stairwaytech.org</p>
		</footer>
	  </div>
	</body>
	</html>';
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true,
		)
	  );
	$mail->SMTPDebug = 0;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'vincentbettoh@gmail.com';				
	$mail->Password = 'vecz oiqv wrlp jxne';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom("admin@stairway.org", "Contact");		
	$mail->addAddress("jaykipkerich@gmail.com");	
	$mail->isHTML(true);								
	$mail->Subject = 'Contact Form';
	$mail->Body=$html;
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "<script>alert('Email successfully sent'); location.replace('../index.html');</script>";

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
