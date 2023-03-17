<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
188;

$email = new PHPMailer();
try{

    $email = new PHPMailer();
    $email->isSMTP();
    $email->Host = 'smtp.mailtrap.io';
    $email->SMTPAuth = true;
    $email->Port = 2525;
    $email->Username = '07955b369c827f';
    $email->Password = 'dd227507aa8d0f';

    $email->setFrom('juligrios1999@gmail.com');
    $email->addAddress('juligrios1999@gmail.com');

    $email->isHTML(true);
    $email->Subject ='contacto desde el formulario';
    $email->Body    ='este es el contenido del mensaje <b>en negrita!</b>1';
    $email->AltBody ='Este es el contenido del mensaje en texto plano';

    $email->send();
    echo'El mensaje ha sido enviado';
    }catch(Exception $e) {
        echo'el mensaje no se a podido enviar',$email->ErrorInfo;
    }

?>