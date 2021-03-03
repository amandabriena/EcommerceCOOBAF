<?php
    include_once("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    session_start();
    $nome = mysqli_query($connect,"SELECT * FROM usuario WHERE email =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");
    $row = mysqli_fetch_array($nome);
    if(mysqli_num_rows($nome)>0){
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $row['nome'];
        unset($_SESSION['erro']);
        header('location:../cooperado.php');
    }else{
        unset ($_SESSION['email']);
        $_SESSION['erro'] = "sim";
        header('location:../login.php');
    }

?>