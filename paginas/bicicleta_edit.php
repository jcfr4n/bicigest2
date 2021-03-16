<?php
$conn = conectarDB();

$sql = $sql = "SELECT b.id_bicicleta, m.id_marca, m.marca, mo.id_modelo, mo.modelo, b.color FROM bicicletas b INNER JOIN marcas m ON b.id_marca=m.id_marca INNER JOIN modelos mo ON b.id_modelo=mo.id_modelo WHERE id_bicicleta = {$_GET['id']}";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

desconectarDB($conn);


$id_bicicleta = $row["id_bicicleta"];
$id_marca = $row["id_marca"];
$marca = $row["marca"];
$modelo = $row["modelo"];
$id_modelo = $row["id_modelo"];
$color = $row["color"];
?>
<form action="" method="POST" id="editar_bici">
    <table>
        <tr>
            <h2>Editar Bicicleta</h2>
        </tr>
        <tr style="display:none">
            <td><label>id:</label></td>
            <td><input type="text" name="id_bicicleta" id="id" value="{$id_bicicleta}" required></td>
        <tr>
            <td><label for="marca">Marca:</label></td>
            <td><select name="marca" value="{$id_marca}" required><?php select_marca() ?></select></td>
        </tr>
        <tr>
            <td><label for="modelo">Modelo:</label></td>
            <td><select name="modelo" value="{$id_modelo}" required><?php select_model() ?></select></td>
        </tr>
        <tr>
            <td><label for="color">Color:</label></td>
            <td><input type="text" name="color" id="color" required></td>
        </tr>

    </table>
    <input type="submit" name="Edit" style="background:green">


</form>
<?php

if (isset($_POST["Edit"])) {

    $conn = conectarDB();
    $sql = "UPDATE bicicletas SET id_marca = '{$_POST["marca"]}',
                id_modelo = '{$_POST["modelo"]}',
                color = '{$_POST["color"]}'
                WHERE id_bicicleta = '{$_POST["id_bicicleta"]}'";

    echo '<div class="espaciador"></div>';
    if (mysqli_query($conn, $sql)) {

        echo '<div class="mensaje"><h1>Record updated successfully</h1></div>';
        unset($_POST);
    } else {
        echo '<div class="mensaje"><h1>"Error: " . $sql . "<br>" . mysqli_error($conn)</h1></div>';
    }

    // unset($_POST);
    // unset($_GET);
    desconectarDB($conn);
}
?>