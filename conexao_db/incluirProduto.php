<?php
    include_once("conexao.php");
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];

    session_start();
    
    $query = "INSERT INTO produto(id_produto, nome, descricao, imagem, valor, tipo, status) VALUES (NULL, '$nome', '$descricao', '$imagem', '$valor', '$tipo', 1')";
    $insert = mysqli_query($connect,$query);
    if($insert){
        $_SESSION['erro'] = "nao";
        header('location:../produtos.php');
    }else{
        $_SESSION['erro'] = "sim";
        header('location:../404.php');
    }
    
?>