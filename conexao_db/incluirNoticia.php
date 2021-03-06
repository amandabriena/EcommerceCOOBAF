<?php
    include_once("conexao.php");

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];
    $data = $_POST['data'];

    session_start();
    
    $query = "INSERT INTO noticia(id_noticia, titulo, descricao, imagem, data, status) VALUES (NULL, '$titulo', '$descricao', '$imagem', '$data', 1')";
    $insert = mysqli_query($connect,$query);
    if($insert){
        $_SESSION['erro'] = "nao";
        header('location:../noticias.php');
    }else{
        $_SESSION['erro'] = "sim";
        header('location:../404.php');
    }
    
?>