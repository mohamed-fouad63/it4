$("#Delete_Modal .btn-success").click(function () {
  var formData = {
    delete_by: $("#delete_by").val(),
    delete_date: $("#delete_date").val(),
    _token: $("#_token").val(),
    dvice_num: dvice_num,
  };
  if (formData.delete_by != "" && formData.delete_date != "") {
    $.ajax({
      type: "POST",
      url: "/it4/ajaxDvicesDeleteInIt",
      data: formData,
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        if (result == "done") {
          $("#Delete_Modal").modal("hide");
          $("#delete_by").val("");
          datatable_ajax_reload();
        } else {
          alert(result);
        }
      },
    });
  } else {
    alert("يجب تحديد تاريخ و طريقه استنزال العهده");
  }
});
