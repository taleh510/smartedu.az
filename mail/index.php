<?php
include('../admin/netting/connect.php');
header('Content-type: text/plain; charset=utf-8');
// ob_start();
session_start();
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
if(isset($_GET['yeniistifadeci'])){
$us = $db->prepare("SELECT * FROM se_all_users where mail=:mail and vstts like '%no%'");
$us->execute(array('mail' => $_SESSION['mail0']));
$uc = $us->fetch(PDO::FETCH_ASSOC);
$vc=$uc['vcode'];

$mail = new PHPMailer;

$mail->CharSet = 'UTF-8'; 
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'deirbot@deirvlon.com';          // SMTP username
$mail->Password = 'deirvlon57'; // SMTP password
$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                 // TCP port to connect to

$mail->setFrom('deirbot@deirvlon.com');
$mail->addReplyTo('deirbot@deirvlon.com');  // Add a recipient
$mail->isHTML(true);  // Set email format to HTML

//$mail->addAttachment('img/attachment.png');
//Email body
$mail->Subject = "Profilinizi təsdiqləyin.";
$mail->Body =mb_convert_encoding("<p>Sizin təsdiqləmə kodunuz:<h1>$vc</h1></p>","UTF-8","auto");
//Add recipient
$mail->addAddress($_SESSION['mail0']);
//Finally send email
	if ( $mail->send() ) {
		header("Location: ../vertification?m=".$_SESSION['mail0']);
		// header("Location: ../index?m=".$_SESSION['mail0']);
	}
	else{
		echo "Message could not be sent. Mailer Error: "; //$mail->ErrorInfo;
	}
//Closing smtp connection
	$mail->smtpClose(); }

	if(isset($_GET['reset'])){
		$reseteden = $_GET['namereset'];
		$us0 = $db->prepare("SELECT * FROM se_all_users where mail=:mail");
		$us0->execute(array('mail' => $reseteden));
		$uc0 = $us0->fetch(PDO::FETCH_ASSOC);
		$rc=$uc0['resetcode'];

		$mail = new PHPMailer;

		$mail->CharSet = 'UTF-8'; 
		$mail->isSMTP();                                   // Set mailer to use SMTP
		$mail->Host = 'smtp.mail.ru';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'deirbot@deirvlon.com';          // SMTP username
		$mail->Password = 'deirvlon57'; // SMTP password
		$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                 // TCP port to connect to
		
		$mail->setFrom('deirbot@deirvlon.com');
		$mail->addReplyTo('deirbot@deirvlon.com');  // Add a recipient
		$mail->isHTML(true);
		$mail->Subject = ("Şifrənizi yeniləyin.");
			//$mail->addAttachment('img/attachment.png');
			$link = "<a href='http://imtahan.u1510888.cp.regruhosting.ru/reset-password?r=".$reseteden."&t=".$uc0['resetcode']."'>klikləyin</a>";
			$mail->Body    = 'Şifrənizi yeniləmək üçün: '.$link.'';
			$mail->addAddress($reseteden);
			if ( $mail->send() ) {
				header("Location: ../profile");
				$n=20;
				function getName($n) {
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$randomString = '';
				  
					for ($i = 0; $i < $n; $i++) {
						$index = rand(0, strlen($characters) - 1);
						$randomString .= $characters[$index];
					}
				  
					return $randomString;
				}

				$data = [
					'mail' => $reseteden,
					'resetcode' => getName($n)
				];

				$sql = "UPDATE se_all_users SET resetcode=:resetcode WHERE mail=:mail";
				$stmt = $db->prepare($sql);
				$stmt->execute($data);
			}
			else{
				echo "Message could not be sent. Mailer Error: "; //$mail->ErrorInfo;
			}
			$mail->smtpClose(); 
			
			session_destroy();
			header("Location: ../home");
	}

	if(isset($_GET['getexam'])){
		$e_id = $_GET['e_id'];
		$us0 = $db->prepare("SELECT * FROM se_exam where e_id=:e_id");
		$us0->execute(array('e_id' => $e_id));
		$uc0 = $us0->fetch(PDO::FETCH_ASSOC);
		//$rc=$uc0['resetcode'];

		$mail = new PHPMailer;

		$mail->CharSet = 'UTF-8'; 
		$mail->isSMTP();                                   // Set mailer to use SMTP
		$mail->Host = 'smtp.mail.ru';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'deirbot@deirvlon.com';          // SMTP username
		$mail->Password = 'deirvlon57'; // SMTP password
		$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                 // TCP port to connect to
		
		$mail->setFrom('deirbot@deirvlon.com');
		$mail->addReplyTo('deirbot@deirvlon.com');  // Add a recipient
		$mail->isHTML(true);
		$mail->Subject = ("SMARTEDU.AZ");
			//$mail->addAttachment('img/attachment.png');
			$mail->Body    = 'Təbrriklər siz: '.$uc0['basliq'].' u';
			$mail->addAddress($reseteden);
			if ( $mail->send() ) {
				header("Location: ../profile");
				$n=20;
				function getName($n) {
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$randomString = '';
				  
					for ($i = 0; $i < $n; $i++) {
						$index = rand(0, strlen($characters) - 1);
						$randomString .= $characters[$index];
					}
				  
					return $randomString;
				}

				$data = [
					'mail' => $reseteden,
					'resetcode' => getName($n)
				];

				$sql = "UPDATE se_all_users SET resetcode=:resetcode WHERE mail=:mail";
				$stmt = $db->prepare($sql);
				$stmt->execute($data);
			}
			else{
				echo "Message could not be sent. Mailer Error: "; //$mail->ErrorInfo;
			}
			$mail->smtpClose(); 
			
			session_destroy();
			header("Location: ../home");
	}

	?>
