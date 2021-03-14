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
						<form action = "conexao_db/atualizar_noticia.php" method="POST" enctype="multipart/form-data" >
                            <div class="single-product-img mb-4">
								<img src='assets/img-upload/<?php echo $row['imagem'];  ?>' alt="">
								<h6>Altere a imagem da notícia:</h6>
								<input name="arquivo" type="file">
							</div>
                            <input type='hidden' name='imagem' value = "<?php echo $row['imagem']; ?>">
                            
                            <input type='hidden' name='id_noticia' value = "<?php echo $row['id_noticia']; ?>">
							<p>
                                <input type="text" placeholder="Título" name="titulo" id="titulo" value = "<?php echo $row['titulo']; ?>">
							</p>
                            <p>
                                <textarea placeholder="Corpo" name="corpo" id="corpo"><?php echo $row['corpo']; ?></textarea>
							</p>
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