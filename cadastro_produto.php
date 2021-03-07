<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript">
		function verifica(value){
			var optionSelect = document.getElementById("categoria").value;
			if(optionSelect =="Outra" ){ 
				document.getElementById("outraCat").disabled = false;
			}else{
				document.getElementById("outraCat").disabled = true;
			}
		};
	</script>
	<!-- title -->
	<title>Cadastro Produto</title>
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
						<h2>Cadastro de Novo Produto</h2>
					</div>
					<div class="cadastro-form">
						<form action = "conexao_db/incluirProduto.php" method="POST" >
							<p>
                                <input type="text" placeholder="Nome" name="nome" id="nome">
							</p>
                            <p>
                                <input type="textarea" placeholder="Descricao" name="descricao" id="descricao">
							</p>
                            <p>
								<select name="categoria" id="categoria" onchange="verifica(this.value)">
									<option selected="true" disabled="disabled">Categoria</option>
									<option value="Biscoito">Biscoito</option>
									<option value="Bolo">Bolo</option>
									<option value="Farinha">Farinha</option>
									<option value="Fruta">Fruta</option>
									<option value="Verdura">Verdura</option>
									<option value='Outra'>Outra</option>
								</select>
							</p>
							<p>
								<input type="text" name="outraCat" id="outraCat" disabled>
							</p>
							<p>
                                <input type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder="Preço" name="preco" id="preco">
                            </p>
							<p>
								<input name="imagem_produto" type="file">
							</p>
							<p>
								<input name = "status" type="checkbox" checked>
								<label class="form-check-label"> Ativar Produto</label>
							</p>
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