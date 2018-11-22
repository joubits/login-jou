<?php
require('db.php');
require_once 'auth.php';
$id=$_REQUEST['id'];
$query = "SELECT * from usuario where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Usuario</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Inicio</a> 
| <a href="crear_usuario.php">Crear nuevo usuario</a> 
| <a href="logout.php">Logout</a></p>
<h1>Editar Usuario</h1>
<?php
$status = "";
//crear usuario
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$nombres =$_REQUEST['nombres'];
$usuario =$_REQUEST['usuario'];
$email = $_REQUEST['email'];

$update="update usuario set nombres='".$nombres."',
usuario='".$usuario."', email='".$email."'
where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Usuario editado correctamente. </br></br>
<a href='consultar_usuario.php'>Consultar Usuario ingresado Aqui</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {

?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
Nombre: <p><input type="text" name="nombres" placeholder="Ingrese nombre" 
required value="<?php echo $row['nombres'];?>" /></p>
Usuario: <p><input type="text" name="usuario" placeholder="Ingrese usuario" 
required value="<?php echo $row['usuario'];?>" /></p>
Email: <p><input type="text" name="email" placeholder="Ingrese email" 
required value="<?php echo $row['email'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>