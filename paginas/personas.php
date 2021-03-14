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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>

<body>
    <?php include_once "header_admin.php"; ?>

    <div class="espaciador"></div>


</body>

</html>