$("#send_to_by").change(function () {
  switch ($(this).val()) {
    case "hand":
      $(".shell ").css("display", "none");
      $(".masked").val("");
      $("#hand ").css("display", "inline-block");
      break;
    default:
      $("#hand ").css("display", "none");
      $("#hand ").val("");
      $(".shell ").css("display", "inline-block");
      break;
  }
});
