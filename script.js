$(document).ready(function () {
  $(".autocomplete").keyup(function (e) {
    $(".dropdown-content").show();
    $(".dropdown-content").empty();
    fetch("traitement.php?data=" + $(".autocomplete").val())
      .then(function (res) {
        if (res.ok) {
          return res.json();
        }
      })
      .then(function (value) {
        // On fait une boucle pour afficher tout les elements
        $('#form-search').attr('action', 'recherche.php?search=' + $(".autocomplete").val())
        for (var i = 0; i < value.length; i++) {
          $(
            '<a class="result" id="' +
              value[i]["ID"] +
              '" href="element.php?id=' +
              value[i]["ID"] +
              '">' +
              value[i]["Forename"] + " " + value[i]["Surname"] +
              "</a>"
          ).appendTo(".dropdown-content");
        }
      })
      .catch(function (err) {
        // Une erreur est survenue
        console.log(err);
      });
      // On vérifie si la searchbar est vide, et si elle l'est alors on cache le dropdown content
      if($(".autocomplete").val() == "") {
        $(".dropdown-content").empty();
        $(".dropdown-content").hide();
      }
  });
});