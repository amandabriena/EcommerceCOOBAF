<?php
	if(!isset($_SESSION['cooperado'])){
		require_once("conexao_db/logado.php");
	}else{
		require_once("conexao_db/logado_coop.php");
	}
    require('conexao_db/conexao.php');
    //PEGAR INFORMAÇÃO DO ID DO PRODUTO PELO GET
	$id_pedido = $_GET['pedido'];
    $resultado_pedido = mysqli_query($connect,"SELECT * FROM pedido where id_pedido = '$id_pedido'") or die("erro ao selecionar pedido");
	$row_pedido = mysqli_fetch_assoc($resultado_pedido);
	if(!isset($_SESSION['cooperado']) and ($row_pedido['id_usuario'] != $_SESSION['user']) ){
		header('location:meus_pedidos.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Pedido de Compra</title>
	
</head>
<body>
	<!--MENU-->
	<?php require_once("src/components/menu.php");?>
	<?php 
		include_once('conexao_db/conexao.php');
		include_once('src/functions/funcoes_carrinho.php');
	?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section2 breadcrumb-bg "></div>
	<!-- end breadcrumb section -->
    <div class="form-title text-center mt-4">
		<h2>Informações do Pedido</h2>
	</div>
	<!-- cart -->
	<div class="cart-section mt-4 mb-150">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-4 col-md-12 offset-lg-1">
				<h4><strong>Status do Pedido:</strong></h4>
				<?php
					if($row_pedido['status'] == 2){
						echo "<img src='assets\img\img-status-pedido\status_01.png'>";
						echo "<h6>Pedido realizado!</h6>";
					}else if($row_pedido['status'] == 3){
						echo "<img src='assets\img\img-status-pedido\status_02.png'>";
						echo "<h6>Pedido em tramitação! Contato com a COOBAF-FS para que a entrega seja realizada!</h6>";
					}else if($row_pedido['status'] == 4){
						echo "<img src='assets\img\img-status-pedido\status_03.png'>";
						echo "<h6>Pedido finalizado!</h6>";
					}else{
						echo "<img src='assets\img\img-status-pedido\status_04.png'>";
						echo "<h6>Pedido cancelado :(</h6>";
					}
				?>
				</div>
				<div class="col-lg-4 col-md-12 offset-lg-1">
					<h4><strong>Contato com a COOBAF-FS</strong></h4>
					<?php
						if($row_pedido['status'] == 2){
							echo "<img src='assets\img\img-status-pedido\status_01.png'>";
							echo "<h6>Pedido realizado!</h6>";
						}else if($row_pedido['status'] == 3){
							echo "<img src='assets\img\img-status-pedido\status_02.png'>";
							echo "<h6>Pedido em tramitação! Contato com a COOBAF-FS para que a entrega seja realizada!</h6>";
						}else if($row_pedido['status'] == 4){
							echo "<img src='assets\img\img-status-pedido\status_03.png'>";
							echo "<h6>Pedido finalizado!</h6>";
						}else{
							echo "<img src='assets\img\img-status-pedido\status_04.png'>";
							echo "<h6>Pedido cancelado :(</h6>";
						}
					?>
				</div>
				<div class="col-lg-4 col-md-12 offset-lg-1">
					<button type="button" class="btn btn-success" data-toggle="collapse" href="#collapseDetalhes" aria-controls="collapseDetalhes">Detalhes do Pedido</button>
					<button type="button" class="btn btn-success" data-toggle="collapse" href="#collapseProdutos" aria-controls="collapseProdutos">Ver Produtos</button>
					<div class="collapse" id="collapseProdutos">
						<div class="cart-table-wrap">
							<table class="cart-table">
								<thead class="cart-table-head">
									<tr class="table-head-row">
										<th class="product-image"></th>
										<th class="product-name">Nome</th>
										<th class="product-price">Preço Unitário</th>
										<th class="product-quantity">Quantidade</th>
										<th class="product-total">Total do Item</th>
									</tr>
								</thead>
								<tbody>
										<?php 
											$resultadoCodigo = mysqli_query($connect,"SELECT * FROM item_pedido where id_pedido = '$id_pedido'") or die("erro ao selecionar item");
											while($row_item = mysqli_fetch_assoc($resultadoCodigo)){
												$id_produto = $row_item['id_produto'];
												$resultado = mysqli_query($connect,"SELECT * FROM produto where id_produto = '$id_produto'") or die("erro ao selecionar poduto");
												$row_produto = mysqli_fetch_assoc($resultado)?>
										<tr class="table-body-row"> 
											<td class="product-image"><img src='assets/img-upload/<?php echo $row_produto['imagem']; ?>'></td>
											<td class="product-name"> <?php echo $row_produto['nome']; ?> </td>
											<td class="product-pricee"> R$ <?php echo $row_produto['preco']; ?></td>
											<td class="product-quantity"><?php echo $row_item['quantidade'];?> </td>
											<td class="product-total" id = "preco_total"> R$ <?php echo $row_item['valor_item']; }?> </td>
										</tr>
								</tbody>
							</table>
							<h4 class = "text-center"><strong>Valor total do pedido: R$<?php echo $row_pedido['valor_total'];?></strong></h4>
						</div>
					</div>
					<div class="collapse" id="collapseDetalhes">
					</div>
				</div>
			</div>

			<div class="row mt-4 text-center">
				<div class="collapse" id="collapseDetalhes">
					<div class="card">
      					<div class="card-body">
						  <h5 class="card-title">Detalhes:</h5>
						  <p class="card-text">Pedido: <?php echo $id_pedido;?></p>
						  <p class="card-text">Data da Compra: <?php echo $row_pedido['data_pedido'];?></p>
						  <p class="card-text">Valor Total: R$<?php echo $row_pedido['valor_total'];?></p>
						</div>
					</div>
				</div>						

			</div>
            <div class="cart-buttons text-center">
				<form action = "conexao_db/atualizarPedido.php" method="POST" id="cancelar_pedido">
					<input type="submit" class="boxed-btn black text-center" value="Cancelar Pedido">
				</form>
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