<?php
include("conexao.php");
include_once("email.php");

session_start();

$mensagem = $_POST['mensagem'];
$id_usuario = $_POST['id_usuario'];
$id_pedido = $_POST['id_pedido'];
$usuario = $_SESSION['nome'];

$query = "INSERT INTO mensagem_pedido(id_mensagem, id_pedido, id_usuario, mensagem) 
        VALUES (NULL, '$id_pedido', '$id_usuario', '$mensagem')";

$insert = mysqli_query($connect,$query);

if($insert){
    //enviando email informando a nova mensagem:
    $assunto = "Nova mensagem no pedido ".$id_pedido."!";
    
    $corpo = "Olá, </br>
    Você rebebeu uma mensagem de ".$usuario." no pedido ".$id_pedido.".</br>
    <strong>Mensagem:</strong>
    ".$mensagem."</br>
    Para mais informações acesse: https://coobaf-fsa.000webhostapp.com/pedido.php?pedido=".$id_pedido;

    if(isset($_SESSION['cooperado'])){
        $resultado = mysqli_query($connect,"SELECT email FROM usuarios where id_usuario = '$id_usuario'");
        $row = mysqli_fetch_assoc($resultado);
        $email = $row['email'];
    }else{
        $email = "coobaf.feira@gmail.com";
    }
    
    enviarEmail($email, $assunto, $corpo);
    header('location:../pedido.php?pedido='.$id_pedido);

}else header('location:../404.php');

?>