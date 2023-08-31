$("#Add_Notice_Modal .btn-success").click(function () {
  var formData = {
    notice_from_add: $("#notice_from_add").val(),
    notice_noti_add: $("#notice_noti_add").val(),
    notice_type_add: $("#notice_type_add").val(),
    notice_date_add: $("#notice_date_add").val(),
    notice_description_add: $("#notice_description_add").val(),
    notice_procedure_add: $("#notice_procedure_add").val(),
  };
  if (
    formData.notice_from_add != "" &&
    formData.notice_noti_add != "" &&
    formData.notice_type_add != ""
  ) {
    $.ajax({
      type: "POST",
      url: "../api/notice/add_notice.php",
      data: formData,
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        if (result == "done") {
          $("#czc").val("");
          $("#hand").val("");
          $("#name_reg_in").val("");
          $("#sub_reg_in").val("");
          $("#czc").focus();
          table.ajax.reload();
        } else {
          alert("تعذر اضافه البلاغ");
        }
      },
    });
  } else {
    alert("لم يتم ادخال البلاغ . وجود خانه / خانات فارغه");
  }
});
