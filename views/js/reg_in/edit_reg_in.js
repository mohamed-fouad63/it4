$("#example tbody").on("click", ".btn-success", function () {
  var data = table.row($(this).parents("tr")).data();
  $("#czc").val(data.barcode);
  $("#date_reg_in").val(data.date);
  $("#name_reg_in").val(data.send_to);
  $("#sub_reg_in").val(data.subject);
  $("#edit_reg_in_btn").val(data.id);
  $("#add_reg_in_btn").css("display", "none");
  $("#edit_reg_in_btn").css("display", "inline-block");
});
$("#edit_reg_in_btn").click(function () {
  var formData = {
    send_in_by: $("#send_to_by").val(),
    czc: $("#czc").val(),
    hand: $("#hand").val(),
    date_reg_in: $("#date_reg_in").val(),
    name_reg_in: $("#name_reg_in").val(),
    sub_reg_in: $("#sub_reg_in").val(),
    edit_reg_in_btn: $("#edit_reg_in_btn").val(),
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxRegInEdit",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        table.ajax.reload();
        $("#edit_reg_in_btn").css("display", "none");
        $("#add_reg_in_btn").css("display", "inline-block");
        $("#czc").val("");
        $("#hand").val("");
        $("#name_reg_in").val("");
        $("#sub_reg_in").val("");
        $("#czc").focus();
      } else {
        alert("لم يتم ادخال المسجل . وجود خانه / خانات فارغه");
      }
    },
  });
});
