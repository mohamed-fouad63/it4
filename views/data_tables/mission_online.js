var table = $("#example").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it4/ajaxMissionOnline",
    method: "post",
    data: function (d) {
      d.auth = "";
    },
    dataSrc: "",
  },
  deferRender: true,
  columnDefs: [
    { width: "100px", targets: 1 },
    { width: "300px", targets: 2 },
    { width: "105px", targets: 4 },
    { width: "75px", targets: 5 },
    { width: "75px", targets: 6 },
  ],
  columns: [
    { data: "it_name" },
    { data: "misin_day" },
    { data: "misin_date" },
    { data: "office_name" },
    { data: "misin_type" },
    { data: "start_time" },
    { data: "end_time" },
    { data: "does" },
    {
      data: "mission_table",
      render: function (data, type, row) {
        if (data == "misin_it_online") {
          return `
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn btn-success me-2" title="اضافه الماموريه">
          <i class="bi bi-plus-lg"></i>
          </button>
          <button type="button" class="btn btn-danger" title="حذف الماموريه">
            <i class="bi bi-x-lg"></i>
          </button>
          </div>`;
        }
        if (data == "not") {
          return "";
        }
      },
    },
  ],
  dom: "frt",
  paging: false,
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
              table.column($(this).index()).search(val).draw();
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
