<?php
	require_once("conexao_db/logado.php");
    require('conexao_db/conexao.php');
    $usuario = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Meus Pedidos</title>

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
    <div class="breadcrumb-section2 breadcrumb-bg">
    </div>
    <!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-80 mb-150">
		<div class="container">
			<div class="row product-lists" id="aberto">
			<?php
                    $sql="SELECT pedido.id_pedido, usuarios.nome, pedido.valor_total, pedido.data_pedido, pedido.status, pedido.valor_total
					FROM pedido 
					INNER JOIN usuarios ON pedido.id_usuario = usuarios.id_usuario where usuarios.email = '$usuario' ORDER BY pedido.data_pedido DESC limit 3";
                    $resultado = mysqli_query($connect, $sql);
					if(mysqli_num_rows($resultado)>0){
						while($row = mysqli_fetch_assoc($resultado)){
							if($row['status'] == 2){
								$status = "Pedido Realizado";
							}else if($row['status'] == 3){
								$status = "Em andamento";
							}else if($row['status'] == 4){
								$status = "Finalizado";
							}else{
								$status = "Cancelado";
							}
							$valor = number_format($row['valor_total'],2,",","");
							$data = date("d/m/Y", strtotime($row['data_pedido']));
							echo '<div class="col-lg-4 col-md-6 pt-4 text-center">
									<div class="pedido">
										<h3>'.$data.'</h3>
										<p class="product-price"><span>Valor: R$'.$valor.'</span> '.$status.' </p>
										<a href="pedido.php?pedido='.$row['id_pedido'].'" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
									</div>
								</div>';
						}
					}else{
						echo '<div class="cart-buttons">
							<h5>Você ainda não fez nenhum pedido :( </h5>
							<a href="produtos.php" class="boxed-btn">Continuar comprando</a>			
						</div>';
					}
                    ?>
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