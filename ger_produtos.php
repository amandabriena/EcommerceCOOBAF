<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
    require_once("conexao_db/logado_coop.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<?php ?>
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
	<div class="product-section mt-80 mb-150">
		<?php
				if(isset($_SESSION['mensagem']) and $_SESSION['mensagem'] == "cadastro"){
					echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
						<strong>Produto cadastrado com sucesso!</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
						</div>';
						unset($_SESSION['mensagem']);
			}else if(isset($_SESSION['mensagem']) and $_SESSION['mensagem'] == "excluir"){
				echo '
						<div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center;">
						<strong>Produto excluído com sucesso!</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
						</div>';
						unset($_SESSION['mensagem']);
			}
			?>
		<div class="container">
		<div class="central input-group">
					<input name= "pesquisa_produto" id= "pesquisa_produto" type="text" class="form-control" placeholder="Busca algum produto específico?" >
					<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
				</div>
			
			<div class = "text-right mt-4 mb-4">
				<a href="cadastro_produto.php" class="cart-btn"><i class="fa fa-plus-circle"></i> Adicionar Novo Produto</a>
			</div>
			<div class="resultado_produto row product-lists">
					<?php 
						$busca = "SELECT * FROM produto WHERE visibilidade = 1";

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
						//$resultadogeral = mysqli_query($connect,"SELECT * FROM produto where visibilidade = 1") or die("erro ao selecionar");
						while($row = mysqli_fetch_assoc($limite)){
							echo "<div class='col-lg-4 col-md-6 text-center'>
									<div class='single-product-item'>
									<div class='product-image'>
										<a href='produto.php?produto=".$row['id_produto']."'><img src='assets/img-upload/".$row['imagem']."' ></a>
									</div>
									<h3>".$row['nome']."</h3>";
									if($row['status'] == 1){
										echo "<p class='product-price'> R$".number_format($row['preco'],2,",","")." </p>";
									}else{
										echo "<p class='product-price'><span style='background-color: red; color: white;'>PRODUTO INATIVO</span> R$".$row['preco']."  </p>";
									}									
									echo "<div class='text-center'>
											<a href='atualizar_produto.php?produto=".$row['id_produto']."' class='cart-btn'><i class='fas fa-wrench'></i> Ver</a>
											<a data-toggle='modal' data-target='#exampleModal".$row['id_produto']."' class='cart-btn''><i class='fas fa-trash'></i> Excluir</a>
											<!-- Modal -->
												<form id = 'deletar_produto' name = 'deletar_produto' action='conexao_db/deletarProduto.php' method='POST'>
												<div class='modal fade' id='exampleModal".$row['id_produto']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
												<div class='modal-dialog' role='document'>
													<div class='modal-content'>
													<div class='modal-header'>
														<h5 class='modal-title' id='exampleModalLabel'>Excluir Produto</h5>
														<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
														<span aria-hidden='true'>&times;</span>
														</button>
													</div>
													<div class='modal-body'>
														Deseja mesmo exluir o produto ".$row['nome']."?
													</div>
													<input type='hidden' name='id_produto' value = '".$row['id_produto']."' >
													<div class='modal-footer'>
														<button type='submit' name = 'upload' value = 'Cadastrar' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
														<button type='submit' name = 'upload' value = 'Cancelar' class='btn btn-outline-danger'>Excluir</button>
													</div>
													</div>
												</div>
												</div>
												</form>
									</div>
									</div>
								</div>";
									
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

			<div class = " row text-left mb-80">
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