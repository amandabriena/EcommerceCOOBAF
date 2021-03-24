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
			<div class="row product-lists">
			<?php
                    $sql="SELECT pedido.id_pedido, usuarios.nome, pedido.status, pedido.valor_total
					FROM pedido 
					INNER JOIN usuarios ON pedido.id_usuario = usuarios.id_usuario where usuarios.email = '$id_usuario' limit 3";
                    $resultado = mysqli_query($connect, $sql);
                    while($row = mysqli_fetch_assoc($resultado)){
						echo '<div class="col-lg-4 col-md-6 pt-4 text-center berry">
								<div class="pedido">
									<h3>'.$row['nome'].'</h3>
									<p class="product-price"><span>'.$row['id_pedido'].'</span> '.$row['status'].' </p>
									<a href="pedido.php?pedido='.$row['id_pedido'].'" class="cart-btn"><i class="fas fa-eye"></i> Ver</a>
								</div>
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