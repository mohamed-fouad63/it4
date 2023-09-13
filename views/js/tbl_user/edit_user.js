$("#Edit_USER_Modal .btn-success").click(function () {
  var formData = {
    edit_user_id: $("#edit_user_id").val(),
    edit_user_name: $("#edit_user_name").val(),
    edit_user_job: $("#edit_user_job").val(),
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxEditUser",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        load_users_tables();
      } else {
        alert("تعذر تعديل بيانات المستخدم ");
      }
    },
  });
});
