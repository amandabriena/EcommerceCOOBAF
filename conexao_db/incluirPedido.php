<?php

include_once("conexao.php");
include_once('../src/functions/funcoes_carrinho.php');
include_once('email.php');

//Buscando usuário do pedido
$email = $_SESSION['email'];
$usuario = mysqli_query($connect,"SELECT * FROM usuarios WHERE email =
'$email'");
$row = mysqli_fetch_array($usuario);
$id_usuario = $row['id_usuario'];
$nome_cliente = $row['nome'];
$telefone = $row['telefone'];

$valor_total = total_carrinho();

//Criando novo pedido
$query = "INSERT INTO pedido(id_pedido, id_usuario, valor_total, status) 
    VALUES (NULL, '$id_usuario', '$valor_total', 1)";


$insert = mysqli_query($connect,$query);
if($insert){
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
    unset($_SESSION['carrinho']);

    //Informações para envio de email do novo pedido
    $destinatario = "coobaf.feira@gmail.com";
    $assunto = "(ID Pedido: ".$id_pedido.") Novo Pedido de Compra na COOBAF/FS!";
    $corpo1 = "Novo Pedido de Compra realizado! </br>
              <strong>Dados do Pedido: </strong></br>
              ID Pedido: ".$id_pedido."</br>
              Data da Compra: ".date('d/m/Y H:i')."</br>
              Valor total: R$".$valor_total."</br>";
    
    $corpo2 ="<strong>Dados do Cliente: </strong> </br>
              Cliente: ".$nome_cliente."</br>
              E-mail: ".$email."</br>
              Telefone para contato: ".$telefone."</br>";
    $comp = "
              <strong>Para mais informações acesse: https://coobaf-fsa.000webhostapp.com/pedido.php?pedido=".$id_pedido."</strong>";
    //enviando email de aviso para a cooperativa e para o cliente
    enviarEmail($destinatario, $assunto, $corpo1.$corpo2.$comp);
    enviarEmail($email,$assunto,$corpo1.$comp);

    header('location:../pedido.php?pedido='.$id_pedido);
    exit();

}else header('location:../404.php');





?>