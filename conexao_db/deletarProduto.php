<?php
    include_once('conexao.php');

    $id_produto = $_POST['id_produto'];

    $query = "UPDATE produto SET status=0 where id_produto = '$id_produto'";
    $inativar = mysqli_query($connect,$query);

    if($inativar){
        header('location:../ger_produtos.php');
    }else{
        echo mysqli_error($connect);
    }


?>