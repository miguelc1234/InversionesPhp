<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Login ZmartBuy</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

		<!-- Open Sans font from Google CDN -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

		<!-- Pixel Admin's stylesheets -->
		<link href="Views/assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="Views/assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
		<link href="Views/assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
		<link href="Views/assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
		<link href="Views/assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

		<!--[if lt IE 9]>
			<script src="Views/assets/javascripts/ie.min.js"></script>
		<![endif]-->

	</head>

	<!-- 1. $BODY ======================================================================================
		
		Body

		Classes:
		* 'theme-{THEME NAME}'
		* 'right-to-left'     - Sets text direction to right-to-left
	-->
	<body class="theme-default">

	<div id="signIn">
		<div id="page-signin-bg">
			<!-- Background overlay -->
			<div class="overlay"></div>
			<!-- Replace this with your bg image -->
			<img src="Views/assets/demo/signin-bg-3.jpg" alt="">
		</div>
		<!-- / Page background -->

		<!-- Container -->
		<div class="signin-container">
			<!-- Left side -->
			<div class="signin-info">
				<a href="" class="logo">
					<h1><strong>ZmartBuy</strong></h1>
				</a> <!-- / .logo -->
				<div class="slogan">
					Para los que compran Inteligentemente.
				</div> <!-- / .slogan -->
				<ul>
					
				</ul> <!-- / Info list -->
			</div>
			<!-- / Left side -->

			<!-- Right side -->
			<div class="signin-form">

				<!-- Form -->
				<form id="signin-form_id">
					<div class="signin-text">
						<span>Ingresa a tu Cuenta</span>
					</div> <!-- / .signin-text -->

					<div class="form-group w-icon">
						<input type="text" name="signin_username" id="username_id" class="form-control input-lg" placeholder="Nombre de Usuario">
						<span class="fa fa-user signin-form-icon"></span>
					</div> <!-- / Username -->

					<div class="form-group w-icon">
						<input type="password" name="signin_password" id="password_id" class="form-control input-lg" placeholder="Contraseña">
						<span class="fa fa-lock signin-form-icon"></span>
					</div> <!-- / Password -->

					<div class="form-actions">
						<input type="submit" value="INGRESAR" class="signin-btn bg-primary">
						<a href="#" class="forgot-password" id="forgot-password-link">Olvido su Contraseña?</a>
					</div> <!-- / .form-actions -->
					<input type="hidden" name="option" id="option" value="signInUsser">
				</form>
				<!-- / Form -->

				<!-- "Sign In with" block -->
				<div class="signin-with">
					<!-- Facebook -->
					<a href="index.php" class="signin-with-btn" style="background:#3B5998;background:rgba(59, 89, 152, 1);">Ingresar con <span>Facebook</span></a>
				</div>
				<!-- / "Sign In with" block -->

				<!-- Password reset form -->
				<div class="password-reset-form" id="password-reset-form">
					<div class="header">
						<div class="signin-text">
							<span>Cambiar Contraseña</span>
							<div class="close">&times;</div>
						</div> <!-- / .signin-text -->
					</div> <!-- / .header -->
					
					<!-- Form -->
					<form action="index.php" id="password-reset-form_id">
						<div class="form-group w-icon">
							<input type="text" name="password_reset_email" id="p_email_id" class="form-control input-lg" placeholder="Ingrese su email">
							<span class="fa fa-envelope signin-form-icon"></span>
						</div> <!-- / Email -->

						<div class="form-actions">
							<input type="submit" value="ENVIAR AL CORREO ELECTRONICO" class="signin-btn bg-primary">
						</div> <!-- / .form-actions -->
					</form>
					<!-- / Form -->
				</div>
				<!-- / Password reset form -->
			</div>
		</div>
		<div class="not-a-member">
			Aun no tienes Cuenta? <a href="#1" id="CreateAccount"> Crear Cuenta</a>
		</div>'
	</div>
		
	<div id="signUp">
		<!-- Page background -->
		<div id="page-signin-bg">
			<!-- Background overlay -->
			<div class="overlay"></div>
			<!-- Replace this with your bg image -->
			<img src="Views/assets/demo/signin-bg-3.jpg" alt="">
		</div>
		<!-- / Page background -->

		<!-- Container -->
		<div class="signup-container">

			<div class="signup-header">
				<a href="index.php" class="logo">
			   		<h1><strong>ZmartBuy</strong></h1>
		   		</a>
				<div class="slogan">
					Para los que compran Inteligentemente.
				</div> <!-- / .slogan -->
			</div>
			<!-- / Header -->

			<!-- Form -->
			<div class="signup-form">
				<form id="signup-form_create_account">
					
					<div class="signup-text">
						<span>Crear una Cuenta</span>
					</div>

					<div class="form-group w-icon">
						<input type="text" name="signup_name" id="name_id" class="form-control input-lg" placeholder="Nombre Completo">
						<span class="fa fa-info signup-form-icon"></span>
					</div>

					<div class="form-group w-icon">
						<input type="text" name="signup_email" id="email_id" class="form-control input-lg" placeholder="E-mail">
						<span class="fa fa-envelope signup-form-icon"></span>
					</div>

					<div class="form-group w-icon">
						<input type="text" name="signup_username" id="username_id" class="form-control input-lg" placeholder="Cuenta de Usuario">
						<span class="fa fa-user signup-form-icon"></span>
					</div>

					<div class="form-group w-icon">
						<input type="password" name="signup_password" id="password_id" class="form-control input-lg" placeholder="Contraseña">
						<span class="fa fa-lock signup-form-icon"></span>
					</div>

					<div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
						<label class="checkbox-inline">
							<input type="checkbox" name="signup_confirm" class="px" id="confirm_id">
							<span class="lbl">Yo Acepto los <a href="#" target="_blank">Terminos y Condiciones</a></span>
						</label>
					</div>

					<div class="form-actions">
						<input type="submit" value="GUARDAR" class="signup-btn bg-primary">
					</div>

					<input type="hidden" name="option" id="option" value="createUsser">
				</form>
				<!-- / Form -->

				<!-- "Sign In with" block -->
				<div class="signup-with">
					<!-- Facebook -->
					<a href="index.html" class="signup-with-btn" style="background:#3B5998;background:rgba(59, 89, 152, 1)">Ingresar con <span>Facebook</span></a>
				</div>
				<!-- / "Sign In with" block -->
			</div>
		</div>
		<div class="have-account">
			Ya tienes una Cuenta? <a href="#2" id="formSignUp">Ingresar</a>
		</div>
	</div>	

	<!-- Get jQuery from Google CDN -->
	<!--[if !IE]> -->
		<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
	<!-- <![endif]-->
	<!--[if lte IE 9]>
		<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
	<![endif]-->

	<!-- Pixel Admin's javascripts -->
		<script src="Views/assets/javascripts/bootstrap.min.js"></script>
		<script src="Views/assets/javascripts/pixel-admin.min.js"></script>
		<script src="Views/assets/javascripts/InteraccionLogin.js"></script>

	</body>
</html>
