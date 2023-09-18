function del_group_name(e) {
  var delgroupname = $(e).data("delgroupname");
  delkey = $(e).data("key");
  // $("#Del_Office_Group").modal("hide");
  $.ajax({
    type: "POST",
    url: "/it4/ajaxDelofficeGroup",
    data: { delgroupname: delgroupname,    _token: $("#_token").val(), },
    success: function (result) {
      $("#Del_Office_Group").modal("hide");
      $("#" + delkey + "fieldset").remove();
      location.reload(true);
    },
  });
}
