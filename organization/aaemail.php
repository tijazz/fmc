<?php

    use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
  /*
    $from = "admin@dufma.ng";
    $to = "tijaniazeez92@gmail.com";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
    
    
    
auth_username = admin@dufma.ng
auth_password = ADEMOLA789@
    */
    
    
        // Load Composer's autoloader
        require '../vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
     $name = "tijaniazeez";
          $password = "tijazz";
     $email = "tijaniazeez92@gmail.com";
         try {
             //Server settings
             $mail->SMTPDebug = 0; // Enable verbose debug output                  // Send using SMTP
             $mail->Host       = 'mail.dufma.ng';                    // Set the SMTP server to send through
             $mail->Username   = 'admin@fmc.dufma.ng';                     // SMTP username
             $mail->Password   = 'Ademola789@';
             $mail->SMTPKeepAlive = true;
             $mail->isSMTP();                               // SMTP password
             $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  //$mail->SMTPAuth   = false;                                   // Enable SMTP authentication

             $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
             $mail->Port       = 465;                                   // TCP port to connect to
             $mail->setFrom('admin@fmc.dufma.ng', 'Dufma');
             $mail->addAddress($email, $name);


             // Content
             $mail->isHTML(true);                                  // Set email format to HTML
             $mail->Subject = 'Login Details';
         $mail->Body    = "This is your login details:<br> email: " . $email . "<br>Password: " .  $password . "<br>Link: http://fmc.dufma.ng/";
             $mail->AltBody = "This is your email " . $email . " and Password " .  $password;

             $mail->send();
             echo 'Message has been sent';
        } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }

?>