<?php
require 'dbconfig.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$smsMsg='';
//Load Composer's autoloader
$result='';
if(isset($_POST['person_email']) && !empty($_POST['person_email']) || 
isset($_POST['person_name']) && !empty($_POST['person_name']))
{
    $name=mysqli_real_escape_string($conn,$_POST['person_name']);
    $email=mysqli_real_escape_string($conn,$_POST['person_email']);
    $message=mysqli_real_escape_string($conn,$_POST['person_message']);
    $subject=mysqli_real_escape_string($conn,$_POST['person_subject']);
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try 
    {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //$mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.cssites.in';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'newsuperfurnitureworks@cssites.in';                     //SMTP username
    $mail->Password   = '2D0p&[S5WqTa';
    //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 26;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('newsuperfurnitureworks@cssites.in', 'New super furniture works');
    $mail->addAddress($email,$name);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Inquiry Email';
    $mail->Body    = 'Thank you for contacting us our team will will contact you soon';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $result=$mail->send();
        if ($result) {
         $smsMsg='Message sent successfully!';
        } else {
           // echo 'Message could not be sent.';
        $smsMsg= 'Message could not be sent.Mailer Error: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        //echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $e->getMessage();
    }
    
    $sql = "INSERT INTO contact (name, message, email,subject) VALUES ('$name', '$message', '$email','$subject')";

    // Perform the insertion
    if (mysqli_query($conn, $sql)) 
    {
        $smsStat='';
        if($result)
        $smsStat='success';
        else
        $smsStat='failure';
        
        echo json_encode(array('status'=>'success','message'=>"Data inserted successfully!",'sms_status'=>$smsStat,"sms_msg"=>$smsMsg)) ;
    } 
    else 
    {
        echo json_encode(array('status'=>'success','message'=>"Error: " . $sql . "<br>" . mysqli_error($conn))) ;
    }
}
else
{
        echo json_encode(array('status'=>'error','message'=>"Error: email not found !")) ;
}


?>
