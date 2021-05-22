<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
	session_start();
    
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

					$busca = "SELECT * FROM produto WHERE status = 1 and visibilidade = 1";

					//FAZENDO A PAGINAÇÃO
					//total de registros por página:
					$total_reg = "9";
					//Verificando a página atual:
					if (!isset($_GET['pagina'])) {
						$pc = "1";
					} else {
						$pagina=$_GET['pagina'];
						$pc = $pagina;
					}
					$inicio = $pc - 1;
					$inicio = $inicio * $total_reg;

					if(isset($_GET['produto'])){
						$produto_busca = $_GET['produto'];
						$resultadogeral = mysqli_query($connect,"SELECT * FROM produto WHERE status = 1 and visibilidade = 1 and nome LIKE '%$produto_busca%'") or die("erro ao selecionar");
					}else{
						$limite = mysqli_query($connect,"$busca LIMIT $inicio,$total_reg");
						$todos = mysqli_query($connect,"$busca");

						$tr = mysqli_num_rows($todos); // verifica o número total de registros
						$tp = ceil($tr / $total_reg); // verifica o número total de páginas
						//$resultadogeral = mysqli_query($connect,"SELECT * FROM produto where status = 1 and visibilidade = 1") or die("erro ao selecionar");
					}
					if(mysqli_num_rows($limite)>0){
						while($row = mysqli_fetch_assoc($limite)){
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
										<h3>".$row['nome']."</h3>
										<p class='product-price'><span>Por quilo</span> R$".number_format($row['preco'],2,",","")." </p>
										<a href='carrinho.php?adicionar=".$row['id_produto']."' class='cart-btn'><i class='fas fa-shopping-cart'></i> Adicionar ao Carrinho</a>  
	
									</div>
								</div>";
							
										
						}
					}else{
						echo "<p class = text-center> Nenhum produto encontrado!</p>";
					}
				?>
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<?php 
								$anterior = $pc -1;
								$proximo = $pc +1;
								if($pc>1){
									echo "<li><a href='?pagina=".$anterior."'>Anterior</a></li>";
								}
								for ($i = 1; $i <= $tp; $i++) {
									if($pc == $i){
										echo "<li><a class='active' href='?pagina=".$i."'>".$i."</a></li>";
									}else{
										echo "<li><a href='?pagina=".$i."'>".$i."</a></li>";
									}
								}
								if($pc<$tp){
									echo "<li><a href='?pagina=".$proximo."'>Próximo</a></li>";
								}
							?>
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