<?php
function adicionar_produto($produto, $quantidade){
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
        array_push($_SESSION['carrinho'], $produto, $quantidade);  
    }else{
        $posicao = array_search($produto, $_SESSION['carrinho']);
        if(!empty($posicao) or $posicao === 0){
            $quant = $_SESSION['carrinho'][$posicao+1];
            $quantidade = $quantidade + $quant;
            $_SESSION['carrinho'][$posicao+1] = $quantidade;
        }else{
            array_push($_SESSION['carrinho'],$produto,$quantidade);
        }
        
    }
}

function atualizar_quantidade($produto, $quantidade){
    $posicao = array_search($produto, $_SESSION['carrinho']);
    $_SESSION['carrinho'][$posicao+1] = $quantidade;
}

/*
function adicionar_produto($id_produto){
    foreach ($_SESSION['carrinho'] as &$value){
        if ($id_produto == $value){
            //adicionar mais um na qnt
        }else $_SESSION['carrinho'][] = $id_produto;
    }
    session_destroy();
    

}
*/
?>