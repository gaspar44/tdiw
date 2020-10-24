const MENU404 = `<!DOCTYPE html>
<html>
<head>
    <title>Bodega de alcohol</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/view/resources/styles/error.css">
</head>

<body>
    <div >
        <h1>ERROR 404 PAGE NOT FOUND AT THIS SERVER</h1>
        <a class="button" href="/index.php">volver</a>
    </div>
</body>
</html>`

function fix404Menu() {
    ReplaceContent(MENU404);
    return false;
}

function ReplaceContent(NC) {
    document.open();
    document.write(NC);
    document.close();
}