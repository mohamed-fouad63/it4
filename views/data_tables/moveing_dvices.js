var table = $("#example").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it4/ajaxMoveingDvices",
    method: "post",
    data: function (d) {
      d.auth = "";
    },
    dataSrc: "",
  },
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "office_name_from" },
    { data: "office_name_to" },
    { data: "date" },
    { data: "move_by" },
    { data: "move_like" },
    { data: "move_note" },
  ],
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
  language: {
    zeroRecords: "",
    infoEmpty: "0 / ",
    info: "_TOTAL_ / ",
    emptyTable: "لا يوجد اجهزه مدرجه",
  },
  initComplete: function () {
    $("thead tr#filterboxrow th").each(function () {
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
    $(".filte_div")
      .append($(".dataTables_filter input"))
      .children()
      .addClass("form-control")
      .attr("placeholder", "بحث عام");
    $(".bt_div").append($(".dt-buttons button")).children().addClass("btn");
    $(".info_div")
      .append($(".dataTables_info"))
      .children()
      .addClass("form-control")
      .attr("placeholder", "بحث عام");
    $("thead tr#filterboxrow").css("display", "table-row");
    $("thead tr#filterboxrow th input").addClass("form-control");
    $("table").removeClass("dataTable");
    $("table tbody").addClass("table-success");
  },
});
