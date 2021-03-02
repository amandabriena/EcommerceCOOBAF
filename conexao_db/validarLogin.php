<?php
    include_once("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    session_start();
    $verifica = mysqli_query($connect,"SELECT * FROM usuario WHERE email =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");
    if(mysqli_num_rows($verifica)>0){
        $_SESSION['email'] = $email;
        unset($_SESSION['erro']);
        header('location:../produtos.php');
    }else{
        unset ($_SESSION['email']);
        $_SESSION['erro'] = "sim";
        header('location:../login.php');
    }

?>