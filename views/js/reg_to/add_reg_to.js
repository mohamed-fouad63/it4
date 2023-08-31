$("#add_reg_to_btn").click(function () {
  var formData = {
    send_to_by: $("#send_to_by").val(),
    czc: $("#czc").val(),
    hand: $("#hand").val(),
    date_reg_to: $("#date_reg_to").val(),
    name_reg_to: $("#name_reg_to").val(),
    sub_reg_to: $("#sub_reg_to").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "/it4/ajaxAddRegTo",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#czc").val("");
        $("#hand").val("");
        $("#name_reg_to").val("");
        $("#sub_reg_to").val("");
        $("#czc").focus();
        table.ajax.reload();
      } else {
        alert("لم يتم ادخال المسجل . وجود خانه / خانات فارغه");
      }
    },
  });
});
