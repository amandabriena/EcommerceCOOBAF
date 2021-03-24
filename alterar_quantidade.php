<?php
session_start();
include_once('src/functions/funcoes_carrinho.php');

$quantidade = $_POST['nova_quantidade'];
$id_produto = $_POST['id_produto'];

alterar_quantidade($id_produto , $quantidade);

$total = total_carrinho();

echo $total;

?>