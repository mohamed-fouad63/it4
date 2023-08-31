var table = $("#dvice_office_report").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it4/ajaxOfficesDvicesReport",
    method: "post",
    data: function (d) {
      d.auth = "";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "office_type" },
    { data: "money_code" },
    { data: "pc" },
    { data: "pc_init" },
    { data: "monitor" },
    { data: "printer_laser" },
    { data: "printer_scann" },
    { data: "posfinance" },
    { data: "vx510" },
    { data: "V200T" },
    { data: "BITEL" },
    { data: "postalscanner" },
    { data: "postalprinter" },
    { data: "postalmonitor" },
    { data: "postalscale" },
  ],
  // select: {style: 'multi'},
  autoWidth: false,
  paging: false,
  dom: "Brtf",
  buttons: [
    {
      extend: "excel",
      text: '<i class="btn btn-success  bi bi-file-earmark-x" title="تصدير الى اكسل"></i>',
    },
  ],
  language: {
    zeroRecords: "",
    infoEmpty: "0 / ",
    info: "_TOTAL_ / ",
    emptyTable: " ",
  },
  initComplete: function () {
    $(".bt_div").append($(".dt-buttons button")).children().addClass("btn");
    $(".filte_div")
      .append($(".dataTables_filter input"))
      .children()
      .addClass("form-control")
      .attr("placeholder", "بحث عام");
  },
});
