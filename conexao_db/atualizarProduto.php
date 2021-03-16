<?php
    include_once('conexao.php');

    include_once('incluirImagem.php');
    $id_produto = $_POST['id_produto'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    str_replace(',', '.', $preco);
    $preco = floatval ($preco);
    $categoria = $_POST['categoria'];
    $imagem = $_POST['imagem'];

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

    if($destino == 0){
        $destino = $imagem;
    }
    $query = "UPDATE produto SET  nome = '$nome', descricao = '$descricao', imagem = '$destino', 
    id_categoria = '$categoria', status = '$status'  where id_produto = '$id_produto'";

    $query = mysqli_query($connect,$query);
    if($query){
        $_SESSION['mensagem'] = "atualizar";
        header('location:../ger_produtos.php');
        //echo $categoria;
    }else{
        echo mysqli_error($connect);
        //header('location:../404.php');
    }
    
    
    
?>