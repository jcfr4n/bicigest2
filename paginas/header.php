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
echo '<div class="admin"><li><a href="personas.php">Gestión de Personas</a></li></div>';
echo '<div><li><a href="bicicletas.php">Bicicletas</a></li></div>';
echo '<div class="admin"><li><a href="contratos.php">Contratos</a></li></div>';
echo '<li><a href="reservas.php">Reservas</a></li>';
echo '<li><a href="logout.php">Salir</a></li>';
echo '</ul>';
echo '</div>';

?>