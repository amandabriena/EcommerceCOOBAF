<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Gerenciamento de Produtos</title>

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

	<!-- products -->
	<div class="product-section mt-80 mb-150">
		<div class="container">
			<div class="row product-lists" id="aberto">
			<?php
                    $sql="SELECT -- Aqui você informa os dados que quer no retorno 
					P.valor_total,
					P.status,-- nome do func 
					C.nome, -- nome do proj 
					V.id_pedido -- todos os dados de vinculo 
					FROM -- Aqui voce informa de onde os dados vem e como associa os dados de uma tabela com outra 
					pedido P INNER JOIN -- junta os dados de matricula com vinculo 
					cliente_pedido V ON P.id_pedido = V.id_pedido -- onde essa condicao for verdadeira 
					INNER JOIN 
					usuarios C -- a mesma coisa acontece para vinculo e projeto 
					ON C.id_usuario = V.id_cliente where P.status == 2 limit 3";
                    $resultado = mysqli_query($connect, $sql);
                    $row['status']
                    while($row = mysqli_fetch_assoc($resultado)){
						echo '<div class="col-lg-4 col-md-6 pt-4 text-center berry">
								<div class="pedido">
									<h3>'.$row['nome'].'</h3>
									<p class="product-price"><span>'.$row['id_pedido'].'</span> '.$row['data'].' </p>
									<a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
								</div>
							</div>'
                    
                    ?>
				<div class="col-lg-4 col-md-6 pt-4 text-center berry">
					<div class="pedido">
                        <h3>Cliente</h3>
						<p class="product-price"><span>ID do Pedido</span> 07/03/2021 </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 pt-4 text-center berry">
					<div class="pedido">
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 pt-4 text-center lemon">
					<div class="pedido">
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
					</div>
				</div>
                
            </div>

            <div class= "text-right mb-80 d-block" id="aberto">
                <a href="cart.html" class="bt-pedidos"><i class="fas fa-eye"></i> Visualizar Todos em Aberto</a>
            </div>
            
            <div class="row product-lists" id="fechado">

				<div class="col-lg-4 col-md-6 pt-4 text-center">
					<div class="pedido">
						<h3>Avocado</h3>
						<p class="product-price"><span>Per Kg</span> 50$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 pt-4 text-center">
					<div class="pedido">
						<h3>Green Apple</h3>
						<p class="product-price"><span>Per Kg</span> 45$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 pt-4 text-center strawberry">
					<div class="pedido">
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 80$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
					</div>
				</div>
                
			</div>

            <div class= "text-right d-block" id="finalizado">
                <a href="cart.html" class="bt-pedidos"><i class="fas fa-eye"></i> Visualizar Todos Finalizados</a>
            </div>
			<div class = "text-left mb-80">
				<a href="cooperado.php" class="cart-btn"><i class="fa fa-arrow-left"></i> Voltar</a>
			</div>
		</div>
	</div>
	<!-- end products -->

	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>
	
	<!-- EXTENSOES -->
	<?php require_once("src/components/extensoes.php");?>

</body>
</html>