<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (!isset($_SESSION['cooperado'])) {
	require_once("conexao_db/logado.php");
} else {
	require_once("conexao_db/logado_coop.php");
}
require('conexao_db/conexao.php');
//PEGAR INFORMAÇÃO DO ID DO PRODUTO PELO GET
$id_pedido = $_GET['pedido'];
$resultado_pedido = mysqli_query($connect, "SELECT * FROM pedido where id_pedido = '$id_pedido'") or die("erro ao selecionar pedido");
$row_pedido = mysqli_fetch_assoc($resultado_pedido);
if (!isset($_SESSION['cooperado']) and ($row_pedido['id_usuario'] != $_SESSION['user'])) {
	header('location:meus_pedidos.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once("src/components/head.php"); ?>
	<link rel="stylesheet" href="assets/css/chat.css">
	<!-- title -->
	<title>Pedido de Compra</title>
	<script type="text/javascript">
		function scroll() {
			var objScrDiv = document.getElementById("chatscroll");
			objScrDiv.scrollTop = objScrDiv.scrollHeight;
		}
	</script>
</head>

<body>
	<!--MENU-->
	<?php require_once("src/components/menu.php"); ?>
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
	<!-- container principal -->
	<div class="cart-section mt-4 mb-150">
		<div class="container">
			<!-- status do pedido -->
			<div class="row text-center">
				<div class="col-lg-4 col-md-12 offset-lg-1">
					<div>
						<h4><strong>Status do Pedido:</strong></h4>
						<?php
						if ($row_pedido['status'] == 2) {
							echo "<img src='assets\img\img-status-pedido\status_01.png'>";
							echo "<h6>Pedido realizado!</h6>";
						} else if ($row_pedido['status'] == 3) {
							echo "<img src='assets\img\img-status-pedido\status_02.png'>";
							echo "<h6>Pedido em tramitação! Contato com a COOBAF-FS para que a entrega seja realizada!</h6>";
						} else if ($row_pedido['status'] == 4) {
							echo "<img src='assets\img\img-status-pedido\status_03.png'>";
							echo "<h6>Pedido finalizado!</h6>";
						} else {
							echo "<img src='assets\img\img-status-pedido\status_04.png'>";
							echo "<h6>Pedido cancelado :(</h6>";
						}
						?>
					</div>
					<div class="card mt-3 mb-3">
						<div class="card-body">
							<h5 class="card-title">Detalhes do Pedido:</h5>
							<p class="card-text">Pedido: <?php echo $id_pedido; ?></p>
							<p class="card-text">Data da Compra: <?php echo date("d/m/Y", strtotime($row_pedido['data_pedido'])); ?></p>
							<p class="card-text">Valor Total: R$<?php echo  number_format($row_pedido['valor_total'], 2, ",", ""); ?></p>
						</div>
					</div>
					<div>
						<?php 
							if(isset($_SESSION['cooperado']) and $_SESSION['cooperado'] == "S"){
								echo '<button class="btn btn-success" data-toggle="collapse" href="#collapseDetalhes" aria-controls="collapseDetalhes">Detalhes do Cliente</button>';
							}
						?>
						<button class="btn btn-success" data-toggle="collapse" href="#collapseProdutos" aria-controls="collapseProdutos">Ver Produtos</button>
						<div class="collapse" id="collapseProdutos">
							<div class="cart-table-wrap mt-3 mb-3">
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
										$resultadoCodigo = mysqli_query($connect, "SELECT * FROM item_pedido where id_pedido = '$id_pedido'") or die("erro ao selecionar item");
										while ($row_item = mysqli_fetch_assoc($resultadoCodigo)) {
											$id_produto = $row_item['id_produto'];
											$resultado = mysqli_query($connect, "SELECT * FROM produto where id_produto = '$id_produto'") or die("erro ao selecionar poduto");
											$row_produto = mysqli_fetch_assoc($resultado) ?>
											<tr class="table-body-row">
												<td class="product-image"><img src='assets/img-upload/<?php echo $row_produto['imagem']; ?>'></td>
												<td class="product-name"> <?php echo $row_produto['nome']; ?> </td>
												<td class="product-pricee"> R$ <?php echo $row_produto['preco']; ?></td>
												<td class="product-quantity"><?php echo $row_item['quantidade']; ?> </td>
												<td class="product-total" id="preco_total"> R$ <?php echo number_format($row_item['valor_item'], 2, ",", "");
																							} ?> </td>
											</tr>
									</tbody>
								</table>
								<h4 class="text-center"><strong>Valor total do pedido: R$<?php echo $row_pedido['valor_total']; ?></strong></h4>
							</div>
						</div>
						<div class="collapse" id="collapseDetalhes">
							<div class="card mt-4 mb-4">
								<div class="card-body">
									<?php 
									$id_cliente = $row_pedido['id_usuario'];
									$sql="SELECT usuarios.*, endereco.*
									FROM usuarios 
									INNER JOIN endereco ON usuarios.id_endereco = endereco.id_endereco where usuarios.id_usuario = '$id_cliente'";
									$resultado_user = mysqli_query($connect, $sql);
									$row_cliente = mysqli_fetch_assoc($resultado_user);
									?>
									<h5 class="card-title">Detalhes do Cliente:</h5>
									<p class="card-text">Nome: <?php echo $row_cliente['nome']; ?>
									</br> Email: <?php echo $row_cliente['email']; ?>
									</br> Telefone: <?php echo $row_cliente['telefone']; ?>
									</p>
									<h5 class="card-title">Endereço:</h5>
									<p class="card-text"><?php echo $row_cliente['rua']; ?>, Bairro <?php echo $row_cliente['bairro']; ?>, número <?php echo $row_cliente['numero']; ?>
									</br> <?php echo $row_cliente['logradouro']; ?>
									</br> <?php echo $row_cliente['cidade']; ?> - <?php echo $row_cliente['uf']; ?>
									</br> CEP: <?php echo $row_cliente['cep']; ?>
									</p>
								</div>
							</div>
						</div>
					</div>


				</div>
				<!-- end status do pedido -->

				<!-- chat para contato -->
				<div class="col-lg-4 col-md-12 offset-lg-1 mb-4">
					<h4><strong>Contato com a COOBAF-FS</strong></h4>
					<div class="panel panel-primary">
						<div class="panel-body" id="chatscroll">
							<ul class="chat">
								<!-- mensagem default inicial -->
								<li class="main_msg clearfix">
									<div class="chat-body clearfix">
										<div class="header">
											<strong class="primary-font">COOBAF-FS</strong> <small class="pull-right text-muted">
										</div>
										<p>
											Obrigada por apoiar a agricultura familiar! Para que possamos agendar a entrega do seu pedido,
											nos informe no chat abaixo, um local para entrega e sua disponibilidade.
										</p>
									</div>
								</li>

								<?php $resultado_msg = mysqli_query($connect, "SELECT * FROM mensagem_pedido where id_pedido = '$id_pedido'");
								while ($row_msg = mysqli_fetch_assoc($resultado_msg)) {
									$id_usuario = $row_msg['id_usuario'];
									$usuario = mysqli_query($connect, "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'");
									$row = mysqli_fetch_array($usuario);
									if ($row['tipo_usuario'] == 0) {
										echo '
											<li class="left clearfix">
												<div class="chat-body clearfix">
													<div class="header">
														<strong class="pull-left primary-font">COOBAF:</strong>
													</div>
													<p>
														' . $row_msg['mensagem'] . '
													</p>
													<small  class="text-muted"><span style="color: white" class="glyphicon glyphicon-time"></span>' . $row_msg['data_msg'] . '</small>
												</div>
											</li>
											';
									} else {
										echo '
											<li class="right clearfix">
												<div class="chat-body clearfix">
													<div class= "name">
														<strong>Eu:</strong>
													</div>
													<p>
														' . $row_msg['mensagem'] . '
													</p>
													<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>' . $row_msg['data_msg'] . '</small>
												</div>
											</li>
											';
									}
								}
								?>

							</ul>
						</div>
						<div class="panel-footer">
							<div class="input-group">
								<form action="conexao_db/enviarMensagem.php" method="POST">
									<textarea name="mensagem" id="btn-input" type="textarea" class="form-control input-sm" placeholder="Digite aqui..">
								</textarea>
									<input type='hidden' name='id_pedido' value="<?php echo $id_pedido; ?>">
									<input type='hidden' name='id_usuario' value="<?php echo $_SESSION['user']; ?>">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-success" id="btn-chat">Enviar Mensagem</button>
									</span>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end  -->

		<!-- FOOTER -->
		<?php require_once("src/components/footer.php"); ?>

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