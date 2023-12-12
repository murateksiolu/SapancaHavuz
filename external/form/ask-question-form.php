<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'no-reply@eracochillers.com';                     //SMTP username
    $mail->Password   = '314159Ea!';                               //SMTP password
    $mail->SMTPSecure = "PHPMailer::ENCRYPTION_STARTTLS";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('no-reply@eracochillers.com', 'Sapanca Havuz');
    $mail->addAddress('murateksicom@gmail.com', 'sapancahavuz.com');     //Add a recipient

    //Passed variables
    $name = $_POST['name'];
    $email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$message = $_POST['message'];

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Sapancahavuz.com dan yeni bir soru geldi!';
    $mail->Body    =
        'Ad Soyad: ' .$name.
        '<br>Telefon: ' .$phonenumber.
        '<br>E-mail: ' .$email.
        '<br>Soru: ' .$message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
