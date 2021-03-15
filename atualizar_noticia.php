<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
	//PEGAR INFORMAÇÃO DO ID DA NOTICIA PELO GET
	$id_noticia = $_GET['noticia'];
	$resultado = mysqli_query($connect,"SELECT * FROM noticia where id_noticia = '$id_noticia'") or die("erro ao selecionar");
	while($row = mysqli_fetch_assoc($resultado)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("conexao_db/logado_coop.php");?>
	<?php require_once("src/components/head.php");?>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript">
		function DataAtual(){
            data = new Date();
            document.getElementById('data').value = data.getDate()+'/'+data.getMonth()+'/'+data.getFullYear();
        }
	</script>
	<!-- title -->
	<title>Atualizar Notícia</title>
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

	<!-- login form -->
	<div class="contact-from-section mt-80 mb-150">
		<div class="container">
				<div class="col-lg-8 offset-lg-2">
					<div class="form-title text-center">
						<h2>Atualizar Notícia</h2>
					</div>
					<div class="cadastro-form">
						<form action = "conexao_db/atualizarNoticia.php" method="POST" enctype="multipart/form-data" >
                            <div class="single-product-img mb-4">
								<img src='assets/img-upload/<?php echo $row['imagem'];  ?>' alt="">
								<h6>Altere a imagem da notícia:</h6>
								<input name="arquivo" type="file">
							</div>
                            <input type='hidden' name='imagem' value = "<?php echo $row['imagem']; ?>">

                            <input type='hidden' name='id_noticia' value = "<?php echo $row['id_noticia']; ?>">
							<h6>Título:</h6>
                            <p>
                                <input type="text" placeholder="Título" name="titulo" id="titulo" value = "<?php echo $row['titulo']; ?>">
							</p>
                            <h6>Corpo da notícia:</h6>
                            <p>
                                <textarea placeholder="Corpo" name="corpo" id="corpo"><?php echo $row['corpo']; ?></textarea>
							</p>
                            <h6>Data:</h6>
							<p>
                                <input type="date" placeholder="Data" name="data" id="data" value='<?php echo $row['data']; date("Y-m-d"); ?>'>
                            </p>
							<p>
							</p>
							<div class= "text-right">
                            <input name = "status" type="checkbox" <?php if($row['status']==1) echo 'checked'; }?>>
								<label class="form-check-label"> Notícia Publicada</label>
							</div>
							<div>
							<input type="submit" value="Atualizar"></div>
						</form>
                        <a data-toggle='modal' data-target='#exampleModal<?php echo $row['id_noticia'];?>' class='cart-btn'><i class='fas fa-trash'></i> Excluir</a>
						<!-- Modal -->
						<form id = 'deletar_noticia' name = 'deletar_noticia' action='conexao_db/deletarNoticia.php' method='POST'>
							<div class='modal fade' id='exampleModal<?php echo $row['id_noticia']; ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
								<div class='modal-dialog' role='document'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h5 class='modal-title' id='exampleModalLabel'>Excluir Notícia</h5>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
												    <span aria-hidden='true'>&times;</span>
											    </button>
											</div>
										<div class='modal-body'>Deseja mesmo exluir esta notícia ?</div>
										<input type='hidden' name='id_noticia' value = "<?php echo $row['id_noticia']; ?>" >
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
	</div>
	<!-- end login form -->
    <!--FOOTER-->
	<?php require_once("src/components/footer.php");?>

	<!-- EXTENSOES -->
	<?php require_once("src/components/extensoes.php");?>
	
</body>
</html>