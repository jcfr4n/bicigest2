<?php

include_once "recursos/consts.php ";

function conectarDB(){
        

    $conn = mysqli_connect(HOST,USER,PASS,DB);

    if ( mysqli_connect_errno() ) {
        echo "Error al tratar de conectar con la base de datos: " . mysqli_connect_error();
        exit;

    }

    return $conn;

}

function desconectarDB($conn){

    mysqli_close($conn);

}

function validar($user, $pass)
{
    $userL = $user;
    $passL = md5($pass);

    $conn = conectarDB();

    $sql = "SELECT * FROM personas WHERE user_name = '$userL' && password = '$passL'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // output data of each row
       $row = mysqli_fetch_assoc($result);
       $_SESSION['usuario'] = $row['nombre']." ".$row['apellido1']." ".$row['apellido2'];
       if ($row['administrador'] == 1) {
            $_SESSION['rol'] = "Administrador";
       }else{
            $_SESSION['rol'] = "Cliente";
       }


       
    }

    desconectarDB($conn);

}

function logout(){
    session_destroy();
    return "index.php";
}

function mostrarUsuarios(){

    $conn = conectarDB();
    

}

?>