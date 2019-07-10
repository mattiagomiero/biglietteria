function mostraInfoFilm(id) {
  console.log("ascasoicvhnwqubferik");

  $.ajax({
    type: "GET",
    url: "includes/info_film.php?id_film=" + id,
    success: function(data) {
      //il data prende tutto il file info_film.php e lo mette dentro all'id
      $("#info_modal_film").html(data); //qui prende il div vuoto e lo popola
      $("#info_film").modal("show"); //prende l'id del modal e gli dice di mostrarlo
    }
  });
}
