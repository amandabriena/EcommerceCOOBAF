<?php
    include_once("conexao.php");
    $titulo = $_POST['palavra'];
    
    $resultado = mysqli_query($connect,"SELECT * FROM noticia WHERE titulo LIKE '%$titulo%'") or die("erro ao selecionar");
    if(mysqli_num_rows($resultado)<=0){
        echo "Nenhum notícia encontrado!";
    }else if($nome == ''){
        $resultadogeral = mysqli_query($connect,"SELECT * FROM noticia") or die("erro ao selecionar");
        while($row = mysqli_fetch_assoc($resultadogeral)){
            echo "<div class='col-lg-4 col-md-6'>
            <div class='single-latest-news'>
                <a href='single-news.html'><div class='latest-news-bg'><img src='assets/img-upload/'".$row['imagem']." ></div></a>
                <div class='news-text-box'>
                    <h3><a href='single-news.html'>".$row['titulo']."</a></h3>
                    <p class='blog-meta'>
                        <span class='date'><i class='fas fa-calendar'></i>".$row['data']."</span>
                    </p>
                    <div class='text-center'>
                        <a href='cart.html' class='cart-btn'><i class='fas fa-eye'></i> Ver</a>
                        <a href='cart.html' class='cart-btn'><i class='fas fa-wrench'></i> Editar</a>
                        <a href='cart.html' class='cart-btn'><i class='fas fa-trash'></i> Excluir</a>
                    </div>
                    
                </div>
            </div>
        </div>";
                    
        }
    }else{
        while($row = mysqli_fetch_assoc($resultado)){
            echo "<div class='col-lg-4 col-md-6'>
            <div class='single-latest-news'>
                <a href='single-news.html'><div class='latest-news-bg'><img src='assets/img-upload/'".$row['imagem']." ></div></a>
                <div class='news-text-box'>
                    <h3><a href='single-news.html'>".$row['titulo']."</a></h3>
                    <p class='blog-meta'>
                        <span class='date'><i class='fas fa-calendar'></i>".$row['data']."</span>
                    </p>
                    <div class='text-center'>
                        <a href='cart.html' class='cart-btn'><i class='fas fa-eye'></i> Ver</a>
                        <a href='cart.html' class='cart-btn'><i class='fas fa-wrench'></i> Editar</a>
                        <a href='cart.html' class='cart-btn'><i class='fas fa-trash'></i> Excluir</a>
                    </div>
                    
                </div>
            </div>
        </div>";
                    
        }
    }
    
?>