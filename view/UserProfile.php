<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Este es una pagina web de Bodega de Alcohol"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/resources/styles/registroLogin.css">
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/users.js"></script>
    <title>Cambiar perfil</title>
</head>
<body>
<section class="form-register">
    <h4>Datos actuales</h4>

    <form target="_blank" enctype="multipart/form-data" action="/controller/Register_User.php" onsubmit="return checkPassword(this)" method="post">
        Nombre:
        <input class="controls" value="<?php echo $_SESSION["realName"] ;?>"type="text" name="nombres" id="nombres" pattern="[a-zA-Z\u00C0-\u00FF]+(\s[a-zA-Z\u00C0-\u00FF]+)?$" required>
        <br>

        Password:
        <input class="controls" type="password" name="password" id="password" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required >
        <br>

        New Password:
        <input class="controls" type="password" name="newPassword" id="newPassword" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"  required >
        <br>

        Dirección:
        <input class="controls" type="text" value="<?php echo $_SESSION["userAddress"] ;?>" name="direccion" id="direccion" maxlength="30" required>
        <br>

        Población:
        <input class="controls" value ="<?php echo $_SESSION["userPoblation"] ;?>" type="text" name="poblacion" id="poblacion" maxlength="30" required>
        <br>

        Código Postal:
        <input class="controls" value="<?php echo $_SESSION["userCP"] ;?>" type="text" name="codigo postal" id="codigopostal" pattern="^\d{5}$" maxlength="5" required>
        <br>

        Imagen de perfil
        <input class="controls" type="file" name="profile_image">
        <br>

        <?php if (isset($_SESSION["routeToPicture"]) ) : ?>

        <?php endif; ?>


        <input class="botons" type="submit" value="Cambiar datos">
    </form>
</section>
</body>
</html>