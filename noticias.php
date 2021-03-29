<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Notícias</title>

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!--MENU-->
	<?php 
		session_start();
		require_once("src/components/menu.php");
	?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>COOBAF-FS</p>
						<h1>Notícias</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-80 mb-150">
		<div class="container">
			<div class="central input-group mb-5">
				<input name= "pesquisa_noticia" id= "pesquisa_noticia" type="text" class="form-control" placeholder="Busque uma notícia pelo título..." >
				<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
			</div>
			<div class="resultado_noticia row">
				<?php 
					$resultadogeral = mysqli_query($connect,"SELECT * FROM noticia where status = 1 and visibilidade = 1") or die("erro ao selecionar");
					while($row = mysqli_fetch_assoc($resultadogeral)){
						/*
					$altura = "200";
					$largura = "300";
					echo "Altura pretendida: $altura - largura pretendida: $largura <br>";
							$imagem_temporaria = imagecreatefromjpeg($row['imagem']);
							echo $row['imagem'];
							
							$largura_original = imagesx($imagem_temporaria);
							
							$altura_original = imagesy($imagem_temporaria);
							
							echo "largura original: $largura_original - Altura original: $altura_original <br>";
							
							$nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);
							
							$nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);
							
							$imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
							imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);
							
							imagejpeg($imagem_redimensionada, 'assets/img-upload/' . $row['imagem']);
							
							//echo "<img src='arquivo/".$_FILES['arquivo']['name']."'>";
							*/
							
						
						echo "<div class='col-lg-4 col-md-6'>
						<div class='single-latest-news'>
						<?php
							<a href='single-news.html'><div class='latest-news-bg'><img src='assets/img-upload/".$row['imagem']."' ></div></a>
							<div class='news-text-box'>
								<h3><a href='noticia.php?noticia=".$row['id_noticia']."'>".$row['titulo']."</a></h3>
								<p class='blog-meta'>
									<span class='date'><i class='fas fa-calendar'></i>".$row['data']."</span>
								</p>
								<a href='noticia.php?noticia=".$row['id_noticia']."' class='read-more-btn'>leia mais <i class='fas fa-angle-right'></i></a>
							</div>
						</div>
					</div>";
					
					}
				?>

			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#"><</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>

	<!-- EXTENSOES -->
	<?php require_once("src/components/extensoes.php");?>

</body>
</html>