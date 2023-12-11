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
// $file = $_FILES['file'];
// ENES ACARRRRR
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
    $mail->setFrom('no-reply@eracochillers.com', 'Pool');
    $mail->addAddress('murateksicom@gmail.com', 'Pool');     //Add a recipient

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    // if (!empty($file['name'][0])) {
    //     for ($ct = 0; $ct < count($file['tmp_name']); $ct++){
    //         $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
    //         $filename = $file['name'][$ct];
    //         if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)){
    //             $mail->addAttachment($uploadfile, $filename);
    //             $rfile[] = "File $filename attached";
    //         } else {
    //             $rfile[] = "Failed to attach file $filename";
    //         }
    //     }
    };

    //Passed variables
    $name = $_POST['name'];
    $email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$address = $_POST['modalAddress'];
	$services = $_POST['services'];
	$datavisit = $_POST['datavisit'];
	$timevisit = $_POST['timevisit'];
	$message = $_POST['message'];

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is what was sent Pool, form "Request Services Modal"';
    $mail->Body    =
        'Name: ' .$name.
        '<br>Phone: ' .$phonenumber.
        '<br>E-mail: ' .$email.
        '<br>Address: ' .$address.
        '<br>Services: ' .$services.
        '<br>Data Visit: ' .$datavisit.
        '<br>Timevisit: ' .$timevisit.
        '<br>Message: ' .$message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
