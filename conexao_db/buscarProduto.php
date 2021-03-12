<?php
    include_once("conexao.php");
    $nome = $_POST['palavra'];
    
    $resultado = mysqli_query($connect,"SELECT * FROM produto WHERE nome LIKE '%$nome%'") or die("erro ao selecionar");
    if(mysqli_num_rows($resultado)<=0){
        echo "Nenhum produto encontrado!";
    }else if($nome == ''){
        $resultadogeral = mysqli_query($connect,"SELECT * FROM produto") or die("erro ao selecionar");
        while($row = mysqli_fetch_assoc($resultadogeral)){
            echo "<div class='col-lg-4 col-md-6 text-center ".$row['categoria']."'>
                    <div class='single-product-item'>
                    <div class='product-image'>
                        <a href='single-product.html'><img src='assets/img-upload/".$row['imagem']."' ></a>
                    </div>
                    <h3>".$row['nome']."</h3>
                    <p class='product-price'><span>Por quilo</span> R$".$row['preco']." </p>
                    <a href='carrinho.php' class='cart-btn'><i class='fas fa-shopping-cart'></i> Adicionar ao Carrinho</a>
                    </div>
                </div>";
        }
    }else{
        while($row = mysqli_fetch_assoc($resultado)){
            echo "<div class='col-lg-4 col-md-6 text-center ".$row['categoria']."'>
                    <div class='single-product-item'>
                    <div class='product-image'>
                        <a href='single-product.html'><img src='assets/img-upload/".$row['imagem']."'></a>
                    </div>
                    <h3>".$row['nome']."</h3>
                    <p class='product-price'><span>Por quilo</span> R$".$row['preco']." </p>
                    <a href='carrinho.php' class='cart-btn'><i class='fas fa-shopping-cart'></i> Adicionar ao Carrinho</a>
                    </div>
                </div>";
                    
        }
    }
    
?>