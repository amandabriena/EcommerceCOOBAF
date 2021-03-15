<?php
    include_once('conexao.php');
    session_start();
    $id_produto = $_POST['id_produto'];

    $query = "UPDATE produto SET visibilidade = 0 where id_produto = '$id_produto'";
    $delete = mysqli_query($connect,$query);

    if($delete){
        $_SESSION['mensagem'] = "excluir";
        header('location:../ger_produtos.php');
    }else{
        echo mysqli_error($connect);
    }


?>