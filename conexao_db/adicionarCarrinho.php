<?php

function adicionar_produto($id_produto){
    $_SESSION['carrinho'][] = $id_produto;

}

/*
foreach($_SESSION['carrinho'] as $list):
    echo $list;
endforeach;*/

?>