<!DOCTYPE html>
<html>
    <head>
        <title>Bodega de alcohol</title>
        <meta charset="UTF-8">
        <h1>FALTA IMAGEN</h1>
        <link rel="stylesheet" href="/styles/menu.css">
        <script src="/js/import_menu.js"></script>
    </head>
    
    <body onload="return importHTML();">
       <div id="loadMenu"></div>

       <?php
       require __DIR__.'/controller/list_products.php';
       $categories = getCategories();
       echo $categories[0]['nombre'];
       ?>
    </body>
</html>