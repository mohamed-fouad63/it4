$("#Pos_Deliver_Report_Modal .btn-success").click(function () {
  var formData = {
    selectedData: selectedData,
    pos_deliver: $("#pos_deliver").val(),
    pos_deliver_date: $("#pos_deliver_date").val(),
  };
  if (selectedData.length > 0) {
    $.ajax({
      type: "POST",
      url: "/it4/ajaxposDeliver",
      data: formData,
      beforeSend: function () {
        $("#Pos_Deliver_Report_Modal .btn-success").html(
          "جارى معالجه البيانات"
        );
      },
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        $("#Pos_Deliver_Report_Modal").modal("hide");
        datatable_ajax_reload();
        reg_sub_del();
      },
      complete: function () {
        $("#Pos_Deliver_Report_Modal .btn-success").html("تسليم");
      },
    });
  } else {
    alert("قم بتحديد ماكينات V200T المراد تسلمها للمندوب");
  }
});
