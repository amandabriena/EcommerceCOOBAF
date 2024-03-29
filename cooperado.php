<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("conexao_db/logado_coop.php");?>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Espaço do Cooperado</title>

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
	<!-- end breadcrumb section -->

	<!-- menu de gerenciamento do cooperado -->
	<div class="latest-news mt-80 mb-150">
        <div class="form-title text-center">
			<h2>Olá, <?php echo $_SESSION['nome'] ?></h2>
			<p>O que deseja fazer?</p>
	    </div>
		<?php
			if(isset($_SESSION['mensagem']) and $_SESSION['mensagem']=="atualizar"){
				echo '
				<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
					<strong>Atualização realizada com sucesso!</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>';
				unset($_SESSION['mensagem']);
			}
		?>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<div class="news-text-box">
							<h3><a href="ger_pedidos.php">PEDIDOS DE COMPRA</a></h3>
                            <p class="excerpt">Veja os pedidos de compra em aberto e finalizados</p>
							<a href="ger_pedidos.php" class="read-more-btn">ACESSAR <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<div class="news-text-box">
							<h3><a href="ger_produtos.php">PRODUTOS</a></h3>
							<p class="excerpt">Veja os produtos cadastrados, atualize, exclua ou cadastre novos.</p>
                            <a href="ger_produtos.php" class="read-more-btn">ACESSAR <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<div class="news-text-box">
							<h3><a href="ger_noticias.php">NOTÍCIAS</a></h3>
							<p class="excerpt">Adicione novas notícias sobre a COOBAF ou gerencie as já cadastradas.</p>
                            <a href="ger_noticias.php" class="read-more-btn">ACESSAR <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<div class="news-text-box">
							<h3><a href="ger_cooperados.php">COOPERADOS</a></h3>
							<p class="excerpt">Veja aqui todos os Cooperados COOBAF cadastrados.</p>
                            <a href="ger_cooperados.php" class="read-more-btn">ACESSAR <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<div class="news-text-box">
							<h3><a href="ger_clientes.php">CLIENTES</a></h3>
							<p class="excerpt">Acesse os cadastros dos clientes do site.</p>
                            <a href="ger_clientes.php" class="read-more-btn">ACESSAR <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<div class="news-text-box">
							<h3><a href="single-news.html">EXTRA</a></h3>
							<p class="excerpt">Informações extras</p>
                            <a href="single-news.html" class="read-more-btn">ACESSAR <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</div>
	<!-- end latest news -->

	<?php require_once("src/components/footer.php");?>
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>