<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/view/resources/styles/drinkInfo.css">
</head>
<body>
    <h2><?php echo $productsToFound[0] ?></h2>

    <div id="drinksInCategory">
        <ul>
            <?php foreach ($productsToFound[1] as $productToSell) : ?>

            <div class="drink">
                <li>
                    <div class="drinkImage">
                        <a href=<?php echo "/index.php?action=getProductInfo&product_id=" . $productToSell['id']?>>
                            <img src=<?php echo $productToSell["ruta"]?>>
                        </a>
                    </div>
                    Nombre: <?php echo $productToSell["nombre"]?>
                    <br>
                    precio: <?php echo $productToSell["precio"]?>
                    <br>
                    descripción: <?php echo $productToSell["descripcion"]?>
                    <br>
                </li>
                <?php endforeach; ?>
        </ul>
        </div>

    </div>
</body>
</html>