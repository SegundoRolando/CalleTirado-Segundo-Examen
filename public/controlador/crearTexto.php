<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Libros</title>
</head>
<body>
<?php 

include '../../config/conexionDB.php'; 

$codigoaut=$_POST["autSelect"];

$nombrelib = isset($_POST["nombrelib"]) ? mb_strtoupper(trim($_POST["nombrelib"]), 'UTF-8') : null;
$ISBN = isset($_POST["ISBN"]) ? trim($_POST["ISBN"]) : null;
$numpagina = isset($_POST["numpagina"]) ? trim($_POST["numpagina"]) : null;



  $sql = "INSERT INTO libro VALUES (0,'$nombrelib', '$ISBN', '$numpagina')"; 

  if ($conn->query($sql) === TRUE) {
  echo "<p>Se ha registrado el libro correctamemte!!!</p>"; 

  $consulta="SELECT * FROM libro ";
  $res=$conn->query($consulta);
  if($res->num_rows>0){
     while($row = $res->fetch_assoc()){
         $codigolib = ($row["lib_codigo"]);
     }
 }

  
 $sql = "INSERT INTO capitulo VALUES (0, '$numcapitulo', '$titulocap','$codigoaut','$codigolib')"; 
 echo($sql);
  if ($conn->query($sql) === TRUE) {
     echo "<p>Se ha registrado el libro correctamemte!!!</p>"; 
    
    } else if($conn->error == 1062){
    echo "<p class='error'>El libro NO se registro en el sistema </p>"; 
     }else{
     echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    } 

    header("location: ../vista/inicio.html");

  } else if($conn->error == 1062){
  echo "<p class='error'>El libro $nombrelib ya esta registrada en el sistema </p>"; 
  }else{
  echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 } 

 $conn->close();

?>
    
</body>
</html>

























