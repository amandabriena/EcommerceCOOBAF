<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<script type="text/javascript">
		function alterar(quantidade, produto, preco){
			//alterando o preço do produto baseado na nova quantidade
			var total_item = quantidade * preco;
			var valorFormatado = total_item.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
			document.getElementById(produto).innerHTML = valorFormatado;
			
			//função para alterar a quantidade do produto na sessão
			var dados = {
                    nova_quantidade : quantidade,
                    id_produto : produto
                }
				
                $.post('alterar_quantidade.php', dados, function(resultado){
					if(quantidade == 0){
						window.location.href = "carrinho.php";
					}else document.getElementById("total_produtos").innerHTML = "R$ " + resultado;
				});
		};

		
	</script>
	<title>Meu Carrinho</title>
	
</head>
<body>
	<!--MENU-->
	<?php 
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	require_once("src/components/menu.php");
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
										if(isset($_GET['quantidade'])){
											$quantidade = (int) $_GET['quantidade'];
											$idProduto = (int) $_GET['adicionar'];
											add_carrinho($idProduto,$quantidade);
										}else if(isset($_GET['adicionar'])){
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
														<td data-toggle='modal' data-target='#exampleModal<?php echo $produto_id?>' class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
														<!-- Modal para excluir produto do carrinho -->
														<form id = 'deletar_produto' name = 'deletar_item' action='exclui_item_carrinho.php' method='POST'>
														<div class='modal fade' id='exampleModal<?php echo $produto_id?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
														<div class='modal-dialog' role='document'>
															<div class='modal-content'>
															<div class='modal-header'>
																<h5 class='modal-title' id='exampleModalLabel'>EXCLUIR ITEM CARRINHO</h5>
																<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																<span aria-hidden='true'>&times;</span>
																</button>
															</div>
															<div class='modal-body'>
																Deseja mesmo exluir o item "<?php echo $row['nome']; ?>" do carrinho?
															</div>
															<input type='hidden' name='id_item' value = '<?php echo $produto_id?>' >
															<div class='modal-footer'>
																<button type='submit' name = 'upload' value = 'Cadastrar' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
																<button type='submit' name = 'upload' value = 'Cancelar' class='btn btn-outline-danger'>Excluir</button>
															</div>
															</div>
														</div>
														</div>
														</form>
														<!-- fim do Modal -->
														<td class="product-image"><img src='assets/img-upload/<?php echo $row['imagem']; ?>'></td>
														<td class="product-name"> <?php echo $row['nome']; ?> </td>
														<td class="product-pricee <? echo $produto_id?>"> R$ <?php echo number_format($row['preco'],2,",",""); ?></td>
														<td class="product-quantity"><input type="number" placeholder="1" value = <?php echo $quantidade?>  onchange="alterar(this.value, <?php echo $produto_id; ?>, <?php echo $row['preco']; ?>)"> </td>
														<td class="product-total" id="<?php echo $produto_id?>" onchange="formatador()"> R$ <?php $subtotal = $row['preco'] * $quantidade; echo number_format($subtotal,2,",","");?> </td>
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
									<td id = "total_produtos">R$<?php echo number_format($total_produtos,2,",","");?></td>
								</tr> 
							</tbody>
						</table>
						<div class="cart-buttons text-center">
							
								<?php 
								
								if(isset($_SESSION['email'])){
									echo '<form action = "conexao_db/incluirPedido.php" method="POST" id="finalizar_pedido">
											<input type="submit" class="boxed-btn black text-center" name="finalizar_compra" value="Finalizar Compra!">
										</form>	';
								}else{
									//Finalizar pedido com modal de login
									echo '<input type="submit" data-toggle="modal" data-target="#exampleModal" class="boxed-btn black text-center" name="finalizar_compra" value="Finalizar Compra!">
										
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Faça o login para finalizar sua compra!</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<form action = "conexao_db/validarLogin.php" method="POST">
												<p>
													<input type="email" placeholder="Email" name="email" id="email">
												</p>
												<p>
													<input type="password" placeholder="Senha" name="senha" id="senha">
												</p>
												<p><input type="submit" name= "bt-carrinho" value="Entrar"></p>
											</form>
										  </div>
										  <div class="modal-footer">
										  	<p>Não possui uma conta? <a href="cadastro.php">Cadastre-se</a></p>
										  	<p><a href="recuperarsenha.php">Esqueci minha senha</a></p>
										  </div>
										  
										</div>
									  </div>
									</div>
											
									';
								}?>
									
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

	<script type="text/javascript">							
		function formatador(){
				let texto_campo = $(this).val(); // e/ou $(this).text()  ;
				let texto_separado = texto_campo.split(".");
				let texto_concat = texto_separado[0]+","+texto_separado[1];
				//$(this).val(number_format(texto_concat,2,",","")) // e/ou $(this).text(texto_concat)
				$(this).val(texto_concat) // e/ou $(this).text(texto_concat)
			};
	</script>
</body>
</html>