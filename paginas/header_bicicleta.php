<?php 
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == "Administrador") {
        echo "<style></style>";
    }elseif ($_SESSION['rol'] == "Cliente") {
        echo "<style> .admin{display:none;}</style>";}
    
}else {
    header("location:../index.php");
}

echo '<div class="navegador">';
echo '<ul>';
echo '<div><li><a href="' . $_SERVER["HTTP_REFERER"] . '">Volver atrás</a></li></div>';
echo '<div><li id="menu"><a href="menu.php">Menú Principal</a></li></div>';
echo '<div class="admin"><li><a href="bicicletas_c.php?listado=1">Gestion Bicicletas</a></li></div>';
echo '<div class="admin"><li><a href="bicicletas_c.php?listado=2">Bicicletas con contrato</a></li></div>';
echo '<div class="admin"><li><a href="bicicletas_c.php?listado=3">Bicicletas con reserva</a></li></div>';
echo '<div><li><a href="bicicletas_c.php?listado=4">Bicicletas disponibles</a></li></div>';
echo '<li><a href="logout.php">Salir</a></li>';
echo '</ul>';
echo '</div>';

?>