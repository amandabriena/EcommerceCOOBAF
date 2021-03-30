<?php
include("conexao.php");
$mensagem = $_POST['mensagem'];
$id_usuario = $_POST['id_usuario'];
$id_pedido = $_POST['id_pedido'];

$query = "INSERT INTO mensagem_pedido(id_mensagem, id_pedido, id_usuario, mensagem) 
        VALUES (NULL, '$id_pedido', '$id_usuario', '$mensagem')";

$insert = mysqli_query($connect,$query);

if($insert){
    header('location:../pedido.php?pedido='.$id_pedido.'.php');
}else header('location:../404.php');

?>