///========= POP-UPS (VENTANAS EMERGENTES) =========///

//VENTANA PARA BUSCAR MODULOS
var abrirpopup_modulos = document.getElementById("elejir"),
  overlay_modulos = document.getElementById("overlay"),
  popup_modulos = document.getElementById("popup");
btncerrar_modulos = document.getElementById("btn-cerrar-popup");
//se ejecutan los eventos siempre y cuando existan los botones de abrir y cerrar popup
if (abrirpopup_modulos && btncerrar_modulos) {
  //evento del boton cerrar
  btncerrar_modulos.addEventListener("click", function (e) {
    e.preventDefault();
    overlay_modulos.classList.remove("active");
    popup_modulos.classList.remove("active");
  });
  //evento del boton abrir boton
  abrirpopup_modulos.addEventListener("click", function () {
    swal(
      "Atención",
      "recuerde que solo esta permitido hacer una reserva por dia",
      "warning"
    );
    overlay_modulos.classList.add("active");
    popup_modulos.classList.add("active");
  });
}

//VENTANA PARA AGREGAR USUARIOS
var abrirpopup_add = document.getElementById("add-usu"),
  overlay_add = document.getElementById("overlay-user"),
  popup_add = document.getElementById("popup-user");
btncerrar_add = document.getElementById("btn-cerrar-popup");
//se ejecutan los eventos siempre y cuando existan los botones de abrir y cerrar popup
if (abrirpopup_add && btncerrar_add) {
  //evento del boton cerrar
  btncerrar_add.addEventListener("click", function (e) {
    e.preventDefault();
    overlay_add.classList.remove("active");
    popup_add.classList.remove("active");
    reloads();
  });
  //evento del boton abrir boton
  abrirpopup_add.addEventListener("click", function () {
    overlay_add.classList.add("active");
    popup_add.classList.add("active");
  });
}

//VENTANA ACTUALIZAR USUARIO
var overlay_upd = document.getElementById("overlay-upd"),
  popup_upd = document.getElementById("popup-upd"),
  btncerrar_upd = document.getElementById("btn-cerrar-popup-updt");
//se ejecutan los eventos siempre y cuando existn los botones de abrir y cerrar popup
if (btncerrar_upd) {
  //evento del boton cerrar
  btncerrar_upd.addEventListener("click", function (e) {
    e.preventDefault();
    overlay_upd.classList.remove("active");
    popup_upd.classList.remove("active");
  });
}

//============= VENTANA DE IMAGEN ==============

var abrirpopup_img = document.getElementById("abrir-mapa"),
  overlay_img = document.getElementById("overlay-img"),
  popup_img = document.getElementById("popup-img");
btncerrar_img = document.getElementById("btn-cerrar-popup-img");
//se ejecutan los eventos siempre y cuando existan los botones de abrir y cerrar popup
if (abrirpopup_img && btncerrar_img) {
  //evento del boton cerrar
  btncerrar_img.addEventListener("click", function (e) {
    e.preventDefault();
    overlay_img.classList.remove("active");
    popup_img.classList.remove("active");
  });
  //evento del boton abrir boton
  abrirpopup_img.addEventListener("click", function () {
    overlay_img.classList.add("active");
    popup_img.classList.add("active");
  });
}



// ===================== FUNCIONES DATATABLES =================

// CAMBIAR LENGUAGE DE LA TABLA A ESPAÑOL
var language = {
  language: {
    decimal: "",
    emptyTable: "No hay información",
    info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
    infoFiltered: "(Filtrado de _MAX_ total entradas)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Mostrar _MENU_ Entradas",
    loadingRecords: "Cargando...",
    processing: "Procesando...",
    search: "Buscar:",
    zeroRecords: "Sin resultados encontrados",
    paginate: {
      first: "Primero",
      last: "Ultimo",
      next: "Siguiente",
      previous: "Anterior",
    },
  },
};

// FUNCIONES A LA TABLA DE RESERVACIONES (SOLO SE EJECUTA LA FUNCION SI SE ESTA EN LA PAGIA DE REPORTES)
if (document.getElementById("reservaciones")) {
  $(document).ready(function () {
    // INICIALIZAR DATATABLE Y ASIGNAR BOTONES DE PDF, EXCEL PARA REPORTES
    $("#reservaciones").DataTable({
      language: {
        decimal: "",
        emptyTable: "No hay información",
        info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
        infoFiltered: "(Filtrado de _MAX_ total entradas)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Mostrar _MENU_ Entradas",
        loadingRecords: "Cargando...",
        processing: "Procesando...",
        search: "Buscar:",
        zeroRecords: "Sin resultados encontrados",
        paginate: {
          first: "Primero",
          last: "Ultimo",
          next: "Siguiente",
          previous: "Anterior",
        },
      },
      "order": [[ 3, "asc" ]],
      dom: "Bfrtip",
      buttons: [
        {
          extend: "excelHtml5",
          text:
            '<span><i class="fas fa-file-pdf"></i>  <span>EXCEL</span></span>',
          titleAttr: "Exportar a excel",
          className: "exportar excel",
        },
        {
          extend: "pdfHtml5",
          text:
            '<span><i class="fas fa-file-pdf"></i>  <span>PDF</span></span>',
          titleAttr: "Exportar a excel",
          className: "exportar pdf",
        },
      ],
    });
  });
}

/// FUNCIONES PARA LA TABLA DE USUARIOS (SOLO SE EJECUTA LA FUNCION SI SE ESTA EN LA PAGIA DE GESTION DE USUARIOS)
var tablauser;
if (document.getElementById("usuarios")) {
  $(document).ready(function () {
    tablauser = $("#usuarios").DataTable({
      language: {
        decimal: "",
        emptyTable: "No hay información",
        info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
        infoFiltered: "(Filtrado de _MAX_ total entradas)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Mostrar _MENU_ Entradas",
        loadingRecords: "Cargando...",
        processing: "Procesando...",
        search: "Buscar:",
        zeroRecords: "Sin resultados encontrados",
        paginate: {
          first: "Primero",
          last: "Ultimo",
          next: "Siguiente",
          previous: "Anterior",
        },
      },
      "order": [[ 0 , "asc" ]]
    });
  });
}




//============= FUNCIONES PAGINA LOGIN ==========//

// EVENTO PARA EL FORMULARIO DE LOGIN
jQuery(document).on("submit", "#form-login", function (event) {
  event.preventDefault();
  jQuery
    .ajax({
      url: "php/ingresar.php",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {
        $("#mostrar").val("Validando...");
      },
    })
    .done(function (resp) {
      //resp, es la variable que recive los datos JSON del archivo php
      if (resp.respuesta) {
        $("#mostrar").val("Ingresar");
        location.href = "Reservas.php"; //redirecciona a la pagina de reservas
        if (resp.tipo == 1) {
          $(".form-container").html();
        }
      } else {
        //error si no encuentra ningun registro
        swal(
          "hubo un error al ingresar",
          "El numero de documento no se encuentra registrado",
          "error"
        );
        $("#mostrar").val("Ingresar");
      }
    })
    .fail(function (resp) {
      //SI HUBO ALGUN ERROR CON LA CONSULTA 
      swal("Error", "error inesperado al realizar la consulta", "error");
      $("#mostrar").val("Ingresar");
    })
    .always(function () {});
});





//============== FUNCIONES PAGINA RESERVAS ============//

// EVENTO BUCAR MODULOS AL PRESIONAR EL BOTON DE SELECCIONAR MODULO
jQuery(document).on("click", "#select-modulo", function (event) {
  event.preventDefault();
  var modulo = $("#num_modulo").val();
  var hinicio = $("#hora_in").val();
  var hfinal = $("#hora_fin").val();
  var fecha = $(".fecha").val();

  //VERIFICAR QUE LOS CAMPOS NO ESTEN VACIOS
  if (hinicio == "" || hfinal == "" || fecha == "") {
    if (hfinal == "") {
      $("#hora_fin").addClass("is-invalid");
    }
    if (hinicio == "") {
      $("#hora_in").addClass("is-invalid");
    }
    if (fecha == "") {
      $(".fecha").addClass("is-invalid");
    }
  } else {
    $("#hora_in").removeClass("is-invalid");
    $("#hora_fin").removeClass("is-invalid");
    $(".fecha").removeClass("is-invalid");
    //EVENTO VALIDATE, PARA QUE LOS HORARIOS NO ESTEN MAL INSERTADOS ES DECIR, EN CASO DE QUE LA HORA FINAL SEA MENOR A LA INICIAL POR EJEMPLO
    if (validate($("#hora_in").val(), $("#hora_fin").val())) {
      //METODO PARA BUSCAR MODULOS
      buscar(modulo, hinicio, hfinal, fecha);
    } else {
      //MANDA ERROR SI LOS HORARIOS ESTAN MAL INSERTADOS
      swal(
        "Error en los horarios",
        "la hora de incio o la hora final son incorrectas",
        "error"
      );
      //DESHABILITA EL BOTON DE ACEPTAR EN EL POP-UP DE MODULOS
      $("#aceptar").prop("disabled", true);
    }
  }
});


//refrescar pagina
function reloads() {
  location.reload();
}


//FUNCION PARA BUSCAR MODULOS
function buscar(modulo, hinicio, hfinal, fecha) {
  jQuery
    .ajax({
      url: "php/modulos-disponibles.php",
      type: "POST",
      dataType: "JSON",
      data: {
        modulo: modulo,
        hinicio: hinicio,
        hfinal: hfinal,
        fecha: fecha,
      },
    })
    .done(function (resp) {
      if (resp.reservas) {
        $(".container").html(resp.etiqueta);
        if (resp.tipo_con == 1) {
          $("#cita").val(resp.citas);
        }
      } else {
        swal(
          "No permitido",
          "Usted ya realizó una reserva para este dia",
          "warning"
        );
        $(".container").html("");
        $("#aceptar").prop("disabled", true);
      }
    })
    .fail(function (resp) {
      //SI HAY ALGUN ERROR CON LA CONSULTA
      swal("Error", "error inesperado al realizar la consulta", "error");
    });
}



// PONER EL VALOR DEL RADIO BUTTON EN EL CAMPO DE CITAS
$("#elejir").on("click", function () {
  // EN CASO DE QUE EL MODULO ESTE OCUPADO, SE MUESTRA UN MODULO CON UN ENLACE EL CUAL LE VA A MOSTRAR LOS HORARIOS EN LOS QUE EL MODULO NO ESTA DISPONIBLE EN UNA ALERTA
  $("body").on("click", ".modulo .citas", function () {
    swal(
      "Horarios No Disponibles Para Este Modulo",
      $("#cita").val(),
      "warning"
    );
  }),
    //DETECTAR EL RADIO BUTTON AL CUAL SE LE DIO CLICK Y REALIZAR UN EVENTO
    $("body").on("click", ".modulo input[type=radio]", function () {
      var valorRadio = $(this).attr("value");
      $("#num_modulo").val(valorRadio);
      $("#aceptar").prop("disabled", false);

      /// GUARDA LOS VALORES DE LOS CAMPOS ////
      let fecha = $(".fecha").val();
      let horainicio = $(".hora.Horin").val();
      let horafin = $(".hora.Hfinal").val();
      let numModulo = $("#num_modulo").val();
      jQuery(document).on("click", "#aceptar", function (event) {

        /// asignar el valor de un modulo a la variable
        $("#num_modulo").val(valorRadio);

        /// ASIGNAR A LOS CAMPOS DEL FORMULARIO DE ENVIAR RESERVA /////
        $(".fecha-fin").val(fecha);
        $(".horin").val(horainicio);
        $(".hfinal").val(horafin);
        $("#modulo").prop("display", "block");
        $("#modulo").val(numModulo);
        //CIERRA EL POP-UP DE MODULOS
        overlay.classList.remove("active");
        popup.classList.remove("active");
        $("#reservar").prop("disabled", false);
      });
    });
});



//EVENTO DEL FORMULARIO ENVIAR RESERVA
$(document).on("submit", "#form-reservar", function (event) {
  event.preventDefault();
  jQuery
    .ajax({
      url: "php/enviar_reserva.php",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {},
    })
    .done(function (resp) {
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Reserva Exitosa ",
        showConfirmButton: false,
        timer: 2000,
      });
      setTimeout(reloads, 2400);
    })
    .fail(function (resp) {
      swal("Error", "resp", "error");
    });
});



//FUNCION PARA VERIFICAR QUE LOS HORARIOS NO ESTEN MAL PUESTOS
function validate(dt1, dt2) {
  var jdt1 = Date.parse("20 Aug 2000 " + dt1);
  var jdt2 = Date.parse("20 Aug 2000 " + dt2);
  if (isNaN(jdt1)) {
    return false;
  }
  if (isNaN(jdt2)) {
    return false;
  }
  if (jdt1 > jdt2) {
    return false;
  } else {
    return true;
  }
}



//FUNCION PARA BLOQUEAR FECHAS ANTERIORES A LA ACTUAL
$(document).ready(function () {
  var fecha = new Date();

  var mes =
    fecha.getMonth() < 10
      ? (mes = "0" + (fecha.getMonth() + 1))
      : (mes = fecha.getMonth() + 1);
  var dia =
    fecha.getDate() < 10
      ? (dia = "0" + fecha.getDate())
      : (dia = fecha.getDate());
  var año = fecha.getFullYear();
  var completa = año + "-" + mes + "-" + dia;
  $(".fecha").attr("min", completa);

});



//EVENTO DE REGISTRAR USUARIO
jQuery(document).on("submit", "#adds-user-form", function (event) {
  event.preventDefault();
  jQuery
    .ajax({
      url: "php/gestionar_usuarios.php?case=agregar",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {},
    })
    .done(function (resp) {
      if (resp.validacion) {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "usuario agregado",
          showConfirmButton: false,
          timer: 2000,
        });
        let datos_user={
          id:resp.id,
          cedula:resp.cedula,
          nombre:resp.nombre,
          apellido:resp.apellidos,
          cargo:resp.cargo,
          editar:'<a href="#" class="editar"> <ion-icon name="pencil"></ion-icon></a>',
          eliminar:'<a href="#" class="eliminar"><ion-icon name="trash"></ion-icon></a>'
        }
        console.log(datos_user)
        
        tablauser = $('#usuarios').DataTable();
        tablauser.row.add( [
          resp.id,
          resp.cedula,
          resp.nombre,
          resp.apellidos,
          resp.cargo,
          '<a href="#" class="eliminar"><ion-icon name="pencil"></ion-icon></a>',
          '<a href="#" class="editar"> <ion-icon name="pencil"></ion-icon></a>'
         
      ] ).draw( false );
      } else {
        swal(
          "incorrecto",
          "el numero de documento ya se encuentra registrado",
          "error"
        );
      }
      console.log("y a ver");
    })
    .fail(function (resp) {
      swal("Error", "error inesperado al realizar la consulta", "error");
      $("#mostrar").val("Ingresar");
    })
    .always(function () {});
});




// ========== FUNCIONES PAGINA GESTION DE USUARIOS ================

//FUNCION EDITAR USUARIO
$(document).on("click", ".editar", function () {
  //GUARDAR VALORES DE LA FILA SELECCIONADA
  fila = $(this).closest("tr");
  //GUARDAR LOS VALORES DE LAS TABLAS
  var id = parseInt(fila.find("td:eq(0)").text());
  var cedula = parseInt(fila.find("td:eq(1)").text());
  var nombres = fila.find("td:eq(2)").text();
  var apellidos = fila.find("td:eq(3)").text();
  var cargo = fila.find("td:eq(4)").text();

  //ABRIR VENTANA DE EDICION
  overlay_upd.classList.add("active");
  popup_upd.classList.add("active");

  //ASIGNAR VALORES DE LA TABLA A LOS CAMPOS DE TEXTO
  $(".id-upd_val").val(id);
  $(".cedula-upd").val(cedula);
  $(".nombres-upd").val(nombres);
  $(".apellidos-upd").val(apellidos);
  $(".cargo-upd").val(cargo);
  //EVENTO PARA TRAER DATOS AL SELECT
  jQuery
    .ajax({
      url: "php/gestionar_usuarios.php?case=cargos&id=" + id,
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {},
    })
    .done(function (resp) {
      if (resp.validacion) {
        $("#select-cargo").html(resp.select);
      }
    })
    .fail(function (resp) {
      alert("nodio");
    });
  //EVENTO SUBMIT DEL FORMULARIO DE ACTUALIZAR
  $(document).on("submit", "#updt-user-form", function (e) {
    let cedula = $(".cedula-upd").val();
    let nombre = $(".nombres-upd").val();
    let apellidos = $(".apellidos-upd").val();
    let cargo = document.getElementById("select-cargo");
    e.preventDefault();
    jQuery
      .ajax({
        url: "php/gestionar_usuarios.php?case=modificar",
        type: "POST",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {},
      })
      .done(function (resp) {
        if (resp.validacion) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Modificacion Exitosa ",
            showConfirmButton: false,
            timer: 2000,
          });
          fila.find("td:eq(1)").text(cedula);
          fila.find("td:eq(2)").text(nombre);
          fila.find("td:eq(3)").text(apellidos);
          fila.find("td:eq(4)").text(cargo.options[cargo.selectedIndex].text);
          console.log()
        } else {
          swal("Error", "correcto", "error");
        }
      })
      .fail(function (resp) {
        swal("Error", "correcto", "success");
      });
  });
});



//FUNCIION ELIMINAR USUARIO
function Eliminarusuario(code, fila, tabla) {
  console.log(fila);
  parametros = { id_pro: code };
  $.ajax({
    data: parametros,
    url: "php/gestionar_usuarios.php?case=eliminar&id=" + code,
    type: "POST",
    beforeSend: function () {},
    success: function () {
      tablauser.row(fila.find("td:eq(0)"), { page: "current" }).remove().draw();
    },
  });
}


//ALERT ELIMINAR USUARIO
if(document.getElementsByClassName("eliminar")){
  $(".eliminar").click(function () {
    fila = $(this).closest("tr");
    var tablauser = $("#usuarios").DataTable();

    console.log("ojito");
  
    Swal.fire({
      title: "Cuidado!",
      text: "Estas seguro que deseas eliminar este usuario?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        Eliminarusuario(parseInt(fila.find("td:eq(0)").text()), fila, tablauser);
      }
    });
  });
}



// evento para agregarle una miga de pan al enlace correspondiente en el nav
$(document).ready(function(){
  //captura el id del enlace de gestion de usuarios
  let gestion=$("#link-gestion");
  //captura el id del enlace de reportes
  let reportes=$("#link-reportes");
  //captura el id del enlace de reservas
  let reservas=$("#link-reservas");
  //verifica si existen 
  if(gestion && reportes){
    //expresion regular para ver si se esta en la pagina de reportes
    let regex=/reportes/;
    //ejecuta la expresion con el link
    if(regex.test(location.href)){
      //le agrega la clase miga al enlace repotes 
      reportes.attr("class","miga")
    }else{
      let regex=/gestion_usuarios/;
      if(regex.test(location.href)){
        gestion.attr("class","miga")
      }else{
        reservas.attr("class","miga")
      }
      //si no esta en la pagina de reportes le agrega la clase miga al enlace gestion de usuarios 
      
    }
    
  }
})