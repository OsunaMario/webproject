<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		.bg{
			background-color: black;
			filter: blur();
		}
	</style>
</head>
<body>
	`<div class="bg">
		<div id="login">
			<div class="container">
				<fieldset>
					<legend>
						<label>
							Iniciar sesion
						</label>
					</legend>
					<img src="../assets/img/header/user.png">
					<form>
						<label>
							Usuario
						</label>
						<input type="text" name="user" placeholder="User" required="">
						<label>
							Contraseña
						</label>
						<input type="password" name="password" placeholder="*****" required="">
						<button>
							Iniciar sesion
						</button>
					</form>
				<label>
					¿No estas registrado? pulsa <a href="registro/index.php">aquí</a>
				</label>
				</fieldset>
			</div>
		</div>
	</div>
</body>
</html>