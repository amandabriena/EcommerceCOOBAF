<?php
session_start();

function add_carrinho($produto, $quantidade){
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
/*
add_carrinho('pd1', 1);
add_carrinho('pd2', 3);
add_carrinho('pd3', 4);
add_carrinho('pd2', 10);
add_carrinho('pd3', 10);
add_carrinho('pd1', 10);
add_carrinho('pd2', 10);
add_carrinho('pd1', 10);
add_carrinho('pd1', 100);

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

<table class="table"> 
    <tr>
      <th>Name</th>
      <th>City</th>
    </tr>
     <?php for($i = 0 ; $i < count($_SESSION['carrinho']) ; $i=$i+2) {
         //console.log();
        echo '<tr> <td>'.$_SESSION['carrinho'][$i].'</td>';
        echo '<td>'.$_SESSION['carrinho'][$i+1].'</td></tr>';
     }  ?>
</table>
