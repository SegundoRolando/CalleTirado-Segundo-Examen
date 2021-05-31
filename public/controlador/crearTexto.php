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
 $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
 $isbn = isset($_POST["isbn"]) ? mb_strtoupper(trim($_POST["isbn"]), 'UTF-8') : null;
 $numpag = isset($_POST["numpag"]) ? mb_strtoupper(trim($_POST["numpag"]), 'UTF-8') : null;
 $sql = "INSERT INTO libro VALUES (0, '$nombre', '$isbn', '$numpag', 'N', null, null)"; 





 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha creado los datos personales correctamemte!!!</p>"; 

 $sql_consulta = mysqli_query($conn, "SELECT lib_codigo FROM libro WHERE lib_nombre=$nombre");
 $cap_codigo = (int) $sql_consulta->fetch_assoc()['cap_codigo'];

 $ph_type = 'MOVIL';
 $ph_number = isset($_POST['movil'])?trim(trim($_POST['movil'])):null ;
 $ph_ope_id = (int) isset($_POST['operadoraMovil'])?trim($_POST['operadoraMovil']):null;
 $sql = "INSERT INTO phone VALUES (0, '$ph_type', '$ph_number', 'N', now(), null, '$ph_ope_id', '$ph_usu_id')";


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