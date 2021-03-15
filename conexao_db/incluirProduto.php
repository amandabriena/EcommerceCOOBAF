<?php
    include_once('conexao.php');
    include_once('incluirImagem.php');
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    str_replace(',', '.', $preco);
    $preco = floatval ($preco);
    $categoria = $_POST['categoria'];

    //se a categoria não estiver cadastrada, é realizado o cadastro da mesma
    if($categoria == 'Outra'){
        $categoria = $_POST['outraCat'];
        //inserindo nova categoria
        $queryCategoria = "INSERT INTO categoria_produto(id_categoria, nome) 
        VALUES(NULL,'$categoria')";
        $resultado = mysqli_query($connect, $queryCategoria);
        //buscando id da nova categoria cadastrada
        $resultado = mysqli_query($connect, "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = 'db_coobaf' AND TABLE_NAME = 'categoria_produto';");

       $categoria = mysqli_fetch_assoc($resultado);
       $categoria = (int)$categoria['AUTO_INCREMENT'] - 1;
    }

    //verificando se o produto está ativo ou não
    if(isset($_POST['status'])){
        $status = 1;
    }else{
        $status = 0;
    }

    //Inclusao da Imagem do produto
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome_arq = $_FILES[ 'arquivo' ][ 'name' ];
    $destino = incluirImagem($nome_arq, $arquivo_tmp);

    $query = "INSERT INTO produto(id_produto, nome, descricao, imagem, preco, id_categoria, status, visibilidade) 
                            VALUES (NULL, '$nome', '$descricao', '$destino', '$preco', $categoria, '$status', 1)";
    $insert = mysqli_query($connect,$query);
    if($insert){
        $_SESSION['mensagem'] = "cadastro";
        header('location:../ger_produtos.php');
    }else{
        echo mysqli_error($connect);
        //header('location:../404.php');
    }
    
    
    
?>