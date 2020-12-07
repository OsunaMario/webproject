<?php


include_once "app.php";
include_once "connectionController.php";

if (isset($_POST['action'])) {

	if (isset($_POST['token']) && $_POST['token']==$_SESSION['token']) { 

		$movieController = new MovieController();

		switch ($_POST['action']) {
			case 'store':

				$title = strip_tags($_POST['title']);
				$descripiton = strip_tags($_POST['description']);
				$clasification = strip_tags($_POST['clasification']);
				$minutes = strip_tags($_POST['minutes']);
				$año = strip_tags($_POST['año']);
				$trailer = strip_tags($_POST['trailer']);
				$category_id = strip_tags($_POST['category_id']);
				
				$movieController->store($title,$descripiton,$clasification,$minutes,$año,$trailer,$category_id);
			break; 
		}
		
	}else{

		$_SESSION['error'] = 'de seguridad';
		header("Location:". $_SERVER['HTTP_REFERER'] );
	}
}

class MovieController
{
	public function get()
	{
		$conn = connect();
		if ($conn->connect_error==false) {
			
			$query = "select * from movies";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);

			if (count($movies)>0) {
				return $movies;
			}else
				return array();

		}else
			return array();
	}

	public function store($title,$description,$clasification,$minutes,$año,$trailer,$category_id)
	{
		$conn = connect();
		if ($conn->connect_error==false){

			if ($title!="" && $description!="" && $minutes!="" && $clasification!="" && $category_id!="" && $minutes!=""  && $año!="" ) {
				
				// SUBIR ARCHIVO COVER
				$target_path = "../assets/img/movies/";
				$original_name = basename($_FILES['cover']['name']);
				$new_file_name = $target_path.basename($_FILES['cover']['name']);

				if (move_uploaded_file($_FILES['cover']['tmp_name'], $new_file_name)) {
				// SUBIR ARCHIVO COVER
					
					$query = "insert into movies (titulo,descripcion,clasificacion,minutos ,año,portada,trailer,categoria ) values(?,?,?,?,?,?,?,?)";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('sssiissi',$title,$description,$clasification,$minutes,$año,$original_name,$trailer,$category_id);

					if ($prepared_query->execute()) {
						
						$_SESSION['success'] = "el registro se ha guardado correctamente";

						header("Location:". $_SERVER['HTTP_REFERER'] );

					}else{

						$_SESSION['error'] = 'verifique los datos envíados';

						header("Location:". $_SERVER['HTTP_REFERER'] );
					}


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
}