<?php
$nova_quantidade = $_POST['nova_quantidade'];
$produto = $_POST['id_produto'];

function atualizar_quantidade($produto, $quantidade){
    $posicao = array_search($produto, $_SESSION['carrinho']);
    $_SESSION['carrinho'][$posicao+1] = $quantidade;
}

?>