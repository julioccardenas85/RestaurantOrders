<?php
session_start();
require_once "../model/Usuario.php";

$usu = new Usuario();

switch($_REQUEST["operador"]){
	case "validar_usuario":
	    if(isset($_POST["email"],$_POST["contrasena"]) && !empty($_POST["email"]) && !empty($_POST["contrasena"])){
			if($user = $usu->ValidarUsuario($_POST["email"],$_POST["contrasena"])){
				foreach($user as $campos => $valor){
					$_SESSION["user"][$campos] = $valor;
				}
				$response = "success";
			} else {
				$response = "notfound";
			}
		} else {
			$response = "requireid";
		}
		echo $response;
	break;

	case "cerrar_sesion":
		unset($_SESSION["user"]);
		header("location:../");
}
?>