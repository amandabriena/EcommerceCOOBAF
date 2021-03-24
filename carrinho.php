<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<script type="text/javascript">
		function alterar(quantidade, produto, preco){
			//preco = $(item).text();
			document.getElementById(produto).innerHTML = "R$" + quantidade * preco;

			//função para alterar a quantidade do produto na sessão
			var dados = {
                    nova_quantidade : quantidade,
                    id_produto : produto
                }
				
                $.post('alterar_quantidade.php', dados, function(){
					//para atualizar o valor (preço * quantidade do produto)
					//document.getElementById("preco_total_").innerHTML = retorna;
				});
		};
	</script>
	<title>Meu Carrinho</title>
	
</head>
<body>
	<!--MENU-->
	<?php require_once("src/components/menu.php");?>
	<?php session_start();
	

	?>
	<?php 
		include_once('conexao_db/conexao.php');
		include_once('src/functions/funcoes_carrinho.php');
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
							<tbody>
									<?php 
										$total_produtos = 0.00;
										if(isset($_GET['adicionar'])){
											$idProduto = (int) $_GET['adicionar'];
											add_carrinho($idProduto,1);
										}
										if(isset($_SESSION['carrinho'])){
											for($i = 0 ; $i < count($_SESSION['carrinho']['id']) ; $i++){
											$produto_id = $_SESSION['carrinho']['id'][$i];
											$quantidade = $_SESSION['carrinho']['qt'][$i];?>
												<tr class="table-body-row"> <?php 
													$resultadoCodigo = mysqli_query($connect,"SELECT * FROM produto where id_produto = '$produto_id'") or die("erro ao selecionar");
													while($row = mysqli_fetch_assoc($resultadoCodigo)){?>
														<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
														<td class="product-image"><img src='assets/img-upload/<?php echo $row['imagem']; ?>'></td>
														<td class="product-name"> <?php echo $row['nome']; ?> </td>
														<td class="product-pricee <? echo $produto_id?>"> R$ <?php echo $row['preco']; ?></td>
														<td class="product-quantity"><input type="number" placeholder="1" value = <?php echo $quantidade?>  onchange="alterar(this.value, <?php echo $produto_id; ?>, <?php echo $row['preco']; ?>)"> </td>
														<td class="product-total" id="<?php echo $produto_id?>"> R$ <?php echo $row['preco'] * $quantidade; ?> </td>
														<?php 
														$total_produtos = $total_produtos + ($row['preco'] * $quantidade);
													}?>
												</tr>
											<?php }}else{
												echo " </tbody>
												</table>
												<h6 class= 'text-center'>Nenhum produto adicionado ao carrinho!</h6>";
											}
									 ?>
							</tbody>
						</table>
					</div>
					<div class="cart-buttons">
						<a href="produtos.php" class="boxed-btn">Continuar comprando</a>			
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
									<td><strong>Total: </strong></td>
									<td id = "total_produtos">R$<?php echo $total_produtos?></td>
								</tr> 
							</tbody>
						</table>
						<div class="cart-buttons text-center">
							<form action = "conexao_db/incluirPedido.php" method="POST" id="finalizar_pedido">
								<input type="submit" class="boxed-btn black text-center" name="cadastro_cliente" value="Finalizar Compra!">
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