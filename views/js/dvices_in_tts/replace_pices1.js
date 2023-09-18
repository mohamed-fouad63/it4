$("#Replace_Pices_Modal .btn-success").click(function () {
  replace_Pices = {};
  $(".replace_Pices .card input[type=radio]:checked").each(function (i, o) {
    replace_Pices[$(this).data("pices_id")] = $(this).attr("value");
  });
  var formData = {
    office_name: office_name_from,
    dvice_name: $("#dvice_name").val(),
    dvice_sn: $("#dvice_sn").val(),
    date_replace_Pices: $("#date_replace_Pices").val(),
    replace_Pices: replace_Pices,
    dvice_num: dvice_num,
    _token: $("#_token").val(),
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxReplacePicesDvice",
    data: formData,
    beforeSend: function () {
      $("#Replace_Pices_Modal .btn-success").html("جارى معالجه البيانات");
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      $("#Replace_Pices_Modal").modal("hide");
      $('input[type="radio"]').prop("checked", false);
      // alert(result)
    },
    complete: function () {
      $("#Replace_Pices_Modal .btn-success").html("استبدال");
    },
  });
});
