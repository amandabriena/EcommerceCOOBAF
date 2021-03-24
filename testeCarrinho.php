<?php session_start();

include_once('src/functions/funcoes_carrinho.php');
//excluir_item_carrinho(1);
/*$total = total_preco(1);
echo $total;
*/?>
<table class="table"> 
    <tr>
      <th>ID</th>
      <th>QUANT</th>
      
    </tr>
     <?php for($i = 0 ; $i < sizeof($_SESSION['carrinho']['id']) ; $i=$i+1) {
        $id_produto = $_SESSION['carrinho']['id'][$i];
        echo '<tr> <td>'.$_SESSION['carrinho']['id'][$i].'</td>';
        echo '<td>'.$_SESSION['carrinho']['qt'][$i].'</td>';
        //echo '<td>'.total_preco_produto($id_produto, null).'</td></tr>';
     }  ?>
</table> <?php echo total_preco_produto($id_produto, null);

?>
<?php 
/*

/*
add_carrinho('pd1', 1);
add_carrinho('pd2', 3);
add_carrinho('pd2', 10);
add_carrinho('pd1', 10);
add_carrinho('pd2', 10);
add_carrinho('pd1', 10);
add_carrinho('pd1', 10);
add_carrinho('pd2', 10);
add_carrinho('pd3', 10);
add_carrinho('pd2', 10);
add_carrinho('pd2', 10);
add_carrinho('pd3', 10);

<table class="table"> 
    <tr>
      <th>ID</th>
      <th>QUANT</th>
    </tr>
     <?php for($i = 0 ; $i < sizeof($_SESSION['carrinho']['id']) ; $i=$i+1) {
         //console.log();
        echo '<tr> <td>'.$_SESSION['carrinho']['id'][$i].'</td>';
        echo '<td>'.$_SESSION['carrinho']['qt'][$i].'</td></tr>';
     }  ?>
</table>

<?php
$busca = buscar_carrinho('pd2');
echo 'RESULTADO BUSCA: '.$busca?>

/*
$teste = array_search('pd1', $_SESSION['carrinho']);
if($teste==0){
    echo "zero";
    echo $teste;
}else{
    echo "diff";
    echo $teste;
} 
*/
?>