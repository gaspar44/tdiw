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
       <div id="loadMenu">
       
       <nav>
       <div id="productIndex">
       <?php
       require __DIR__.'/controller/list_products.php';
       
       $categories = getCategories();
       echo '<ul class="navigationMenu">';
       foreach ($categories as $category) {
          
           $element = $category['nombre'];
            echo '<li><a href="/index.html">'.$element.'</a></li>';
       }
       echo '</ul>';
       ?>
       </div>
       </nav>
       </div>
       <nav>
<div id="productIndex">
    <ul class="navigationMenu">
        <li><a href="/index.html">Inicio</a></li>
        <li><a href="/menuElements/cerveza.html">Cervezas</a></li>
        <li><a href="/menuElements/vinos.html">Vinos</a></li>
        <li><a href="/menuElements/whisky.html">Whisky</a> </li>
        <li><a href="/menuElements/ron.html">Ron</a></li>
        <li><a href="/menuElements/vodka.html">Vodka</a></li>
        <li><a href="/menuElements/cocteles.html">Cocteles</a></li>
        <li><a href="/menuElements/ginebras.html">Ginebras</a></li>
        <li><a href="/menuElements/cavas.html">Cavas</a></li>
    </ul>
</div>
</nav>
    </body>
</html>