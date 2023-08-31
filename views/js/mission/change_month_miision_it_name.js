$("#month_missin,#select_it_name").on("change", function () {
  table.ajax.reload();
  if ($("#select_it_name").val() !== "") {
    $(".add_div button").removeClass("disabled");
    $(".bt_div button").removeClass("disabled");
    $(".lock_mission button").removeClass("disabled");
    $("#mission_lock_btn").removeClass("disabled");
    var select_it_name = $("#select_it_name option:selected").text();
    $("#it_name").val(select_it_name);
  } else {
    $(".add_div button").addClass("disabled");
    $(".bt_div button").addClass("disabled");
    $("#mission_lock_btn").addClass("disabled");
  }
});
