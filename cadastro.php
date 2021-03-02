<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<script type="text/javascript" src="js/jquery.mask.min.js"/></script>
	<!-- title -->
	<title>Entre</title>
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
						<h1>Cadastre-se e aproveite nossas ofertas!</h1>
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
						<h2>Crie uma conta rápido e fácil</h2>
						<p>Preencha o formulário abaixo</p>
					</div>
					<div class="cadastro-form">
						<form action = "conexao_db/validarLogin.php" method="POST" id="fruitkha-contact">
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
                                <input type="tel" placeholder="Número para contato" name="telefone" id="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" >
							</p>
							<div><input type="submit" value="Cadastrar!"></div>
						</form>
                        
					</div>
				</div>
		</div>
	</div>
	<!-- end login form -->
    <!--FOOTER-->
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
	<!-- form validation js -->
	<script src="assets/js/form-validate.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
	
</body>
</html>