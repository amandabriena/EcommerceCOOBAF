<?php
include_once("conexao.php");
include_once("email.php");

$id_pedido = $_POST['id_pedido'];
$motivo = "";

$assunto = "Nova atualização no seu pedido COOBAF/FS!";

if(isset($_POST["cancelar_pedido"])){
    $novo_status = 4;
    $motivo = "O PEDIDO FOI CANCELADO! </br> Motivo do cancelamento: </br>".$_POST["motivo_cancel"];
    $id_usuario = $_POST['id_usuario'];
    $query = "INSERT INTO mensagem_pedido(id_mensagem, id_pedido, id_usuario, mensagem) 
        VALUES (NULL, '$id_pedido', '$id_usuario', '$motivo')";
    $insert = mysqli_query($connect,$query);
    $corpo = "Olá! </br>
    O pedido ".$id_pedido." foi cancelado! :( </br>
    <strong>Motivo do cancelamento:</strong></br>
    ".$_POST["motivo_cancel"]."</br></br>
    <strong>Para mais informações acesse https://coobaf-fsa.000webhostapp.com/pedido.php?pedido=".$id_pedido."</strong>";

}else if(isset($_POST["finalizar_pedido"])){ 
    $novo_status = 3;
    $corpo = "Olá! </br>
    O pedido ".$id_pedido." foi entregue! :) </br>
    <strong>Para mais informações acesse agora: https://coobaf-fsa.000webhostapp.com/pedido.php?pedido=".$id_pedido."</strong>";
}else{
    $novo_status = 2;
    $corpo = "Olá! </br>
    O pedido ".$id_pedido." foi aceito! :) </br>
    <strong>Para mais informações acesse agora https://coobaf-fsa.000webhostapp.com/pedido.php?pedido=".$id_pedido."</strong>";
}

$query = "UPDATE pedido SET status = '$novo_status', motivo_cancelamento = '$motivo'  where id_pedido = '$id_pedido'";
$update = mysqli_query($connect,$query);

//buscando o email do cliente do pedido:
$resultado = mysqli_query($connect,"SELECT email FROM usuarios where id_usuario = '$id_usuario'");
$row = mysqli_fetch_assoc($resultado);
$destinatario = $row['email'];

if($update){
    enviarEmail($destinatario, $assunto, $corpo);
    enviarEmail("coobaf.feira@gmail.com", $assunto,$corpo);
    header('location:../pedido.php?pedido='.$id_pedido);
}else{
    header('location:../404.php');
}

?>