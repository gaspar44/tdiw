<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de compra</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th> Producto </th>
        <th> Precio/Unidad</th>
        <th> Cantidad </th>
        <th> Importe total </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> FALTA CODI PHP nom product </td>
        <td> precio</td>
        <td> cantidad</td>
        <td> importe total </td>
    </tr>

    <tr>
        <td colspan="3" align="right"> Total: </td>
    </tr>
    <tr>
        <td colspan="2" align="center">  <input type="button" value="Limpiar"></input>  </td>
    </tr>
    </tbody>
</table>
<p><?php print_r($_SESSION)?></p>
</body>
</html>
