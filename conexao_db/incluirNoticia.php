<?php
    include_once("conexao.php");

    $titulo = $_POST['titulo'];
    $corpo = $_POST['corpo'];
    //$imagem = $_POST['imagem_noticia'];
    $imagem = "x";
    $data = $_POST['data'];
    if(isset($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }
    session_start();
    
    $query = "INSERT INTO noticia(id_noticia, titulo, corpo, imagem, data, status) VALUES (NULL, '$titulo', '$corpo', '$imagem', '$data', '$status')";
    $insert = mysqli_query($connect,$query);
    if($insert){
        $_SESSION['erro'] = "nao";
        header('location:../noticias.php');
    }else{
        //$_SESSION['erro'] = "sim";
        echo mysqli_error($connect);
        //header('location:../404.php');
    }
    
?>