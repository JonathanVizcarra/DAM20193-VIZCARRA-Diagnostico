<?php
	session_start();
	include("validar_dato.php");

   	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	   	$usuario=validar_dato($_POST["usuario"]);
	   	$password=validar_dato($_POST["password"]);

		   	if ($usuario == "admin" && $password == "admin") {

		   		$_SESSION["nombre"] = $usuario;
		   		header("Location: principal.php");
		   			
	   		}else{
	   			header("Location: index.html");
	   		}
    }
    else{
   		header("Location: index.html");
    }
?>