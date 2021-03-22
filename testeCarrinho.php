<?php
session_start();
for($i = 0 ; $i < count($_SESSION['carrinho']) ; $i=$i+2){
    echo "Produto:".$_SESSION['carrinho'][$i];
    echo " QT:".$_SESSION['carrinho'][$i+1];
    echo "</br>";
    
}
?>