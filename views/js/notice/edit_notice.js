$("#Edit_Notice_Modal .btn-success").click(function () {
  var formData = {
    notice_from_edit: $("#notice_from_edit").val(),
    notice_noti_edit: $("#notice_noti_edit").val(),
    notice_type_edit: $("#notice_type_edit").val(),
    notice_date_edit: $("#notice_date_edit").val(),
    notice_description_edit: $("#notice_description_edit").val(),
    notice_procedure_edit: $("#notice_procedure_edit").val(),
    notice_id: notice_id,
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/notice/edit_notice.php",
    data: formData,
    beforeSend: function () {
      $("#Edit_Notice_Modal .btn-success").html("جارى معالجه البيانات");
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        table.ajax.reload();
        $("#Edit_Notice_Modal").modal("hide");
      } else {
        alert("لم يتم تعديل البلاغ . وجود خانه / خانات فارغه");
      }
    },
    complete: function () {
      $("#Edit_Notice_Modal .btn-success").html("تعديل");
    },
  });
});
