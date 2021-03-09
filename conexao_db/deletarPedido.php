<?php
    include_once("conexao.php");
    $emailUsuario = $_SESSION['email'];
    $idUsuario =  mysqli_query($connect,"SELECT id_usuario FROM usuarios WHERE email = $emailUsuario");
    $pedidos =  mysqli_query($connect,"SELECT * FROM pedido WHERE id_usuario = $idUsuario");

    //Ai tem que aparecer a lista de pedidos 
    if(mysqli_num_rows($pedidos)<=0){
        echo "<tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    </tr>";
    }else{
        while($row = mysqli_fetch_assoc($pedidos)){
            echo "<tr>
                    <td>".$row['valor_total']."</td>
                    <td>". $row['status'] ."</td>
                    </tr>";
        }
    }
    
    //pegar o id do pedido através da tabela
    mysqli_query($connect,"DELETE FROM pedido WHERE id_pedido = $idPedido");
    
?>