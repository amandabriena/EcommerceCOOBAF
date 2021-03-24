<?php

function atualizar_status($id_pedido, $novo_status){
    include_once("conexao.php");
    
    $query = "UPDATE pedido SET status = '$status'  where id_pedido = '$id_pedido'";
    $update = mysqli_query($connect,$query);
    if($update){
        $_SESSION['mensagem'] = "atualizar";
       header('location:../ger_noticias.php');
    }else{
        header('location:../404.php');
    }
}


?>