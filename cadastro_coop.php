<?php 
    session_start();
    if(!isset($_SESSION['erro'])){
        $_SESSION['erro']="nao";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
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
						<h2>Cadastro de Cooperado/h2>
						<p>Preencha o formulário abaixo:</p>
					</div>
					<?php
						if($_SESSION['erro']=="sim"){
						echo '
							<div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center;">
								<strong>Email ou CPF já cadastrados</strong> 
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>';
								unset($_SESSION['erro']);
						}
					?>
					<div class="cadastro-form">
						<form action = "conexao_db/incluirUsuario.php" method="POST" id="Cadastrar">
							<p>
                                <input type="text" placeholder="Nome" name="nome" id="nome">
							</p>
                            <p>
                                <input type="email" placeholder="Email" name="email" id="email">
							</p>
                            <p>
                                <input type="text" placeholder="CPF" name="cpf" id="cpf" onkeydown="javascript: fMasc( this, mCPF );">
							</p>
							<p>
                                <input type="password" placeholder="Senha" name="senha" id="senha">
                                <small class="form-text text-muted">A senha deve conter no mínimo 8 caracteres.</small>
                            </p>
                            <p>
                                <input type="password" placeholder="Confirme sua senha" name="confsenha" id="confsenha">
                            </p>
                            <p>
                                <input type="tel" placeholder="Número para contato" name="telefone" id="telefone" onkeydown="javascript: fMasc( this, mTel );">
							</p>
							<div><input type="submit" name="cadastro_cooperado" value="Cadastrar"></div>
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
	<!-- form validation js -->
	<script src="assets/js/form-validate.js"></script>
	
</body>
</html>