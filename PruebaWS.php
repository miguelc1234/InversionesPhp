<?php
	$loginURL = 'http://localhost/ZmartBuy/ApiREST/LoginUsser';

	$authUsser = file_get_contents($loginURL);

	$message = json_decode($authUsser);

	echo '<h1>'.$message->items.'</h1>';

?>

<form action="ApiREST/LoginUsser" method="POST">
	<div>
		<span>Ingresa a tu Cuenta</span>
	</div> <!-- / .signin-text -->

	<div>
		<input type="text" name="signin_username" id="username_id" placeholder="Nombre de Usuario">
	</div> <!-- / Username -->

	<div>
		<input type="password" name="signin_password" id="password_id" placeholder="Contraseña">
	</div> <!-- / Password -->

	<div>
		<input type="submit" value="INGRESAR">
	</div> <!-- / .form-actions -->
</form>
<!-- / Form -->