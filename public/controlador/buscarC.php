<?php
 include '../../config/conexionDB.php'; 
$sql = "SELECT * FROM capitulo";
$res=$conn->query($sql);
if($res->num_rows>0){
    while($row = $res->fetch_assoc()){
	 echo '<option id="autSelect" name="autSelect" value='.$row['cap_codigo'].'>'.$row['cap_nombre'].'</option>';
	}
}
    $conn->close();

?> 