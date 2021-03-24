<?php

include_once("conexao.php");
include_once('../src/functions/funcoes_carrinho.php');
//Buscando usuário do pedido
//session_start();
$email = $_SESSION['email'];
$usuario = mysqli_query($connect,"SELECT * FROM usuarios WHERE email =
'$email'");
$row = mysqli_fetch_array($usuario);
$id_usuario = $row['id_usuario'];

$valor_total = total_carrinho();

//Criando novo pedido
$query = "INSERT INTO pedido(id_pedido, id_usuario, valor_total, status) 
    VALUES (NULL, '$id_usuario', '$valor_total', 2)";


$insert = mysqli_query($connect,$query);
if($insert){
    echo 'inseriu?';
    //buscando ID do pedido recém cadastrado:
    $resultado = mysqli_query($connect, "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES 
    WHERE TABLE_SCHEMA = 'db_coobaf' AND TABLE_NAME = 'pedido';");
    $id_pedido = mysqli_fetch_assoc($resultado);
    $id_pedido = (int)$id_pedido['AUTO_INCREMENT'] - 1;

    //inserindo produtos no pedido contido na sessão:
    for($i = 0 ; $i < sizeof($_SESSION['carrinho']['id']) ; $i=$i+1) {
        $id_produto = $_SESSION['carrinho']['id'][$i];
        $quantidade = $_SESSION['carrinho']['qt'][$i];
        $valor_item = total_preco_produto($id_produto, $quantidade);
        
        $query = "INSERT INTO item_pedido(id_item_pedido, id_pedido, id_produto, quantidade, valor_item) 
        VALUES (NULL, '$id_pedido', '$id_produto', '$quantidade', '$valor_item')";
        mysqli_query($connect,$query);
    }
    header('location:../pedido.php?pedido='.$id_pedido.'.php');

}else header('location:../404.php');





?>