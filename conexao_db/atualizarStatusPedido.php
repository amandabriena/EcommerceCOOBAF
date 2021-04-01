<?php
include_once("conexao.php");
$id_pedido = $_POST['id_pedido'];

if(isset($_POST["cancelar_pedido"])){
    $novo_status = 4;
}else if(isset($_POST["finalizar_pedido"])){ 
    $novo_status = 3;
}else{
    $novo_status = 2;
}

$query = "UPDATE pedido SET status = '$novo_status'  where id_pedido = '$id_pedido'";
$update = mysqli_query($connect,$query);
if($update){
    header('location:../pedido.php?pedido='.$id_pedido);
}else{
    header('location:../404.php');
}

?>