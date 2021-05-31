<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
 //incluir conexión a la base de datos

 include '../../config/conexionDB.php'; 
 
 $nombre = $_GET['nombre']; 
 
 

$sql = "SELECT * FROM autor,libro, capitulo  WHERE aut_nombres='$nombre' and libro.cap_codigo=capitulo.cap_codigo and libro.aut_codigo=autor.aut_codigo"; 

//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Autor Nombre</th>
 <th>Apellido Autor</th>
 <th>Nacionalidad</th> 
 <th>Año</th>
 <th>Nombre del libro</th>
 <th>Codigo del libro</th> 
 <th>Paginas Texto</th>
 <th>Titulo del capitulo</th> 
 
 </tr>";
 if ($result->num_rows > 0) { 
 while($row = $result->fetch_assoc()) {
        echo "Datos encontrados";
        echo "<tr>";
        echo " <td>" . $row['aut_nombres'] . "</td>";
        echo " <td>" . $row['aut_apellidos'] . "</td>";
        echo " <td>" . $row['aut_nacionalidad'] ."</td>";
        echo " <td>" . $row['aut_anio'] . "</td>";
        echo " <td>" . $row['lib_nombre'] . "</td>";
        echo " <td>" . $row['lib_isbn'] . "</td>";
        echo " <td>" . $row['lib_numpag'] . "</td>";
        echo " <td>" . $row['cap_titulo'] . "</td>";
        echo "</tr>"; 
        

 } 
 } else { 
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>"; 
 }
 
 echo "</table>";
 $conn->close(); 
 
?>
 <div class="header-superior-derecha">
                <div class="navigation login">
                    <a href="">Llamar</a>
                    <a href="#">Detalle</a>
                    <a href="inicio.html">Regresar</a>
                </div>
                
          </div>
</body>
</html>