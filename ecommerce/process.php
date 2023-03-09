<?php
//Include required PHPMailer files
require 'phpmailer/includes/PHPMailer.php';
require 'phpmailer/includes/SMTP.php';
require 'phpmailer/includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send_email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if(empty($name) || empty($email) || empty($phone) || empty($message)){
        header('location:index.php?error');
    }
    else{
        $message = "<table style='font-family: arial, sans-serif;border-collapse: collapse;width: 100%;'>
        <tr>
        <td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'><b>Sender Name</b></td>
        <td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>".$name."</td>
        </tr>
        <tr style='background-color: #dddddd;'>
        <td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'><b>Sender Email</b></td>
        <td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>".$email."</td>
        </tr>
        <tr>
        <td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'><b>Phone</b></td>
        <td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>".$phone."</td>
        </tr>
        <tr style='background-color: #dddddd;'>
        <td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'><b>Message</b></td>
        <td style='border: 1px solid #dddddd;text-align: left;padding: 8px;'>".$message."</td>
        </tr>
        </table>";
        $recip = "csecourse02@gmail.com";
        
        //sending email
        function mail_send($recip, $message)
        {
        //Create instance of PHPMailer
        $mail = new PHPMailer(true);
        //Set mailer to use smtp
        $mail->isSMTP();
        //Define smtp host
        $mail->Host = "smtp.gmail.com";
        //Enable smtp authentication
        $mail->SMTPAuth = true;
        //Set smtp encryption type (ssl/tls)
        $mail->SMTPSecure = "tls";
        //Port to connect smtp
        $mail->Port = "587";
        //Set gmail username
        $mail->Username = "csecourse02@gmail.com";
        //Set gmail password
        $mail->Password = 'tmtdbhznawrebsrk';
        //Email subject
        $mail->Subject = "New Message Arrived";
        //Set sender email
        $mail->setFrom('csecourse02@gmail.com');
        //Enable HTML
        $mail->isHTML(true);
        //Attachment
        //$mail->addAttachment('img/attachment.png');
        //Email body
        $mail->Body = $message;
        //Add recipient
        $mail->addAddress($recip);
        //Finally send email
        if ($mail->send()) {
            header("location:index.php?success");
        } else {
            header('location:index.php?error');
        }

        //Closing smtp connection
        $mail->smtpClose();
        }

        mail_send($recip, $message);
    }
}
else
    {
        header("location:index.php");
    }

?>