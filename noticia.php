<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
	//PEGAR INFORMAÇÃO DO ID DA NOTICIA PELO GET
	$id_noticia = $_GET['noticia'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Notícias COOBAF</title>
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
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Leia os Detalhes</p>
						<h1>Notícias COOBAF</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- single article section -->
	<div class="mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-article-section">
						<div class="single-article-text">
							<?php 
								$resultado = mysqli_query($connect,"SELECT * FROM noticia where id_noticia = '$id_noticia'") or die("erro ao selecionar");
								while($row = mysqli_fetch_assoc($resultado)){
							?>
							<div class="single-artcile-bg"><img src='assets/img-upload/<?php echo $row['imagem'];  ?>'></div>
							<p class="blog-meta">
								<span class="date"><i class="fas fa-calendar"></i> <?php echo $row['data'];  ?></span>
							</p>
							<h2><?php echo $row['titulo']; ?></h2>
							<p><?php echo $row['corpo']; } ?></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-section">
						<div class="recent-posts">
							<h4>Notícias Relacionadas</h4>
							<?php 
								$resultado = mysqli_query($connect,"SELECT * FROM noticia") or die("erro ao selecionar");
								while($row = mysqli_fetch_assoc($resultado)){
							?>
							<ul>
								<li><a href="noticia.php?noticia=<?php echo $row['id_noticia']; ?>"><?php echo $row['titulo']; }?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single article section -->
	
	<!-- FOOTER -->
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