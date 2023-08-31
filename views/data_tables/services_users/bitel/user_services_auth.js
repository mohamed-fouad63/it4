var bitel = $("#bitel").DataTable({
  ajax: {
    url: "../api/services_users/bitel/bitel_users.php",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_user_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "money_code" },
    { data: "pos_terminal" },
    { data: "sn" },
    { data: "names" },
    { data: "auth" },
    { data: "id" },
    { data: "action" },
    { data: "do_action" },
  ],
  dom: "rt",
  paging: false,
  destroy: true,
  autoWidth: false,
  language: {
    zeroRecords: "",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  fnDrawCallback: function () {
    office_name = $("#bitel tbody tr:last")
      .find("td:eq(0)")
      .find(":selected")
      .text();

    get_select_office2();
    get_bitel_terminal(office_name);
    change_select_office2();
    change_bitel_terminal();
  },
  initComplete: function (settings, json) {
    // get_row_data();
  },
});

function get_select_office2() {
  var options_select_office_name_to = "<option value=''></option>";
  $.getJSON("../api/office/selesct_office_name2.php", function (data1) {
    $.each(data1, function (key, val) {
      options_select_office_name_to +=
        "<option value='" +
        val.money_code +
        "'>" +
        val.office_name +
        "</option>";
    });
    $("#bitel .select_office").html(options_select_office_name_to);
  });
}

function get_bitel_terminal(office_name) {
  options_select_it_name2 = "<option value=''></option>";
  $.post(
    "../api/dvice/bitel_terminal.php",
    { office_name: office_name },
    function (data) {
      $.each(data, function (key, val) {
        options_select_it_name2 +=
          "<option data-bitel_type='" + val.dvice_name + "' value='" + val.sn + "'>" + val.pos_terminal + "</option>";
      });
      $(".select_bitel_terminal").html(options_select_it_name2);
    },
    "json"
  );
}
function change_select_office2() {
  $("#bitel tbody tr td").on("change", ".select_office", function () {
    $(".select_bitel_terminal").html("");
    var tr = $(this).closest("tr");
    var office_name = this.options[this.selectedIndex].text;
    var money_code = this.value;
    if (money_code != "") {

      tr.find("td:eq(1)").text(money_code);
      tr.find("td:eq(3)").text("");
      console.log(office_name);
      get_bitel_terminal(office_name);
    } else {

      tr.find("td:eq(1)").text("");
      tr.find("td:eq(3)").text("");
      $(".select_bitel_terminal").html("");
    }
  });
}
function change_bitel_terminal() {
  $("#bitel tbody tr td").on("change", ".select_bitel_terminal", function () {
    bitel_type = $(this).find(':selected').data('bitel_type');
    if (bitel_type == 'BITEL IC3600 PURCHASES') {
      $(this).addClass('purchases_pos')
    } else {
      $(this).removeClass('purchases_pos')
    }
    var tr1 = $(this).closest("tr");
    var bitel_terminal = this.value;
    tr1.find("td:eq(3)").text(bitel_terminal);
  });
}


$("#bitel tbody").on("click", ".btn-success", function () {
  var tr = $(this).closest("tr");
  formData = {
    office_name: tr.find("td:eq(0)").find(":selected").text(),
    money_code: tr.find("td:eq(1)").text(),
    bitel_terminal: tr.find("td:eq(2)").find(":selected").text(),
    dvice_name: tr.find("td:eq(2)").find(":selected").data('bitel_type'),
    sn: tr.find("td:eq(3)").text(),
    stuff_name: tr.find("td:eq(4)").text(),
    stuff_auth: tr.find("td:eq(5)").find(":selected").text(),
    stuff_id: tr.find("td:eq(6)").text(),
    stuff_auth_action: tr.find("td:eq(7)").find(":selected").val(),
  };
  if (
    formData.office_name != "" &&
    formData.money_code != "" &&
    formData.bitel_terminal != "" &&
    formData.dvice_name != "" &&
    formData.sn != "" &&
    formData.stuff_name != "" &&
    formData.stuff_auth != "" &&
    formData.stuff_id != "" &&
    formData.stuff_auth_action != ""
  ) {
    console.log(formData);
    $.ajax({
      type: "POST",
      url: "../api/services_users/bitel/bitel_users_action.php",
      data: formData,
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        if (result == "done") {
          bitel.ajax.reload();
          bitel_users_report.ajax.reload();
          bitel_users_office.ajax.reload();
        } else {
          alert(result);
        }
      },
    });
  } else {
    alert("يوجد مدخلات فارغه");
  }
});
