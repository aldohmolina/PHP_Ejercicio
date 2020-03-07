<?php
// $conexion=mysql_connect('localhost:8082','root','','dbprueba1');
include "DB/CONEXION.PHP";

?>

<!DOCTYPE html>
<html>
<head>
<title>MOSTRAR DATOS DE LA TABLA CLIENTE</title>
</head>
<body>
<br>
<table>
   <tr>
      <th>cli_id</th>
	  <th>cli_rfc</th>
	  <th>cli_nombre</th>
   </tr>
          <?php
		  $sql="select * from cliente";
		  $result=$mysqli->query($sql);
		  ?>
		  <?php	while ($mostrar = $result->fetch_assoc()):?>
     <tr>
	    <td><?php echo $mostrar['cli_id']?></td>
		<td><?php echo $mostrar['cli_rfc']?></td>
		<td><?php echo $mostrar['cli_nombre']?></td>
	 </tr>
	 <?php endwhile?>
</table>



</body>
</html>
