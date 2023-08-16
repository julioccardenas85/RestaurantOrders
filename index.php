<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Pizzeria</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
	<div class="container">
        <div class="login_box">
            <div class="login_title"><h1>Bienvenido</h1></div>
            <div class="logo_div"><img src="img/logo.jpg" class="login_logo"></div>
            <div class="input_title">Email</div>
            <div class="login_input"><input type="text" placeholder="Ingresa tu email" id="user_email"></div>
            <div class="input_title">Contraseña</div>
            <div class="login_input"><input type="password" placeholder="Ingresa tu contraseña" id="user_contrasena"></div>
            <div ><button type="submit" onclick="ValidarUsuario();" class="btn-grad">Iniciar sesión</button></div>
            <div id="login_status"></div>
        </div>
    </div>
    <div id="login_status"></div>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/Usuario.js" type="text/javascript"></script>
</body>
</html>