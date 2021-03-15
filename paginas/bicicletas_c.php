<?php
session_start();
include "../functions/functions.php";
include_once "../consts.php";
if ((!isset($_SESSION["rol"]))) {
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
include_once "header_bicicleta.php";
echo '<div class="espaciador"></div>';

if (isset($_GET["listado"])) {

    if ($_GET["listado"] ==1 ) {
        $conn = conectarDB();

        $sql = "SELECT b.id_bicicleta AS id, m.marca as Marca, mo.modelo as Modelo, b.color as Color FROM bicicletas b INNER JOIN marcas m ON b.id_marca=m.id_marca INNER JOIN modelos mo ON b.id_modelo=mo.id_modelo;";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "<h1>Lo siento, no hay resultados</h1>";
        } else {

            echo '<table id="t1" border="1">

        <thead>

            <tr>
                <th>Id</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th></th>
                <th></th>

            </tr>

        </thead>

        <tbody>';
            foreach ($result as $key => $value) {
                echo '		<tr>
			<td>' . $value["id"] . '</td>
			<td>' . $value["Marca"] . '</td>
			<td>' . $value["Modelo"] . '</td>
			<td>' . $value["Color"] . '</td>

			<td><a href="bicicletas.php?editar=1&id=' . $value["id"] . '"><button style="background:green">Editar</button></a></td>
			
            <td><a href="bicicletas.php?eliminar=1&idB=' . $value["id"] . '"><button style="background:red">Borrar</button></a></td>
		</tr>';
            }
            echo ' </tbody>

    </table>';
            desconectarDB($conn);
        
    }
    
}



}


?>
    
</body>
</html>