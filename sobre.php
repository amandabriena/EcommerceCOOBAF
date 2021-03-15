<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Quem somos</title>

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
	<?php 
		session_start();
		require_once("src/components/menu.php");
	?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>COOBAF-FS</p>
						<h1>Quem Somos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">A <span class="orange-text">COOBAF-FS</span></h2>
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-home"></i>
									</div>
									<div class="content">
										<h3>Agricultura Familiar</h3>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-handshake"></i>
									</div>
									<div class="content">
										<h3>Pequenos Comerciantes</h3>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-leaf"></i>
									</div>
									<div class="content">
										<h3>Menos Agrotóxicos</h3>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-globe"></i>
									</div>
									<div class="content">
										<h3>Fortalecendo a Região</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

	<!-- HISTORIA -->
	<div class="mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					
					<div class="section-title">
						<h3>Nossa <span class="orange-text">História</span></h3>
						<div class="imagem_coobaf">
							<img src="assets/img/coobaf-7.jpeg" class="rounded float-left">
						</div>
						<div class="text-justify">
							<h5> 
							A Cooperativa de Beneficiamento e Comercialização de Produtos da Agricultura Familiar de Feira de Santana (COOBAF-FS)
							foi fundada em 2018, a partir da união de associações rurais da região.</h5>
							<h5>
							A COOBAF/FS é uma cooperativa de trabalhadores/as rurais de Feira de Santana (2º maior município da Bahia e 2º maior entroncamento rodoviário do país),
							composta por 87 membros, em sua maioria mulheres, oriundos de todos os oito distritos rurais do município. A sua irradiação nos quatro cantos
							da zona rural de Feira de Santana é parte de sua ação integrada, que conta com apoio de Associações Comunitárias Rurais e com infraestrutura de trabalho em cada
							localidade, passando pela produção, beneficiamentos dos produtos e comercialização.
							</h5>
							<h5>
							Os cooperados estão dispostos nos quatro cantos da zona rural, sendo parte de ação integrada, 
							que conta com o apoio das respectivas Associações Comunitárias Rurais e com infraestrutura em cada localidade.
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<!-- end HISTORIA -->

	<!-- team section -->
	<div class="mt-80 mb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3>Os <span class="orange-text">Cooperados</span></h3>
						<p> Somos compostos por mais de 40 quintais produtivos na zona rural de Feira de Santana - BA
						</p>
					</div>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
					<h5>Diretoria Executiva</h5>
					<p> Luzinete Assis Barreto da Silva (Diretora Presidente) </p>
					<p> Elizabete Oliveira Silva (Diretora Vice-Presidente) </p>
					<p> Jailson Moraes Ferreira (Diretor Secretário) </p>
				</div>
				<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
					<h5>Conselho Administrativo</h5>
					<p> Lindimalva Barbosa de Jesus Santana </p>
					<p> Maria José Cerqueira Santana </p>
					<p> Elisângela Neri dos Santos </p>
					<p> Josela Caetano Vaz Moreira </p>
				</div>
				<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
					<h5>Conselho Fiscal Efetivo</h5>
					<p> José Caetano Pereira da Silva </p>
					<p> Maria Gorete Santos Souza Cardoso </p>
					<p> Viviane Santos Lima Teles </p>
				</div>
				<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
					<h5>Conselho Fiscal Suplente</h5>
					<p> Marlene Torquato de Jesus </p>
					<p> Mismara de Jesus Silva Souza </p>
					<p> Claudia das Virgens </p>
				</div>
			</div>
		</div>
	</div>
	<!-- end team section -->
	
	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>
	<?php require_once("src/components/extensoes.php");?>
	

</body>
</html>