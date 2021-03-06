var abrirpopup = document.getElementById("elejir"),
  overlay = document.getElementById("overlay"),
  popup = document.getElementById("popup");
btncerrar = document.getElementById("btn-cerrar-popup");
if (abrirpopup && btncerrar) {
  btncerrar.addEventListener("click", function (e) {
    e.preventDefault();
    overlay.classList.remove("active");
    popup.classList.remove("active");
  });
  abrirpopup.addEventListener("click", function () {
    overlay.classList.add("active");
    popup.classList.add("active");
  });
}

jQuery(document).on("submit", "#form-login", function (event) {
  event.preventDefault();
  jQuery
    .ajax({
      url: "php/ingresar.php?case=login",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {
        $("#mostrar").val("Validando..."); //cambia el texto del boton mientras se ejecuta la consulta. en php se relentiza la consulta un segundo para que se vea mejor el efecto
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

      console.log(resp.nombre);
    })
    .fail(function (resp) {
      swal("Error", "error inesperado al realizar la consulta", "error");
      $("#mostrar").val("Ingresar");
    })
    .always(function () {});
});

//cerrar sesion.
$("#salir").on("click", function (event) {
  event.preventDefault();
  jQuery
    .ajax({
      url: "php/logout.php",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {},
    })
    .done(function (resp) {
      location.href = "login.php";
    })
    .fail(function (resp) {
      swal("Error", "error inesperado al realizar la consulta", "error");
    });
});

//seleccionar un modulo y reflejarlo en un input
$("input[type='radio']").on("change", this, function () {
  valor = $(this).val();
  $("#select-modulo").prop("disabled", false);
  $("#select-modulo").on("click", function () {
    Swal.fire({
      title: "Adevertencia!",
      text: "Estas seguro que deseas seleccionar este modulo?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, seleccionar",
    }).then((result) => {
      if (result.isConfirmed) {
        $("#modulo").attr("value", valor);
        $("#modulo").addClass("is-valid");
        overlay.classList.add("active");
        popup.classList.add("active");
      } else {
        $("input[type=radio]").prop("checked", false);
        console.log("declined");
      }
    });
  });
});
// forma abreviada de document.ready, pero en una funcion

// al darle click a buscar modulo se va a desplegar esta funcion de jquery
jQuery(document).on("click", "#select-modulo", function (event) {
  event.preventDefault();
  var modulo = $("#num_modulo").val();
  var hinicio = $("#hora_in").val();
  var hfinal = $("#hora_fin").val();
  var fecha = $(".fecha").val();
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
    buscar(modulo, hinicio, hfinal, fecha);
  }
});
//funcion para buscar los modulos
function buscar(modulo, hinicio, hfinal, fecha) {
  jQuery
    .ajax({
      url: "php/modulos-disponibles.php",
      type: "POST",
      dataType: "html",
      data: {
        modulo: modulo,
        hinicio: hinicio,
        hfinal: hfinal,
        fecha: fecha,
      },
    })
    .done(function (resp) {
      $(".container").html(resp);
    })
    .fail(function (resp) {
      console.log("no paso");
      //swal("Error", "error inesperado al realizar la consulta", "error");
    });
}

//poner valor del radio button en el input de modulo
$("#elejir").on("click", function () {
  $("body").on("click", ".modulo input[type=radio]", function () {
    var valorRadio = $(this).attr("value");
    $("#num_modulo").val(valorRadio);

    $("#aceptar").prop("disabled", false);
    jQuery(document).on("click", "#aceptar", function (event) {
      console.log("algo");
      $("#num_modulo").val(valorRadio);
      /// GUARDA LOS VALORES DE LOS CAMPOSM ////
      let fecha = $(".fecha").val();
      let horainicio = $(".Horin").val();
      let horafin = $(".Hfinal").val();
      let numModulo = $("#num_modulo").val();
      overlay.classList.remove("active");
      popup.classList.remove("active");
      console.log(fecha);
      //// ASIGNAR VALORES ////
      $(".fecha-fin").val(fecha);
      $(".horin").val(horainicio);
      $(".hfinal").val(horafin);
      $("#modulo").prop("display", "block");
      $("#modulo").val(numModulo);
    });
  });
});
$(document).on("submit", "#form-reservar", function (event) {
  event.preventDefault();
  jQuery
    .ajax({
      url: "php/reserva.php",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {},
    })
    .done(function (resp) {
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "reserva exitosa ",
        showConfirmButton: false,
        timer: 2000,
      });
      setTimeout(reloads, 2400);
    })
    .fail(function (resp) {
      swal("Error", "error inesperado al realizar la consulta", "error");
    });
});
function reloads() {
  location.reload();
}
