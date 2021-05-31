<?php
 include '../../config/conexionDB.php'; 
$sql = "SELECT * FROM autor";
$res=$conn->query($sql);
if($res->num_rows>0){
    while($row = $res->fetch_assoc()){
	 echo '<option id="autSelect" name="autSelect" value='.$row['aut_codigo'].'>'.$row['aut_nombres'].'</option>';
	}
}
    $conn->close();

?> 