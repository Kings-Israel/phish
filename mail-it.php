<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$type = $_POST['type'];
if ($type == 'mail') {
	$send_to = $_POST['email'];
	// $send_subject = $_POST['subject'];
	// $body = $_POST['message'];
	$body = <<< YOUR_HTML_WITH_CSS_STYLE_TAGS
	<html>
	<head>
			<style>
				@import url(http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic);
				@import url(http://fonts.googleapis.com/css?family=Abril+Fatface&subset=latin,latin-ext);
				h4 { 
					font-family: 'FontAwesome';
					font-size: 24px;
				}
				ul li {
					font-family: 'FontAwesome';
					font-size: 18px;
				}
				.container { position: relative; width: 960px; margin: 0 auto; padding: 0; }
				.aclass {margin:3px;}
				.action_center {
					display: flex;
				}
				.body-text {
					font-family: 'FontAwesome';
					font-size: 16px;
				}
				.button,
					button {
					background:#363636;	
					margin-top:10px;
					border:none;
						color: #dfdfdf;
						display: inline-block;
						font-size: 16px;
						cursor: pointer;
						line-height: normal;
						padding: 15px 25px;
					-webkit-transition : all 0.3s ease-out;
					-moz-transition : all 0.3s ease-out;
					-o-transition :all 0.3s ease-out;
					transition : all 0.3s ease-out; 
					width:100%;
				}
				.button,
					button a {
						font-family: 'FontAwesome';
						font-size: 24px;
						text-decoration: none;
						color: #000;
				}
				.button,
					button a:hover {
						color: #fff;
				}
			</style>
	</head>
	<body>
			<div class="container">
				<p class="aclass">
					<h4>Dear colleague,</h4>
					<p class="body-text">
						We are excited to announce the launch of our new procurement platform, which will make your purchasing process easier, faster and more transparent. The platform is designed to help you find the best suppliers, compare prices and quality, track orders and invoices, and manage your budget. You can access the platform from any device, anytime, anywhere.
					</p>
					<p class="body-text">
						The platform is now live and ready for you to use. To get started, please follow these steps:
					<p>
					<ul>
						<li>Register for an account using your company email address and a password of your choice.</li>
						<li>Complete your profile with your name, department, role and contact details.</li>
						<li>Browse the catalog of products and services offered by our approved vendors.</li>
						<li>Create a requisition for the items you need and submit it for approval.</li>
						<li>Once approved, place your order and receive a confirmation email.</li>
						<li>Track the status of your order and delivery using the platform's dashboard.</li>
						<li>Review and rate the supplier after receiving your order.</li>
					</ul>
					
					<span class="action_center">
						<button class='btn'><a href="http://localhost/projects/phish" target="_blank">For More Information Click Here !!</a></button>	
					</span>
	
					<p class="body-text">
						Thank you for your cooperation and support.
					</p>
					<p class="body-text">
						Sincerely,
					</p>
					<p class="body-text">
						The Procurement Team
					</p>
				</p>
			</div>
	</body>
	</html>
	YOUR_HTML_WITH_CSS_STYLE_TAGS;
	
	$mail = new PHPMailer(true);
	
	try {
		//Server settings
		$mail->SMTPDebug  = SMTP::DEBUG_SERVER;
		$mail->isSMTP();   
		$mail->Host       = 'smtp.mailtrap.io'; 
		$mail->SMTPAuth   = true; 
		$mail->Username   = '73d64b1c06a9e4';
		$mail->Password   = 'ac938b858998db';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port       = 2525;
	
		//Recipients
		$mail->setFrom('kpf@ai.com', 'Mailer');
		$mail->addAddress($send_to);
	
		//Content
		$mail->isHTML(true);
		$mail->Subject = 'Introducing our new procurement platform';
		$mail->Body    = $body;
	
		$mail->send();
		echo "<span style='color:green;font-size:15px'> Mailed Successfully!</span>";
	
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

function cleanupentries($entry) {
	$entry = trim($entry);
	$entry = stripslashes($entry);
	$entry = htmlspecialchars($entry);

	return $entry;
}

?>