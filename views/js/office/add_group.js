$("#Post_Group .btn-primary").click(function () {
  addgroupname = $("#post_group_input").val();
  $.ajax({
    type: "POST",
    url: "/it4/ajaxAddofficeGroup",
    data: { addgroupname: addgroupname },
    success: function (result) {
      if (result == "done") {
        $("#Post_Group").modal("hide");
        $("#post_group").html("");
        load_post_group_tables();
      } else {
        $("#post_group_error").text("موجود بالفعل");
      }
    },
  });
});
