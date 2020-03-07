<?php
    // [cliente] => 1
    // [RFC] =>  5639pdf96
    // [folio] => 1
    // [fecha] => 07-03-2020
    // [moneda] => 1
    // [subtotal] => 
    // [IVA] => 
    // [total] => 
    //  [cantidad-n] => 
    //  [concepto-n] => 
    //  [p-unitario-n] => 
    //  [importe-n] => 
    //  [submit] => Generar Factura
    // print_r($_POST);
    include "DB/CONEXION.php";
    if (isset($_POST['submit'])) {
        /** Set Variables */
        $cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : '' ;
        $RFC = (isset($_POST['RFC'])) ? $_POST['RFC'] : '' ;
        $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '' ;
        $moneda = (isset($_POST['moneda'])) ? $_POST['moneda'] : '' ;
        $subtotal = (isset($_POST['total'])) ? $_POST['subtotal'] : '';
        $IVA = (isset($_POST['IVA']))? $_POST['IVA'] : '' ;
        $total = (isset($_POST['total'])) ?$_POST['total'] : '' ;
        $tipo_cambio = ($moneda ==! 1) ? '20.10' : '1';
        /** Detalle */
        for ($i=0; $i < 10; $i++) { 
            $cantidad[$i] = (isset($_POST['cantidad-'.($i+1)]))?$_POST['cantidad-'.($i+1)]:'';
            $concepto[$i] = (isset($_POST['concepto-'.($i+1)]))?$_POST['concepto-'.($i+1)]:'';
            $p_unitario[$i] = (isset($_POST['p-unitario-'.($i+1)]))?$_POST['p-unitario-'.($i+1)]:'';
            $importe[$i] = (isset($_POST['importe-'.($i+1)]))?$_POST['importe-'.($i+1)]:'';
        }
        /** Empieza Insert */
        $sql ="INSERT INTO facturas (
            fac_id,
            cli_id,
            mon_id,
            fac_fec,
            fac_sub,
            fac_iva,
            fac_tot,
            fac_tc
        ) VALUES (
            NULL,
            $cliente,
            ".$_POST['moneda'].",
            '$fecha',
            $subtotal,
            $IVA,
            $total,
            '$tipo_cambio'
        )";
        if($mysqli->query($sql)){
            echo "<br>Factura Generada Correctamente <br>";
        }else{
            echo "<br> Uppss Algo Fallo <br> $sql <br>";
        }
        $sql_detalle = "INSERT INTO facturas_detalle ( 
            fac_id, 
            fac_det_id, 
            fac_det_can, 
            fac_det_pun, 
            fac_det_imp, 
            fac_det_con) 
            VALUES";
        for ($i=0; $i < 10; $i++) {
            if(!empty($cantidad[$i]) && !empty($p_unitario[$i]) && !empty($importe[$i]) && !empty($concepto[$i])){
                $sql_detalle .= "(".$_POST['folio'].",NULL,$cantidad[$i],$p_unitario[$i],$importe[$i],'$concepto[$i]'),";
            }
        }
        $sql_detalle = substr($sql_detalle,0,-1);
        if($mysqli->query($sql_detalle)){
            echo "<div><form action='factura_pdf.php'><input type='submit' value='Ver PDF'></form></div>";
            // echo "<br>Archivo Insertado <br>";
        }else{
            echo "<br> Uppss Algo Fallo <br> $sql_detalle <br>";
        }
    }
    $sql_clientes = "SELECT cli_id,cli_nombre FROM cliente;";
    $q_clientes = $mysqli->query($sql_clientes);
    $sql_monedas = "SELECT mon_id,mon_rfc FROM monedas";
    $q_monedas  = $mysqli->query($sql_monedas);
    $sql_fact = "SELECT count(fac_id) as 'folio_anterior' FROM facturas";
    $q_f = $mysqli->query($sql_fact);
    $r_f = $q_f->fetch_assoc();
    $folio = $r_f['folio_anterior']+1;  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Factura</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <div>
        <label for="cliente">Cliente</label>
       <select name="cliente" id="cliente" required>
           <option value="">Selecciona un cliente</option>
           <?php if ($q_clientes->num_rows > 0):?>
                <?php while ($r_clientes = $q_clientes->fetch_assoc()):?>
                    <option value="<?php echo $r_clientes['cli_id']?>"><?php echo $r_clientes['cli_nombre'] ?></option>
                <?php endwhile?>
            <?php endif ?>
       </select>
        <label for="RFC">RFC</label>
        <input id="RFC" name="RFC" type="text">
    </div>
    <div>
        <label for="folio">Folio</label>
        <input id="folio" name="folio" type="text" value="<?php echo $folio ?>">
        <label for="fecha">Fecha</label>
        <input id="fecha" name="fecha" type="text" value="<?php if(isset($_POST['fecha'])){echo $_POST['fecha'];}else{echo trim(date_format(date_create(),"d-m-Y"));}?>">
        <label for="moneda">Moneda</label>
        <select name="moneda" id="moneda" required>
            <option value="">Seleciona una moneda</option>
            <?php if ($q_monedas->num_rows > 0):?>
                <?php while ($r_monedas = $q_monedas->fetch_assoc()):?>
                    <option value="<?php echo $r_monedas['mon_id']?>"><?php echo $r_monedas['mon_rfc'] ?></option>
                <?php endwhile?>
            <?php endif ?>
        </select>
    </div>
    <table>
        <thead>
            <tr>
                <th>Cantidad</th>
                <th>Concepto</th>
                <th>P. Unitario</th>
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td><input id="cantidad-1" name="cantidad-1" type="number"></td>
            <td><input id="concepto-1" name="concepto-1" type="text"></td>
            <td><input id="p-unitario-1" name="p-unitario-1" type="number"></td>
            <td><input id="importe-1" name="importe-1" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-2" name="cantidad-2" type="number"></td>
            <td><input id="concepto-2" name="concepto-2" type="text"></td>
            <td><input id="p-unitario-2" name="p-unitario-2" type="number"></td>
            <td><input id="importe-2" name="importe-2" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-3" name="cantidad-3" type="number"></td>
            <td><input id="concepto-3" name="concepto-3" type="text"></td>
            <td><input id="p-unitario-3" name="p-unitario-3" type="number"></td>
            <td><input id="importe-3" name="importe-3" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-4" name="cantidad-4" type="number"></td>
            <td><input id="concepto-4" name="concepto-4" type="text"></td>
            <td><input id="p-unitario-4" name="p-unitario-4" type="number"></td>
            <td><input id="importe-4" name="importe-4" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-5" name="cantidad-5" type="number"></td>
            <td><input id="concepto-5" name="concepto-5" type="text"></td>
            <td><input id="p-unitario-5" name="p-unitario-5" type="number"></td>
            <td><input id="importe-5" name="importe-5" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-6" name="cantidad-6" type="number"></td>
            <td><input id="concepto-6" name="concepto-6" type="text"></td>
            <td><input id="p-unitario-6" name="p-unitario-6" type="number"></td>
            <td><input id="importe-6" name="importe-6" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-7" name="cantidad-7" type="number"></td>
            <td><input id="concepto-7" name="concepto-7" type="text"></td>
            <td><input id="p-unitario-7" name="p-unitario-7" type="number"></td>
            <td><input id="importe-7" name="importe-7" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-8" name="cantidad-8" type="number"></td>
            <td><input id="concepto-8" name="concepto-8" type="text"></td>
            <td><input id="p-unitario-8" name="p-unitario-8" type="number"></td>
            <td><input id="importe-8" name="importe-8" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-9" name="cantidad-9" type="number"></td>
            <td><input id="concepto-9" name="concepto-9" type="text"></td>
            <td><input id="p-unitario-9" name="p-unitario-9" type="number"></td>
            <td><input id="importe-9" name="importe-9" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-10" name="cantidad-10" type="number"></td>
            <td><input id="concepto-10" name="concepto-10" type="text"></td>
            <td><input id="p-unitario-10" name="p-unitario-10" type="number"></td>
            <td><input id="importe-10" name="importe-10" type="number"></td>
        </tr>
        </tbody>
    </table>
    <div><label for="subtotal">Subtotal</label><input id="subtotal" name="subtotal" type="number"></div>
    <div><label for="IVA">IVA</label><input id="IVA" name="IVA" type="number"></div>
    <div><label for="total">Total</label><input id="total" name="total" type="number"></div>
    <div><input type="submit" name="submit" value="Generar Factura"></div>
</form>

<script>
    document.addEventListener("DOMContentLoaded",function(event){
        initRFC();
    });
    function initRFC(){
        cliente = document.getElementById("cliente");
        cliente.addEventListener("change",function(){
           var xhr = new XMLHttpRequest();
           xhr.open("GET","ajax_facturas.php?submit=cliente&id_cliente="+this.value);
           xhr.send();
           xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("RFC").value = this.responseText;
                }
            }
        });
    } 
</script>
</body>
</html>