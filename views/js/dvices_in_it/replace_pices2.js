$("#Replace_Pices_Modal2 .btn-success").click(function () {
  replace_Pices = {};
  $(".replace_Pices .card input[type=radio]:checked").each(function (i, o) {
    replace_Pices[$(this).attr("value")] = $(this).attr("value");
  });
  var formData = {
    office_name: office_name_from,
    dvice_name: $("#dvice_name2").val(),
    dvice_sn: $("#dvice_sn2").val(),
    date_replace_Pices: $("#date_replace_Pices2").val(),
    replace_Pices: replace_Pices,
    dvice_num: dvice_num,
    _token: $("#_token").val(),
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxReplacePicesDvice",
    data: formData,
    beforeSend: function () {
      $("#Replace_Pices_Modal2 .btn-success").html("جارى معالجه البيانات");
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      $("#Replace_Pices_Modal2").modal("hide");
      $('input[type="radio"]').prop("checked", false);
    },
    complete: function () {
      $("#Replace_Pices_Modal2 .btn-success").html("استبدال");
    },
  });
});
