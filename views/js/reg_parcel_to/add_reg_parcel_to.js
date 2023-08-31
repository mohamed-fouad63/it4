$("#add_reg_parcel_to_btn").click(function () {
  var formData = {
    send_to_by: $("#send_to_by").val(),
    czc: $("#czc").val(),
    hand: $("#hand").val(),
    date_reg_parcel_to: $("#date_reg_parcel_to").val(),
    name_reg_parcel_to: $("#name_reg_parcel_to").val(),
    sub_reg_parcel_to: $("#sub_reg_parcel_to").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "/it4/ajaxAddParcelTo",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#czc").val("");
        $("#hand").val("");
        $("#name_reg_parcel_to").val("");
        $("#sub_reg_parcel_to").val("");
        $("#czc").focus();
        table.ajax.reload();
      } else {
        alert("لم يتم ادخال المسجل . وجود خانه او خانات فارغه / باركود مكرر");
      }
    },
  });
});
