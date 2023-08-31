var table = $("#repair_dvices").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it4/ajaxRepairDvices",
    method: "post",
    data: function (d) {
      d.auth = "";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "date_in_it" },
    { data: "parcel_in_it" },
    { data: "damage" },
    { data: "in_it_note" },

    {
      data: "status",
      render: function (data, type, row) {
        switch (data) {
          case "in_office":
            return "بالمكتب";
            break;
          case "in_tts":
            return "بقطاع الدعم الفنى";
            break;
          default:
            return "بقسم الدعم الفنى";
            break;
        }
      },
    },
    { data: "parcel_out_it" },
    { data: "data_out_it" },
  ],
  order: [[0, "desc"]],
  paging: false,
  dom: "Bfrti",
  buttons: [
    {
      extend: "excel",
      text: '<i class="btn btn-success  bi bi-file-earmark-x" title="تصدير الى اكسل"></i>',
    },
    {
      extend: "copy",
      text: '<i class="btn btn-primary bi bi-clipboard-check" title="نسخ"></i>',
    },
    {
      extend: "print",
      text: '<i class="btn btn-warning bi bi-printer" title="طباعه"></i>',
    },
  ],
  autoFill: false,
  language: {
    zeroRecords: "",
    infoEmpty: "0 / ",
    info: "_TOTAL_ / ",
    emptyTable: "لا يوجد اجهزه مدرجه",
  },
  initComplete: function () {
    this.api()
      .columns(0)
      .every(function () {
        var column = this;
        $("thead tr#filterboxrow th").each(function () {
          $(this).html(
            '<input type="search" id="input" placeholder="بحث بـ ' +
            $(this).text() +
            '"/>'
          );
          $(this).on("keyup change", function () {
            var val = $("#input" + $(this).index()).val();
            table.column($(this).index()).search(val).draw();
          });
        });
      });
    $(".filte_div")
      .append($(".dataTables_filter input"))
      .children()
      .addClass("form-control")
      .attr("placeholder", "بحث عام");
    $(".bt_div").append($(".dt-buttons button")).children().addClass("btn");
    $(".info_div")
      .append($(".dataTables_info"))
      .children()
      .addClass("form-control");
    $("thead tr#filterboxrow").css("display", "table-row");
    $("thead tr#filterboxrow th input").addClass("form-control");
    $("table").removeClass("dataTable");
    $("table tbody").addClass("table-success");
  },
});
