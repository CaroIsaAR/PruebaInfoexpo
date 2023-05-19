
let tablaAdmin = $('#adminTable').DataTable();

let tablaNormal = $('#normalTable').DataTable();

$(document).ready(function () {

    if($("#sesion").attr("value") == "ADMIN"){
        $("#tablaA").show();
        $("#tablaN").hide();  
        cargarTabla(tablaAdmin);

    } else{
        $("#tablaA").hide();
        $("#tablaN").show();
        cargarTabla(tablaNormal);
    }
    
});

function cargarTabla(tabla){
    $.ajax({
        type: "GET",
        url: "../php/adminAction.php",

        success: function (r) {
            
            var data = $(r);

            tabla.clear().draw();

            tabla.rows.add(data).draw();
        }
    });
}

function eliminar(id){
    $("#btnAceptar").on("click", function () {
        $.ajax({
            type: "DELETE",
            url: "../php/adminAction.php?id="+id,
    
            success: function (r) {
                
                if (r == 'T') {
                    const msg = "<div class='offset-7 col-3 alert alert-danger'><b>Se elimino el registro</b></div>";
                    $("#mensaje").html(msg);
                    setTimeout(function () {
                        $("#mensaje").hide(6000);
                    }, 3000);
                    cargarTabla();
                }
                else {
                    const msg = "<div class='alert alert-danger'><b>No se elimno </b></div>";
                    $("#mensaje").html(msg);
                    setTimeout(function () {
                        $("#mensaje").hide(6000);
                    }, 3000);
                }
            }
        });
    });
}

function editar(id) {

    $.ajax({
        type: "GET",
        url: "../php/adminAction.php",
        data: { id: id },

        success: function (r) {
            var visitante = JSON.parse(r);

            $('#id').val(visitante.id);
            $('#nombre').val(visitante.nombre);
            $('#apellidos').val(visitante.apellidos);
            $('#telefono').val(visitante.telefono);
            $('#fecha').val(visitante.fecha);
            $('#correo').val(visitante.email);
            $('#password').val(visitante.contrasena);
            $('#categ').val(visitante.categoria);
        }
    });

    $("#btnGuardar").on("click", function () {

        $('#frmActualizar').validate({

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
                categ: {
                    required: "Este campo es obligatorio.",
                }

            }, errorElement: "span",
            errorClass: "color-rojo col-12",

            submitHandler: function () {

                var data = $("#frmActualizar").serialize();

                $.ajax({

                    url: '../php/adminAction.php',
                    data: data,
                    type: 'POST',

                    success: function (r) {
                        
                        if (r == 'T') {
                            const msg = "<div class='offset-7 col-3 alert alert-success'><b>Se guardó correctamente</b></div>";
                            $("#mensaje").html(msg);
                            setTimeout(function () {
                                $("#mensaje").hide(6000);
                            }, 3000);
                            cargarTabla(tablaAdmin);
                        }
                        else {
                            const msg = "<div class='alert alert-danger'><b>No se guardo </b><b> /b></div>";
                            $("#mensaje").html(msg);
                            setTimeout(function () {
                                $("#mensaje").hide(6000);
                            }, 3000);
                        }
                    }
                })
            }

        });
    });
};
