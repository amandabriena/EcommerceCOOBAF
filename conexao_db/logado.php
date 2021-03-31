<?php
    include_once("conexao.php");
    if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
    if(isset($_SESSION['email'])){
        $logado = $_SESSION['email'];
    }else{
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        $_SESSION['erro'] = "erro_login";
        header('location:login.php');
    }
?>