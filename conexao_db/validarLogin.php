<?php
    include_once("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    session_start();
    $usuario = mysqli_query($connect,"SELECT * FROM usuarios WHERE email =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");
    $row = mysqli_fetch_array($usuario);
    if(mysqli_num_rows($usuario)>0){
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $row['nome'];
        unset($_SESSION['erro']);
        //Verificando se o usuário é cooperado ou cliente para redirecionamento da página
        if($row['tipo_usuario']==0){
            $_SESSION['cooperado'] = "S";
            header('location:../cooperado.php');
        }else{
            header('location:../produtos.php');
        }
       
    }else{
        unset ($_SESSION['email']);
        $_SESSION['erro'] = "sim";
        header('location:login.php');
    }

?>