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
			<div class="row product-lists" >
			<?php
                    $sql="SELECT pedido.id_pedido, usuarios.nome, pedido.status, pedido.data_pedido, pedido.valor_total
					FROM pedido 
					INNER JOIN usuarios ON pedido.id_usuario = usuarios.id_usuario ORDER BY pedido.data_pedido DESC limit 3";
                    $resultado = mysqli_query($connect, $sql);
                    while($row = mysqli_fetch_assoc($resultado)){
						$cor = "aberto";
						if($row['status'] == 1){
							$status = "Realizado";
						}else if($row['status'] == 2){
							$status = "Em andamento";
						}else if($row['status'] == 3){
							$status = "Finalizado";
						}else{
							$status = "Cancelado";
							$cor = "fechado";
						}
						$valor = number_format($row['valor_total'],2,",","");
						echo '<div class="col-lg-4 col-md-6 pt-4 text-center" id="'.$cor.'">
								<div class="pedido">
									<h3> Cliente: '.$row['nome'].'</h3>
									<p class="product-price"><span>Valor Pedido: R$'.$valor.'</span>  
									ID Pedido: '.$row['id_pedido'].' 
									<span>Pedido '.$status.'</span></p>
									<a href="pedido.php?pedido='.$row['id_pedido'].'" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
								</div>
							</div>';
					}
                    ?> 
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