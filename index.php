<?php session_start(); session_destroy();?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN/REGISTER</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <script src="js/bootstrap.bundle.js"></script>
    <div class="container p-5">
        <div class="row">
            <div class="offset-3 col-6">

                <!--Formulario Login-->
                <div class="card" id="cardLogin">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="btn nav-link active" id="btnLogin">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn nav-link" id="btnRegistrar">REGISTRARSE</a>
                            </li>
                        </ul>
                        <br><br>
                        <h1 class="text-center"><i class="fa-solid fa-user fa-beat-fade fa-2xl"
                                style="color: #00aaff;"></i></h1>
                        <br><br>
                        <h4 class="text-center titulo">LOGIN</h4>
                        <br>
                        </ul>
                    </div>
                    <form id="frmLogin" class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder=".">
                                    <label for="email"><i class="fa-solid fa-envelope" style="color: #00b8f5;"></i>
                                        Email:</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder=".">
                                    <label for="pass"><i class="fa-solid fa-key" style="color: #00b8f5;"></i>
                                        Password:</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col">
                                <input type="submit" id="btnEnviar" class="btn btn-primary" value="Enviar">
                            </div>
                        </div>
                    </form>
                    <div class="div" id="mensajeL"></div>
                </div>

                <!--Formulario Registrarse-->
                <div class="card" id="cardReg">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="btn nav-link " id="btnLog">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn nav-link active" id="btnReg">REGISTRARSE</a>
                            </li>
                        </ul>
                        <br><br>
                        <h1 class="text-center"><i class="fa-solid fa-user-plus fa-beat-fade fa-2xl"
                                style="color: #00aaff;"></i></h1>
                        <br><br>
                        <h4 class="text-center titulo">REGISTRARSE</h4>
                        <br>
                        </ul>
                    </div>
                    <form id="frmRegis" class="card-body">
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
                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="confirm" id="confirm"
                                        placeholder=".">
                                    <label for="confirm"><i class="fa-solid fa-key" style="color: #00b8f5;"></i>
                                        Confirmar contraseña:</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="categ" name="categ" >
                                        <option selected disabled>Selecciona una opción...</option>
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="NORMAL">NORMAL</option>
                                    </select>
                                    <label for="categ">Categoria:</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col">
                                <input type="submit" id="btnRegis" class="btn btn-primary" value="Enviar">
                            </div>
                        </div>
                    </form>
                    <div class="div" id="mensajeR"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.7.0.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="https://kit.fontawesome.com/cb9fb6c33f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./valida.js"></script> 
</body>

</html>