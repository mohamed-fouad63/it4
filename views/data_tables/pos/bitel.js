/* start data table other  */

// function get_users_bitel_table() {

var bitel = $("#bitel").DataTable({
  ajax: {
    url: "../api/dvice/bitel.php",
    method: "post",
    data: function (d) {
      d.auth = "";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "money_code" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "pos_terminal" },
    { data: "pos_merchant" },
    { data: "stuff_pos" },
    {
      data: "",
      render: function (data, type, row) {
        return `
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn btn-success me-2" title="اضافه الماموريه" data-bs-toggle="modal" data-bs-target="#Edit_Pos_Modal">
          <i class="bi bi-pencil-square"></i>
          </button>`;
      },
    },
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
  rowCallback: function (row, data) {
    if (data.money_code == '0') {
      $('td:eq(1)', row).addClass('text-danger');
    }
    if (data.pos_terminal == '0') {
      $('td:eq(4)', row).addClass('text-danger');
    }
    if (data.pos_merchant == '0') {
      $('td:eq(5)', row).addClass('text-danger');
    }
    if (data.pos_terminal.length != data.money_code.length + 3) {
      $('td:eq(4)', row).css('color', 'green');
    }
    if (data.pos_merchant.length != data.money_code.length + 2) {
      $('td:eq(5)', row).css('color', 'green');
    }
    if (data.pos_terminal.slice(0, data.money_code.length) != data.money_code) {
      $('td:eq(4)', row).addClass('text-primary');
    }
    if (data.pos_merchant.slice(0, data.money_code.length) != data.money_code) {
      $('td:eq(5)', row).addClass('text-primary');
    }
    if (data.stuff_pos == 0) {
      $('td:eq(6)', row).addClass('text-danger');
    }
  },
  fnDrawCallback: function () { },
  initComplete: function () {
    $("#bitel tbody").on("click", ".btn-success", function () {
      var data_bitel = bitel.row($(this).parents("tr")).data();
      $("#office_name").val(data_bitel.office_name);
      $("#money_code").val(data_bitel.money_code);
      $("#money_code").data("money_code", data_bitel.money_code);
      $("#pos_sn").val(data_bitel.sn);
      $("#pos_sn").data("pos_sn", data_bitel.sn);
      $("#pos_terminal").val(data_bitel.pos_terminal);
      $("#pos_merchant").val(data_bitel.pos_merchant);
      $("#stuff_pos").val(data_bitel.stuff_pos);
      // return (dvice_num = data_pc.count_in_it);
    });
    this.api()
      .column()
      .every(function () {
        var column = this;
        var select = $(
          '<select class="form-select"><option value=""></option></select>'
        ).appendTo("thead tr#filterboxrow th:nth-of-type(1)");
        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            $("thead tr#filterboxrow th:nth-of-type(1) select").append(
              '<option value="' + d + '">' + d + "</option>"
            );
          });
        $("thead tr#filterboxrow th:nth-of-type(1) select").on(
          "change",
          function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? "^" + val + "$" : "", true, false).draw();
          }
        );
        $("tr#filterboxrow th:not(:first-of-type ,:last-of-type)").each(
          function () {
            $(this).html(
              '<input type="search" id="input' +
              $(this).index() +
              '" placeholder="بحث بـ ' +
              $(this).text() +
              '"/>'
            );
            $(this).on("keyup change", function () {
              var val = $("#input" + $(this).index()).val();
              bitel.column($(this).index()).search(val).draw();
            });
          }
        );
      });

    $(".filte_div")
      .append($(".dataTables_filter input"))
      .children()
      .addClass("form-control")
      .attr("placeholder", "بحث عام");
    $("thead tr#filterboxrow").css("display", "table-row");
    $("thead tr#filterboxrow th input").addClass("form-control");
    $("table").removeClass("dataTable");
    $("table tbody").addClass("table-success");
  },
});
