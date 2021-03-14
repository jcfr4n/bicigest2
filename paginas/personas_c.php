<?php
session_start();
include "../functions/functions.php";
include_once "../consts.php";
if ((!isset($_SESSION["rol"]) || ($_SESSION['rol'] != "Administrador"))) {
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo VERSION; ?></title>
    <link rel="stylesheet" href="../recursos/css/style.css">

</head>

<body>
    <?php
    include_once "header_admin.php";
    echo '<div class="espaciador"></div>';


    if ((isset($_GET["listar"]) && ($_GET["listar"] == 1))) {
        // echo "vamos a listar";
        $conn = conectarDB();

        $sql = "SELECT * FROM personas";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "<h1>Lo siento, no hay resultados</h1>";
        } else {

            echo '<table id="t1" border="1">

        <thead>

            <tr>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Dni</th>
                <th>Teléfono</th>
                <th>Fecha de nacimiento</th>
                <th>Email</th>
                <th>Nombre de usuario</th>
                <th>administrador</th>
                <th></th>
                <th></th>

            </tr>

        </thead>

        <tbody>';
            foreach ($result as $key => $value) {
                echo '		<tr>
			<td>' . $value["nombre"] . '</td>
			<td>' . $value["apellido1"] . '</td>
			<td>' . $value["apellido2"] . '</td>
			<td>' . $value["dni"] . '</td>
			<td>' . $value["telefono"] . '</td>
			<td>' . $value["fecha_nacimiento"] . '</td>
			<td>' . $value["email"] . '</td>
			<td>' . $value["user_name"] . '</td>
			<td>' . $value["administrador"] . '</td>

			<td><a href="index.php?ruta=editar&id=' . $value["id"] . '"><button>Editar</button></a></td>
			
            <td><a href="index.php?ruta=empleados&idB=' . $value["id"] . '"><button>Borrar</a></button></td>
		</tr>';
            }
            echo ' </tbody>

    </table>';


            if ((isset($_GET["agregar"]) && ($_GET["agregar"] == 2))) {
                echo "vamos a agregar";
            }
        }
    }
    desconectarDB($conn);

    ?>

</body>

</html>