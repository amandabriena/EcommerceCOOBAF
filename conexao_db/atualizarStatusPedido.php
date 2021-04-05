<?php
include_once("conexao.php");
$id_pedido = $_POST['id_pedido'];
$motivo = "";

if(isset($_POST["cancelar_pedido"])){
    $novo_status = 4;
    $motivo = "O PEDIDO FOI CANCELADO! </br> Motivo do cancelamento: </br>".$_POST["motivo_cancel"];
    $id_usuario = $_POST['id_usuario'];
    $query = "INSERT INTO mensagem_pedido(id_mensagem, id_pedido, id_usuario, mensagem) 
        VALUES (NULL, '$id_pedido', '$id_usuario', '$motivo')";
    $insert = mysqli_query($connect,$query);

}else if(isset($_POST["finalizar_pedido"])){ 
    $novo_status = 3;
}else{
    $novo_status = 2;
}

$query = "UPDATE pedido SET status = '$novo_status', motivo_cancelamento = '$motivo'  where id_pedido = '$id_pedido'";
$update = mysqli_query($connect,$query);
if($update){
    header('location:../pedido.php?pedido='.$id_pedido);
}else{
    header('location:../404.php');
}

?>