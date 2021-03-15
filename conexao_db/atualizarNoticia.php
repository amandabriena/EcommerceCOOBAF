<?php
    include_once("conexao.php");
    include_once("incluirImagem.php");

    $id_noticia = $_POST['id_noticia'];
    $titulo = $_POST['titulo'];
    $corpo = $_POST['corpo'];
    $data = $_POST['data'];
    $imagem = $_POST['imagem'];

    if(isset($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }

    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome_arq = $_FILES[ 'arquivo' ][ 'name' ];
    $destino = incluirImagem($nome_arq, $arquivo_tmp);

    if($destino == 0){
        $destino = $imagem;
    }
    
    //Inclusao da Imagem do Produto
   
    session_start();
    $query = "UPDATE noticia SET  titulo = '$titulo', corpo = '$corpo', imagem = '$destino', 
    data = '$data', status = '$status'  where id_noticia = '$id_noticia'";

    $update = mysqli_query($connect,$query);
    if($update){
        $_SESSION['mensagem'] = "atualizar";
       header('location:../ger_noticias.php');
    }else{
        header('location:../404.php');
    }
    
?>