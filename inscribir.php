<?php
include 'DBConfig.php';
#include 'DBLocal.php';
include 'funciones.php';

$nombre = GetSQLValueString($_POST["nombre"], 'varchar');
$apellido = GetSQLValueString($_POST["apellido"], 'varchar');
$email = GetSQLValueString($_POST["email"], 'varchar');
$telefono = GetSQLValueString($_POST["telefono"], 'varchar');
$user = GetSQLValueString($_POST["user"], 'varchar');
$password = md5(GetSQLValueString($_POST["password"], 'varchar'));
cargarArrayRetorno();
$consulta = "SELECT user FROM usuarios WHERE user LIKE '$user' ";
$resultado = mysql_query($consulta);
if (mysql_num_rows($resultado) > 0) {
   $regresar = true;
   $array['error'] = "1";
	if($regresar){
		$serial = array_envia($array);
		header("Location: form.php?serial=$serial");
		exit();
	}
}   //FIX ME poner este segmento en una libreria "Comprobar Usuario"

else{
	$consulta = "INSERT INTO usuarios (nombre, apellido, email, telefono, user, password, creadoEl) 
											   VALUES(
											   '$nombre',
											   '$apellido',
											   '$email',
											   '$telefono',
											   '$user',
											   '$password',
											   NULL
											   )";
	$resultado = mysql_query($consulta);
		if (!$resultado) {
	    	die('Consulta no valida: ' . mysql_error());
		}
		else{
			$serial = array_envia($array);
			header("Location: registroExitoso.php?user=$user");
		}
	}

function cargarArrayRetorno(){
	$array['nombre'] = strtoupper($nombre);
	$array['apellido'] =  strtoupper($apellido);
	$array['email'] = $email;
	$array['telefono'] = $telefono;
	$array['user'] = $user;
	$array['password'] = $pass;
}
?>
