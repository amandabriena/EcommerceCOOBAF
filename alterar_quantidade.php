<?php
session_start();
include_once('src/functions/funcoes_carrinho.php');

$quantidade = $_POST['nova_quantidade'];
$produto = $_POST['id_produto'];

alterar_quantidade($produto, $quantidade);

?>