<div class="topNav">
    <div class="logo">
        <img src="/view/resources/pictures/logo.png"></img>
    </div>

    <div id="userSesion" class="userSession">
        <?php if (!isset($_SESSION["sessionID"])) : ?>
            <a href="/index.php?async=false&action=login">Login</a><a href="/index.php?async=false&action=userRegister">Registro</a>

        <?php else :?>
            <a href="/index.php?async=false&action=buyCar"><?php echo $_SESSION["realName"]?></a><a href="/index.php?async=false&action=logout">Desconectarse</a>
        <?php endif; ?>
    </div>
</div>