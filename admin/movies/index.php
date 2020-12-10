<?php 
	include "../../app/categoryController.php";
	include "../../app/movieController.php";

	$categoryController = new CategoryController();
	$movieController = new MovieController();

	$categories = $categoryController->get();
	$movies = $movieController->get();

	if (isset($_SESSION)==false || 
		isset($_SESSION['id'])==false){
		
		header("Location:../");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Movies
	</title>
	<link rel="stylesheet" type="text/css" href="../../assets/style/movies_admin.css?v=1">
	<style type="text/css">
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		#updateForm{
			display: none;
		}
	</style>
</head>
<body>
	<!--====================
		var_nav-Start
	=====================-->
	<div id="var_nav">
		<div class="logo">
			<img src="../../assets/img/header/logo.png">
		</div>
		<div class="links">
			<ul>
				<li>
					<a href="../categories/">Categorias</a>
				</li>
				<li>
					<span>Movies</span>
				</li>
				<li>
					<a href="../usuarios/">Usuarios</a>
				</li>
			</ul>
		</div>
		<div class="logout">
			<a href="">
				<img src="../../assets/img/header/logout.png">
			</a>
		</div>
	</div>
	<!--====================
		var_nav-end
	=====================-->
	<!--====================
			add-start
	=====================-->
	<?php include "../../layouts/alerts.template.php"; ?>
	<div id="add">
		<form action="../../movie" method="POST" enctype="multipart/form-data" >
			<fieldset>
				<legend>
					Add Movie
				</legend>


				<label>
					Title
				</label>
				<input type="text" name="title" placeholder="movie name" required="">

				<br>

				<label>
					Description
				</label>
				<textarea name="description" rows="5" placeholder="Description" required=""></textarea>

				<br>
				<label>
					Minutes
				</label>
				<input type="number" name="minutes" maxlength="3" placeholder="80" required="">
				
				<br>
				<label>
					año
				</label>
				<input type="number" maxlength="4" minlength="4" name="año" required="">
				<br>
				<label>
					Cover
				</label>
				<input type="file" name="cover" required="" accept="image/*">

				<br>
				<label>
					Trailer
				</label>
				<input type="text" name="trailer" required="">
				<br>

				<label>
					Clasification
				</label>
				<select  name="clasification" required="">
					<option>AA</option>
					<option>A</option>
					<option>B</option>
					<option>B-15</option>
					<option>C</option>
					<option>D</option>
				</select>
				<br>


				<label>
					Category
				</label>
				<select  name="category_id" required=""> 
					<?php foreach ($categories as $category): ?>

					<option value="<?= $category['id'] ?>" >
						<?= $category['nombre'] ?>
					</option>

					<?php endforeach ?>
				</select>
				<br>

				<button type="submit">
					Save
				</button>
				<input type="hidden" name="action" value="store">
				<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

			</fieldset>
		</form>
	</div>
	<!--====================
		add-end
	=====================-->
	<!--====================
		movies-start
	=====================-->
	<div id="movies">
		<h1>
			Movies
		</h1>
		<?php foreach ($movies as $movie): ?>
			<fieldset class="movie">
				<legend class="movie_id">
					<?=$movie['id'] ?>
				</legend>
				<div class="content">
					<div class="movie_titulo">
						<label>
							<?=$movie['titulo'] ?>
						</label>
					</div>
					<div class="movie_portada">
						<img src="../../assets/img/movies/<?= $movie['portada'] ?>">
					</div>
					<div class="movie_acciones">
						<button onclick="edit(<?= $movie['id'] ?>,'<?= $movie['titulo'] ?>','<?= $movie['descripcion'] ?>','<?= $movie['clasificacion'] ?>',<?= $movie['minutos'] ?>,<?= $movie['año'] ?>,<?= $movie['categoria'] ?>,'<?= $movie['trailer'] ?>')">
							Edit movie
						</button>
						<button onclick="remove(<?= $movie['id'] ?>)" style="background-color: red;color:white; margin-top: 20px;">
							Delete movie
						</button>
					</div>
				</div>
				
			</fieldset>
		<?php endforeach ?>
	</div>
	<!--====================
		movies-end
	=====================-->
	<!--====================
		edit-start
	=====================-->
	<div id="update" style="display: none;">
		<form action="../../movie" method="POST" enctype="multipart/form-data" >
		<fieldset>
			<legend>
				Edit Movie
			</legend>


			<label>
				Title
			</label>
			<input type="text" id="titulo" name="title" placeholder="movie name" required="">

			<br>

			<label>
				Description
			</label>
			<textarea id="descripcion" name="description" rows="5" placeholder="Description" required=""></textarea>

			<br>
			<label>
				Minutes
			</label>
			<input type="number" id="minutos" name="minutes" maxlength="3" placeholder="80" required="">
			
			<br>
			<label>
				año
			</label>
			<input type="number" id="año" maxlength="4" minlength="4" name="año" required="">
			<br>
			<label>
				Cover
			</label>
			<input type="file" id="portada" name="cover" required="" accept="image/*">

			<br>
			<label>
				Trailer
			</label>
			<input type="text" id="trailer" name="trailer" required="">
			<br>

			<label>
				Clasification
			</label>
			<select  id="clasificacion" name="clasification" required="">
				<option>AA</option>
				<option>A</option>
				<option>B</option>
				<option>B-15</option>
				<option>C</option>
				<option>D</option>
			</select>
			<br>


			<label>
				Category
			</label>
			<select  id="categoria" name="category_id" required=""> 
				<?php foreach ($categories as $category): ?>

				<option value="<?= $category['id'] ?>" >
					<?= $category['nombre'] ?>
				</option>

				<?php endforeach ?>
			</select>
			<br>

			<button type="submit">Save</button>
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="id" id="id">
			<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

		</fieldset>
	</form>
		
	</div>
	<!--====================
		edit-end
	=====================-->
	<!--====================
		eliminar-end
	=====================-->
	<div id="eliminar">
		<form id="destroyForm" action="../../movie" method="POST">

			<input type="hidden" name="action" value="destroy">
			<input type="hidden" name="id" id="id_destroy">
			<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

		</form>
	</div>
	<!--====================
		eliminar-end
	=====================-->
	<script type="text/javascript">
		function edit(id,titulo,descripcion,clasificacion,minutos,año,categoria,trailer)
		{	
			document.getElementById('add').style.display="none";
			document.getElementById('update').style.display="block";

			document.getElementById('titulo').value = titulo;
			document.getElementById('descripcion').value = descripcion;
			document.getElementById('clasificacion').value = clasificacion;
			document.getElementById('minutos').value = minutos;minutos
			document.getElementById('año').value = año;
			document.getElementById('trailer').value = trailer;
			document.getElementById('categoria').value = categoria;
			document.getElementById('id').value = id;
		}

		function remove(id)
		{
			var confirm = prompt("Si quiere eliminar el registro, escriba :"+id);
			if (confirm == id) {

				document.getElementById('id_destroy').value = id;
				document.getElementById('destroyForm').submit();

			}
		}
	</script>
</body>
</html>