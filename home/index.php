<?php 
	include "../app/categoryController.php";
	include "../app/movieController.php";
	include "../app/app.php";
	$categoryController = new CategoryController();
	$movieController = new MovieController();

	$categories = $categoryController->get();
	$movies = $movieController->get();

	if (isset($_SESSION)==false || 
		isset($_SESSION['id'])==false){
		
		header("Location:../");
	}
	$total_peliculas_genero=0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Miles de Películas y series Online en calidad HD, Castellano y Subtitulado sin cortes. Somos DuodePelis Oficial, ver series y peliculas online gratis.">
	<title>DuoPelis - Ver Películas Online Gratis</title>
	<link rel="stylesheet" type="text/css" href="../assets/style/home.css">
	<!-- <script src="https://kit.fontawesome.com/820f15aa26.js" crossorigin="anonymous"></script> -->
</head>
<body>
<div class="container">
	<div class="header">
		<div class="header-logo">
			<a href="" title="DuodePelis">
				<img src="../assets/img/header/logo.png">
			</a>
		</div>
		<div class="header-right pull-right">
			<div class="header-menu pull-left">
				<ul>
					<li class="active">
						<a title="Ir a inicio" href="./">
							<i class="fas fa-home"></i>
							Inicio
						</a>
					</li>
					<li>
						<a title="Ir a películas" href="./peliculas">
							<i class="fas fa-star"></i>
							Películas
						</a>
					</li>
					<li>
						<a title="Ir a categorías" href="./categorias">
							<i class="fas fa-columns"></i>
							Categorías
						</a>
					</li>
				</ul>
			</div>
			<div id="menu-user" class="header-user pull-right">
				<img class="user_active" src="../assets/img/profile.png" height="32">
				<i class="fas fa-chevron-down">
				</i>
				

				<!-- Intentando hacer un dropdown con quick-info de cuenta

				<div class="dropdown">
					<p>
						<b id="username"></b>
					</p>
					<div class="divider"></div>
				</div>
				<a href="./cuenta" class="btn">
					Mi cuenta
					<i class="fas fa-user"></i>
				</a>
				<a href="./" class="btn logout-user" id="logout">
					Salir
					<i class="fas fa-sign-out-alt"></i> -->

				</a>
			</div>
			<div class="header-search pull-right">
				<input type="search" id="searchtext" placeholder="Buscar película" onkeyup="window.globalSearch(this)" name="Searchbar">
				<div class="icon text-white text-center">
					<div class="c-search">
						<i class="fas fa-search"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="main-left">
			<div class="genres">
				<h2>Peliculas por categorias</h2>
				<ul>
					<?php foreach ($categories as $categoria): ?>
						<li>
							<a >
								<i class="fas fa-cube"></i>
								<?=$categoria['nombre']?>
								<?php foreach ($movies as $movie): ?>
										<?php if ($movie['categoria']==$categoria['id']): ?>
											<?php $total_peliculas_genero+=1; ?>
										<?php endif ?>
									<?php endforeach ?>
								<span class="cant-genre pull-right">
								<?=$total_peliculas_genero?>
								</span>
							</a>
						</li>
					<?php $total_peliculas_genero=0; ?>
					<?php endforeach ?>
				</ul>
			</div>
			
			<div class="years">
						<h2>Año de lanzamiento</h2>
						<ul>

							<li>
								<a href="./peliculas-2020">2020</a>
							</li>

							<li>
								<a href="./peliculas-2019">2019</a>
							</li>

							<li>
								<a href="./peliculas-2018">2018</a>
							</li>

							<li>
								<a href="./peliculas-2017">2017</a>
							</li>

							<li>
								<a href="./peliculas-2016">2016</a>
							</li>
							
							<li>
								<a href="./peliculas-2015">2015</a>
							</li>
							
							<li>
								<a href="./peliculas-2014">2014</a>
							</li>
							
							<li>
								<a href="./peliculas-2013">2013</a>
							</li>
							
							<li>
								<a href="./peliculas-2012">2012</a>
							</li>
							
							<li>
								<a href="./peliculas-2011">2011</a>
							</li>
							
							<li>
								<a href="./peliculas-2010">2010</a>
							</li>
							
							<li>
								<a href="./peliculas-2009">2009</a>
							</li>
							
							<li>
								<a href="./peliculas-2008">2008</a>
							</li>
							
							<li>
								<a href="./peliculas-2007">2007</a>
							</li>
							
							<li>
								<a href="./peliculas-2006">2006</a>
							</li>
							
							<li>
								<a href="./peliculas-2005">2005</a>
							</li>
							
							<li>
								<a href="./peliculas-2004">2004</a>
							</li>
							
							<li>
								<a href="./peliculas-2003">2003</a>
							</li>
							
						</ul>
					</div>
		</div>
		<div class="main-center">
			<?php foreach ($movies as $movie): ?>
				<div class="pelicula">
					<a  href="../details/?titulo=<?= $movie['titulo']?>">
						<img src="<?=BASE_IMG.$movie['portada']?>">
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
</body>
</html>