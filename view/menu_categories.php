<nav>
    <div id="productIndex">

        <div class="userSession">
            <a href="/view/IniciarSesion.html">Inicio</a><a href="/view/RegistroUsuario.html">Registro</a>
        </div>
        <ul class="navigationMenu">
            <?php foreach ($categories as $category) : ?>
                <li>
                    <button>
                        <a class="category_nav" data-httpMethod=GET
                           data-value="async=true&action=listProduct&category_id=<?php echo $category['id'] ?>">
                            <?php echo $category['nombre'] ?>
                        </a>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>