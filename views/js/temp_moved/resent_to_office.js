$("#Resend_To_Office_Modal .btn-success").click(function () {
  var formData = {
    resen_to_office_date: $("#resen_to_office_date").val(),
    resen_to_office_by: $("#resen_to_office_by").val(),
    dvice_name: $(".dvice_name").val(),
    dvice_sn: $(".dvice_sn").val(),
    office_name: office_name,
    note_move_to: note_move_to,
    divce_num: divce_num,
  };
  if (
    formData.resen_to_office_date == "" ||
    formData.resen_to_office_by == ""
  ) {
    alert("يجب تحديد تاريخ و طريقه ارسال الجهاز للمكتب");
  } else {
    $.ajax({
      type: "POST",
      url: "/it4/ajaxResentMovedToOfice",
      data: formData,
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        if (result == "done") {
          $("#Resend_To_Office_Modal").modal("hide");
          $("#resen_to_office_by").val("");
          datatable_ajax_reload();
        } else {
          alert('تعذر اعاده الجهاز للمكتب الاصلى');
        }
      },
    });
  }
});
