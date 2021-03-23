<?php session_start(); ?>
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