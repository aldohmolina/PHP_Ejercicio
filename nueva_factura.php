<?php
    // print_r($_POST);
    include "DB/CONEXION.php";
    if (isset($_POST['submit'])) {
        /** Empieza Insert */
        $sql ="aqui va el Query Insert ademas insertar post";
        if($mysqli->query($sql)){
            echo "Archivo Insertado";
        }else{
            echo "Uppss Algo Fallo";
        }
    }
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
        <input id="cliente" type="text" name="cliente">
        <label for="RFC">RFC</label>
        <input id="RFC" name="RFC" type="text">
    </div>
    <div>
        <label for="folio">Folio</label>
        <input id="folio" name="folio" type="text">
        <label for="fecha">Fecha</label>
        <input id="fecha" name="fecha" type="text">
        <label for="moneda">Moneda</label>
        <select name="moneda" id="moneda">
            <option value="">Seleciona una moneda</option>
            <option value="">USD</option>
            <option value="">MXN</option>
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
            <td><input id="concepto-1" name="concepto-1" type="number"></td>
            <td><input id="p-unitario-1" name="p-unitario-1" type="text"></td>
            <td><input id="importe-1" name="importe-1" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-2" name="cantidad-2" type="number"></td>
            <td><input id="concepto-2" name="concepto-2" type="number"></td>
            <td><input id="p-unitario-2" name="p-unitario-2" type="text"></td>
            <td><input id="importe-2" name="importe-2" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-3" name="cantidad-3" type="number"></td>
            <td><input id="concepto-3" name="concepto-3" type="number"></td>
            <td><input id="p-unitario-3" name="p-unitario-3" type="text"></td>
            <td><input id="importe-3" name="importe-3" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-4" name="cantidad-4" type="number"></td>
            <td><input id="concepto-4" name="concepto-4" type="number"></td>
            <td><input id="p-unitario-4" name="p-unitario-4" type="text"></td>
            <td><input id="importe-4" name="importe-4" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-5" name="cantidad-5" type="number"></td>
            <td><input id="concepto-5" name="concepto-5" type="number"></td>
            <td><input id="p-unitario-5" name="p-unitario-5" type="text"></td>
            <td><input id="importe-5" name="importe-5" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-6" name="cantidad-6" type="number"></td>
            <td><input id="concepto-6" name="concepto-6" type="number"></td>
            <td><input id="p-unitario-6" name="p-unitario-6" type="text"></td>
            <td><input id="importe-6" name="importe-6" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-7" name="cantidad-7" type="number"></td>
            <td><input id="concepto-7" name="concepto-7" type="number"></td>
            <td><input id="p-unitario-7" name="p-unitario-7" type="text"></td>
            <td><input id="importe-7" name="importe-7" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-8" name="cantidad-8" type="number"></td>
            <td><input id="concepto-8" name="concepto-8" type="number"></td>
            <td><input id="p-unitario-8" name="p-unitario-8" type="text"></td>
            <td><input id="importe-8" name="importe-8" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-9" name="cantidad-9" type="number"></td>
            <td><input id="concepto-9" name="concepto-9" type="number"></td>
            <td><input id="p-unitario-9" name="p-unitario-9" type="text"></td>
            <td><input id="importe-9" name="importe-9" type="number"></td>
        </tr>
        <tr>
        <td><input id="cantidad-10" name="cantidad-10" type="number"></td>
            <td><input id="concepto-10" name="concepto-10" type="number"></td>
            <td><input id="p-unitario-10" name="p-unitario-10" type="text"></td>
            <td><input id="importe-10" name="importe-10" type="number"></td>
        </tr>
        </tbody>
    </table>
    <div><label for="subtotal">Subtotal</label><input id="subtotal" name="subtotal" type="number"></div>
    <div><label for="IVA">IVA</label><input id="IVA" name="IVA" type="number"></div>
    <div><label for="total">Total</label><input id="total" name="total" type="number"></div>
    <div><input type="submit" name="submit" value="Generar Factura"></div>
</form>


</body>
</html>