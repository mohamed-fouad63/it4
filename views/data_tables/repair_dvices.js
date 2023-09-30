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
          case "in_it":
            return "بقسم الدعم الفنى";
            break;
          case "deleted":
            return "تم استنزالها";
            break;
          default:
            return "";
        }
      },
    },
    {
      data: "parcel_out_it",
      render: function (data, type, row) {
        switch (row.status) {
          case "in_office":
            return row.parcel_out_it;
            break;
          case "in_tts":
            return row.auth_repair;
            break;
          case "deleted":
            return row.deleted_parcel;
            break;
          default:
            return "";
        }
      },
    },
    {
      data: "data_out_it",
      render: function (data, type, row) {
        switch (row.status) {
          case "in_office":
            return row.data_out_it;
            break;
          case "in_tts":
            return row.date_auth_repair;
            break;
          case "deleted":
            return row.data_deleted;
            break;
          default:
            return "";
        }
      },
    },
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
    $("thead tr#filterboxrow th").each(function () {
      $(this).html(`
            <input type="search" id="input${$(
              this
            ).index()}" placeholder="بحث بـ ${$(this).text()}"/>
            `);
      $(this).on("keyup change", function () {
        var val = $("#input" + $(this).index()).val();
        table.column($(this).index()).search(val).draw();
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
