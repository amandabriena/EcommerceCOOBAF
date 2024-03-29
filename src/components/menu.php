<!-- header -->
<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="../../index.php">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<?php

							if(!isset($_SESSION['email'])){
								echo "<ul>
								<li class='current-list-item'><a href='index.php'>Início</a>
								</li>
								<li><a href='sobre.php'>Quem Somos</a></li>
                                <li><a href='produtos.php'>Produtos</a></li>
                                <li><a href='noticias.php'>Notícias</a>
								</li>
                                <li><a href='contato.php'>Contato</a></li>
								<li><a href='login.php'>Entre ou Cadastre-se</a></li>
								<li>
									<div class='header-icons'>
										<a class='shopping-cart' href='carrinho.php'><i class='fas fa-shopping-cart'></i></a>
										<a class='mobile-hide search-bar-icon' href='#'><i class='fas fa-search'></i></a>
									</div>
								</li>
							</ul>";
							}else{
								echo "<ul>
									<li class='current-list-item'><a href='index.php'>Início</a>
									</li>
									<li><a href='sobre.php'>Quem Somos</a></li>
									<li><a href='produtos.php'>Produtos</a>
									</li>
									<li><a href='noticias.php'>Notícias</a>
									</li>
									<li><a href='contato.php'>Contato</a></li>
									<li><a class='shopping-cart' href='carrinho.php'>MINHA CONTA <i class= 'fa fa-user'></i></a>
										<ul class= 'sub-menu'>
											<li><a href= 'atualizar_usuario.php'>Atualizar Dados</a></li>
											<li><a href= 'meus_pedidos.php'>Meus Pedidos</a></li>
											<li><a href= 'conexao_db/sair.php'>Sair</a></li>
										</ul>
									</li>
									<li>
										<div class='header-icons'>
											<a class='shopping-cart' href='carrinho.php'><i class='fas fa-shopping-cart'></i></a>
											<a class='mobile-hide search-bar-icon' href='#'><i class='fas fa-search'></i></a>
										</div>
									</li>
								</ul>";
							}
							?>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
</div>
<!-- end header -->
<!-- search area -->
<div class="search-area">
	<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Busque produtos:</h3>
							<form method = "GET" action="produtos.php">
								<input name ="produto" type="text" placeholder="" value= "">
								<button type="submit">Buscar<i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
<!-- end search area -->