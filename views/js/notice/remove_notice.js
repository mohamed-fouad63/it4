$("#Delete_Notice_Modal .btn-danger").click(function () {
  var formData = {
    notice_id: notice_id,
  };
  $.ajax({
    type: "POST",
    url: "../api/notice/remove_notice.php",
    data: formData,
    beforeSend: function () {
      $("#Delete_Notice_Modal .btn-success").html("جارى  حذف البلاغ");
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        table.ajax.reload();
        $("#Delete_Notice_Modal").modal("hide");
      } else {
        alert("لم يتم حذف البلاغ");
      }
    },
    complete: function () {
      $("#Delete_Notice_Modal .btn-success").html("حذف");
    },
  });
});
