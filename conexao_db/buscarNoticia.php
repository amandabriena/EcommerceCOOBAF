<?php
    include_once("conexao.php");
    $titulo = $_POST['palavra'];

    session_start();

    function resultado_html($id_noticia, $titulo,  $imagem, $data ){
        $result = "<div class='col-lg-4 col-md-6'>
        <div class='single-latest-news'>
            <a href='single-news.html'><div class='latest-news-bg'><img src='assets/img-upload/".$imagem."' ></div></a>
            <div class='news-text-box'>
                <h3><a href='noticia.php?noticia=".$id_noticia."'>".$titulo."</a></h3>
                <p class='blog-meta'>
                    <span class='date'><i class='fas fa-calendar'></i>".$data."</span>
                </p>";
                //verificando se o usuário é um cooperado na página de gerenciamento ou cliente
                if(isset($_SESSION['cooperado'])){
                    $result .= "<div class='text-center'>
                    <a href='noticia.php?noticia=".$id_noticia."' class='cart-btn'><i class='fas fa-eye'></i> Ver</a>
                    <a href='cart.html' class='cart-btn'><i class='fas fa-wrench'></i> Editar</a>
                    <a href='cart.html' class='cart-btn'><i class='fas fa-trash'></i> Excluir</a>
                </div>";
                }else{
                    $result .= "<a href='noticia.php?noticia=".$id_noticia."' class='read-more-btn'>leia mais <i class='fas fa-angle-right'></i></a>";
                } 
                $result .= "</div>
        </div>
    </div>";
    return $result;
    }

    if(isset($_SESSION['cooperado'])){
        $resultado = mysqli_query($connect,"SELECT * FROM noticia WHERE titulo LIKE '%$titulo%' and visibilidade = 1") or die("erro ao selecionar");
        if(mysqli_num_rows($resultado)<=0){
            echo "Nenhum notícia encontrada com este título!";
        }else if($titulo == ''){
            $resultadogeral = mysqli_query($connect,"SELECT * FROM noticia where status = 1 and visibilidade = 1") or die("erro ao selecionar");
            while($row = mysqli_fetch_assoc($resultadogeral)){
                echo resultado_html($row['id_noticia'],$row['titulo'],$row['imagem'],$row['data']);                    
            }
        }else{
            while($row = mysqli_fetch_assoc($resultado)){
                echo resultado_html($row['id_noticia'],$row['titulo'],$row['imagem'],$row['data']);   
            }
        }
    }else{
        $resultado = mysqli_query($connect,"SELECT * FROM noticia WHERE titulo LIKE '%$titulo%' and status = 1 and visibilidade = 1") or die("erro ao selecionar");
        if(mysqli_num_rows($resultado)<=0){
            echo "Nenhum notícia encontrada com este título!";
        }else if($titulo == ''){
            $resultadogeral = mysqli_query($connect,"SELECT * FROM noticia where status = 1 and visibilidade = 1") or die("erro ao selecionar");
            while($row = mysqli_fetch_assoc($resultadogeral)){
                echo resultado_html($row['id_noticia'],$row['titulo'],$row['imagem'],$row['data']);                    
            }
        }else{
            while($row = mysqli_fetch_assoc($resultado)){
                echo resultado_html($row['id_noticia'],$row['titulo'],$row['imagem'],$row['data']);   
            }
        }
    }

    
    
?>