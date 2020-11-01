<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/view/resources/styles/drinkInfo.css">
</head>
<body>
    <h2><?php echo $productsInCategory[1]->getCategoryName() ?></h2>

    <div id="drinksInCategory">
        <ul>
            <?php foreach ($productsInCategory as $productToSell) : ?>

            <div class="drink">
                <li>
                    <div class="drinkImage">
                        <a href=<?php echo "/index.php?action=getProductInfo&product_id=" . $productToSell->getID()."&category_id=".$productToSell->getCategoryID()?>>
                            <img src=<?php echo $productToSell->getRouteToPicture()?>>
                        </a>
                    </div>
                    <div class="productInfo">
                        Nombre: <?php echo $productToSell->getName()?>
                        <br>
                        precio: <?php echo $productToSell->getPrice().'€'?>
                        <br>
                    </div>
                </li>
            </div>
                <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>