<?php
    include_once("conexao.php");
    session_start();
    if(isset($_SESSION['email']) &&  $_SESSION['cooperado']){
        $logado = $_SESSION['email'];
    }else{
        $_SESSION['erro'] = "erro_login";
        header('location:login.php');
    }
?>