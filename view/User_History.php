<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Histórico de compras</title>
</head>

<body>

<?php foreach ($orders as $order) :?>
    <?php echo $order["data"]; ?>
    <table class="BuyHistory" border="solid black">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Unidad</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($productsInOrders as $products) : ?>
            <?php foreach ($products as $productData) :?>
                <?php if($order["id"] == $productData["comanda_id"]) :?>
                    <tr>
                        <td> <?php echo $productData["nombre_producto"];?></td>
                        <td> <?php echo $productData["precio_unidad"];?></td>
                        <td> 1 </td>
                    </tr>
                <?php endif ;?>
            <?php endforeach ;?>
        <?php endforeach; ?>
        <?php if($avoidRepitData) :?>
            <tr>
                <td>Total</td>
                <td><?php echo $order["total"];?></td>
                <td><?php echo $order["nElementos"];?></td>
            </tr>
            <?php $avoidRepitData = false;?>
        <?php endif; ?>
        </tbody>
    </table>

    <br>
    <br>
    <?php $avoidRepitData = true;?>
<?php endforeach; ?>


</body>
</html>