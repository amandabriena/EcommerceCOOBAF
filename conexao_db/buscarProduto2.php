<?php 
function buscarProduto($nome, tipo_usuario){
    if($tipo_usuario == 1){
        $resultado = mysqli_query($connect,"SELECT * FROM produto WHERE nome LIKE '%$nome%' and status = 1");
        return $resultado;
    }else{
        $resultado = mysqli_query($connect,"SELECT * FROM produto WHERE nome LIKE '%$nome%'");
        return $resultado;
    }
    
 ?>