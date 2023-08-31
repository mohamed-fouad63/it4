$("#users_table tbody").on("click", ".btn-warning", function () {
  var tr = $(this).closest("tr");
  var prev_tr = tr.prev();
  var row = users_table.row(prev_tr);
  formdata = { id: tr.attr("id") };
  $("#" + tr.attr("id") + " input:checkbox").each(function () {
    if (this.checked) {
      formdata[$(this).val()] = "1";
    } else {
      formdata[$(this).val()] = "0";
    }
  });

  $.ajax({
    type: "POST",
    url: "/it4/ajaxEditUserAuth",
    data: formdata,
    beforeSend: function () {
      $("#user_update_" + formdata.id).text("انتظر");
    },
    success: function (result) {
      $("#user_update_" + formdata.id).text("تحديث");
      alert(`تم تحديث الصلاحيات للمستخدم : ${row.data().first_name}`);
      console.log(result);
    },
  });
});
