<?php

session_start();


include_once "consts.php";

include_once "functions/functions.php";


if (isset($_SESSION['rol'])) {
    
        header("location:paginas/menu.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo VERSION; ?></title>
    <link rel="stylesheet" href="recursos/css/style.css ">
</head>

<body>
    <div class="espaciador">
    </div>

    <form action="" method="POST" id="form1">
        <table>
            <tr>
                <th colspan="2" class="bAcceso">
                    <h1>Login</h1>
                </th>
            </tr>
            <tr>
                <td><label for="user">
                        <h2>User:</h2>
                    </label></td>
                <td><input type="text" id="user" name="user" placeholder="Nombre de Usuario" required></td>
            </tr>
            <tr>
                <td><label for="pass">
                        <h2>Password:</h2>
                    </label></td>
                <td><input type="password" id="password" name="password" placeholder="Password" required></td>
            </tr>
            <tr>
                <td colspan="2" class="bAcceso"><input type="submit" name="acceder"></td>
            </tr>
        </table>


    </form>

    <?php
        if (isset($_SESSION["fallo"])) {
            echo '<h1 style="color:red;text-align:center;">Fallo de autenticación</h1>';
        }

    if (isset($_POST["acceder"])) {

        $user = $_POST["user"];
        $pass = $_POST["password"];
        unset($_POST);

        validar($user, $pass);
        // echo $_SERVER['PHP_SELF'];



        header("Location: index.php");
    }


    ?>
</body>

</html>