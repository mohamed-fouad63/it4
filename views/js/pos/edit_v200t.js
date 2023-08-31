$("#Edit_Pos_Modal .btn-success").click(function () {
  var formData = {
    sn: $("#pos_sn").data("pos_sn"),
    money_code: $("#money_code").data("money_code"),
    pos_terminal: $("#pos_terminal").val(),
    pos_merchant: $("#pos_merchant").val(),
    stuff_pos: +$("#stuff_pos").val(),
  };
  if (formData.money_code != "0") {
    if (formData.stuff_pos < 6) {
      if (formData.pos_terminal.length == formData.money_code.length + 3) {
        if (formData.pos_merchant.length == formData.money_code.length + 2) {
          if (
            formData.pos_terminal.slice(0, formData.money_code.length) ==
            formData.money_code &&
            formData.pos_merchant.slice(0, formData.money_code.length) ==
            formData.money_code) {
            $.ajax({
              type: "POST",
              url: "../api/pos/edit_v200t.php",
              data: formData,
              success: function (result) {
                result = result.replace(/^\s+|\s+$/gm, "");
                if (result == "done") {
                  $("#Edit_Pos_Modal").modal("hide");
                  v200t.ajax.reload();
                } else {
                  alert(result);
                }
              },
            });
          } else {
            alert("رقم الماكينه غير متوافق مع الكود المالى");
          }
        } else {
          alert("رقم merchant للماكينه غير صحيح");
        }
      } else {
        alert("رقم الماكينه غير صحيح");
      }
    } else {
      alert("الحد الاقصى لعدد الموظفين هو 5 موظفين");
    }
  } else {
    alert("الكود المالى فارغ");
  }
});
