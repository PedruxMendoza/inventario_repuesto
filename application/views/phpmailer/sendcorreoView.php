<?php 

//Funcion que servira para generar la nueva contraseña
/***********************************************************/
/*function randomChars($str, $numChars){
    return substr(str_shuffle($str), 0, $numChars);
}*/
date_default_timezone_set('America/El_Salvador');

function randomCharsmin($str) {
    $charactersLength = strlen($str);
    $randomString = '';
    for ($i = 0; $i < 5; $i++) {
        $randomString .= $str[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function randomCharsuno($str) {
    $charactersLength = strlen($str);
    $randomString = '';
    for ($i = 0; $i < 1; $i++) {
        $randomString .= $str[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//CARACTERES QUE SE TOMARAN PARA GENERAR LA NUEVA CONTRASEÑA   
$min = 'abcdefghijklmnopqrstuvwxyz';
$num = '0123456789';
$may = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$raro = '!@^(){}';
//Se llama a la funcion para que tome 6 letras del string enviado y el resultado que devuelva se guardara
//en la variable nueva, dicha variable se enviara al usuario
$part1 = randomCharsmin($min);
$part2 = randomCharsuno($num);
$part3 = randomCharsuno($may);
$part4 = randomCharsuno($raro);

$nueva = $part1 . $part2 . $part3 . $part4;

/***********************************************************/



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;               // Configuracion para tratamiento de errores
    $mail->isSMTP();                                    // Protocolo de envio (SMTP)
    $mail->Host       = 'smtp.gmail.com';                // Colocamos el servicio de correo que usaremos (gmail)**
    $mail->SMTPAuth   = true;                            // Enable SMTP authentication
    $mail->Username   = 'correophpn2@gmail.com';         // ACCESO a la cuenta que se utilizara para enviar los correos**
    $mail->Password   = 'Correousaid';                   // Clave de la cuenta de correo**
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                             // TCP port to connect to

    //Recipients
    $mail->setFrom('correophpn2@gmail.com', 'Javier Henriquez');  //Desde donde se enviaran los correos**
    $mail->addAddress($email);    // Añadimos a quien se le enviara el correo**
    //$mail->addAddress('ellen@example.com');              // Agregamos mas addAddress si lo enviaremos a varios destinatarios
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true); // Set email format to HTML

    // Asunto del correo**                                  
    $mail->Subject = 'Recuperacion de cuenta!!'; 

    foreach ($usuario as $u) {
        $id = $u->id_usuario;
        
        $mail->Body    = 'Estimado '.$u->nombre.'!! <br><br>
        Este dia '.date('d-m-Y').', a las '.date('h:i').' ha solicitado la recuperacion de su cuenta, sus datos son:<br><br>
        Usuario: <b>'.$u->correo.'</b><br><br>
        Nueva clave: <b>'.$nueva.'</b><br><br>';  //Cuerpo del mensaje**
    }

//Llamamos al metodo para actualizar la nueva clave que le sera enviada al usuario en el correo
    $this->sendcorreoModel->cambiarclave($id,$nueva);
    
    $mail->send();
    redirect('/loginController/correo/okCorreo','refresh');
} catch (Exception $e) {
    redirect('/loginController/correo/errorEnviar','refresh');
}



?>