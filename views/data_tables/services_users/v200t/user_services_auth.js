var v200t = $("#v200t").DataTable({
  ajax: {
    url: "../api/services_users/v200t/v200t_users.php",
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
  rowCallback: function (row, data) {},
  fnDrawCallback: function () {
    office_name = $("#v200t tbody tr:last")
      .find("td:eq(0)")
      .find(":selected")
      .text();

    get_select_office();
    get_v200t_terminal(office_name);
    change_select_office();
    change_v200t_terminal();
  },
  initComplete: function (settings, json) {
    // get_row_data();
  },
});
/* end data table other  */
// $("#add_v200t_row").on("click", function () {
//   v200t.row
//     .add({
//       office_name: v200t.row().data().office_name,
//       money_code: v200t.row().data().money_code,
//       pos_terminal: `
//       <select>
//         <option>311</option>
//         <option>312</option>
//         <option>313</option>
//       </select>`,
//       sn: "2011/04/25",
//       names: "Edinburgh",
//       auth: `
//       <select>
//         <option>مدير</option>
//         <option>موظف</option>
//         <option>مدير + موظف</option>
//       </select>`,
//       id: v200t.row().data().id,
//       action: "",
//       "": "",
//     })
//     .draw();
// });
function get_select_office() {
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
    $("#v200t .select_office").html(options_select_office_name_to);
  });
}

function get_v200t_terminal(office_name) {
  options_select_it_name = "<option value=''></option>";
  $.post(
    "../api/dvice/v200t_terminal.php",
    { office_name: office_name },
    function (data) {
      $.each(data, function (key, val) {
        options_select_it_name +=
          "<option data-v200t_type='"+val.dvice_name+"' value='" + val.sn + "'>" + val.pos_terminal + "</option>";
      });
      // $(".select_v200t_terminal").html(v200t.cell(0, 2).data(options_select_it_name));
      $(".select_v200t_terminal").html(options_select_it_name);
    },
    "json"
  );
}
function change_select_office() {
  $("#v200t tbody tr td").on("change", ".select_office", function () {
    $(".select_v200t_terminal").html("");
    var tr = $(this).closest("tr");
    var office_name = this.options[this.selectedIndex].text;
    var money_code = this.value;
    if (money_code != "") {
      // v200t.cell(0, 3).data("");
      // v200t.cell(0, 1).data(money_code);
      tr.find("td:eq(1)").text(money_code);
      tr.find("td:eq(3)").text("");
      get_v200t_terminal(office_name);
    } else {
      // v200t.cell(0, 1).data("");
      // v200t.cell(0, 3).data("");
      tr.find("td:eq(1)").text("");
      tr.find("td:eq(3)").text("");
      $(".select_v200t_terminal").html("");
    }
  });
}
function change_v200t_terminal() {
  $("#v200t tbody tr td").on("change", ".select_v200t_terminal", function () {
    v200t_type = $(this).find(':selected').data('v200t_type');
    if(v200t_type == 'VERIFONE V200T PURCHASES'){
      $(this).addClass('purchases_pos')
    } else {
      $(this).removeClass('purchases_pos')
    }
    var tr1 = $(this).closest("tr");
    var v200t_terminal = this.value;
    tr1.find("td:eq(3)").text(v200t_terminal);
  });
}

// function get_row_data() {
$("#v200t tbody").on("click", ".btn-success", function () {
  var tr = $(this).closest("tr");
  formData = {
    office_name: tr.find("td:eq(0)").find(":selected").text(),
    money_code: tr.find("td:eq(1)").text(),
    v200t_terminal: tr.find("td:eq(2)").find(":selected").text(),
    dvice_name: tr.find("td:eq(2)").find(":selected").data('v200t_type'),
    sn: tr.find("td:eq(3)").text(),
    stuff_name: tr.find("td:eq(4)").text(),
    stuff_auth: tr.find("td:eq(5)").find(":selected").text(),
    stuff_id: tr.find("td:eq(6)").text(),
    stuff_auth_action: tr.find("td:eq(7)").find(":selected").val(),
  };
  if (
    formData.office_name != "" &&
    formData.money_code != "" &&
    formData.v200t_terminal != "" &&
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
      url: "../api/services_users/v200t/v200t_users_action.php",
      data: formData,
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        if (result == "done") {
          v200t.ajax.reload();
          v200t_users_report.ajax.reload();
          v200t_users_office.ajax.reload();
        } else {
          alert(result);
        }
      },
    });
  } else {
    alert("يوجد مدخلات فارغه");
  }
});
// }
// }
