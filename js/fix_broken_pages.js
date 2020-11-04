const MENU404 = `<!DOCTYPE html>
<html>
<head>
    <title>Bodega de alcohol</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/view/resources/styles/commonButtons.css">
</head>

<body>
    
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