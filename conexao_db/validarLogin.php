<?php
    include_once("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    session_start();
    //Verificando se o usuário está cadastrado
    $usuario = mysqli_query($connect,"SELECT * FROM usuarios WHERE email =
    '$email' AND senha = '$senha'") or die("erro ao selecionar");
    if(mysqli_num_rows($usuario)>0){
        //Estando cadastrado, verificar se o usuário está ativo no sistema
        $row = mysqli_fetch_array($usuario);
        //se está ativo, acesso liberado
        if($row['status']==1){
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['user'] = $row['id_usuario'];
            unset($_SESSION['erro']);
            //Verificando se o usuário é cooperado ou cliente para redirecionamento da página
            if($row['tipo_usuario']==0){
                $_SESSION['cooperado'] = "S";
                header('location:../cooperado.php');
            }else{
                unset($_SESSION['cooperado']);
                if(isset($_POST["bt-carrinho"])){
                    header('location:incluirPedido.php');
                }else header('location:../produtos.php');
            }
        }else{
            //caso não esteja, é setado erro de usuário inativo
            $_SESSION['erro'] = "inativo";
            header('location:login.php');
        }
        
       
    }else{
        unset ($_SESSION['email']);
        $_SESSION['erro'] = "sim";
        header('location:../login.php');
    }

?>