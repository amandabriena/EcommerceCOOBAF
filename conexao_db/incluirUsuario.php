<?php
    include_once("conexao.php");
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    if(isset($_POST["cadastro_cliente"])){
        $tipo_usuario = 1;
    }else{ 
        $tipo_usuario = 0;
    }

    session_start();

    $verifica = mysqli_query($connect,"SELECT * FROM usuarios WHERE email ='$email' OR cpf = '$cpf'");
    if(mysqli_num_rows($verifica)>0){
        $_SESSION['erro'] = "sim";
        header('location:../cadastro.php');
    }else{
        $query = "INSERT INTO usuarios(id_usuario, cpf, nome, senha, email, status, telefone, tipo_usuario) 
        VALUES (NULL, '$cpf', '$nome', '$senha', '$email', 1, '$telefone', '$tipo_usuario')";
        $insert = mysqli_query($connect,$query);
        if($insert){
            $_SESSION['sucesso'] = "sim";
            unset($_SESSION['erro']);
            if(isset($_POST["cadastro_cliente"])){
                $_SESSION['email'] = $email;
                $_SESSION['nome'] = $nome;
                header('location:../produtos.php');
            }else{ 
                header('location:../ger_cooperados.php');
            }
            
        }else{
            header('location:../404.php');
        }
    }
    
?>