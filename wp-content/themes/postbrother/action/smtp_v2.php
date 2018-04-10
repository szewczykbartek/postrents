<?php
//
// MAIL
//
require_once('../libs/PHPMailer-5.2.14/class.phpmailer.php');
include("../libs/PHPMailer-5.2.14/class.smtp.php");

$mail = new PHPMailer(true);
$mail->IsSMTP();

// topic
$subject = 'Post Brothers [' . date('Y-m-d H:i:s') . '] ' . $_POST['FirstName'] . ' ' . $_POST['LastName'];

$message = '
Name: ' . $_POST['FirstName'] . ' ' . $_POST['LastName'] . '<br />
Email: ' . $_POST['Email'] . '<br />
Phone: ' . $_POST['Phone'] . '<br />
Message: ' . $_POST['Message'];

try {
    $mail->IsHTML(true);
    $mail->Host = "secure256.sgcpanel.com";
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "secure256.sgcpanel.com";
    $mail->Port = 465;
    $mail->Username = "bot@postrents.com";
    $mail->Password = "M#1~seDt#fzI";

    $mail->AddAddress($_POST['emailTo'], 'Postrent');

    $mail->From = "bot@postrents.com";
    $mail->FromName = "Postrents";
    $mail->Subject = $subject;
    $mail->AltBody = $message;
    $mail->Body = $message;

    $mail->Send();

//    echo '<pre>', print_r($mail, 1), '</pre>';
//    echo "Message Sent OK<p></p>\n";
    
} catch (phpmailerException $e) {
    //echo $e->errorMessage();
} catch (Exception $e) {
    //echo $e->getMessage();
}



// TXT

$fileLocation = "../mail/" . date('Y-m-d H:i:s') . ' ' . $_POST['FirstName'] . ' ' . $_POST['LastName'] . ".txt";
$file = fopen($fileLocation, "w");

$message = '
Name: ' . $_POST['FirstName'] . ' ' . $_POST['LastName'] . '
Email: ' . $_POST['Email'] . '
Phone: ' . $_POST['Phone'] . '
Message: ' . $_POST['Message'];

fwrite($file, $message);
fclose($file);