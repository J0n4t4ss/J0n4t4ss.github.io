<?php
date_default_timezone_set('America/Sao_Paulo')
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não informado';
$emal = isset($_POST['email']) ? $_POST['email'] : 'Não informado';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : 'Não informado';
$data = date('d/m/Y H:i:s')

if($emal && $mensagem){
    $mail = new PHPMailer(true);

try {
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'siteportfolioo@gmail.com';
	$mail->Password = '#';
	$mail->Port = 587;

	$mail->setFrom('siteportfolioo@gmail.com');
	$mail->addAddress('siteportfolioo@gmail.com');
	$mail->addAddress('siteportfolioo@gmail.com');

	$mail->isHTML(true);
	$mail->Subject = 'Assunto';
	$mail->Body = 'Nome : {$nome} <br>
                    E-mail : {$email} <br>
                    Mensagem : {$mensagem} <br>
                    Data/Hora : {$data}';

	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
} 
