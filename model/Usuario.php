<?php
	require "../config/Conexion.php";

	class Usuario {
		public $cnx;

		function __construct()
		{
			$this->cnx = Conexion::ConectarDB();
		}

		function RegistrarUsuario($nombre,$apellido,$email,$contrasena)
		{
			$query = "INSERT INTO usuarios(nombre,apellido,email,contrasena) VALUES (?, ?, ?, ?)";
			$result = $this->cnx->prepare($query);
			$result->bindParam(1,$nombre);
			$result->bindParam(2,$apellido);
			$result->bindParam(3,$email);
			$clave_hash = password_hash($contrasena,PASSWORD_DEFAULT);
			$result->bindParam(4,$clave_hash);

			if($result->execute()){
				return true;
			}
			return false;
		}

		function ValidarUsuario($email,$contrasena)
		{
			$query = "SELECT * FROM usuarios WHERE email = ? ";
			$result = $this->cnx->prepare($query);
			$result->bindParam(1,$email);
			$result->execute();
			$respond = $result->fetch();
			if(password_verify($contrasena,$respond["contrasena"])){
				return $respond;
			}
			return false;
		}
	}
?>