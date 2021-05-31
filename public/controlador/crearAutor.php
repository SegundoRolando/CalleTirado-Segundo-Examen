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
 
 //incluir conexión a la base de datos
 
 <?php 
 include '../../config/conexionDB.php'; 

 $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
 $apellido = isset($_POST["apellido"]) ? trim($_POST["apellido"]) : null;
 $nacionalidad = isset($_POST["nacionalidad"]) ? trim($_POST["nacionalidad"]): null;
 $anio = isset($_POST["anio"]) ? trim($_POST["anio"]): null; 
 
  $sql = "INSERT INTO autor VALUES (0, '$nombre', '$apellido', '$nacionalidad', '$anio', 'N', null, null)"; 
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
 echo "<a href='../vista/inicio.html'>Regresar</a>";
 ?>
</body>
</html>





