<?php
    //usuario não será completamente deletado mas sim desativado
    include_once("conexao.php");

    $id_usuario = $_POST['id_usuario'];
    
    $verifica = mysqli_query($connect,"SELECT * FROM usuarios WHERE id_usuario ='$id_usuario'");
    if(mysqli_num_rows($verifica)>0){
        $_SESSION['erro'] = "sim";
        header('location:../cadastro.php');
    }else{
        $query = "UPDATE usuarios SET status=0 where id_usuario = '$id_usuario')";
        $inativar = mysqli_query($connect,$query);
        if($inativar){
            $row = mysqli_fetch_array($usuario);
            if($row['tipo_usuario']==0){
                header('location:../ger_cooperados.php');
            }else{
                header('location:../ger_clientes.php');
            }
            
        }else{
            header('location:../404.php');
        }
    }
    
?>