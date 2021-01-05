<div class="topNav">
    <div class="logo">
        <img src="/view/resources/pictures/logo.png"/>
    </div>

    <div id="userSesion" class="userSession">
        <?php if (!isset($_SESSION["sessionID"])) : ?>
            <a href="/index.php?async=false&action=login">Login</a><a href="/index.php?async=false&action=userRegister">Registro</a>

        <?php else :?>
            <?php echo $_SESSION["realName"] ?>
            <ul>
                <li>
                    <a href="/index.php?async=false&action=buyCar">Comprar</a>
                </li>

                <li>
                    <a href="/index.php?async=false&action=editProfile">Editar perfil</a>
                </li>

                <li>
                    <a href="/index.php?async=false&action=buyHistory">Histórico</a>
                </li>

                <li>
                    <a href="/index.php?async=false&action=logout">Desconectarse</a>
                </li>
            </ul>
            carrito
            <ul>
                <li>
                    Total: <?php echo $shoppingCar->getTotal(); ?>
                </li>

                <li>
                    Productos: <?php echo $shoppingCar->getNumberOfProucts(); ?>
                </li>
            </ul>

        <?php endif; ?>
    </div>
</div>