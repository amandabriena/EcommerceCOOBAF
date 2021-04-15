<?php
include("conexao.php");
include_once("email.php");

$email = $_POST['email'];
$senha = uniqid();

$usuario = mysqli_query($connect,"SELECT * FROM usuarios WHERE email =
    '$email'") or die("erro ao selecionar");
    if(mysqli_num_rows($usuario)>0){
        $assunto = "(COOBAF/FS) SOLICITAÇÃO DE RECUPERAÇÃO DE SENHA";
        $corpo = "Olá! </br>
        Foi solicitado a recuperação de senha da sua conta Coobaf/fs. </br>
        <strong>Sua nova senha é:</strong>".$senha."</br>
        Acesse agora sua conta no site da COOBAF/FS pelo link: https://coobaf-fsa.000webhostapp.com/login.php
        </br></br>
        Não foi você? Acesse sua conta Coobaf/fs e verique seus dados!";
        $_SESSION['mensagem'] = "enviado";
        enviarEmail($email, $assunto, $corpo);
        header('location:../recuperar_senha.php');
    }else{
        $_SESSION['mensagem'] = "erro";
        header('location:../recuperar_senha.php');
    }
?>