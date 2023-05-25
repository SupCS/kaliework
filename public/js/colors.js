$(document).ready(function () {
  $(".cp").on("click", function () {
    $(".cp").each(function () {
      $(this).removeClass("active");
    });
    $(this).addClass("active");
  });
});
