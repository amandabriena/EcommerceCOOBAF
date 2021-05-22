<?php
    //CONEXÃO COM O BANCO DE DADOS
    include("conexao_db/conexao.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("src/components/head.php");?>
	<!-- title -->
	<title>Notícias</title>

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
						<h1>Notícias</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-80 mb-150">
		<div class="container">
			<div class="central input-group mb-5">
				<input name= "pesquisa_noticia" id= "pesquisa_noticia" type="text" class="form-control" placeholder="Busque uma notícia pelo título..." >
				<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
			</div>
			<div class="resultado_noticia row">
				<?php 
					$busca = "SELECT * FROM noticia WHERE status = 1 and visibilidade = 1";

					//FAZENDO A PAGINAÇÃO
					//total de registros por página:
					$total_reg = "9";
					//Verificando a página atual:
					if (!isset($_GET['pagina'])) {
						$pc = "1";
					} else {
						$pagina=$_GET['pagina'];
						$pc = $pagina;
					}
					$inicio = $pc - 1;
					$inicio = $inicio * $total_reg;

					if(isset($_GET['produto'])){
						$produto_busca = $_GET['produto'];
						$resultadogeral = mysqli_query($connect,"SELECT * FROM produto WHERE status = 1 and visibilidade = 1 and nome LIKE '%$produto_busca%'") or die("erro ao selecionar");
					}else{
						$limite = mysqli_query($connect,"$busca LIMIT $inicio,$total_reg");
						$todos = mysqli_query($connect,"$busca");

						$tr = mysqli_num_rows($todos); // verifica o número total de registros
						$tp = ceil($tr / $total_reg); // verifica o número total de páginas
						//$resultadogeral = mysqli_query($connect,"SELECT * FROM produto where status = 1 and visibilidade = 1") or die("erro ao selecionar");
					}
					//$resultadogeral = mysqli_query($connect,"SELECT * FROM noticia where status = 1 and visibilidade = 1") or die("erro ao selecionar");
					while($row = mysqli_fetch_assoc($limite)){
						echo "<div class='col-lg-4 col-md-6'>
						<div class='single-latest-news'>
						<?php
							<a href='single-news.html'><div class='latest-news-bg'><img src='assets/img-upload/".$row['imagem']."' ></div></a>
							<div class='news-text-box'>
								<h3><a href='noticia.php?noticia=".$row['id_noticia']."'>".$row['titulo']."</a></h3>
								<p class='blog-meta'>
									
									<span class='date'><i class='fas fa-calendar'></i>".date("d/m/Y", strtotime($row['data']))."</span>
								</p>
								<a href='noticia.php?noticia=".$row['id_noticia']."' class='read-more-btn'>leia mais <i class='fas fa-angle-right'></i></a>
							</div>
						</div>
					</div>";
					
					}
				?>

			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
								<?php 
									$anterior = $pc -1;
									$proximo = $pc +1;
									if($pc>1){
										echo "<li><a href='?pagina=".$anterior."'>Anterior</a></li>";
									}
									for ($i = 1; $i <= $tp; $i++) {
										if($pc == $i){
											echo "<li><a class='active' href='?pagina=".$i."'>".$i."</a></li>";
										}else{
											echo "<li><a href='?pagina=".$i."'>".$i."</a></li>";
										}
									}
									if($pc<$tp){
										echo "<li><a href='?pagina=".$proximo."'>Próximo</a></li>";
									}
								?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- FOOTER -->
	<?php require_once("src/components/footer.php");?>

	<!-- EXTENSOES -->
	<?php require_once("src/components/extensoes.php");?>

</body>
</html>