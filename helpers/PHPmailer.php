<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../PHPMailer/Exception.php';
require_once __DIR__ . '/../PHPMailer/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer/SMTP.php';

class PHPmailers {
    public static function enviarCode($email, $codigo) {
        
        try {
            
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'skywayturismos@gmail.com';
        $mail->Password = 'nonl aqot gdjz vzdr';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('skywayturismos@gmail.com', 'Calmaturnos');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Codigo de verificacon de cuenta';
        $mail->Body = "Tu codigo de verificacion es <b>$codigo</b>";

        $mail->send();

        } catch (Exception $e) {
            error_log("Error al enviar correo: " . $mail->ErrorInfo);
        }
    }
}
?>