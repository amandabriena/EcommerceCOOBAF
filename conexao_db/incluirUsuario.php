<?php
    include_once("conexao.php");
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $numero = $_POST['numero'];
    $logradouro = $_POST['logradouro'];

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
        //inserindo o endereço no db
        $queryEndereco = "INSERT INTO endereco(id_endereco, rua, logradouro, numero, cidade, bairro, uf, cep) 
        VALUES(NULL,'$rua', '$logradouro', '$numero','$cidade','$bairro','$uf','$cep')";

        if ($resultado = mysqli_query($connect, $queryEndereco)) {
            //verificando qual o id gerado para o endereço
            $resultado = mysqli_query($connect, "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES 
             WHERE TABLE_SCHEMA = 'db_coobaf' AND TABLE_NAME = 'endereco';");
        
            $id_endereco = mysqli_fetch_assoc($resultado);
            $id_endereco = (int)$id_endereco['AUTO_INCREMENT']-1;
            echo $id_endereco;
            //inserindo usuario com o id_endereco
            $query = "INSERT INTO usuarios(id_usuario, cpf, nome, senha, email, status, telefone, tipo_usuario, id_endereco) 
            VALUES (NULL, '$cpf', '$nome', '$senha', '$email', 1, '$telefone', '$tipo_usuario', '$id_endereco')";

            $insert = mysqli_query($connect,$query);
            if($insert){
                $busca = mysqli_query($connect,"SELECT * FROM usuarios where email = '$email'");
                $row_user = mysqli_fetch_assoc($busca);

                $_SESSION['mensagem'] = "sim";
                unset($_SESSION['erro']);
                if(isset($_POST["cadastro_cliente"])){
                    $_SESSION['email'] = $email;
                    $_SESSION['nome'] = $nome;

                    $_SESSION['user'] = $row_user['id_usuario'];
                    header('location:../carrinho.php');
                    exit();
                }else{ 
                    header('location:../ger_cooperados.php');
                    exit();
                }
                
            }else{
                //echo mysqli_error($connect);
                header('location:../404.php');
            }

        } else echo mysqli_error($connect);
    }
    
?>