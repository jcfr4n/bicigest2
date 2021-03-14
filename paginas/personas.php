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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->



</head>

<body>
    <?php include_once "header_admin.php"; ?>

    <div class="espaciador"></div>
    <?php



    if ((isset($_GET["editar"])) && ($_GET["editar"] == 1)) {

        $conn = conectarDB();

        $sql = "SELECT * FROM personas WHERE id = {$_GET['id']}";

        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        desconectarDB($conn);


        $id = $row["id"];
        $nombre = $row["nombre"];
        $apellido1 = $row["apellido1"];
        $apellido2 = $row["apellido2"];
        $dni = $row["dni"];
        $telefono = $row["telefono"];
        $fecha_nacimiento = $row["fecha_nacimiento"];
        $email = $row["email"];
        $user_name = $row["user_name"];
        $password = $row["password"];
        if ($row["administrador"] == 1) {
            $administrador = "checked";
        } else {
            $administrador = null;
        }


        echo '<form action="" method="POST" id="editar">
        <table>
        <tr><h2>Editar Persona</h2></tr>
        <tr style="display:none"><td><label>id:</label></td><td><input type="text" name="id" id="id" value="' . $id . '" required></td>
        <tr><td><label>Nombre:</label></td><td><input type="text" name="nombre" id="nombre" value="' . $nombre . '" required></td>
        <tr><td><label>Primer apellido:</label></td><td><input type="text" name="apellido1" id="apellido1" value="' . $apellido1 . '" required></td>
        <tr><td><label>Segundo apellido:</label></td><td><input type="text" name="apellido2" id="apellido2" value="' . $apellido2 . '"></td>
        <tr><td><label>DNI:</label></td><td><input type="text" name="dni" id="dni" value="' . $dni . '"required></td>
        <tr><td><label>Teléfomo:</label></td><td><input type="text" name="telefono" id="telefono" value="' . $telefono . '" required></td>
        <tr><td><label>Fecha de Nacimiento:</label></td><td style="text-align:right"><input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="' . $fecha_nacimiento . '" required></td>
        <tr><td><label>Email:</label></td><td><input type="email" name="email" id="email" value="' . $email . '"></td>
        <tr><td><label>Nombre de Usuario:</label></td><td><input type="text" name="user_name" id="user_name" value="' . $user_name . '" required></td>
        <tr><td><label>Password:</label></td><td><input type="password" name="password" id="password" value="' . $password . '" required></td>
        <tr><td><label>administrador:</label></td><td style="text-align:center"><input type="checkbox" name="admin" id="admin" value="1" ' . $administrador . '></td>
        </tr>
        </table>
        <input type="submit" name="Editar">

        </form>';

        if (isset($_POST["Editar"])) {
            if (isset($_POST["admin"])) {
                $_POST["admin"] = 1;
            } else {
                $_POST["admin"] = 0;
            }
            $pass = ($_POST["password"]);
            $pass_test = ($password != $pass) ? md5($pass) : $pass;
            $pass = $pass_test;
            $conn = conectarDB();
            $sql = "UPDATE personas SET nombre = '{$_POST["nombre"]}',
                    apellido1 = '{$_POST["apellido1"]}',
                    apellido2 = '{$_POST["apellido2"]}',
                    dni = '{$_POST["dni"]}',
                    telefono = '{$_POST["telefono"]}',
                    fecha_nacimiento = '{$_POST["fecha_nacimiento"]}',
                    email = '{$_POST["email"]}',
                    user_name ='{$_POST["user_name"]}',
                    password = '{$pass}',
                    administrador = '{$_POST["admin"]}'
                    WHERE id = '{$_POST["id"]}'";

            echo '<div class="espaciador"></div>';
            if (mysqli_query($conn, $sql)) {

                echo '<div class="mensaje"><h1>Record updated successfully</h1></div>';
                unset($_POST);
            } else {
                echo '<div class="mensaje"><h1>"Error: " . $sql . "<br>" . mysqli_error($conn)</h1></div>';
            }

            unset($_POST);
            unset($_GET);
            desconectarDB($conn);
        }
    }
    if ((isset($_GET["eliminar"])) && ($_GET["eliminar"] == 1)) {

        $conn = conectarDB();

        $sql = "DELETE FROM personas WHERE id = {$_GET['idB']}";

        if (mysqli_query($conn, $sql)) {

            echo '<div class="mensaje"><h1>Record deleted successfully</h1></div>';
        } else {
            echo '<div class="mensaje"><h1>"Error: " . $sql . "<br>" . mysqli_error($conn)</h1></div>';
        }

        desconectarDB($conn);
    }

    ?>


</body>

</html>