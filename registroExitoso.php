 <head>
<meta charset="UTF-8">
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/styles.css"> 
<?php
echo "<div id='textArea'>";
include 'DBLocal.php';
#include 'DBConfig.php';
if (!isset($_GET['user'])){ ?>
	<h2> <?php
	$mensaje = "Disculpe, algo salió mal. Por favor intente nuevamente";	
	echo '<p>'.$mensaje.'</p>'; ?> </h2> <?php
}
else{	
	if (isset($_GET['error'])){
		echo $_GET['error'];
	}
	else{
		$user = $_GET['user'];
		$consulta ="SELECT user FROM usuarios WHERE user LIKE '$user'"; //FIX ME, optimizar esto, es solo para ver si existe.
		$resultado = mysql_query($consulta);
		if (mysql_num_rows($resultado) < 1){
			$error = mysql_error();
			header("Location: registroExitoso.php?error=$error");
			exit();		
		}
		else{
			?> <h2> <?php
			$mensaje =  nl2br('Su usuario se ha creado con éxito.'."\n".
			'Cualquier consulta o sugerencia remita un correo a proyectocolmena16@gmail.com'."\n");
			echo '<p>'.$mensaje.'</p>'; ?>
			</h2> <?php
		}
	}
}
echo "</div>";
?>
</body>
