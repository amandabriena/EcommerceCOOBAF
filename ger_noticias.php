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
	<div class="latest-news mt-80 mb-150">
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
            <div class="central input-group mb-5">
				<input name= "pesquisa_noticia" id= "pesquisa_noticia" type="text" class="form-control" placeholder="Busque uma notícia pelo título..." >
				<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
			</div>
            <div class = "text-right mt-80 mb-4">
                <a href="cadastro_noticia.php" class="cart-btn"><i class="fa fa-plus-circle"></i> Adicionar Nova Notícia</a>
            </div>
        </div>

		<div class="container">
			
			<div class="resultado_noticia row">
				<?php 
					$resultadogeral = mysqli_query($connect,"SELECT * FROM noticia") or die("erro ao selecionar");
					while($row = mysqli_fetch_assoc($resultadogeral)){
						echo "<div class='col-lg-4 col-md-6'>
						<div class='single-latest-news'>
							<a href='single-news.html'><div class='latest-news-bg'><img src='assets/img-upload/".$row['imagem']."' ></div></a>
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