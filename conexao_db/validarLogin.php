<?php
    include_once("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    session_start();
    $verifica = mysqli_query($mysqli,"SELECT * FROM usuario WHERE email =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");
    if(mysqli_num_rows($verifica)>0){
        $_SESSION['email'] = $email;
        header('location:../sobre.php');
    }else{
        unset ($_SESSION['email']);
        echo  "<script>alert('Os dados estão incorretos!');</script>";
    }

?>