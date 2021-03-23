<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function add_carrinho($produto, $quantidade){
    if(!isset($_SESSION['carrinho']['id'])){
        $_SESSION['carrinho']['id'][] = $produto;
        $_SESSION['carrinho']['qt'][] = $quantidade; 
    }else{
        $posicao = buscar_carrinho($produto);
        if($posicao != null or $posicao === 0){
            $quantidade_anterior = $_SESSION['carrinho']['qt'][$posicao];
            $nova_quantidade = $quantidade + $quantidade_anterior;
            $_SESSION['carrinho']['qt'][$posicao] = $nova_quantidade;
        }else{
            $_SESSION['carrinho']['id'][] = $produto;
            $_SESSION['carrinho']['qt'][] = $quantidade;
        }
    }
}

function buscar_carrinho($id_produto){
    for($i = 0 ; $i < sizeof($_SESSION['carrinho']['id']) ; $i=$i+1) {
        if($_SESSION['carrinho']['id'][$i] == $id_produto){
            //echo "PRODUTO ID: ".$_SESSION['carrinho']['id'][$i]."</br>";
            return $i;
        }
    }
    return null;
}

function alterar_quantidade($id_produto, $nova_quantidade){
    $posicao = buscar_carrinho($id_produto);
    $_SESSION['carrinho']['qt'][$posicao] = $nova_quantidade;
}

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

