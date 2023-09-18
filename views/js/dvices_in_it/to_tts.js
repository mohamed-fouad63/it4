$("#To_Tts_Modal .btn-success").click(function () {
  var formData = {
    date_auth_repair: $("#date_auth_repair").val(),
    auth_repair: $("#auth_repair").val(),
    dvice_num: dvice_num,
    _token: $("#_token").val(),
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxToTts", 
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#To_Tts_Modal").modal("hide");
        $("#auth_repair").val("");
        datatable_ajax_reload();
      } else {
        alert("تعذر تسليم الجهاز ");
      }
    },
  });
});
