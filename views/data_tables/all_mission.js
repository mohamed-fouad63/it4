$("#select_year").on("change", function () {
  select_year = $("#select_year").val();
  $("#example").DataTable().ajax.reload();
});
select_year = $("#select_year").val();
var table = $("#example").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it4/ajaxAllMission",
    method: "post",
    data: function (d) {
      d.year = select_year;
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "it_name" },
    { data: "misin_day" },
    { data: "misin_date" },
    { data: "office_name" },
    { data: "misin_type" },
    { data: "start_time" },
    { data: "end_time" },
    { data: "does" },
  ],
  dom: "Bfrt",
  paging: false,
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
  language: {
    zeroRecords: "لا توجد نتائج للبحث",
    infoEmpty: "0 / ",
    infoFiltered: "_MAX_",
  },
  initComplete: function () {
    this.api()
      .columns(0)
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
        $("tr#filterboxrow th:not(:first-of-type)").each(function () {
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
