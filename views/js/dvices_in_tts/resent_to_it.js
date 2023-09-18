$("#Resen_To_It_Modal .btn-success").click(function () {
  var formData = {
    date_from_auth_repair: $("#date_from_auth_repair").val(),
    by_from_auth_repair: $("#by_from_auth_repair").val(),
    dvice_num: dvice_num,
    _token: $("#_token").val(),
  };
  if (
    formData.date_from_auth_repair != "" &&
    formData.by_from_auth_repair != ""
  ) {
    $.ajax({
      type: "POST",
      url: "/it4/ajaxResentToIt",
      data: formData,
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        if (result == "done") {
          $("#Resen_To_It_Modal").modal("hide");
          datatable_ajax_reload();
        } else {
          alert('تعذر اعاده الجهاز الى قسم الدعم الفنى');
        }
      },
    });
  } else {
    alert("يجب تحديد تاريخ و طريقه عوده الجهاز للدعم الفنى");
  }
});
