$("#EditModalPC .btn-success").click(function () {
  var formData = {
    pc_sn: $("#edit_dvice_sn").val(),
    pc_ip: $("#dvice_ip").val(),
    pc_domian_name: $("#pc_domian_name").val(),
    dvice_num: divce_num,
    _token: $("#_token").val(),
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxEditDvice",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        datatable_ajax_reload();
        $("#EditModalPC").modal("hide");
      } else {
        alert("لم يتم التعديل");
      }
    },
  });
});
