<?php
session_start();
include_once 'db.php';


if(isset($_POST['submit'])){
	//echo $_POST['usuario'] . '...'. $_POST['clave'];
	$usuario_input = $_POST['usuario'];
	$clave_input = $_POST['clave'];

	//MySqli Select Query
	$sql = "SELECT id, usuario, clave FROM usuario where usuario = '$usuario_input' and clave = '$clave_input'";
	//var_dump($sql);
	//exit();
	$result = mysqli_query($con,$sql) or die(mysql_error());
	$rows = mysqli_num_rows($result);

	if($rows>0){
		$_SESSION["usuario"] = $usuario_input;
		header('Location: index.php');
	}else{
		echo "Clave y/o password erroneos...";
	}
}




?>


<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Jou Login</title>
  <meta name="description" content="The HTML5 Form">
  <meta name="author" content="Joubits">

</head>

<body>

	<h2>Inicio de Sesión</h2>
	<form action="" method="post">
	  Usuario: <input type="text" name="usuario"><br>
	  Password: <input type="password" name="clave"><br>
	  <input name="submit" type="submit" value="Enviar">
	</form>

  <script src="js/scripts.js"></script>
</body>
</html>