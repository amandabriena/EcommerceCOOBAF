<?php
session_start();

function adicionar_produto($id_produto){
    $_SESSION['carrinho'][] = $id_produto;
    
}

?>