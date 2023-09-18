$("#users_table tbody").on("click", ".btn-info", function () {
  var tr = $(this).closest("tr");
  var row = users_table.row(tr);
  formdata = { id: row.data().id, _token: $("#_token").val(), };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxResetUserPassword",
    data: formdata,
    beforeSend: function () {
      $("#user_reset_password_" + formdata.id).text("انتظر");
    },
    success: function (result) {
      alert(`تم استعاده كلمه المرور للمستخدم : ${row.data().first_name}`);
      $("#user_reset_password_" + formdata.id).text("استعاده كلمه المرور");
    },
  });
});
