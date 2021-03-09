<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Gerenciamento de Produtos</title>

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
	<?php require_once("src/components/menu_coop.php");?>

	<!-- breadcrumb-section -->
    <div class="breadcrumb-section2 breadcrumb-bg">
    </div>
    <!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-4 mb-150">
		<div class="container">
			<?php
				if(isset($_SESSION['sucesso']) and ($_SESSION['sucesso']== "sim")){
					echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
						<strong>Produto cadastrado com sucesso!</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
						</div>';
						unset($_SESSION['sucesso']);
			}?>
				<div class="row">
					<div class="col-md-12">
						<div class="product-filters">
							<ul>
								<li class="active" data-filter="*">Todos</li>
								<li data-filter=".Farinha">Farinha</li>
								<li data-filter=".Bolo">Bolo</li>
								<li data-filter=".Biscoito">Biscoito</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="teste input-group">
					<input name= "pesquisa_produto" id= "pesquisa_produto" type="text" class="form-control" placeholder="Busca algum produto específico?" >
					<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
				</div>
			<div class = "text-right mt-4 mb-4">
				<a href="cadastro_produto.php" class="cart-btn"><i class="fa fa-plus-circle"></i> Adicionar Novo Produto</a>
			</div>
			<div class="resultado_produto row product-lists">
					<?php 
						$resultadogeral = mysqli_query($connect,"SELECT * FROM produto") or die("erro ao selecionar");
						while($row = mysqli_fetch_assoc($resultadogeral)){
							echo "<div class='col-lg-4 col-md-6 text-center ".$row['categoria']."'>
									<div class='single-product-item'>
									<div class='product-image'>
										<a href='single-product.html'><img src='assets/img-upload/".$row['imagem']."' ></a>
									</div>
									<h3>".$row['nome']."</h3>
									<p class='product-price'><span>Por quilo</span> R$".$row['preco']." </p>
									<a href='carrinho.php' class='cart-btn'><i class='fas fa-shopping-cart'></i> Adicionar ao Carrinho</a>
									</div>
								</div>";
									
						}
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

			<div class = "text-left mb-80">
				<a href="cooperado.php" class="cart-btn"><i class="fa fa-arrow-left"></i> Voltar</a>
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