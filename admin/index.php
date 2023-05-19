<?php include_once("../php/guard.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENTO</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.css">


</head>

<body>
    <?php include_once("../components/navbar.php"); ?>

    <input type="hidden" id="sesion" value="<?php session_start(); echo $_SESSION['sesion']; ?>">

    

    <div class="div" id="mensaje"></div>

    <br>
    <div class="div container mt-5">
        <div class="row text-center mt-5">
            <div class="div offset-1 col-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="titulo">Visitantes</h1>
                    </div>
                    <div class="div card-body">
                        <div id="tablaA">
                            <table id="adminTable" class="table table-striped table-hover table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre completo</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Categoria</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div id="tablaN">
                            <table id="normalTable" class="table table-striped table-hover table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre completo</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!------------Modal para editar------------->

    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Visitante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmActualizar" class="card-body">
                        <div class="div row">
                            <div class="col">
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder=".">
                                    <label for="nombre"><i class="fa-solid fa-user" style="color: #00b8f5;"></i>
                                        Nombre(s):</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="apellidos" id="apellidos"
                                        placeholder=".">
                                    <label for="apellidos"><i class="fa-solid fa-user" style="color: #00b8f5;"></i>
                                        Apellidos:</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="telefono" id="telefono"
                                        placeholder=".">
                                    <label for="tel"><i class="fa-solid fa-phone" style="color: #00b8f5;"></i>
                                        Teléfono:</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder=".">
                                    <label for="fecha">Fecha de nacimiento:</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"
                                            style="color: #00b8f5;"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="correo" name="correo">
                                        <label for="correo">Email:</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder=".">
                                    <label for="password"><i class="fa-solid fa-key" style="color: #00b8f5;"></i>
                                        Contraseña:</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="categ" name="categ">
                                        <option selected>Selecciona una opción...</option>
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="NORMAL">NORMAL</option>
                                    </select>
                                    <label for="categ">Categoria:</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" form="frmActualizar" id="btnGuardar" class="btn btn-primary"
                        data-bs-dismiss="modal" value="Guardar Cambios">
                </div>
            </div>
        </div>
    </div>

    <!--Modal confirmar delete-->
    <div class="modal" tabindex="-1" id="eliminarModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-sharp fa-solid fa-circle-exclamation fa-beat" style="color: #ff0000;"></i> ALERTA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro que desea eliminar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnAceptar" value="aceptar">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Scripts-->
    <script src="../js/jquery-3.7.0.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="./valida.js"></script>
    <script src="https://kit.fontawesome.com/cb9fb6c33f.js" crossorigin="anonymous"></script>

</body>

</html>