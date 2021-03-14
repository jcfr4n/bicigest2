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

			<td><a href="personas.php?editar=1&id=' . $value["id"] . '"><button style="background:green">Editar</button></a></td>
			
            <td><a href="personas.php?eliminar=1&idB=' . $value["id"] . '"><button style="background:red">Borrar</button></a></td>
		</tr>';
            }
            echo ' </tbody>

    </table>';
            desconectarDB($conn);
        }
    }
    if ((isset($_GET["agregar"]) && ($_GET["agregar"] == 2))) {
        // echo "<h1>vamos a agregar</h1>";
        echo '<form action="" method="POST" id="agregar">
        <table>
        <tr><h2>Agregar Persona</h2></tr>
        <tr><td><label>Nombre:</label></td><td><input type="text" name="nombre" id="nombre" required></td>
        <tr><td><label>Primer apellido:</label></td><td><input type="text" name="apellido1" id="apellido1" required></td>
        <tr><td><label>Segundo apellido:</label></td><td><input type="text" name="apellido2" id="apellido2"></td>
        <tr><td><label>DNI:</label></td><td><input type="text" name="dni" id="dni" required></td>
        <tr><td><label>Teléfomo:</label></td><td><input type="text" name="telefono" id="telefono" required></td>
        <tr><td><label>Fecha de Nacimiento:</label></td><td style="text-align:right"><input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required></td>
        <tr><td><label>Email:</label></td><td><input type="email" name="email" id="email"></td>
        <tr><td><label>Nombre de Usuario:</label></td><td><input type="text" name="user_name" id="user_name" required></td>
        <tr><td><label>Password:</label></td><td><input type="password" name="password" id="password" required></td>
        <tr><td><label>administrador:</label></td><td style="text-align:center"><input type="checkbox" name="admin" id="admin" value="1"></td>
        </tr>
        </table>
        <input type="submit" name="Agregar" style="background:green">

        </form>';

        if (isset($_POST["Agregar"])) {
            if (isset($_POST["admin"])) {
                $_POST["admin"] = 1;
            } else {
                $_POST["admin"] = 0;
            }
            $pass = md5($_POST["password"]);
            $conn = conectarDB();
            $sql = "INSERT INTO personas (nombre,apellido1,apellido2,dni,telefono,fecha_nacimiento,email,user_name,password,administrador)
            VALUES ('{$_POST["nombre"]}', '{$_POST["apellido1"]}', '{$_POST["apellido2"]}', '{$_POST["dni"]}', '{$_POST["telefono"]}', '{$_POST["fecha_nacimiento"]}', '{$_POST["email"]}', '{$_POST["user_name"]}', '{$pass}', '{$_POST["admin"]}')";
            echo '<div class="espaciador"></div>';
            if (mysqli_query($conn, $sql)) {

                echo '<div class="mensaje"><h1>New record created successfully</h1></div>';
            } else {
                echo '<div class="mensaje"><h1>"Error: " . $sql . "<br>" . mysqli_error($conn)</h1></div>';
            }

            unset($_POST);
            desconectarDB($conn);
        }
    }


    ?>

</body>

</html>