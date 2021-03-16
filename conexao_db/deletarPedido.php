<?php
    include_once('conexao.php');
    session_start();
    $id_pedido = $_POST['id_pedido'];

    $query = "UPDATE pedido SET status = 4 where id_pedido = '$id_pedido'";
    $delete = mysqli_query($connect,$query);

    if($delete){
        $_SESSION['mensagem'] = "excluir";
        header('location:../ger_pedidos.php');
    }else{
        echo mysqli_error($connect);
    }
?>