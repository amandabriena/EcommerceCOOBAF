<?php
    include_once('conexao.php');

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $imagem_produto = "teste";
    //$imagem_produto = $_POST['imagem'];
    $preco = $_POST['preco'];
    str_replace(',', '.', $preco);
    $preco = floatval ($preco);
    $categoria = $_POST['categoria'];
    if($categoria == 'Outra'){
        $categoria = $_POST['outraCat'];
    }
    if(isset($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }

    //session_start();
    
    $query = "INSERT INTO produto(id_produto, nome, descricao, imagem, preco, categoria, status) 
    VALUES (NULL, '$nome', '$descricao', '$imagem_produto', '$preco', '$categoria', '$status')";
    $insert = mysqli_query($connect,$query);
    if($insert){
        //$_SESSION['erro'] = "nao";
        header('location:../produtos.php');
    }else{
        //$_SESSION['erro'] = "sim";
        echo mysqli_error($connect);
        //header('location:../404.php');
    }
    
?>