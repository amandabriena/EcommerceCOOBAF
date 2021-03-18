<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Produtos</title>
</head>
<body>
	
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
						<h1>Produtos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-80 mb-150">
		<div class="container">
			<?php
				if(isset($_SESSION['sucesso']) and ($_SESSION['sucesso']== "sim")){
					echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
						<strong>Cadastro realizado com sucesso! Continue conferindo nossas ofertas!</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
						</div>';
						unset($_SESSION['sucesso']);
			}?>
			<div class="central input-group mb-5">
				<input name= "pesquisa_produto" id= "pesquisa_produto" type="text" class="form-control" placeholder="Busca algum produto específico?" >
				<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
			</div>
			<div class="resultado_produto row product-lists">
				<?php 
					$quantProd = 0;
					$resultadogeral = mysqli_query($connect,"SELECT * FROM produto where status = 1 and visibilidade = 1") or die("erro ao selecionar");
					while($row = mysqli_fetch_assoc($resultadogeral)){
						$quantProd++;
						
						$_SESSION['idProduto'] = $row['id_produto'];
						
						$idProduto = $row['id_produto'];
						$nomeCategoria = mysqli_query($connect,"SELECT nome FROM categoria_produto where id_categoria = select id_categoria from produto
						where id_produto = $idProduto");
						echo "<div class='col-lg-4 col-md-6 text-center '>
								<div class='single-product-item'>
									<div class='product-image'>
										<a href='produto.php?produto=".$row['id_produto']."'><img src='assets/img-upload/".$row['imagem']."' ></a>
									</div>
									<h3>".$row['id_produto']."</h3>
									<p class='product-price'><span>Por quilo</span> R$".$row['preco']." </p>
									<a href='carrinho.php?adicionar=".$row['id_produto']."' class='cart-btn'><i class='fas fa-shopping-cart'></i> Adicionar ao Carrinho</a>  

								</div>
							</div>";
						
									
					}
					if(isset($_GET['continuar'])){
						$_SESSION['continuarComprando'] = 1; 
						echo $_SESSION['continuarComprando'];
						
					}
					else $_SESSION['continuarComprando'] = 2;
					echo $_SESSION['continuarComprando'];
				?>
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->

	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>
	
	<!-- EXTENSOES -->
	<?php require_once("src/components/extensoes.php");?>

</body>
</html>