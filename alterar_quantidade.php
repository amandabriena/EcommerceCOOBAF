<?php
session_start();

$quantidade = $_POST['nova_quantidade'];
$produto = $_POST['id_produto'];

$posicao = array_search($produto, $_SESSION['carrinho']);
$_SESSION['carrinho'][$posicao+1] = $quantidade;

?>