$("#Replace_Pices_Modal3 .btn-success").click(function () {
  replace_Pices = {};
  $(".replace_Pices .card input[type=radio]:checked").each(function (i, o) {
    replace_Pices[$(this).attr("value")] = $(this).attr("value");
  });
  var formData = {
    office_name: office_name_from,
    dvice_name: $("#dvice_name3").val(),
    dvice_sn: $("#dvice_sn3").val(),
    date_replace_Pices: $("#date_replace_Pices3").val(),
    replace_Pices: replace_Pices,
    dvice_num: dvice_num,
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxReplacePicesDvice",
    data: formData,
    beforeSend: function () {
      $("#Replace_Pices_Modal3 .btn-success").html("جارى معالجه البيانات");
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      $("#Replace_Pices_Modal3").modal("hide");
      $('input[type="radio"]').prop("checked", false);
    },
    complete: function () {
      $("#Replace_Pices_Modal3 .btn-success").html("استبدال");
    },
  });
});
