<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript">
		function DataAtual(){
            data = new Date();
            document.getElementById('data').value = data.getDate()+'/'+data.getMonth()+'/'+data.getFullYear();
        }
	</script>
	<!-- title -->
	<title>Cadastro Notícia</title>
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
						<h2>Cadastro de Nova Notícia</h2>
					</div>
					<div class="cadastro-form">
						<form action = "conexao_db/incluirNoticia.php" method="POST" enctype="multipart/form-data" >
							<p>
                                <input type="text" placeholder="Título" name="titulo" id="titulo">
							</p>
                            <p>
                                <textarea placeholder="Corpo" name="corpo" id="corpo"></textarea>
							</p>
							<p>
                                <input type="date" placeholder="Data" name="data" id="data" value='<?php echo date("Y-m-d"); ?>'>
                            </p>
							<p>
							<div class= "text-left">
								<h6>Selecione uma imagem para a notícia:</h6>
								<input required name="arquivo" type="file">
							</div>
							</p>
							<div class= "text-right">
								<input name = "status" type="checkbox" checked>
								<label class="form-check-label"> Publicar Notícia</label>
							</div>
							<div>
							<input type="submit" value="Cadastrar!"></div>
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