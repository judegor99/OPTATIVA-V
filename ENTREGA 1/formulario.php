<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


    $message= isset($_POST['message'])? $_POST['message']:'';
    $email= isset($_POST['email'])? $_POST['email']:'';
    $connect = mysqli_connect('db4free.net', 'user_admon', 'Julian12345**', 'bd_form');
    $email_error = "";
    $message_error = "";
    $errors = "";
// si la variable fue instanciada 
    if (count($_POST))
    {
        $errors = 0;
        
        if ($_POST["email"] == '')
        {
            $email_error = 'Por favor ingrese un email valido';
            $errors ++;
        }
            if($_POST["message"]== '')
        {
            $message_error = "Por favor ingrese informacion para continuar";
            $errors ++;
        }

        if ($errors == 0)
        {
            $query ='INSERT INTO  contact(
                
                email,
                mensaje
            )VALUES("'.addslashes($_POST ['email']).'",
                    "'.addslashes($_POST ['message']).'"

            )';
            mysqli_query($connect,$query);

            $mail = new PHPMailer(true);
            
            try {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '07955b369c827f';
                $mail->Password = 'dd227507aa8d0f';

                // Puerto SMTP
            
                #$mail->SMTPOptions = ['ssl'=> ['allow_self_signed' => true]];  // Descomentar si el servidor SMTP tiene un certificado autofirmado
                #$mail->SMTPSecure = false;				// Descomentar si se requiere desactivar cifrado (se suele usar en conjunto con la siguiente línea)
                #$mail->SMTPAutoTLS = false;			// Descomentar si se requiere desactivar completamente TLS (sin cifrado)
             
                $mail->setFrom('remitente@midominio.com');		// Mail del remitente
                $mail->addAddress($email);     // Mail del destinatario
             
                $mail->isHTML(true);
                $mail->Subject = 'Contacto desde formulario';  // Asunto del mensaje
                $mail->Body    = $message;    // Contenido del mensaje (acepta HTML)
                $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
             
                $mail->send();
                echo 'El mensaje ha sido enviado';
            } catch (Exception $e) {
                echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
            }


            header('Location: respuesta.html');
            die();


                
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title> FORMULARIO DE PHP </Title>
</head>

<body>
    <h1>php contact form</h1>

    <form method="post" action="">

    email adress:
    <br>
    <input type="text" name="email" value="">
    <?php echo $email_error; ?>
    <br><br>

    Message:
    <br>
    <textarea name="message"> <?php echo $message_error; ?> </textarea>
    <?php echo $email_error ?>
    <br><br>
    <input type="submit" value="Submit">

    </form>

</body>

</html>