<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="./vista/css/normalize.css">
	<link rel="stylesheet" href="./vista/css/sweetalert2.css">
	<link rel="stylesheet" href="./vista/css/material.min.css">
	<link rel="stylesheet" href="./vista/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="./vista/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="./vista/css/main.css">
	
</head>
<body class="cover">
	<div class="container-login">
		<p class="text-center" style="font-size: 80px;">
			<i class="zmdi zmdi-account-circle"></i>
		</p>
		<p class="text-center text-condensedLight">Inicia sesión con tu cuenta</p>
		<form action="" method="GET" autocomplete="off">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" id="userName">
			    <label class="mdl-textfield__label" for="userName">User Name</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="password" id="pass">
			    <label class="mdl-textfield__label" for="pass">Password</label>
			</div>
			<button name="accion" type="submit" value="" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
				Sign in <i class="zmdi zmdi-mail-send"></i>
			</button>
		</form>
	</div>
	<?php 
		if(isset($_GET['accion'])){
			header("location:./vista/plantilla.php");
		} 
		 ?>
		
</body>
</html>