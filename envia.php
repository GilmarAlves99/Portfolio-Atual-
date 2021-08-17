<?php
date_default_timezone_set('America/Sao_Paulo');
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST)) {







    $mail = new PHPMailer(true);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $data = date('d/m/Y H:i:s');

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
   



        $mail->Username = '';
        $mail->Password = '';

        $mail->Port = 587;

        $mail->setFrom('');
        $mail->addAddress('');
        $mail->CharSet = 'UTF-8';

        $mail->isHTML(true);
        $mail->Subject = 'Mensagem do meu Site';
        $mail->Body = "Nome: {$nome} <br>
                   Email : {$email}<br>
                   mensagem : {$mensagem}<br>
                   data/hora : {$data}<br>";

        $mail->AltBody = 'Chegou o email teste do SITE';

        if ($mail->send()) {
            echo 'Email enviado com sucesso';
        } else {
            echo 'Email nao enviado';
        }
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
} else {
    echo "Informe todos os campos";
}
