<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
       

        function random_password($length)
        {
            //A list of characters that can be used in our
            //random password.
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!-.[]?*()';
            //Create a blank string.
            $password = '';
            //Get the index of the last character in our $characters string.
            $characterListLength = mb_strlen($characters, '8bit') - 1;
            //Loop from 1 to the $length that was specified.
            foreach (range(1, $length) as $i) {
                $password .= $characters[random_int(0, $characterListLength)];
            }
            return $password;
        }

        $organization = $_POST['organization'];
        $email = $_POST['email'];
        $password = random_password(6);
        $user= explode("@", $email);
        $username = $user[0];



       // Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

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
         $mail->Body    = "This is your login details:<br> email: " . $email . "<br>Password: " .  $password . "<br>Link: http://fmc.dufma.ng/organization";
             $mail->AltBody = "This is your email " . $email . " and Password " .  $password;

             $mail->send();
             echo 'Message has been sent';
        } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }

/*
// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
//     $mail->isSMTP();                                            // Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//     $mail->Username   = 'dufmanigeria@gmail.com';                     // SMTP username
//     $mail->Password   = 'dufma234';                               // SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
//     $mail->Port       = 587;                                    // TCP port to connect to

//     // //Recipients
//     $mail->setFrom('dufmanigeria@gmail.com', 'Abdullahi');
    $mail->addAddress( $email, $name);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
//     $mail->isHTML(true);                                  // Set email format to HTML
//     $mail->Subject = 'Login Details';
//     $mail->Body    = "This is your organization login details:<br> email: " . $_POST['email'] . "<br>Password: " .  $password;
//     $mail->AltBody = "This is your email " . $_POST['email'] . " and Password " .  $password;

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

*/



/*
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.dufma.ng';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'dufma@fmc.dufma.ng';                     // SMTP username
    $mail->Password   = '53launo&~DD';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('dufma@fmc.dufma.ng', 'Dufma');
    $mail->addAddress( $email, $name);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Login Details';
    $mail->Body    = "This is your organization login details:<br> email: " . $_POST['email'] . "<br>Password: " .  $password;
    $mail->AltBody = "This is your email " . $_POST['email'] . " and Password " .  $password;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
*/

//create record and insert into DB

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $image = $final_file;
        }

         $sql = "INSERT INTO organization (`username`, `email`, `password`, `organization`) 
         VALUES(:username, :email, :password, :organization);";
         $query = $dbh->prepare($sql);
         $query->bindParam(':username', $username, PDO::PARAM_STR);
         $query->bindParam(':email', $email, PDO::PARAM_STR);
         $query->bindParam(':password', md5($password), PDO::PARAM_STR);
         $query->bindParam(':organization', $organization, PDO::PARAM_STR);
         $query->execute();

         header('location:organization.php');

        
    }



?>

    <!DOCTYPE html>
    <html>


    <?php
    require_once "public/config/header.php";
    ?>

    <body>

        <div id="wrapper">
            <?php
            require_once "public/config/left-sidebar.php";
            ?>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">

                    <?php
                    require_once "public/config/topbar.php";
                    ?>

                </div>
                <div class="row dashboard-header">
                    <div class="panel-heading" style='padding:0;'>
                        <h2 class="page-title">Organizations</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> New Organization</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default panel-outer">
                            <div class="panel-heading">Organization list</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                <?php
                                $sql = "SELECT * from organization";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { ?>
                                        <div class="col-lg-3">
                                            <div class="panel panel-default" style="width:200px;">
                                                <img class="panel-heading" src="../images/<?php echo $result->image ?>" alt="Card image" style="width:100%">
                                                <div class="panel-body">
                                                    <h4 class="card-title"><?php echo $result->organization ?></h4>
                                                    <p class="card-text">Our Email is <?php echo $result->email ?> <?php echo $result->organization ?> is an Agricultural Production Company</p>
                                                    <a href="mainDash.php?id=<?php echo $result->id; ?>" class="btn btn-primary">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>

                            </div>
                        </div>



                        <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">New Organization</h4>
                                    </div>

                                    <div class="modal-body">
                                        <form action="organization.php" method="POST" class="forma" enctype="multipart/form-data" onSubmit="return validate()">

                                            <p>

                                                <label for="organization">Organization Name</label>
                                                <input type="text" name="organization" value="">
                                            </p>

                                            <p>
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="">
                                            </p>

                                            <p>
                                                <button type="submit" name="submit">
                                                    Submit
                                                </button>
                                            </p>

                                        </form>


                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---end of modal dialog 1 -->


                    </div>

                </div>

                <?php
                require_once "public/config/footer.php";
                ?>
    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>
