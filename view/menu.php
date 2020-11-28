<div class="topNav">
    <div class="logo">
        <img src="/view/resources/pictures/logo.png"></img>
    </div>

    <div id="userSesion" class="userSession">
        <?php if (is_null($_SESSION["sessionID"])) : ?>
            <a href="/index.php?async=false&action=login">Login</a><a href="/index.php?async=false&action=userRegister">Registro</a>

        <?php else :?>
            <a href="/index.php?async=false&action=login"><?php echo $_SESSION["realName"]?></a><a href="/index.php?async=false&action=userRegister">Registro</a>
        <?php endif; ?>
    </div>
</div>