<?php
session_start();
$emailData = $_SESSION['emailData'];
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    //$mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output                                      // Send using SMTP
    $mail->Host       = 'mailout.one.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = 'info@cheffjeff.nl';                     // SMTP username
    $mail->Password   = 'Jeff@Orien18#mail';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@cheffjeff.nl');
    $mail->addAddress('info@cheffjeff.nl');     // Add a recipient

    $eMailPrep = buildEmail();

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $eMailPrep['eSub'];
    $mail->Body    = $eMailPrep['eBody'];
    $mail->AltBody = strip_tags($eMailPrep['eBody']);

    $mail->send();
    header("Location: /thanks");
} catch (Exception $e) {
    header("Location: /Pages/Contact.php?message=Een of meer velden hebben een error. Probeer het later nog eens.");
}

function buildEmail()
{
    $emailData = $_SESSION['emailData'];
    $items = [
        "Voornaam" => $emailData['voorNaam'],
        "Achternaam" => $emailData['achterNaam'],
        "email" => $emailData['email'],
        "Tel" => $emailData['tel'],
        "Bericht" => $emailData['Bericht']
    ];

    $logo = 'https://cheffjeff.nl/wordpress/wp-content/uploads/2020/07/Logo.png';

    $preEmail  = array();
    $eSub      = 'Contact bericht van '.$items['Voornaam'].'.';
    $eBody     = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/Pages/Templates/contactEmail.php');

    if (isset($items)){
        $eBody = str_replace(
            array('{logo}', '{voorNaam}', '{achterNaam}', '{email}', '{Tel}', '{bericht}'), 
            array($logo, $items['Voornaam'], $items['Achternaam'], $items['email'], $items['Tel'], $items['Bericht']),
            $eBody
        );
    }

    $preEmail['eSub'] = $eSub;
    $preEmail['eBody'] = $eBody;

    return $preEmail;
}