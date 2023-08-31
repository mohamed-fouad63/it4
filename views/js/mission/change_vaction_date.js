$("#mission_date_start").on("change", function () {
  $("#mission_date_end").val($("#mission_date_start").val());
  $("#vaction_div").css("visibility", "visible");
});
$("#mission_date_end").on("change", function () {
  if ($("#mission_date_end").val() != $("#mission_date_start").val()) {
    $("#vaction_div").css("visibility", "hidden");
  } else {
    $("#vaction_div").css("visibility", "visible");
  }
});
