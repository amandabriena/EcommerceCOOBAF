<?php

function adicionar_produto($id_produto){
    foreach ($_SESSION['carrinho'] as &$value) {
        if ($id_produto == $value){
            //adicionar mais um na qnt
        }else $_SESSION['carrinho'][] = $id_produto;
    }

    

}

/*
foreach($_SESSION['carrinho'] as $list):
    echo $list;
endforeach;*/

?>