<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/users.js"></script>
    <title>Carrito de compra</title>
</head>
<body>
<table class="shoppingCar" border="solid black">
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
        <td colspan="1" align="left"> Total </td>
        <td  align="right"> <?php echo $actualBuyingCar->getTotal(); ?> </td>
        <td  align="right"> <?php echo $actualBuyingCar->getNumberOfProucts(); ?> </td>
    </tr>
    </tbody>

    <input type="button" onclick="emptyBuyingCar()" value="Limpiar">
    <input type="button" onclick="finishShopping()" value="Comprar">

    <div id="shoppingDone">
        <?php if (isset($_SESSION["shoppingDone"])) : ?>
            <p>¡Compra hecha con éxito!</p>
            <?php unset($_SESSION["shoppingDone"]) ?>
        <?php endif; ?>
    </div>
</table>
</body>
</html>
