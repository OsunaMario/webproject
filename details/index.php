<?php 
	include "../app/categoryController.php";
	include "../app/movieController.php";

	$categoryController = new CategoryController();
	$movieController = new MovieController();

	$categories = $categoryController->get();
	$movies = $movieController->get();

	if (isset($_SESSION)==false || 
		isset($_SESSION['id'])==false){
		
		header("Location:../");
	}
	$pelicula=$_GET['titulo'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalles</title>
	<link rel="stylesheet" type="text/css" href="../assets/style/details.css?=1">
</head>
<body>
	<!-- ====================
		header-start
	==================== -->
	<div class="header">
		<div class="header-logo">
			<a href="" title="Shared Films">
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
				<i class="fas fa-chevron-down"></i>

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
	<!-- ====================
		header-end
	==================== -->
	</div>
	<div id="info-pelicula">
		<div class="titulo-portada">
			<div class="titulo">
				<h3>
					<?=$pelicula?>
				</h3>
			</div>	
			<div class="portada"> 
				<?php foreach ($movies as $movie): ?>
					<?php if ($movie['titulo']==$pelicula): ?>
						<img src="../assets/img/movies/<?=$movie['portada']?>">
					<?php endif ?>
				<?php endforeach ?>
			</div> 
		</div>
		<div class="info">
			<div class="clasi">
				<?php foreach ($movies as $movie): ?>
					<?php if ($movie['titulo']==$pelicula): ?>
						<label>
							Clasificacion: <?=$movie['clasificacion']?>
						</label>
					<?php endif ?>
				<?php endforeach ?>
			</div>
			<div class="categoria">
				<?php foreach ($movies as $movie): ?>
					<?php if ($movie['titulo']==$pelicula): ?>
						<?php foreach ($categories as $categoria): ?>
							<?php if ($categoria['id']==$movie['categoria']): ?>
								<label>
									Categoria: <?=$categoria['nombre']?>
								</label>
							<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
				<?php endforeach ?>
			</div>
			<div class="año">
				<?php foreach ($movies as $movie): ?>
					<?php if ($movie['titulo']==$pelicula): ?>
						<label>
							Año: <?=$movie['año']?>
						</label>
					<?php endif ?>
				<?php endforeach ?>
			</div>
			<div class="minutos">
				<?php foreach ($movies as $movie): ?>
					<?php if ($movie['titulo']==$pelicula): ?>
						<label>
							Minutos: <?=$movie['minutos']?>
						</label>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
		<div class="descripcion">
			<?php foreach ($movies as $movie): ?>
					<?php if ($movie['titulo']==$pelicula): ?>
						<p>
							Clasificacion: <?=$movie['descripcion']?>
						</p>
					<?php endif ?>
				<?php endforeach ?>
		</div>

	</div>
	<div id="trailer">
		
	</div>
</body>
</html>