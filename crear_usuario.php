<?php require_once 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Crear Usuario</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<p><a href="index.php">Inicio</a> 
| <a href="consultar_usuario.php">Consultar Usuarios</a> 
| <a href="logout.php">Logout</a></p>
<?php
require('db.php');
require_once 'auth.php';
// If form submitted, insert values into the database.
if(isset($_POST['submit'])){
        // removes backslashes
	$nombres = stripslashes($_REQUEST['nombres']);
    $usuario = stripslashes($_REQUEST['usuario']);
	$email = stripslashes($_REQUEST['email']);
	$clave = stripslashes($_REQUEST['clave']);

	
	
        
        $query = "INSERT into `usuario` (usuario, clave, email, nombres)
VALUES ('$usuario', '".($clave)."', '$email', '$nombres')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>Se ha registrado correctamente.</h3>
<br/>Click aqui para consultar usuarios <a href='consultar_usuario.php'>Consultar Usuarios</a></div>";
        }
        
    }else{
?>
<div class="form">
<h1>Crear Usuario</h1>
<form name="form_usuario" action="" method="post">
Nombre: <input type="text" name="nombres" placeholder="Nombres" required /><br/>
Usuario: <input type="text" name="usuario" placeholder="Usuario" required /><br/>
Email: <input type="email" name="email" placeholder="Email" required /><br/>
Clave: <input type="password" name="clave" placeholder="Clave" required /><br/>
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>