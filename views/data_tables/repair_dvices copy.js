var table = $("#repair_dvices").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it2/api/dvice/repair.php",
    method: "post",
    data: function (d) {
      d.auth = "";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "date_in_it" },
    { data: "parcel_in_it" },
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "parcel_out_it" },
    { data: "data_out_it" },
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
  initComplete: function () {
    this.api()
      .columns(0)
      .every(function () {
        var column = this;
        $('<input type="date">').appendTo(
          "thead tr#filterboxrow th:nth-of-type(1), tr#filterboxrow th:nth-of-type(9)"
        );
        $(
          "thead tr#filterboxrow th:nth-of-type(1) input, tr#filterboxrow th:nth-of-type(9) input"
        ).on("change", function () {
          var val = $.fn.dataTable.util.escapeRegex($(this).val());
          column.search(val ? "^" + val + "$" : "", true, false).draw();
        });
        $("tr#filterboxrow th:not(:first-of-type ,:nth-of-type(9))").each(
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
              table.column($(this).index()).search(val).draw();
            });
          }
        );
      });

    // $("thead tr#filterboxrow th:nth-of-type(1)").html(
    //   '<input type="date" id="input' +
    //     $(this).index() +
    //     '" placeholder="بحث بـ ' +
    //     $(this).text() +
    //     '"/>'
    // );
    // $("thead tr#filterboxrow th:not(:first-of-type)").each(function () {
    //   $(this).html(
    //     '<input type="search" id="input' +
    //       $(this).index() +
    //       '" placeholder="بحث بـ ' +
    //       $(this).text() +
    //       '"/>'
    //   );
    //   $(this).on("keyup change", function () {
    //     var val = $("#input" + $(this).index()).val();
    //     table.column($(this).index()).search(val).draw();
    //   });
    // });
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
