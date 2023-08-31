/* start data table other  */

// function get_users_v200t_table() {

var v200t_users_office = $("#v200t_users_office").DataTable({
  ajax: {
    url: "../api/services_users/v200t/v200t_users_office.php",
    method: "post",
    data: {
      input_office_search: function () {
        var input_office_search = $("#input_office_search").val();
        return input_office_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "money_code" },
    { data: "sn" },
    { data: "pos_terminal" },
    { data: "stuff_name" },
    { data: "id" },
    { data: "auth" },
    {
      data: "stuff_action",
      render: function (data, type, row) {
        if (data == "adding") {
          return '<div class="p-1 bg-primary text-white">جارى الاضافه</div>';
        }
        if (data == "removing") {
          return '<div class="p-1 bg-danger text-white">جارى الحذف</div>';
        }
        if (data == "resetting") {
          return '<div class="p-1 bg-warning text-white">جارى الاستعاده</div>';
        }
        if (data == "") {
          return "";
        }
      },
    },
    // { data: "pos_action" },
    { data: "action_date" },
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
  fnDrawCallback: function () { },
  initComplete: function (settings, json) { },
  columnDefs: [{ visible: false, targets: '6' }],
  order: [['6', "asc"]],
  displayLength: 25,
  drawCallback: function (settings) {
    var api = this.api();
    var rows = api.rows({ page: "current" }).nodes();
    var last = null;

    api
      .column('6', { page: "current" })
      .data()
      .each(function (group, i) {
        if (last !== group) {
          $(rows)
            .eq(i)
            .before(
              '<tr class="group"><td colspan="10">' + group + "</td></tr>"
            );

          last = group;
        }
      });
  },
});
