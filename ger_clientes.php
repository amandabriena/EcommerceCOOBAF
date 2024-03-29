<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
    require_once("conexao_db/logado_coop.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Clientes</title>
    <!-- JavaScript Bundle with Popper -->

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	<?php require_once("src/components/menu.php");?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section2 breadcrumb-bg">
	</div>
	<!-- end breadcrumb section -->

	<!-- menu de gerenciamento de usuários do sistema (cooperados e clientes) -->
	<div class="latest-news mt-80 mb-150">
        <div class="form-title text-center">
			<h2>Gerenciamento de Clientes</h2>
	    </div>
        
		<div class="container">
            <div class="row text-center w-10">
                <div class="col-lg-8 offset-lg-2 mx-auto">
                    <div class="input-group mb-3">
                        <input name= "pesquisa" id= "pesquisa" type="text" class="form-control" placeholder="Busque um cooperado por nome ou CPF" >
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-success">
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class = "resultado">
                    <?php
                    $sql="SELECT * FROM usuarios where tipo_usuario = 1";
                    $resultado_usuario = mysqli_query($connect, $sql);
                    if($sql === FALSE) { 
                        die(mysqli_error());
                    }
                    while($row = mysqli_fetch_assoc($resultado_usuario)){
                    echo "<tr>";
                    echo "<td>" . $row['nome'] ."</td>";
                    echo "<td>" . $row['email'] ."</td>";
                    echo "<td>" . $row['cpf'] ."</td>";
                    echo "<td>" . $row['telefone'] ."</td>";
                    if(($row['status'])==1){
                        echo "<td> Ativo </td>";
                    }else{
                        echo "<td> Inativo </td>";
                    }              
                    echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class = "text-left mb-80">
				<a href="cooperado.php" class="cart-btn"><i class="fa fa-arrow-left"></i> Voltar</a>
			</div>
			
		</div>
	</div>
	<!-- end latest news -->

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
	<!-- main js -->
	<script src="assets/js/main.js"></script>
    

</body>
</html>