$("#login").on("submit", login);

function login(e) {
  e.preventDefault(); //questo serve per non far caricare la pagina
  var form_data = $("#login").serialize(); //prende ttti i valori del form che ha un nome

  $.ajax({
    type: "POST",
    url: "includes/login.inc.php",
    data: form_data,
    success: function(risposta) {
      if (risposta.success) {
        Swal.fire({
          type: "success",
          title: "Benvenuto!",
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(function() {
          location.href = "index.php";
        }, 2000);
      } else {
        if (risposta.error == 202) {
          $(".email-error").html("Email Sbagliata");
        } else if (risposta.error == 203) {
          $(".password-error").html("Password Sbagliata");
        } else {
        }
      }
    }
  });
}
