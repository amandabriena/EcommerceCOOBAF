<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("conexao_db/logado_coop.php");?>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Gerenciamento de Notícias</title>

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	<?php require_once("src/components/menu_coop.php");?>

	<!-- breadcrumb-section -->
    <div class="breadcrumb-section2 breadcrumb-bg">
    </div>
    
	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
        <div class="container">
			<?php
				if(isset($_SESSION['sucesso']) and ($_SESSION['sucesso']== "sim")){
					echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
						<strong>Notícia cadastrada com sucesso!</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
						</div>';
						unset($_SESSION['sucesso']);
			}?>
            <div class=" text-center input-group mb-3 mt-80">
                <input type="text" class="form-control" placeholder="Busque uma notícia pelo título"  aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                            
            </div>
            <div class = "text-right mt-80 mb-80">
                <a href="cadastro_noticia.php" class="cart-btn"><i class="fa fa-plus-circle"></i> Adicionar Nova Notícia</a>
            </div>
        </div>

		<div class="container">
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
							<p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.</p>
							<div class="text-center">
                                <a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
						        <a href="cart.html" class="cart-btn"><i class="fas fa-wrench"></i> Editar</a>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-trash"></i> Excluir</a>
                            </div>
                            
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
							<p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.</p>
							<div class="text-center">
                                <a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
						        <a href="cart.html" class="cart-btn"><i class="fas fa-wrench"></i> Editar</a>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-trash"></i> Excluir</a>
                            </div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-3"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.</p>
							<div class="text-center">
                                <a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
						        <a href="cart.html" class="cart-btn"><i class="fas fa-wrench"></i> Editar</a>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-trash"></i> Excluir</a>
                            </div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-4"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">Fall in love with the fresh orange</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.</p>
							<div class="text-center">
                                <a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
						        <a href="cart.html" class="cart-btn"><i class="fas fa-wrench"></i> Editar</a>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-trash"></i> Excluir</a>
                            </div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-5"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">Why the berries always look delecious</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.</p>
							<div class="text-center">
                                <a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
						        <a href="cart.html" class="cart-btn"><i class="fas fa-wrench"></i> Editar</a>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-trash"></i> Excluir</a>
                            </div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-6"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">Love for fruits are genuine of John Doe</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2018</span>
							</p>
							<p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.</p>
							<div class="text-center">
                                <a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
						        <a href="cart.html" class="cart-btn"><i class="fas fa-wrench"></i> Editar</a>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-trash"></i> Excluir</a>
                            </div>
						</div>
					</div>
				</div>
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