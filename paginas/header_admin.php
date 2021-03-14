<?php
    echo '<div class="navegador">';
    echo '<ul>';
    echo '<div class="admin"><li><a href="' . $_SERVER["HTTP_REFERER"] . '">Volver atrás</a></li></div>';
    echo '<div class="admin"><li id="menu"><a href="menu.php">Menú Principal</a></li></div>';
    echo '<div class="admin"><li id="listar"><a href="personas_c.php?listar=1">Listar Personas</a></li></div>';
    echo '<div class="admin"><li id="crear"><a href="personas_c.php?agregar=2">Agregar Persona</a></li></div>';
    echo '<li><a href="logout.php">Salir</a></li>';
    echo '</ul>';
    echo '</div>';

    ?>