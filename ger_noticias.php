<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("conexao_db/logado_coop.php");?>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Gerenciamento de Notícias</title>

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	<?php require_once("src/components/menu_coop.php");?>

	<!-- breadcrumb-section -->
    <div class="breadcrumb-section2 breadcrumb-bg">
    </div>
    
	<!-- latest news -->
	<div class="latest-news mt-80 mb-150">
        <div class="container">
		<?php
				if(isset($_SESSION['mensagem']) and $_SESSION['mensagem'] == "cadastro"){
					echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
						<strong>Notícia cadastrada com sucesso!</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
						</div>';
						unset($_SESSION['mensagem']);
			}else if(isset($_SESSION['mensagem']) and $_SESSION['mensagem'] == "excluir"){
				echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
						<strong>Notícia excluída com sucesso!</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
						</div>';
						unset($_SESSION['mensagem']);
			}else if(isset($_SESSION['mensagem']) and $_SESSION['mensagem']=="atualizar"){
			echo '
				<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
					<strong>Atualização realizada com sucesso!</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>';
					unset($_SESSION['mensagem']);
			}
			?>
            <div class="central input-group mb-5">
				<input name= "pesquisa_noticia" id= "pesquisa_noticia" type="text" class="form-control" placeholder="Busque uma notícia pelo título..." >
				<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
			</div>
            <div class = "text-right mt-80 mb-4">
                <a href="cadastro_noticia.php" class="cart-btn"><i class="fa fa-plus-circle"></i> Adicionar Nova Notícia</a>
            </div>
        </div>

		<div class="container">
			
			<div class="resultado_noticia row">
				<?php 
					$resultadogeral = mysqli_query($connect,"SELECT * FROM noticia where visibilidade = 1") or die("erro ao selecionar");
					while($row = mysqli_fetch_assoc($resultadogeral)){
						echo "<div class='col-lg-4 col-md-6'>
						<div class='single-latest-news'>
							<a href='single-news.html'><div class='latest-news-bg'><img src='assets/img-upload/".$row['imagem']."' ></div></a>
							<div class='news-text-box'>
								<h3><a href='single-news.html'>".$row['titulo']."</a></h3>
								<p class='blog-meta'>
									<span class='date'><i class='fas fa-calendar'></i>".date("d/m/Y", strtotime($row['data']))."</span>
								</p>
								<div class='text-center'>
									<a href='atualizar_noticia.php?noticia=".$row['id_noticia']."' class='cart-btn'><i class='fas fa-wrench'></i> Ver</a>
									<a data-toggle='modal' data-target='#exampleModal".$row['id_noticia']."' class='cart-btn''><i class='fas fa-trash'></i> Excluir</a>
											<!-- Modal -->
												<form id = 'deletar_noticia' name = 'deletar_noticia' action='conexao_db/deletarNoticia.php' method='POST'>
												<div class='modal fade' id='exampleModal".$row['id_noticia']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
												<div class='modal-dialog' role='document'>
													<div class='modal-content'>
													<div class='modal-header'>
														<h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
														<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
														<span aria-hidden='true'>&times;</span>
														</button>
													</div>
													<div class='modal-body'>
														Deseja mesmo exluir esta notícia ?
													</div>
													<input type='hidden' name='id_noticia' value = '".$row['id_noticia']."' >
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
						</div>
					</div>";
					}
				?>

			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#"><</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "text-left mb-80">
				<a href="cooperado.php" class="cart-btn"><i class="fa fa-arrow-left"></i> Voltar</a>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>

	<!-- EXTENSOES -->
	<?php require_once("src/components/extensoes.php");?>

</body>
</html>