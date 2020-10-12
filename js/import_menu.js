const MENU = `<aside>
<div id="registerButton">
    <a href="RegistroUsuario.html">Registrarse</a>
    <a href="InicialSesion.html">Iniciar Sesión</a>
</div>
</aside>

<section>
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
</section>`

function importHTML() {
    var actualDocument = document.getElementById("loadMenu").innerHTML = MENU;
    return false;
}