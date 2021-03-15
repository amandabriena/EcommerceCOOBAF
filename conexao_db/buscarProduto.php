<?php
    include_once("conexao.php");
    $nome = $_POST['palavra'];
    session_start();

    function retorno_html($id_produto, $nome, $imagem, $preco, $categoria, $status){
        $result = "<div class='col-lg-4 col-md-6 text-center ".$categoria."'>
                    <div class='single-product-item'>
                    <div class='product-image'>
                        <a href='produto.php?produto=".$id_produto."'><img src='assets/img-upload/".$imagem."' ></a>
                    </div>
                    <h3>".$nome."</h3>";
                    //verificando se o produto está ativo
                    if($status == 1){
                        $result .= "<p class='product-price'><span>Por quilo</span> R$".$preco." </p>";
                    }else{
                        $result .= "<p class='product-price'><span style='background-color: red; color: white;'>PRODUTO INATIVO</span> R$".$preco."  </p>";
                    }
                    //verificando se o usuário é um cooperado na página de gerenciamento ou cliente
                    if(isset($_SESSION['cooperado'])){
                        $result .= "<div class='text-center'>
                                        <a href='produto.php?produto=".$id_produto."' class='cart-btn'><i class='fas fa-eye'></i> Ver</a>
                                        <a href='atualizar_produto.php?atualizar_produto=".$id_produto."' class='cart-btn'><i class='fas fa-wrench'></i> Editar</a>
                                    </div>";
                    }else{
                        $result .= "<a href='carrinho.php' class='cart-btn'><i class='fas fa-shopping-cart'></i> Adicionar ao Carrinho</a>";
                    }
                    $result .= "</div>
                        </div>";
                    return $result;
    }

    if(isset($_SESSION['cooperado'])){
        $resultado = mysqli_query($connect,"SELECT * FROM produto WHERE nome LIKE '%$nome%' and visibilidade = 1");
        if(mysqli_num_rows($resultado)<=0){
            echo "Nenhum produto encontrado!";
        }else if($nome == ''){
            $resultadogeral = mysqli_query($connect,"SELECT * FROM produto where visibilidade = 1") or die("erro ao selecionar");
            while($row = mysqli_fetch_assoc($resultadogeral)){
                echo retorno_html($row['id_produto'], $row['nome'], $row['imagem'], $row['preco'], $row['categoria'], $row['status']);
            }
        }else{
            while($row = mysqli_fetch_assoc($resultado)){
                echo retorno_html($row['id_produto'], $row['nome'], $row['imagem'], $row['preco'], $row['categoria'], $row['status']);    
            }
        }
    }else{
        $resultado = mysqli_query($connect,"SELECT * FROM produto WHERE nome LIKE '%$nome%' and status = 1 and visibilidade = 1");
        if(mysqli_num_rows($resultado)<=0){
            echo "<p class = text-center> Nenhum produto encontrado!</p>";
        }else if($nome == ''){
            $resultadogeral = mysqli_query($connect,"SELECT * FROM produto where visibilidade = 1") or die("erro ao selecionar");
            while($row = mysqli_fetch_assoc($resultadogeral)){
                echo retorno_html($row['id_produto'], $row['nome'], $row['imagem'], $row['preco'], $row['categoria'], $row['status']);
            }
        }else{
            while($row = mysqli_fetch_assoc($resultado)){
                echo retorno_html($row['id_produto'], $row['nome'], $row['imagem'], $row['preco'], $row['categoria'], $row['status']);    
            }
        }
    }
    
    
?>