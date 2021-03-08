
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
		if(isset($_SESSION['nome'])){
			require_once("src/components/menu_logado.php");
		}else{
			require_once("src/components/menu.php");
		}
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
								<a href="shop.html" class="boxed-btn">Nossos Produtos</a>
								<a href="contact.php" class="bordered-btn">Entre em Contato</a>
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
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> R$8,00 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> R$5,00 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> R$7,00 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Desde 20XX</p>
						<h2>Nós somos <span class="orange-text">COOBAF</span></h2>
						<p>
						A Cooperativa de Beneficiamento e Comercialização de Produtos da Agricultura Familiar de Feira de Santana (COOBAF-FS)
						foi fundada a partir da união de associações rurais da região.</p>
						<p>
						Os cooperados estão dispostos nos quatro cantos da zona rural de Feira de Santana-BA, sendo parte de ação integrada, 
						que conta com o apoio das respectivas Associações Comunitárias Rurais e com infraestrutura em cada localidade.
						</p>
						<a href="about.php" class="boxed-btn mt-4">saiba mais</a>
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
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-1"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">You will vainly look for fruit on it in autumn.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-2"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">A man's worth has its season, like tomato.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-3"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="news.html" class="boxed-btn">Mais Notícias</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>
	<?php require_once("src/components/extensoes.php");?>
	

</body>
</html>