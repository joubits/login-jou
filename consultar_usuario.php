<?php
require_once('db.php');
require_once('auth.php');
?>
<!DOCTYPE html>
<html>
<?php require_once 'auth.php'; ?>
<head>
<meta charset="utf-8">
<title>Consultar Usuarios</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Inicio</a> 
| <a href="crear_usuario.php">Crear Usuario</a> 
| <a href="logout.php">Logout</a></p>
<h2>Consulta de Usuarios</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Id</strong></th>
<th><strong>Nombre</strong></th>
<th><strong>Email</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>

<?php
//get users data
$count=1;
$sel_query="Select * from usuario ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["nombres"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center">
<a href="editar_usuario.php?id=<?php echo $row["id"]; ?>">Editar</a>
</td>
<td align="center">
<a href="#" delete="<?php echo $row['id']; ?>" class="delete">Eliminar</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $("a.delete").click(function(e){
        var id = $(this).attr('delete');
        //console.log(id);
        if(!confirm('Are you sure?')){
            return false;
        }else{
            location.href = "eliminar_usuario.php?id="+id;
            return true;
        }
    });
</script>
</body>
</html>