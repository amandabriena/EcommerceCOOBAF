<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("conexao_db/logado_coop.php");?>
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
						<form action = "conexao_db/incluirProduto.php" method="POST" enctype="multipart/form-data" >
							<p>
                                <input type="text" placeholder="Nome" name="nome" id="nome">
							</p>
                            <p>
                                <textarea placeholder="Descrição" name="descricao" id="descricao"></textarea>
							</p>
                            <p>
								<select name="categoria" id="categoria" onchange="verifica(this.value)">
									<option selected="true" disabled="disabled">Categoria</option>
									<?php 
										$resultado = mysqli_query($connect,"SELECT * FROM categoria_produto") or die("erro ao selecionar");
		
										while($row = mysqli_fetch_assoc($resultado)){
											echo '<option value="'.$row['id_categoria'].'">'.$row['nome'].'</option>';
										}
									?>
									<option value='Outra'>Outra</option>
								</select>
							</p>
							<p>
								<input type="text" name="outraCat" id="outraCat" disabled>
							</p>
							<p>
                                <input type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder="Preço" name="preco" id="preco">
                            </p>
							<div class= "text-left">
								<h6>Selecione uma imagem para o produto:</h6>
								<input required name="arquivo" type="file">
							</div>
							<div class= "text-right">
								<input name = "status" type="checkbox" checked>
								<label class="form-check-label"> Ativar Produto</label>
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