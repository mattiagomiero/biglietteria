$("#acquistoBiglietti").on("submit", acquisto);

function acquisto(e) {
  e.preventDefault(); //questo serve per non far caricare la pagina
  var form_data = $("#acquistoBiglietti").serialize();

  $.ajax({
    type: "POST",
    url: "includes/acquistoBiglietti.inc.php",
    data: form_data,
    success: function(risposta) {
      if (risposta.success) {
        Swal.fire({
          type: "success",
          title: "Biglietti acquistati!",
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(function() {
          location.href = "index.php";
        }, 2000);
      } else {
        $(".mancato-error").html("");
        if (risposta.error == 101) {
          $(".nome-error").html("Compila nome");
        } else if (risposta.error == 102) {
          $(".cognome-error").html("Compila cognome");
        } else if (risposta.error == 103) {
          $(".mail-error").html("Compila mail");
        } else if (risposta.error == 104) {
          $(".nbiglietti-error").html("Seleziona il numero dei biglietti");
        }
      }
    }
  });
}
