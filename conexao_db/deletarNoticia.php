<?php
    include_once('conexao.php');

    $id_noticia = $_POST['id_noticia'];

    session_start();

    $query = "UPDATE noticia SET visibilidade = 0 where id_noticia = '$id_noticia'";
    $delete = mysqli_query($connect,$query);

    if($delete){
        $_SESSION['mensagem'] = "excluir";
        header('location:../ger_noticias.php');
    }else{
        echo mysqli_error($connect);
    }


?>