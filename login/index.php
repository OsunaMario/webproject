<?php 

include "../app/app.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Login
	</title>
	<link rel="stylesheet" type="text/css" href="../assets/style/login.css? v=7">
</head>
<body style="margin: 0;">
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
							Inicio
						</a>
					</li>
					<li>
						<a href="../home/index.php">
							Peliculas
						</a>
					</li>
					<li>
						<a href="">
							Categorias
						</a>
					</li>
				</ul>
				<div class="buscador">
					<input type="text" name="buscador" placeholder="Buscar pelicula">
				</div>
				<div class="user">
					<a href="">
						<img src="../assets/img/header/logout.png">
					</a>
				</div>

				
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
					<img src="../assets/img/header/user.png">
					<div style="width: inherit;">
						<?php include "../layouts/alerts.template.php"; ?>
					</div>
					
					<form method="POST" action="../auth">
						<label>
							Usuario
						</label>
						<input type="email" name="email" placeholder="email@correo.com" required="">
						<label>
							Contraseña
						</label>
						<input type="password" name="password" placeholder="*****" required="">
						<button type="submit"> 
							Iniciar sesion
						</button>
						<input type="hidden" name="action" value="login">
						<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
					</form>
				<label>
					¿No estas registrado? pulsa <a href="../registro/">aquí</a>
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
</body>
</html>