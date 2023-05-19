$(init);

function init(){

    //Configuracion de los botones del card
    $("#cardReg").hide();
    $("#cardLogin").show();  

    $("#btnLogin").on("click",function(){
        $("#cardReg").hide();
        $("#cardLogin").show();    
    });

    $("#btnRegistrar").on("click",function(){
        $("#cardReg").show();
        $("#cardLogin").hide();    
    });

    $("#btnLog").on("click",function(){
        $("#cardReg").hide();
        $("#cardLogin").show();    
    });

    $("#btnReg").on("click",function(){
        $("#cardReg").show();
        $("#cardLogin").hide();    
    });

//--------Boton de enviar del formulario de login-------

    $("#btnEnviar").on("click", function () {

        $('#frmLogin').validate({

            //Reglas
            rules: {
                email: {
                    required: true,
                }
                , pass: {
                    required: true,
                    minlength: 8,
                    maxlength: 15,
                },

            //Mensajes
            }, messages: {
                email: {
                    required: "Este campo es obligatorio.",
                }
                , pass: {
                    required: "Este campo es obligatorio.",
                    minlength: "debe ser minimo {0} caracteres ",
                    maxlength: "debe ser maximo {0} caracteres",
                },
            }, errorElement: "span",
            errorClass: "color-rojo col-12",

            submitHandler: function () {

                var data = $("#frmLogin").serialize();

                $.ajax({

                    url: 'php/loginAction.php',
                    data: data,
                    type: 'GET',

                    success: function (r) {
                        if (r == 'F') {

                            const msg = "<div class='alert alert-danger'><b>Usuario</b> y/o <b>contraseña incorrecta</b></div>"

                            $("#mensajeL").html(msg);
                            setTimeout(function () {
                                $("#mensajeL").hide(6000);
                            }, 3000);
                        }
                        else {
                            document.location.href = "admin/";
                        }
                    }

                });
            }

        });
    });

//--------Boton de enviar del formulario de registrar-------

    $("#btnRegis").on("click", function () {

        $('#frmRegis').validate({

            //Reglas
            rules: {
                nombre: {
                    required: true,
                },
                apellidos: {
                    required: true,
                },
                telefono: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                fecha: {
                    required: true,
                },
                correo: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 15,
                },
                confirm: {
                    required: true,
                    minlength: 8,
                    maxlength: 15,
                    equalTo: '#password',
                },
                categ: {
                    required: true,
                }

            //Mensajes
            }, messages: {
                nombre: {
                    required: "Este campo es obligatorio.",
                },
                apellidos: {
                    required: "Este campo es obligatorio.",
                },
                telefono: {
                    required: "Este campo es obligatorio.",
                    minlength: "debe ser minimo {0} caracteres",
                    maxlength: "debe ser maximo {0} caracteres",
                },
                fecha: {
                    required: "Este campo es obligatorio.",
                },
                correo: {
                    required: "Este campo es obligatorio.",
                }
                , password: {
                    required: "Este campo es obligatorio.",
                    minlength: "debe ser minimo {0} caracteres ",
                    maxlength: "debe ser maximo {0} caracteres",
                },
                confirm: {
                    required: "Este campo es obligatorio.",
                    equalTo: 'Las contraseñas no coinciden.',
                },
                categ: {
                    required: "Este campo es obligatorio.",
                }

            }, errorElement: "span",
            errorClass: "color-rojo col-12",

            submitHandler: function () {

                var data = $("#frmRegis").serialize();

                $.ajax({

                    url: 'php/adminAction.php',
                    data: data,
                    type: 'POST',

                    success: function (r) {
                        console.log(r);

                        if (r == 'T') {
                            const msg = "<div class='alert alert-success'><b>Se registró correctamente</b></div>";
                            $("#mensajeL").html(msg);
                            setTimeout(function () {
                                $("#mensajeL").hide(6000);
                            }, 3000);
                            $("#cardLogin").show();
                            $("#cardReg").hide();
                        }
                        else {
                            const msg = "<div class='alert alert-danger'><b>Este correo ya esta asociado a otra cuenta, </b><b> intenta con otro</b></div>";
                            $("#mensajeR").html(msg);
                            setTimeout(function () {
                                $("#mensajeR").hide(6000);
                            }, 3000);
                        }
                    }

                })
            }

        });
    });
}