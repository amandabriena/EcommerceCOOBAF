<?php
    include_once("conexao.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['email']) &&  isset($_SESSION['cooperado'])){
        $logado = $_SESSION['email'];
    }else{
        $_SESSION['erro'] = "erro_login";
        header('location:login.php');
    }
?>