$("#example tbody").on("click", ".btn-success", function () {
  var data = table.row($(this).parents("tr")).data();
  $("#czc").val(data.barcode);
  $("#date_reg_to").val(data.date);
  $("#name_reg_to").val(data.send_to);
  $("#sub_reg_to").val(data.subject);
  $("#edit_reg_to_btn").val(data.id);
  $("#add_reg_to_btn").css("display", "none");
  $("#edit_reg_to_btn").css("display", "inline-block");
});
$("#edit_reg_to_btn").click(function () {
  var formData = {
    send_to_by: $("#send_to_by").val(),
    czc: $("#czc").val(),
    hand: $("#hand").val(),
    date_reg_to: $("#date_reg_to").val(),
    name_reg_to: $("#name_reg_to").val(),
    sub_reg_to: $("#sub_reg_to").val(),
    edit_reg_to_btn: $("#edit_reg_to_btn").val(),
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxRegToEdit",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        table.ajax.reload();
        $("#edit_reg_to_btn").css("display", "none");
        $("#add_reg_to_btn").css("display", "inline-block");
        $("#czc").val("");
        $("#hand").val("");
        $("#name_reg_to").val("");
        $("#sub_reg_to").val("");
        $("#czc").focus();
      } else {
        alert("لم يتم ادخال المسجل . وجود خانه / خانات فارغه");
      }
    },
  });
});
