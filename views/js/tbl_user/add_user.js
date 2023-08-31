$("#Add_USER_Modal .btn-success").click(function () {
  var formData = {
    user_id: $("#user_id").val(),
    user_name: $("#user_name").val(),
    job: $("#job").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "/it4/ajaxAddUser",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        load_users_tables();
      } else {
        alert("تعذر اضافه المستخدم ");
      }
    },
  });
});
