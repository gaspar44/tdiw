<h2><?php echo $productsInCategory[array_key_first($productsInCategory)]->getCategoryName() ?></h2>

<div id="drinksInCategory">
    <ul>
        <?php foreach ($productsInCategory as $productToSell) : ?>

            <div class="drink">
                <li>
                    <div class="drinkImage">
                        <a class="category_nav" data-httpMethod=GET
                           data-value="async=true&action=getProductInfo&product_id=<?php echo$productToSell->getID()?>&category_id=<?php echo $productToSell->getCategoryID() ?>">
                            <img src=<?php echo $productToSell->getRouteToPicture() ?>>
                        </a>
                    </div>
                    <div class="productInfo">
                        Nombre: <?php echo $productToSell->getName() ?>
                        <br>
                        precio: <?php echo $productToSell->getPrice() . '€' ?>
                        <br>
                    </div>
                </li>
            </div>
        <?php endforeach; ?>
    </ul>
</div>