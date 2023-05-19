<?php
//indica que requiere la conexion a la BD
require_once('cn.php');

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == "OPTIONS") {
    die();

}

$email = $_GET['email'];
$password = $_GET['pass'];

//query a la base de datos para revisar si existe el usuario
$query = mysqli_query($cn, "SELECT * FROM visitante WHERE email='$email' AND contrasena='$password'");

//revisa si devuelve un valor
if (mysqli_num_rows($query) == 1) {
    //abre la sesion
    $result = mysqli_fetch_array($query);
    $categoria = $result['categoria'];

    session_start();
    $_SESSION['sesion'] = $categoria;

    echo "T";
} else {
    echo 'F';
}

?>