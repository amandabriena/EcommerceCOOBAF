<?php
    include_once("conexao.php");
    include_once("incluirImagem.php");
    $titulo = $_POST['titulo'];
    $corpo = $_POST['corpo'];
    $data = $_POST['data'];
    if(isset($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }
    //Inclusao da Imagem do Produto
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome_arq = $_FILES[ 'arquivo' ][ 'name' ];
    $destino = incluirImagem($nome_arq, $arquivo_tmp);
    session_start();
    
    $query = "INSERT INTO noticia(id_noticia, titulo, corpo, imagem, data, status) VALUES (NULL, '$titulo', '$corpo', '$destino', '$data', '$status')";
    $insert = mysqli_query($connect,$query);
    if($insert){
        $_SESSION['erro'] = "nao";
        header('location:../ger_noticias.php');
    }else{
        //$_SESSION['erro'] = "sim";
        echo mysqli_error($connect);
        //header('location:../404.php');
    }
    
?>