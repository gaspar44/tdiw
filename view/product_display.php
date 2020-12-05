<!doctype html>
<html lang="en">
<head>
    <title>Bodega de alcohol</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/view/resources/styles/drinkInfo.css">
    <link rel="stylesheet" href="/view/resources/styles/commonButtons.css">

</head>
<body>
<div>
    <div class="button_detail_add_cart"><input type='button' value='Agregar al carrito'></div>
    <div class="product">
        <div class="drinkImage">
            <img src=<?php echo $productToDisplay->getRouteToPicture() ?>>
        </div>
        <div class="productInfo">
            <br>
            Nombre: <?php echo $productToDisplay->getName() ?>
            <br>
            Precio: <?php echo $productToDisplay->getPrice() ?>
            <br>
            Descripción: <?php echo $productToDisplay->getDescription() ?>
            <br>
        </div>
    </div>
    <div id="productCode" poin="false"><?php echo $productToDisplay->getCategoryID()?></div>
    <div id="categoryID"><?php echo $productToDisplay->getID() ?></div>

</body>
</html>