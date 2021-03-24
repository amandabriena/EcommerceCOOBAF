<?php
include_once('src/functions/funcoes_carrinho.php');

$id_produto = $_POST['id_item'];

excluir_item_carrinho($id_produto);

header('location:carrinho.php');

?>