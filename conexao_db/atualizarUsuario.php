<?php
    include_once('conexao.php');
    session_start();
    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    $id_endereco = $_POST['id_endereco'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua']; 
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $numero = $_POST['numero'];
    $logradouro = $_POST['logradouro'];

    $query = "UPDATE usuarios SET  nome = '$nome', email = '$email', cpf = '$cpf', telefone = '$telefone'
    where id_usuario = '$id_usuario'";

    $update = mysqli_query($connect,$query);

    $query = "UPDATE endereco SET  cep = '$cep', rua = '$rua', bairro = '$bairro', cidade = '$cidade',
    uf = '$uf', numero = '$numero', logradouro = '$logradouro' where id_endereco = '$id_endereco'";

    $update = mysqli_query($connect,$query);

    if($update){
        $_SESSION['mensagem'] = "atualizar";
        $_SESSION['email'] = $email;
        if (isset($_SESSION['cooperado'])){
            header('location:../cooperado.php');
        }else{
            header('location:../atualizar_usuario.php');
        }
        
    }else{
        echo mysqli_error($connect);
    }


?>