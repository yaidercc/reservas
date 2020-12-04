/*$(document).ready(function () {
  
  $("#mostrar").on("click", function () {
    $(".section-2").show();
    alert("hello");
  });
});*/

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
        console.log(resp.nombre);
    })
    .fail(function (resp) {
      console.log("noda");
    })
    .always(function () {});
});
