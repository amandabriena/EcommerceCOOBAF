<?php
include_once("email.php");

//if(isset($_POST['contato'])){
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email_envio = $_POST['email'];
$assunto = $_POST['assunto'];
$assunto = "Nova Mensagem de Contato COOBAF/FS - ".$assunto;
$corpo = $_POST['corpo'];

$mensagem = "Olá! </br>
    Você recebeu uma mensagem de ".$nome." via contato no site COOBAF/FS!</br>
    E-mail:".$email_envio."</br>
    Telefone: ".$telefone."</br>
    Mensagem:".$corpo;

$email = "coobaf.feira@gmail.com";


enviarEmail($email, $assunto, $mensagem);
header('location:../contato.php');
//exit();
?>