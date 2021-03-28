<?php

$id_produto = 1;


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Função para adicionar produto ao carrinho:
function add_carrinho($produto, $quantidade){
    //Caso o carrinho esteja sendo inicializado
    if(!isset($_SESSION['carrinho']['id'])){
        $_SESSION['carrinho']['id'][] = $produto;
        $_SESSION['carrinho']['qt'][] = $quantidade; 
    }else{
        //verificando se o produto já está no carrinho para somar a sua quantidade
        $posicao = buscar_carrinho($produto);
        if($posicao != null or $posicao === 0){
            $quantidade_anterior = $_SESSION['carrinho']['qt'][$posicao];
            $nova_quantidade = $quantidade + $quantidade_anterior;
            $_SESSION['carrinho']['qt'][$posicao] = $nova_quantidade;
        }else{
            //caso não esteja, o novo produto e sua quantidade são adicionados ao carrinho
            $_SESSION['carrinho']['id'][] = $produto;
            $_SESSION['carrinho']['qt'][] = $quantidade;
        }
    }
}

//Função para buscar um produto no carrinho
function buscar_carrinho($id_produto){
    for($i = 0 ; $i < sizeof($_SESSION['carrinho']['id']) ; $i=$i+1) {
        if($_SESSION['carrinho']['id'][$i] == $id_produto){
            return $i;
        }
    }
    return null;
}

//Função para alterar a quantidade de um produto no carrinho
function alterar_quantidade($id_produto, $nova_quantidade){
    $posicao = buscar_carrinho($id_produto);
    $_SESSION['carrinho']['qt'][$posicao] = $nova_quantidade;
}

//Função para calcular preço * quantidade adicionada de um produto do carrinho
function total_preco_produto($id_produto, $quantidade){
    //return ($_SERVER["REQUEST_URI"]);
    if($quantidade == null){
        $posicao = buscar_carrinho($id_produto);
        $quantidade = $_SESSION['carrinho']['qt'][$posicao];
    }
    if($_SERVER["REQUEST_URI"] == "/EcommerceCOOBAF/conexao_db/incluirPedido.php"){
        require('conexao.php');
        $resultado = mysqli_query($connect,"SELECT preco FROM produto where id_produto = '$id_produto'");
        while($row = mysqli_fetch_assoc($resultado)){
            $total = floatval($row['preco']) * $quantidade;
            return $total;
        }
    }else{
        require('conexao_db/conexao.php');
        $resultado = mysqli_query($connect,"SELECT preco FROM produto where id_produto = '$id_produto'");
        while($row = mysqli_fetch_assoc($resultado)){
            $total = floatval($row['preco']) * $quantidade;
            return $total;
        }
    }
}

//Função para calcular o valor total da soma dos produtos do carrinho
function total_carrinho(){
    $total_carrinho = 0;
    for($i = 0 ; $i < sizeof($_SESSION['carrinho']['id']); $i=$i+1) {
        $total_carrinho = $total_carrinho + total_preco_produto(($_SESSION['carrinho']['id'][$i]),null);
    }
    return $total_carrinho;
}
function excluir_item_carrinho($id_produto){
    $posicao = buscar_carrinho($id_produto);
    for($i = $posicao ; $i < sizeof($_SESSION['carrinho']['id']) ; $i=$i+1) {
        if($i!=(sizeof($_SESSION['carrinho']['id'])-1)){
            $_SESSION['carrinho']['id'][$i] = $_SESSION['carrinho']['id'][$i+1];
            $_SESSION['carrinho']['qt'][$i] = $_SESSION['carrinho']['qt'][$i+1];
        }else{
            unset($_SESSION['carrinho']['id'][$i]);
            unset($_SESSION['carrinho']['qt'][$i]);
        }
    }

}

?>

