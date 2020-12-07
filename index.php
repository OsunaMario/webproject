<!-- 
VISTA HECHA POR EUDALDO
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shared film</title>
	<link rel="stylesheet" type="text/css" href="assets/style/login.css? v=7">
</head>
<body style="margin:0;">
	<div id="container">
		<!--==================
			Header-start
		===================-->
		<div id="header">
			<div class="logo">
				<a href="home/index.php">
					<img src="assets/img/header/logo.png">
				</a>
				
			</div>
			<div class="links">
				<ul>
					<li>
						<a href="home/index.php">
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
							<a href="">
								<img src="assets/img/header/logout.png">
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
							Iniciar sesion
						</label>
					</legend>
					<img src="assets/img/header/user.png">
					<form method="POST" action="../assets/app/authController.php">
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
						<input type="hidden" name="login" value="login">
						<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
					</form>
				<label>
					¿No estas registrado? pulsa <a href="registro/index.php">aquí</a>
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
							<img src="assets/img/footer/fb.png">
						</a>
					</li>
					<li>
						<a href="">
							<img src="assets/img/footer/tw.png">
						</a>
					</li>
					<li>
						<a href="">
							<img src="assets/img/footer/in.png">
						</a>
					</li>
					<li>
						<a href="">
							<img src="assets/img/footer/g.png">
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