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
?>
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
	<?php 
		include_once('conexao_db/conexao.php');
		include_once('src/functions/funcoes_carrinho.php');
	?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section2 breadcrumb-bg "></div>
	<!-- end breadcrumb section -->
    <div class="form-title text-center mt-4">
		<h2>Informações do Pedido</h2>
		<p>Confira o andamento do seu pedido</p>
	</div>
	<!-- cart -->
	<div class="cart-section mt-4 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12 offset-lg-2">
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
			</div>
            <div class="row text-center">
                    <div class="cart-buttons">
						<form action = "conexao_db/atualizarPedido.php" method="POST" id="cancelar_pedido">
							<input type="submit" class="boxed-btn black text-center" value="Cancelar Pedido">
						</form>
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