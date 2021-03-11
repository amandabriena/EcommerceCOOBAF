<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
	//PEGAR INFORMAÇÃO DO ID DA NOTICIA PELO GET
	$id_produto = $_GET['produto'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Nosso Produtos</title>

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
						<p>COOBAF-FS</p>
						<h1>Nossos Produtos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<?php 
							$resultado = mysqli_query($connect,"SELECT * FROM produto where id_produto = '$id_produto'") or die("erro ao selecionar");
							while($row = mysqli_fetch_assoc($resultado)){
						?>
						<img src='assets/img-upload/<?php echo $row['imagem'];  ?>' alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $row['nome']; ?></h3>
						<p class="single-product-pricing"><span>Por quilo</span>R$<?php echo $row['preco']; ?></p>
						<p><?php echo $row['descricao']; ?></p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao carrinho</a>
							<p><strong>Categoria: </strong><?php echo $row['categoria']; } ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Produtos</span> Relacionados</h3>
						<p>Talvez você também possa se interessar:</p>
					</div>
				</div>
			</div>
			<div class="row">
			<?php 
				$resultadogeral = mysqli_query($connect,"SELECT * FROM produto where status = 1") or die("erro ao selecionar");
				while($row = mysqli_fetch_assoc($resultadogeral)){
					echo "<div class='col-lg-4 col-md-6 text-center ".$row['categoria']."'>
							<div class='single-product-item'>
							<div class='product-image'>
								<a href='produto.php?produto=".$row['id_produto']."'><img src='assets/img-upload/".$row['imagem']."' ></a>
							</div>
							<h3>".$row['nome']."</h3>
							<p class='product-price'><span>Por quilo</span> R$".$row['preco']." </p>
							<a href='carrinho.php' class='cart-btn'><i class='fas fa-shopping-cart'></i> Adicionar ao Carrinho</a>
							</div>
						</div>";
									
				}
				?>
			</div>
		</div>
	</div>
	<!-- end more products -->

	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>
	<!-- EXTENSOES -->
	<?php require_once("src/components/extensoes.php");?>

</body>
</html>