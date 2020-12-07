<?php


include_once "app.php";
include_once "connectionController.php";

if (isset($_POST['action'])) {

	if (isset($_POST['token']) && $_POST['token']==$_SESSION['token']) { 
	
		$categoryController = new CategoryController();

		switch ($_POST['action']) {
			case 'store':
				
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);

				$categoryController->store($name,$description);

			break; 
			case 'update':

				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$id = strip_tags($_POST['id']);

				$categoryController->update($id,$name,$description);
			break;
			case 'destroy':

				$id = strip_tags($_POST['id']);

				$categoryController->destroy($id);
			break;
		}
		
	}else{

		$_SESSION['error'] = 'de seguridad';
		header("Location:". $_SERVER['HTTP_REFERER'] );
	}
}

class CategoryController
{

	public function get()
	{
		$conn = connect();
		if ($conn->connect_error==false) {
			
			$query = "select * from categorias";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$categories = $results->fetch_all(MYSQLI_ASSOC);

			if (count($categories)>0) {
				return $categories;
			}else
				return array();

		}else
			return array();
	}

	public function store($name,$description)
	{
		$conn = connect();
		if ($conn->connect_error==false) {

			if ($name!="" && $description!="") {
				
				$query = "insert into categorias (nombre,descripcion) values(?,?)";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ss',$name,$description);
				if ($prepared_query->execute()) {
					
					$_SESSION['success'] = "el registro se ha guardado correctamente";

					header("Location:". $_SERVER['HTTP_REFERER'] );

				}else{

					$_SESSION['error'] = 'verifique los datos envíados';

					header("Location:". $_SERVER['HTTP_REFERER'] );
				}

			}else{

				$_SESSION['error'] = 'verifique la información del formulario';

				header("Location:". $_SERVER['HTTP_REFERER'] );
			}

		}else{

			$_SESSION['error'] = 'verifique la conexión a la base de datos';

			header("Location:". $_SERVER['HTTP_REFERER'] );
		}
	}

	public function update($id,$name,$description)
	{
		$conn = connect();
		if ($conn->connect_error==false) {
			
			if($id !="" && $name!="" && $description!=""){

				$query = "update categorias set nombre = ?, descripcion = ? where id = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ssi',$name,$description,$id);
				if ($prepared_query->execute()) {

					header("Location:".$_SERVER['HTTP_REFERER']);
				}else{

					header("Location:".$_SERVER['HTTP_REFERER']);
				}

			}else{
				header("Location:".$_SERVER['HTTP_REFERER']);
			}

		}else{
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
	}

	public function destroy($id)
	{
		$conn = connect();
		if ($conn->connect_error==false) {
			
			if ($id != "") {
				
				$query = "delete from categorias where id = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('i',$id);
				if ($prepared_query->execute()) {

					header("Location:".$_SERVER['HTTP_REFERER']);
				}else{
					header("Location:".$_SERVER['HTTP_REFERER']);
				}

			}else{
				header("Location:".$_SERVER['HTTP_REFERER']);
			}


		}else{
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
	}
}

?>