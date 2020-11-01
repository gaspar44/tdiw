<!DOCTYPE html>
<html>
<head>
    <title>Bodega de alcohol</title>
    <meta charset="UTF-8">
    <h1>FALTA IMAGEN</h1>
    <link rel="stylesheet" href="/view/resources/styles/menu.css">
</head>

<body>
<nav>
    <div id="productIndex">

        <div class="userSession">
            <a href="./view/IniciarSesion.html">Inicio</a>
            <a href="./view/RegistroUsuario.html">Registro</a>
        </div>

        <ul class="navigationMenu">
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
<br>
<br>
</body>
</html>