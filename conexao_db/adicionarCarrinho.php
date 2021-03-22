<?php
session_start();
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

adicionar_produto(1,1);
adicionar_produto(2,1);
//adicionar_produto(3,1);
//adicionar_produto(2,1);
//atualizar_quantidade(2,1);


for($i = 0 ; $i < count($_SESSION['carrinho']) ; $i=$i+1){
    echo "Produto:".$_SESSION['carrinho'][$i];
    echo " QT:".$_SESSION['carrinho'][$i+1];
    echo "</br>";
    
}

?>