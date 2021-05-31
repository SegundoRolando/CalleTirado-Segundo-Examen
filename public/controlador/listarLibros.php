<?php
//Conectar con el servidor
$link=mysqli_connect('localhost:3306','root','');
if(!$link){
    echo'No se pudo establecer conexion con el servidor:'.mysql_error();
}else{
    //Seleccionamos Base de datos
    $base=mysqli_select_db($link, 'biblioteca');
    if(!$base){
        echo'No se encontro la base de datos:'.mysqli_error();
    }else{
      //Sentencia SQL
      $sql= "SELECT * FROM libro";
      $ejecuta_sentencia = mysqli_query($link, $sql);
      if(!$ejecuta_sentencia){
          echo'Hay un error en la sentencia SQL:' .mysqli_error();
      }else{
          echo'Error al mostrar lista de usuarios:' .mysqli_error();
       }
    }

    }

?>
<!DOCTYPE html>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>Listado de libros</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <h1>Mostrando Datos</h1>
        <table>
            <tr>
                <th>Titulo</th>
                <th>ISBN</th>
                <th>Numero Pagina</th> <?php
                        while($row=mysqli_fetch_array($ejecuta_sentencia)) {                              
                          echo"<tr>";
                            echo"<td>".$row['lib_nombre']."</td>";
                            echo"<td>".$row['lib_isbn']."</td>";
                            echo"<td>".$row['lib_numpag']."</td>";
                            echo"<td></td>";
                          echo"</tr>";
                        }

                    ?>

            <tr>
        </table>
    </body>
</html>











