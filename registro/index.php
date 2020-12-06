<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shared film</title>
	<link rel="stylesheet" type="text/css" href="../assets/style/registro.css? v=6">
</head>
<body style="margin:0;">
	<div id="container">
		<!--==================
			Header-start
		===================-->
		<div id="header">
			<div class="logo">
				<a href="home/index.php">
					<img src="../assets/img/header/logo.png">
				</a>
				
			</div>
			<div class="links">
				<ul>
					<li>
						<a href="../home/index.php">
							<img src="">
							Inicio
						</a>
					</li>
					<li>
						<a href="">
							<img src="">
							Peliculas
						</a>
					</li>
					<li>
						<a href="">
							<img src="">
							Categorias
						</a>
					</li>
					<li>
						<div class="buscador">
							<input type="text" name="buscador" placeholder="Buscar pelicula">
						</div>
					</li>
					<li>
						<div class="user">
							<a href="../index.php">
								<img src="../assets/img/header/user.png">
							</a>
						</div>
					</li>
					
				</ul>
			</div>
		</div>
		<!--==================
			Header-end
		===================-->
		<!--==================
			login-start
		===================-->
		<div id="login">
			<div class="container">
				<fieldset>
					<legend>
						<label>
							Registro
						</label>
					</legend>
					<img src="../assets/img/header/user.png">
					<form>
						<label>
							Usuario
						</label>
						<input type="text" name="user" placeholder="User" required="">
						<label>
							email
						</label>
						<input type="email" name="email" placeholder="email" required="">
						<label>
							Contraseña
						</label>
						<input type="password" name="password" placeholder="*****" required="">
						<div class="condiciones">
							<label>
								Aceptar <a href="">terminos y condiciones</a>
							</label>
							<input type="checkbox" name="terminos" required="">
						</div>
						<button>
							Registrar
						</button>
					</form>
					<label>
						¿Ya tienes una cuenta? Pulsa <a href="../">aqui</a>
					</label>
				</fieldset>
			</div>
		</div>
		<!--==================
			login-end
		===================-->
		<!--==================
			footer-start
		===================-->
		<div id="footer">
			<div class="title">
				<h2>
					About the company
				</h2>
				<p>
					Nosotros somos un grupo de estudiantes que realizaron esta pagina con la intencion de pasar la materia de progrmacion web
				</p>
			</div>
			<div class="social-links">
				<ul>
					<li>
						<a href="">
							<img src="../assets/img/footer/fb.png">
						</a>
					</li>
					<li>
						<a href="">
							<img src="../assets/img/footer/tw.png">
						</a>
					</li>
					<li>
						<a href="">
							<img src="../assets/img/footer/in.png">
						</a>
					</li>
					<li>
						<a href="">
							<img src="../assets/img/footer/g.png">
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!--==================
			footer-end
		===================-->
	</div>
</body>
</html>