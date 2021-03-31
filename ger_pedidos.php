<?php
	require_once("conexao_db/logado_coop.php");
    require('conexao_db/conexao.php');
?>
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

	<!-- pedidos -->
	<div class="product-section mt-80 mb-150">
		<div class="container">
			<div class="row product-lists" id="aberto">
			<?php
                    $sql="SELECT pedido.id_pedido, usuarios.nome, pedido.status, pedido.data_pedido, pedido.valor_total
					FROM pedido 
					INNER JOIN usuarios ON pedido.id_usuario = usuarios.id_usuario where pedido.status = 2 ORDER BY pedido.data_pedido DESC limit 3";
                    $resultado = mysqli_query($connect, $sql);
                    while($row = mysqli_fetch_assoc($resultado)){
						$valor = number_format($row['valor_total'],2,",","");
						echo '<div class="col-lg-4 col-md-6 pt-4 text-center berry">
								<div class="pedido">
									<h3> Cliente: '.$row['nome'].'</h3>
									<p class="product-price"><span>Valor Pedido: R$'.$valor.'</span>  ID Pedido: '.$row['id_pedido'].' </p>
									<a href="pedido.php?pedido='.$row['id_pedido'].'" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
								</div>
							</div>';
					}
                    ?> 
				
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
				<?php
                    $sql="SELECT pedido.id_pedido, usuarios.nome, pedido.status, pedido.data_pedido, pedido.valor_total
					FROM pedido 
					INNER JOIN usuarios ON pedido.id_usuario = usuarios.id_usuario where pedido.status = 2 limit 3";
                    $resultado = mysqli_query($connect, $sql);
                    while($row = mysqli_fetch_assoc($resultado)){
						echo '<div class="col-lg-4 col-md-6 pt-4 text-center berry">
								<div class="pedido">
									<h3>'.$row['nome'].'</h3>
									<p class="product-price"><span>Valor Pedido: R$'.$row['valor_total'].'</span>  ID Pedido: '.$row['id_pedido'].' </p>
									<a href="pedido.php?pedido='.$row['id_pedido'].'" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
								</div>
							</div>';
					}
                    ?>
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