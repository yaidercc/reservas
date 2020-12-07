
var activa=false;
function hola(){
jQuery(document).on("submit", "#form-login", function (event) {
  event.preventDefault();
  jQuery
    .ajax({
      url: "php/ingresar.php?case=login",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {
        $("#mostrar").val("Validando...");
      },
    })
    .done(function (resp) {
      if (resp.respuesta) {
        $(".section-2").show();
        $(".section-1").hide();
        $(".section-3").show();
        $("#mostrar").val("Ingresar");
         activa=resp.verificacion;
        console.log(activa)
      } else {
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
      console.log("noda");
    })
    .always(function () {});

  $("#salir").on("click", function () {
    alert("hola");
    jQuery.ajax({
      url: "php/logout.php",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {},
    })
    .done(function (resp) {
      $(".section-1").show();
      $(".section-2").hide();
      $(".section-3").hide();
    })
  });
});
}