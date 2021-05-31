<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear nuevo libro</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>
 <?php 
 //incluir conexión a la base de datos
 include '../../config/conexionDB.php'; 
 $numpag = isset($_POST["numpag"]) ? trim($_POST["numpag"]) : null;
 $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
  $sql = "INSERT INTO capitulo VALUES (0, '$numpag', '$nombre', 'N', null, null)"; 
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha creado los datos personales correctamemte!!!</p>"; 
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>"; 
 }else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 } 
 }
 
 //cerrar la base de datos
 $conn->close();
 echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
 
 ?>
</body>
</html>