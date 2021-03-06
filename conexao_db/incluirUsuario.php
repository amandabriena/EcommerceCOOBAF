<?php
    include_once("conexao.php");
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    session_start();

    $verifica = mysqli_query($connect,"SELECT * FROM usuario WHERE email ='$email' OR cpf = '$cpf'");
    if(mysqli_num_rows($verifica)>0){
        $_SESSION['erro'] = "sim";
        header('location:../cadastro.php');
    }else{
        $query = "INSERT INTO usuarios(id_usuario, cpf, nome, senha, email, status, telefone) VALUES (NULL, '$cpf', '$nome', '$senha', '$email', 1, '$telefone')";
        $insert = mysqli_query($connect,$query);
        if($insert){
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $nome;
            unset($_SESSION['erro']);
            header('location:../produtos.php');
        }else{
            header('location:../404.php');
        }
    }
    
?>