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
<table class="shoppingCar">
    <thead>
    <tr>
        <th> Producto </th>
        <th> Precio </th>
        <th> Unidad</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($actualBuyingCar->getProducts() as $product) : ?>
    <tr>
        <td> <?php echo $product->getName()?></td>
        <td> <?php echo $product->getPrice() ?></td>
        <td> 1 </td>
    </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="2" align="right"> Total:<?php echo $actualBuyingCar->getTotal(); ?> </td>
    </tr>
    <tr>
        <td colspan="2" align="center">  <input type="button" value="Limpiar"></input>  </td>
    </tr>
    </tbody>
</table>
</body>
</html>
