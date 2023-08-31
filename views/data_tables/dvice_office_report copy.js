var table = $("#dvice_office_report").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it2/api/dvice/dvice_office_report.php",
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
    { data: "office_type" },
    { data: "pc" },
    { data: "monitor" },
    { data: "printer" },
    { data: "posfinance" },
    { data: "V200T" },
    { data: "BITEL" },
    { data: "postalscanner" },
    { data: "postalprinter" },
    { data: "postalmonitor" },
    { data: "postalscale" },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "fBrt",
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
    emptyTable: "لا يوجد اجهزه مدرجه",
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
