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

	#echo json_encode($movies);
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Movies
	</title>
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
	<h1>
		Movies
	</h1>

	<?php include "../../layouts/alerts.template.php"; ?>

	<table>
		<thead>
			<th>
				#
			</th>
			<th>
				title
			</th>
			<th>
				cover
			</th>
			<th>
				minutes
			</th>
			<th>
				description
			</th>
			<th>
				año
			</th>
			<th>
				clasificacion
			</th>
			<th>
				trailer
			</th>
			<th>
				Categoria
			</th>
		</thead>
		<tbody>
			<?php foreach ($movies as $movie): ?>
			<tr>
				<td>
					<?= $movie['id'] ?>
				</td>
				<td>
					<?= $movie['titulo']?>
				</td>
				<td>
					<img style="width: 20%" src="../../assets/img/movies/<?= $movie['portada'] ?>">
				</td>
				<td>
					<?= $movie['minutos']?>
				</td>
				<td>
					<?= $movie['descripcion']?>
				</td>
				<td>
					<?= $movie['año']?>
				</td>
				<td>
					<?= $movie['clasificacion']?>
				</td>
				<td>
					<?= $movie['trailer']?>
				</td>
				<td>
					<?php foreach ($categories as $category) {
						$id_categoria=$movie['categoria'];
						if ($category['id']==$id_categoria) {
							echo $category['nombre'];
						}
					}?>
				</td>
				<!--<td>
					<a href="details/?id=<?= $movie['id'] ?>">
						show details
					</a>
				</td>-->

			</tr>
			<?php endforeach ?>
		</tbody>
	</table>

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
</body>
</html>