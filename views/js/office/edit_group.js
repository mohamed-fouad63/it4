$("#Edit_Post_Group .btn-success").click(function () {
  editgroupname = $("#edit_post_group_input").val();
  $.ajax({
    type: "POST",
    url: "/it4/ajaxEditofficeGroup",
    data: { editgroupname: editgroupname,groupname:groupname },
    success: function (result) {
      if (result == "done") {
        // $("#Edit_Post_Group").modal("hide");
        // $("#Edit_Post_Group").html("");
        location.reload(true);
      } else {
        $("#edit_post_group_error").text("موجود بالفعل");
      }
    },
  });
});
