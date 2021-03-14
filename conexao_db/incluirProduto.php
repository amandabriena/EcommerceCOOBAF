<?php
    include_once('conexao.php');
    include_once('incluirImagem.php');

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
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
    //Inclusao da Imagem da Notícia
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome_arq = $_FILES[ 'arquivo' ][ 'name' ];
    $destino = incluirImagem($nome_arq, $arquivo_tmp);
    
    $query = "INSERT INTO produto(id_produto, nome, descricao, imagem, preco, categoria, status, visibilidade) 
    VALUES (NULL, '$nome', '$descricao', '$destino', '$preco', '$categoria', '$status', 1)";
    $insert = mysqli_query($connect,$query);
    if($insert){
        $_SESSION['mensagem'] = "cadastro";
        header('location:../ger_produtos.php');
    }else{
        //echo mysqli_error($connect);
        header('location:../404.php');
    }
    
    
    
?>