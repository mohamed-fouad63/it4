$("#Edit_In_It_Modal .btn-success").click(function () {
  var formData = {
    damage: $("#damage").val(),
    date_in_it: $("#date_in_it").val(),
    parcel_in_it: $("#parcel_in_it").val(),
    in_it_note: $("#in_it_note").val(),
    dvice_num: dvice_num
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxDvicesEditInIt",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Edit_In_It_Modal").modal("hide");
        $("#damage").val("");
        $("#in_it_note").val("");
        $("#parcel_in_it").val("");
        datatable_ajax_reload();
      } else {
        alert("لم يتم التعديل");
      }
    }
  });
});