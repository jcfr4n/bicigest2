<?php
session_start();
include_once "functions/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/css/style.css">

</head>
<body>
<?php 
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == "Administrador") {
        echo "<style></style>";
    }elseif ($_SESSION['rol'] == "Cliente") {
        echo "<style></style>";
    }
    
}else {
    header("location:index.php");
}

?>
<div id="navegador">
<ul>
<li><a href="#">Elemento 1</a></li>
<li><a href="#">Elemento 2</a></li>
<li><a href="#">Elemento 3</a></li>
<li><a href='' onclick='<?php logout() ?>'>Logout</a></li>
</ul>
</div>



    
    
</body>
</html>


