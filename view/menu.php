<!DOCTYPE html>
<html>
<head>
    <title>Bodega de alcohol</title>
    <meta charset="UTF-8">
    <h1>FALTA IMAGEN</h1>
    <link rel="stylesheet" href="/styles/menu.css">
    <script src="/js/import_menu.js"></script>
</head>

<body>
<nav>
    <div id="productIndex">
        <ul class="navigationMenu">
            <!--<li>
            </li>-->
            <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="index.php?action=listProduct&category_id=<?php echo $category['id']?>">
                        <?php echo $category['nombre'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
</body>
</html>