(function ($) {
  "use strict";

  /*============= preloader js css =============*/
  var cites = [];
  cites[0] =
    "Ezirent offers you convenient renting solutions allowing you decent accommodations with little to no landlord wahala.";
  cites[1] = "Simply choose your preferred payment plan.";
  cites[2] = "Pay Your Rent Daily";
  cites[3] = "Pay Your Rent Weekly";
  var cite = cites[Math.floor(Math.random() * cites.length)];
  $("#preloader p").text(cite);
  $("#preloader").addClass("loading");

  $(window).on("load", function () {
    setTimeout(function () {
      $("#preloader").fadeOut(500, function () {
        $("#preloader").removeClass("loading");
      });
    }, 500);
  });
})(jQuery);
