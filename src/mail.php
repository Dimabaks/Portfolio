<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                         // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
    $mail->Username   = 'dimonbacsa@gmail.com';                  // SMTP username
    $mail->Password   = 'csjznzecbbgjjxjg';                      // SMTP password
    $mail->SMTPSecure = 'TLS';                                    // Enable implicit TLS encryption
    $mail->Port       = 587;                                     // TCP port to connect to

    // Recipients
    $mail->setFrom('dimonbacsa@gmail.com', '');
    $mail->addAddress('dimonbacsa@gmail.com', '');       // Add a recipient

    $mail->CharSet = 'UTF-8';
    
    // Form the HTML content for the email
    $body = '
    <html>
    <body>
        <table style="text-align: center; font-size: 18px; font-weight: 700; border-collapse: collapse;">
            <caption style="text-align: center; font-size: 28px; font-weight: 700;">Заявка на ремонт с сайта</caption>
            <tbody>
                <tr>
                    <td style="width: 200px; padding: 10px; border: 3px solid crimson;">Имя:</td>
                    <td style="width: 200px; padding: 10px; border: 3px solid crimson;">' . $_POST['name'] . '</td>
                </tr>
                <tr>
                    <td style="width: 200px; padding: 10px; border: 3px solid crimson;">Сообщение:</td>
                    <td style="width: 200px; padding: 10px; border: 3px solid crimson;">' . $_POST['email'] . '</td>
                </tr>
                <tr>
                    <td style="width: 200px; padding: 10px; border: 3px solid crimson;">Сообщение:</td>
                    <td style="width: 200px; padding: 10px; border: 3px solid crimson;">' . $_POST['text'] . '</td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>
    ';

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Данные';
    $mail->Body    = '
		Пользователь оставил данные <br> 
	Имя: ' . $_POST['name'] . ' <br>
    Почта: ' . $_POST['email'] . ' <br>
	Сообщение: ' . $_POST['text'];

  if(!$mail->send()) {
    return false;
} else {
    return true;
}
?>
