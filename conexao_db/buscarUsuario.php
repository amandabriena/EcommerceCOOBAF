<?php
    include_once("conexao.php");
    $nome = $_POST['palavra'];
    $resultado = mysqli_query($connect,"SELECT * FROM usuarios WHERE nome LIKE '%$nome%' and tipo_usuario = 0") or die("erro ao selecionar");
    if(mysqli_num_rows($resultado)<=0){
        echo "<tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    </tr>";
    }else{
        while($row = mysqli_fetch_assoc($resultado)){
            echo "<tr>
                    <td>".$row['nome']."</td>
                    <td>". $row['email'] ."</td>
                    <td>". $row['cpf'] ."</td>
                    <td>". $row['telefone'] ."</td>
                    </tr>";
        }
    }
    
?>