
<html>
<h1>Registro de Usuarios</h1>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-16">
      <script type="text/javascript" src="js/editcheck.js"></script>
      <link rel="stylesheet" href="css/styles.css" type="text/css">
      <title>Festividades Sustentables</title>
   </head>
<?php

include 'funciones.php';
include 'DBConfig.php';
#include 'DBLocal.php'; 

$array=array_recibe($_GET['serial']);

if( isset($array['error']) and $array['error']=="1") { ?>  <h2>El user ingresado ya está registrado</h2><br><br><?php } ?>

<form method="POST" onsubmit="return valforms(this)" name="formulario" action='inscribir.php'>
   <label>Los campos indicados con * son obligatorios</label><br><br>

  <label>
    <input id="fname" type="text" placeholder="Nombre*" name="nombre" maxlength=35 value= "<?php if(isset($array["nombre"])) echo $array["nombre"];?>" class="err" editcheck="req=Y=Nombre es un campo requerido.;cvt=UT;type=alpha">
    <span>Nombre</span>
  </label>  

  <label>
    <input id="fname" type="text" placeholder="Apellido*" name="apellido" maxlength=35 value= "<?php if(isset($array["apellido"])) $array["apellido"];?>" class="err" editcheck="req=Y=Apellido es un campo requerido.;cvt=UT;type=alpha">
    <span>Apellido</span>
  </label>

  <label>
    <input type="email" placeholder="Email*" name="email" value="<?php if(isset($array["email"])) echo $array["email"];?>" editcheck="req=Y=Email es un campo requerido;type=email" maxlength=35>
    <span>Email</span>
  </label>

  <label>
    <input type="text" id="fname" placeholder="Telefono*" name="telefono" maxlength=15 id="telefono" value="<?php if(isset($array["telefono"])) echo $array["telefono"];?>" editcheck="req=Y=Telefono es un campo requerido;type=phone">
    <span>Teléfono</span>
  </label>

  <label>
    <input type="text" id="fname" placeholder="Usuario*" name="user" maxlength=20 id="user" value="<?php if(isset($array["user"])) echo $array["user"];?>" editcheck="req=Y=Usuario es un campo requerido;type=alphanum">
    <span>Usuario</span>
  </label>

  <label>
    <input type="password" id="fname" placeholder="Contraseña*" name="password" maxlength=15 id="password" value="<?php if(isset($array["password"])) echo $array["password"];?>" editcheck="req=Y=Password es un campo requerido;type=alphanum">
    <span>Contraseña</span>
  </label>

  <input type="submit" value="Registrarme">
</form> 
  
   </body>
</html>