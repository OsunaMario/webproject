<?php 


include_once "app.php";
include_once "connectionController.php";

if (isset($_POST['action'])) {

	if (isset($_POST['token']) && $_POST['token']==$_SESSION['token']) { 

		$authController = new AuthController();

		switch ($_POST['action']) {
			case 'registro':
				var_dump($_POST);
				$nombres= strip_tags($_POST['nombres']);
				$apellidos = strip_tags($_POST['apellidos']);
				$user = strip_tags($_POST['user']);
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);

				$authController->register($nombres,$apellidos,$user,$email,$password);

			break;
			case 'login':
				
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);

				$authController->access($email,$password);

			break; 
		}

	}else{

		$_SESSION['error'] = 'de seguridad';
		header("Location:". $_SERVER['HTTP_REFERER'] );
	}
}

class AuthController
{

	public function register($nombres,$apellidos,$user,$email,$password)
	{
		$conn = connect();
		if (!$conn->connect_error) { 

			if ($nombres!=""&& $apellidos!="" && $user!="" && $email != "" && $password != "") {
				
				$originalPassword = $password;
				$password = sha1($password.'Espero_poder_pasar_la_materia');

				$query = "insert into usuarios (nombres,apellidos,nickname,email,contraseña) value (?,?,?,?,?)";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('sssss',$nombres,$apellidos,$user,$email,$password);

				if ($prepared_query->execute()) {
					
					$this->access($email,$originalPassword);

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

	public function access($email,$password)
	{
		$conn = connect();
		if (!$conn->connect_error) {
			if ($email!="" && $password!="") {
				$password = sha1($password.'Espero_poder_pasar_la_materia');

				$query = "select * from usuarios where email = ? and contraseña = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ss',$email,$password);

				if ($prepared_query->execute()) {
					
					$results = $prepared_query->get_result(); 

					$user = $results->fetch_all(MYSQLI_ASSOC);

					if (count($user)>0) {
						
						$user = array_pop($user);

						$_SESSION['id'] = $user['id'];
						$_SESSION['name'] = $user['name'];
						$_SESSION['email'] = $user['email'];  


						header("Location:"."../home" );
					}else{
						$_SESSION['error'] = 'No existe el usuario'; 
						header("Location:". $_SERVER['HTTP_REFERER'] );
					}


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

	public function logout()
	{

	}

}



?>