<?php

require_once('cn.php');
/* require_once('guard.php'); */

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == "OPTIONS") {
    die();
}

switch ($metodo) {
    case 'POST':

        if (!isset($_POST['id'])) {

            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $fecha = $_POST['fecha'];
            $email = $_POST['correo'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm'];
            $categ = $_POST['categ'];

            $query = "INSERT INTO visitante(nombre,apellidos,email,contrasena,telefono,fecNaci,categoria)
                    VALUES ('$nombre','$apellidos','$email','$pass','$telefono','$fecha','$categ')";

            if (mysqli_query($cn, $query)) {
                echo 'T';
            } else {
                echo 'F';
            }
            

        } else {

            $id= $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $fecha = $_POST['fecha'];
            $email = $_POST['correo'];
            $pass = $_POST['password'];
            $categ = $_POST['categ'];

            $query = "UPDATE visitante SET nombre='$nombre', apellidos='$apellidos', email='$email', contrasena='$pass',
                     telefono='$telefono', fecNaci='$fecha', categoria='$categ'
                     WHERE idVisitante=$id";

            if (mysqli_query($cn, $query)) {
                echo 'T';
                
            } else {
                echo 'F';
            }
        }

        break;

    case 'GET':

        if (!isset($_GET['id'])) {
            //Obtener todos los registros
            $query = "SELECT * FROM visitante";
            $result = mysqli_query($cn, $query);
            session_start();

            while ($fila = mysqli_fetch_array($result)) {

                $id = $fila['idVisitante'];

                echo "<tr id='r" . $id . "'>";
                echo '<td>' . $id . '</td>';
                echo '<td>' . $fila['nombre'] . ' ' . $fila['apellidos'] . '</td>';
                echo '<td>' . $fila['email'] . '</td>';
                echo '<td>' . $fila['telefono'] . '</td>';
                echo '<td>' . $fila['fecNaci'] . '</td>';
                echo '<td>' . $fila['categoria'] . '</td>';
                
                if($_SESSION['sesion']=="ADMIN"){
                    echo '<td>';
                    echo "<div class= 'btn editar' onClick='editar($id)' data-bs-toggle='modal' data-bs-target='#editarModal'><i class='fas fa-user-pen'></i></div>";
                    echo "<div class= 'btn borrar' onClick='eliminar($id)' data-bs-toggle='modal' data-bs-target='#eliminarModal'><i class='fas fa-trash-can'></i></div>";
                    echo '</td>';
                }
                echo '</tr>';
                
            }

        } else {
            //Obtener un registro
            $idVis = $_GET['id'];

            $query = "SELECT * FROM visitante WHERE idVisitante=$idVis";

            $result = mysqli_query($cn, $query);

            $visitante = array();

            while ($fila = mysqli_fetch_array($result)) {

                $id = $fila['idVisitante'];
                $nombre = $fila['nombre'];
                $apellidos = $fila['apellidos'];
                $telefono = $fila['telefono'];
                $fecha = $fila['fecNaci'];
                $email = $fila['email'];
                $contrasena = $fila['contrasena'];
                $categoria = $fila['categoria'];

            }
            echo json_encode([
                'id' => $id,
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'telefono' => $telefono,
                'fecha' => $fecha,
                'email' => $email,
                'contrasena' => $contrasena,
                'categoria' => $categoria
            ]);
        }

        break;
    case 'DELETE':

        $id = $_REQUEST['id'];

        $query ="DELETE FROM visitante WHERE idVisitante=$id";

        if (mysqli_query($cn, $query)) {
            echo 'T';
            
        } else {
            echo 'F';
        }

        break;

}

?>