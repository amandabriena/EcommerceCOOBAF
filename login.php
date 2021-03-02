<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
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
						<h1>Acesse agora<</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="login-form">
						<form action = "conexao_db/validarLogin.php" method="POST" id="fruitkha-contact">
							<p>
                                <input type="email" placeholder="Email" name="email" id="email">
							</p>
							<p>
                                <input type="password" placeholder="Senha" name="senha" id="senha">
                            </p>
							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="Entrar"></p>
						</form>
                        <div class="mt-4">
                            <p>Não possui uma conta? <a href="cadastro.php">Cadastre-se</a></p>
                            <p><a href="recuperarsenha.php">Esqueci minha senha</a></p>
                        </div>
                        
					</div>
				</div>
		</div>
	</div>
	<!-- end contact form -->
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