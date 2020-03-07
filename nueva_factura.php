<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Factura</title>
</head>
<body>
<form action="" method="POST">
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
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        <tr>
            <td><input type="number"></td>
            <td><input type="number"></td>
            <td><input type="text"></td>
            <td><input type="number"></td>
        </tr>
        </tbody>
    </table>
    <div><label for="subtotal">Subtotal</label><input id="subtotal" name="subtotal" type="number"></div>
    <div><label for="IVA">IVA</label><input id="IVA" name="IVA" type="number"></div>
    <div><label for="total">Total</label><input id="total" name="total" type="number"></div>
    <div><input type="submit" value="Generar Factura"></div>
</form>


</body>
</html>