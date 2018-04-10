<?php 
// TXT

$fileLocation = "../mail/" . date('Y-m-d H:i:s') . ' ' . $_POST['FirstName'] . ' ' . $_POST['LastName'] . ".txt";
$file = fopen($fileLocation, "w");

$message = '
Name: ' . $_POST['FirstName'] . ' ' . $_POST['LastName'] . '
Email: ' . $_POST['Email'] . '
Phone: ' . $_POST['Phone'] . '
Subject: ' . $_POST['Subject'] . '
Message: ' . $_POST['Message'];

fwrite($file, $message);
fclose($file);


// EMAIL

$to = 'rent@postrents.com';

// topic
$subject = 'Post Brothers [' . date('Y-m-d H:i:s') . '] ' . $_POST['FirstName'] . ' ' . $_POST['LastName'];

// message
$message = '
Name:<br />' . $_POST['FirstName'] . ' ' . $_POST['LastName'] . '<br /><br />
Email:<br />' . $_POST['Email'] . '<br />
Phone:<br />' . $_POST['Phone'] . '<br /><br />
        
Subject:<br />' . $_POST['Subject'] . '<br />
Message:<br />' . $_POST['Message'];

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: Post Brothers <' . $to . '>' . "\r\n";
$headers .= 'From: ' . $_POST['FirstName'] . ' ' . $_POST['LastName'] . ' <' . $_POST['Email'] . '>' . "\r\n";

mail($to, $subject, $message, $headers);

