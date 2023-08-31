var v200t_users_report = $("#v200t_users_report").DataTable({
  bProcessing: true,
  ajax: {
    url: "../api/services_users/v200t/v200t_users_report.php",
    method: "post",
    data: function (d) {
      d.auth = "";
    },
    dataSrc: "",
  },
  // deferRender: true,
  columnDefs: [
    { width: "", targets: 0 },
    { width: "", targets: 1 },
    { width: "", targets: 2 },
    { width: "", targets: 3 },
    { width: "", targets: 4 },
    { width: "", targets: 5 },
    { width: "", targets: 6 },
  ],
  columns: [
    { data: "office_name" },
    { data: "money_code" },
    { data: "pos_terminal" },
    { data: "sn" },
    { data: "auth" },
    { data: "id" },
    {
      data: "stuff_action",
      render: function (data, type, row) {
        if (data == "adding") {
          return "اضافه";
        } else if (data == "removing") {
          return "الغاء";
        } else if (data == "resetting") {
          return "استعاده كلمه المرور";
        } else {
          return "";
        }
      },
    },
    {
      data: "",
      render: function (data, type, row) {
        return `
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn btn-success me-2" title="تم التنفيذ">
          <i class="bi bi-check-lg"></i>
          </button>
          <button type="button" class="btn btn-danger" title="الغاء التنفيذ">
            <i class="bi bi-x-lg"></i>
          </button>
          </div>`;
      },
    },
  ],
  // dom: "Bfrt",
  dom: "Brt",
  buttons: [
    {
      extend: "excelHtml5",
      text: '<i class="btn btn-success  bi bi-file-earmark-x" title="تصدير الى اكسل"></i>',
    },
  ],
  paging: false,
  destroy: true,
  language: {
    zeroRecords: "لا توجد طلبات لتغيير صلاحيات مستخدمين نقاط البيع V200T",
    infoEmpty: "0 / ",
    infoFiltered: "_MAX_",
  },
  initComplete: function () {
    this.api()
      .columns(0)
      .every(function () {
        var column = this;
        var select = $(
          '<select class="form-select"><option option value = "" > كل المكاتب</option ></select > '
        ).appendTo("thead tr#v200t_filterboxrow th:nth-of-type(1)");
        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            $("thead tr#v200t_filterboxrow th:nth-of-type(1) select").append(
              '<option value="' + d + '">' + d + "</option>"
            );
          });
        $("thead tr#v200t_filterboxrow th:nth-of-type(1) select").on(
          "change",
          function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());
            column.search(val ? "^" + val + "$" : "", true, false).draw();
          }
        );
        $("tr#v200t_filterboxrow th:not(:first-of-type ,:last-of-type)").each(
          function () {
            $(this).html(
              '<input type="search" class="form-control" id="input' +
                $(this).index() +
                '" placeholder="بحث بـ ' +
                $(this).text() +
                '"/>'
            );
            $(this).on("keyup change", function () {
              var val = $("#input" + $(this).index()).val();
              v200t_users_report.column($(this).index()).search(val).draw();
            });
          }
        );
      });
    // var val = [];
    // val.push("الخشه");
    // val.push("الربعمايه");
    // var mergedVal = val.join("|");
    // v200t_users_report.columns(0).search(mergedVal, true).draw();
    // const val = ["الخشه", "الربعمايه"];
    // v200t_users_report.columns(0).search(val.join("|"), true).draw();
  },
});
$("#v200t_users_report tbody").on("click", ".btn-success", function () {
  var data = v200t_users_report.row($(this).parents("tr")).data();
  console.log(data);
  $.ajax({
    url: "../api/services_users/v200t/v200t_report_do_action.php",
    method: "post",
    data: {
      action_date: data.action_date,
      auth: data.auth,
      id: data.id,
      money_code: data.money_code,
      num: data.num,
      office_name: data.office_name,
      pos_action: data.pos_action,
      pos_terminal: data.pos_terminal,
      sn: data.sn,
      stuff_action: data.stuff_action,
      stuff_name: data.stuff_name,
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        v200t_users_report.ajax.reload();
        v200t.ajax.reload();
        v200t_users_office.ajax.reload();
      }
    },
  });
});
$("#v200t_users_report tbody").on("click", ".btn-danger", function () {
  var data2 = v200t_users_report.row($(this).parents("tr")).data();
  console.log(data2);
  $.ajax({
    url: "../api/services_users/v200t/v200t_report_undo_action.php",
    method: "post",
    data: {
      action_date: data2.action_date,
      auth: data2.auth,
      id: data2.id,
      money_code: data2.money_code,
      num: data2.num,
      office_name: data2.office_name,
      pos_action: data2.pos_action,
      pos_terminal: data2.pos_terminal,
      sn: data2.sn,
      stuff_action: data2.stuff_action,
      stuff_name: data2.stuff_name,
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        v200t_users_report.ajax.reload();
        v200t.ajax.reload();
        v200t_users_office.ajax.reload();
      }
    },
  });
});
