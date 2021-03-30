<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>COOBAF-FS</title>
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
	
	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Cooperativa de Agricultura Familiar De Feira De Santana</p>
							<h1>COOBAF-FS</h1>
							<div class="hero-btns">
								<a href="produtos.php" class="boxed-btn">Nossos Produtos</a>
								<a href="contato.php" class="bordered-btn">Entre em Contato</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Procura produtos de qualidade produzidos na sua região?</span></h3>
						<h5>A COOBAF-FS é composta por 40 quintais produtivos na zona rural de Feira de Santana - BA</h5>
					</div>
				</div>
			</div>

			<div class="row">
				<?php 
					$resultadogeral = mysqli_query($connect,"SELECT * FROM produto where status = 1 and visibilidade = 1 limit 3");
					while($row = mysqli_fetch_assoc($resultadogeral)){
						$idProduto = $row['id_produto'];
						$_SESSION['idProduto'] = $row['id_produto'];
						$nomeCategoria = mysqli_query($connect,"SELECT nome FROM categoria_produto where id_categoria = select id_categoria from produto
						where id_produto = $idProduto");
						echo "<div class='col-lg-4 col-md-6 text-center ".$nomeCategoria."'>
								<div class='single-product-item'>
									<div class='product-image'>
										<a href='produto.php?produto=".$row['id_produto']."'><img src='assets/img-upload/".$row['imagem']."' ></a>
									</div>
									<h3>".$row['nome']."</h3>
									<p class='product-price'><span>Por quilo</span> R$".number_format($row['preco'],2,",","")." </p>
									<a href='carrinho.php?adicionar=' class='cart-btn'><i class='fas fa-shopping-cart'></i> Adicionar ao Carrinho</a>
								</div>
							</div>";
										
						}
						
					?>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- advertisement section -->
	<div class="abt-section mb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Desde 2018</p>
						<h2>Nós somos <span class="orange-text">COOBAF</span></h2>
						<p>
						A Cooperativa de Beneficiamento e Comercialização de Produtos da Agricultura Familiar de Feira de Santana (COOBAF-FS)
						foi fundada a partir da união de associações rurais da região.</p>
						<p>
						Os cooperados estão dispostos nos quatro cantos da zona rural de Feira de Santana-BA, sendo parte de ação integrada, 
						que conta com o apoio das respectivas Associações Comunitárias Rurais e com infraestrutura em cada localidade.
						</p>
						<a href="sobre.php" class="boxed-btn mt-4">saiba mais</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Últimas</span> Notícias</h3>
					</div>
				</div>
			</div>

			<div class="row">
			<?php 
				$resultadogeral = mysqli_query($connect,"SELECT * FROM noticia where status = 1 limit 3");
				while($row = mysqli_fetch_assoc($resultadogeral)){
					echo "<div class='col-lg-4 col-md-6'>
							<div class='single-latest-news'>
								<a href='single-news.html'><div class='latest-news-bg'><img src='assets/img-upload/".$row['imagem']."' ></div></a>
								<div class='news-text-box'>
								<h3><a href='single-news.html'>".$row['titulo']."</a></h3>
								<p class='blog-meta'>
									<span class='date'><i class='fas fa-calendar'></i>".date("d/m/Y", strtotime($row['data']))."</span>
								</p>
								<a href='noticia.php?noticia=".$row['id_noticia']."' class='read-more-btn'>leia mais <i class='fas fa-angle-right'></i></a>
							</div>
						</div>
					</div>";
				}
			?>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="noticias.php" class="boxed-btn">Mais Notícias</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- end logo carousel -->
	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>
	<?php require_once("src/components/extensoes.php");?>
	

</body>
</html>