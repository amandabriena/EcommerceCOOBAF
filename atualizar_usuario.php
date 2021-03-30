<?php 
    session_start();
    if(!isset($_SESSION['erro'])){
        $_SESSION['erro']="nao";
    }
    include("conexao_db/conexao.php");
    $email = $_SESSION['email'];
	$resultado = mysqli_query($connect,"SELECT * FROM usuarios where email = '$email'") or die("erro ao selecionar");
	while($row = mysqli_fetch_assoc($resultado)){
		$id_usuario = $row['id_usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="assets/js/consultacep.js"></script>
	<!-- form validation js -->
	<script src="assets/js/form-validate.js"></script>
	<!-- title -->
	<title>Cadastre-se</title>
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
	<?php require_once("src/components/menu.php");?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>COOBAF/FS</p>
						<h1></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- login form -->
	<div class="contact-from-section mt-80 mb-150">
		<div class="container">
				<div class="col-lg-8 offset-lg-2">
					<div class="form-title text-center">
						<h2>Atualizar Dados</h2>
						<p>Altere suas informações</p>
					</div>
					<?php
						if(isset($_SESSION['mensagem']) and $_SESSION['mensagem']=="atualizar"){
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
					<div class="cadastro-form">
						<form action = "conexao_db/atualizarUsuario.php" method="POST" id="Atualizar">
							<input type='hidden' name='id_usuario' value = "<?php echo $row['id_usuario']; ?>">

							<p>
                                <input type="text" placeholder="Nome" name="nome" id="nome" value="<?php echo $row['nome']; ?>" required >
							</p>
                            <p>
                                <input type="email" placeholder="Email" name="email" id="email" value="<?php echo $row['email']; ?>">
							</p>
                            <p>
                                <input type="text" placeholder="CPF" name="cpf" id="cpf" onkeydown="javascript: fMasc( this, mCPF );" value="<?php echo $row['cpf']; ?>"required>
							</p>
                            <p>
                                <input type="tel" placeholder="Número para contato" name="telefone" id="telefone" onkeydown="javascript: fMasc( this, mTel );" value="<?php echo $row['telefone']; ?>" required>
							</p>
                            <?php
                            $id_endereco = $row['id_endereco'];
                            }
                            $resultado = mysqli_query($connect,"SELECT * FROM endereco where id_endereco = '$id_endereco'") or die("erro ao selecionar");
	                        while($row = mysqli_fetch_assoc($resultado)){
                            ?>
							<input type='hidden' name='id_endereco' value = "<?php echo $row['id_endereco']; ?>">
							<div class = "endereco mb-80">
								<h4 class = "text-center">Endereço</h4>
								
								<p>
									<input name="cep" placeholder="CEP" type="text" id="cep" size="10" maxlength="9"
									onblur="pesquisacep(this.value);" value="<?php echo $row['cep']; ?>" required/>
								</p>
								<p>
									<input name="rua" placeholder="Rua" type="text" id="rua" size="60" value="<?php echo $row['rua']; ?>" required/>
								</p>
								<p>
									<input name="bairro" placeholder="Bairro" type="text" id="bairro" size="40" value="<?php echo $row['bairro']; ?>" required/>
								</p>
								<p>
									<input name="cidade" placeholder="Cidade" type="text" id="cidade" size="40" value="<?php echo $row['cidade']; ?>" required/>
								</p>
								<p>
									<input name="uf" placeholder="Estado" type="text" id="uf" size="2" value="<?php echo $row['uf']; ?>" required/>	
								</p>
								<p>
									<input name="numero" placeholder="Número" type="text" id="numero" value="<?php echo $row['numero']; ?>" required/>
								</p>
							</div>
							<p>
								<input name="logradouro" placeholder="Logradouro" type="text" id="logradouro" value="<?php echo $row['logradouro']; }?>" required/>
							</p>
							<div class = "mt-80"><input type="submit" value="Atualizar"></div>
						</form>
                        
					</div>
					<div class = "text-left mb-80">
						<?php if (isset($_SESSION['cooperado'])){
							echo '<a href="cooperado.php" class="cart-btn"><i class="fa fa-arrow-left"></i> Voltar</a>';
						}else{
							echo '<a href="index.php" class="cart-btn"><i class="fa fa-arrow-left"></i> Voltar</a>';
						} ?>
						
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