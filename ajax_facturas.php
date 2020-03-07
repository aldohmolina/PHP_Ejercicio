<?php
include "DB/CONEXION.php";
if (isset($_GET["submit"])) {
    if($_GET["submit"]="cliente"){
        $sql = "SELECT cli_rfc FROM cliente WHERE cli_id =".$_GET["id_cliente"].";";
        $q_rfc = $mysqli->query($sql);
        if ($q_rfc->num_rows > 0) {
            while ($r=$q_rfc->fetch_assoc()) {
                echo $r['cli_rfc'];
            }
        }
    }
}