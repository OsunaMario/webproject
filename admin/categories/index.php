<?php 
	
	include "../../app/categoryController.php";
	$categoryController = new CategoryController();

	$categories = $categoryController->get();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Categories
	</title>
	<link rel="stylesheet" type="text/css" href="../../assets/style/categories_admin.css?=1">
</head>
<body style="margin: 0;">
	<!--====================
		categories-Start
	=====================-->
	<div id="categories">
		<table>
			<thead>
				<th>
					#
				</th>
				<th>
					Name
				</th>
				<th>
					Description
				</th>
				<th>
					Actions
				</th>
			</thead>
			<tbody>

				<?php foreach ($categories as $category): ?>

				<tr>
					
					<td>
						<?= $category['id'] ?>
					</td>
					<td>
						<?= $category['nombre'] ?>
					</td>
					<td>
						<?= $category['descripcion'] ?>
					</td>
					
					<td>
						<button onclick="edit(<?= $category['id'] ?>,'<?= $category['nombre'] ?>','<?= $category['descripcion'] ?>')">
							Edit category
						</button>

						<button onclick="remove(<?= $category['id'] ?>)" style="background-color: red;color:white;">
							Delete category
						</button>
					</td>
				</tr>
				<?php endforeach  ?>
			</tbody>
		</table>
	</div>
	<!--====================
		categories-end
	=====================-->
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
					<span>Categorias</span>
				</li>
				<li>
					<a href="../movies/">Movies</a>
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
		var_nav-Start
	=====================-->
	<!--====================
		add-Start
	=====================-->
	<div id="add" >
		<form id="storeForm" action="<?= BASE_PATH ?>/category" method="POST">
			<fieldset>
				
				<legend>
					Add new Category
				</legend>

				<label>
					Name
				</label>
				<input type="text"  name="name" placeholder="terror" required=""> 
				<br>

				<label>
					Description
				</label>
				<textarea placeholder="write here" name="description" rows="15" cols="50" required=""></textarea>
				<br>

				<button type="submit" >Save Category</button>
				<input type="hidden" name="action" value="store">
				<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

			</fieldset>
		</form>
	</div>
	<!--====================
		add-end
	=====================-->
	<!--====================
		edit-Start
	=====================-->
	<div id="edit" style="display: none;">
		<form id="updateForm" action="../../category" method="POST">
			<fieldset>
				
				<legend>
					Edit Category
				</legend>

				<label>
					Name
				</label>
				<input type="text" id="name" name="name" placeholder="terror" required=""> 
				<br>

				<label>
					Description
				</label>
				<textarea placeholder="write here" id="description" name="description" rows="15" cols="50" required=""></textarea>
				<br>

				<button type="submit" >Save Category</button>
				<input type="hidden" name="action" value="update">
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

			</fieldset>
		</form>
	</div>
	<!--====================
		edit-end
	=====================-->
	<div id="eliminar">
		<form id="destroyForm" action="../../category" method="POST">

			<input type="hidden" name="action" value="destroy">
			<input type="hidden" name="id" id="id_destroy">
			<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

		</form>
	</div>
	
	
	<script type="text/javascript">
		function edit(id,nombre,descripcion)
		{	
			document.getElementById('add').style.display="none";
			document.getElementById('edit').style.display="block";

			document.getElementById('name').value = nombre;
			document.getElementById('description').value = descripcion;
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