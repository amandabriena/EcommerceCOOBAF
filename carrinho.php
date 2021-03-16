<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Meu Carrinho</title>

</head>
<body>
	<!--MENU-->
	<?php require_once("src/components/menu.php");?>
	<?php session_start();
	
	?>
	<?php include_once('conexao_db/conexao.php');
			include_once('conexao_db/adicionarCarrinho.php');
	?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>COOBAF-FS</p>
						<h1>Meu Carrinho</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image"></th>
									<th class="product-name">Nome</th>
									<th class="product-price">Preço</th>
									<th class="product-quantity">Quantidade</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody id = "resultado_carrinho">
									<?php $continuarComprando = $_SESSION['continuarComprando'];
										$listaProdutos = array();
										$_SESSION['produtosCarrinho'] = $listaProdutos;
										$cont = 0;
										if(isset($_GET['adicionar'])){
											$cont = $cont +1;
											$idProduto = (int) $_GET['adicionar'];
											adicionar_produto($idProduto);
											foreach ($_SESSION['carrinho'] as &$value) {
												echo '<tr class="table-body-row"> '
												$resultadoCodigo = mysqli_query($connect,"SELECT * FROM produto where id_produto = $value") or die("erro ao selecionar");
												while($row = mysqli_fetch_assoc($resultadoCodigo)){
													echo "<td class='product-remove'><a href='#'><i class='far fa-window-close'></i></a></td>
															<td class='product-image'><img src='assets/img-upload/"<?php echo $row['imagem']; ?>"'></td>
														<td class='product-name'>"
												}
											/*for($i = 0; $i < $cont; $i++){
												$_SESSION['produtosCarrinho'][$i] = $idProduto;
											}

											var_dump($listaProdutos);
											foreach($_SESSION['produtosCarrinho'] as $key=>$value){
												echo "posição: " . $key ." valor " . $value;
											}*/
											/*
											if($continuarComprando == 2){?>
													<tr class="table-body-row"> <?php 
													$resultadoCodigo = mysqli_query($connect,"SELECT * FROM produto where id_produto = $idProduto") or die("erro ao selecionar");
													while($row = mysqli_fetch_assoc($resultadoCodigo)){?>
														<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
														<td class="product-image"><img src='assets/img-upload/<?php echo $row['imagem']; ?>'></td>
														<td class="product-name"> <?php echo $row['nome']; ?> </td>
														<td class="product-price"> <?php echo $row['preco']; ?></td>
														<td class="product-quantity"><input type="number" placeholder="1" name="qtprod"></td>
														<td class="product-total"> <?php /*$row['preco'] = $row['preco'] * */ ?> </td>
														<?php 
													}?>
												<?php 
												var_dump($listaProdutos);
											}else{
												//teste para adicionar mais linhas na tabela para produtos diferentes
												for($x = 1; $x <= count($_SESSION['produtosCarrinho']); $x++){	
													?><tr class="table-body-row"><?php
													$codProd = $_SESSION['produtosCarrinho'][$x];
													echo "aqui: " . $codProd;
													$resultadoCodigo = mysqli_query($connect,"SELECT * FROM produto where id_produto = $codProd") or die("erro ao selecionar");
													while($row = mysqli_fetch_assoc($resultadoCodigo)){?>
														<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
														<td class="product-image"><img src='assets/img-upload/<?php echo $row['imagem']; ?>'></td>
														<td class="product-name"> <?php echo $row['nome']; ?> </td>
														<td class="product-price"> <?php echo $row['preco']; ?></td>
														<td class="product-quantity"><input type="number" placeholder="1" name="qtprod"></td>
														<td class="product-total"> <?php echo "aqui";?> </td>
																	
													<?php }?>
												</tr>
												<?php }	
												var_dump($listaProdutos);
												echo "o array tem ".count($listaProdutos). " produtos";
												$cont++;	
												
											}
										}
										?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Valor</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>$500</td>
								</tr>
								<tr class="total-data">
									<td><strong>Entrega: </strong></td>
									<td>$45</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$545</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="produtos.php?continuar=" class="boxed-btn">Continuar comprando</a>
							<?php //fazer verificação de logado?>
							<a href="ger_pedidos.php" class="boxed-btn black">Finalizar</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

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