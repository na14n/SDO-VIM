<?php

require __DIR__ . '/../../../vendor/autoload.php';
use Core\Database;
use Core\App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$db = App::resolve(Database::class);

if (isset($_POST['send_recovery_email'])) {

    $user_email = trim($_POST['user_email']);

    $recipientQuery = $db->query(
        "SELECT u.user_name, u.user_id 
         FROM users u
         INNER JOIN school_contacts sc ON u.school_id = sc.school_id
         WHERE sc.contact_email = :user_email",
        ['user_email' => $user_email]
    )->find();
    
    $recipient = $recipientQuery['user_name'];
    $recipientID = $recipientQuery['user_id'];

    // HTML email message
    $message = '
            <html>
            <head>
                    <style>
                    .email-card {
                        border: 1px solid #ccc;
                        border-radius: 10px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        overflow: hidden;
                        font-family: Arial, sans-serif;
                    }
                    .email-card-header {
                        background-color: #003366;
                        color: white;
                        padding: 10px;
                        text-align: center;
                        font-size: 18px;
                    }
                    .email-card-body {
                        padding: 20px;
                        text-align:center; 
                    }
                    .email-card-body p {
                        margin: 0 0 10px;
                    }
                    .email-card-body a {
                        color: #003366;
                        text-decoration: none;
                    }
                    /* Inline styles for Bootstrap-like primary button */
                    .btn-primary {
                        display: inline-block;
                        padding: 10px 20px;
                        font-size: 16px;
                        font-weight: bold;
                        color: white;
                        background-color: #003366;
                        border: none;
                        border-radius: 5px;
                        text-decoration: none;
                        text-align: center;
                        cursor: pointer;
                    }
                    .btn-primary:hover {
                        background-color: #0056b3;
                    }
                </style>
            </head>
            <body>
                <div class="email-card">
                    <div class="email-card-header">
                        Password Reset
                    </div>
                    <div class="email-card-body">
                        <p>Hi <strong>' . $recipient . '</strong>,</p>
                        <p>Your request has been received. Please click the button below to reset your password:</p>
                        <a href="http://localhost:8888/set-new-password/' . $recipientID . '"><button class="btn-primary">Set a new password</button></a>
                        <p>If you did not request a password change, kindly disregard this email.</p>
                        <p>Regards,<br>SDO Valenzuela - ICT Coordinator</p>
                    </div>
                </div>
            </body>
            </html>';

    // Set up PHPMailer
    $mail = new PHPMailer;

    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                         
    $mail->Username = 'sdovalenzuelainventory@gmail.com'; 
    $mail->Password = 'bhwgdknfejfjibyl';                          
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                           
    $mail->Port = 587;   

    $mail->From = 'SDO_Valenzuela@sdovim.com';
    $mail->FromName = 'SDO Valenzuela - ICT Coordinator';
    $mail->addAddress($user_email, $recipient);

    // Set email format to HTML
    $mail->isHTML(true);

    $mail->Subject = 'Password Reset';
    $mail->Body    = $message;

    // Send email and handle response
    if($mail->send()) {
        toast('Recovery Email Sent. Please Check your Email.');
        redirect('/');
        exit;
    } else {
        toast('Recovery Email Not Sent. Please contact the ICT Coordinator.');
        redirect('/');
        exit;
    }
}

?>
