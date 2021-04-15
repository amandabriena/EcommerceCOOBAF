<?php



// Importar as classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/PHPMailer/src/Exception.php';
require '../src/PHPMailer/src/PHPMailer.php';
require '../src/PHPMailer/src/SMTP.php';
 

function enviarEmail($destinatario, $assunto, $corpo){
    // Instância da classe
    $mail = new PHPMailer(true);
        // Configurações do servidor
        $mail->isSMTP();        //Devine o uso de SMTP no envio
        $mail->SMTPAuth = true; //Habilita a autenticação SMTP
        $mail->Username   = 'amandabriena@hotmail.com';
        $mail->Password   = 'aMANDA1998*';
        // Criptografia do envio SSL também é aceito
        $mail->SMTPSecure = 'tls';
        // Informações específicadas pelo Google
        $mail->Host = 'smtp.live.com';
        $mail->Port = 587;
        // Define o remetente
        $mail->setFrom('amandabriena@hotmail.com', 'COOBAF-FS');
        // Define o destinatário
        $mail->addAddress($destinatario, 'Destinatário');
        // Conteúdo da mensagem
        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
        $mail->Subject = $assunto;
        $mail->Body    = $corpo;
        //$mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
        // Enviar
        $mail->send();
        }

        

?>