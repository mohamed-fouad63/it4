$("#select_year").on("change", function () {
  select_year = $("#select_year").val();
  $("#example").DataTable().ajax.reload();
});
select_year = $("#select_year").val();
var table = $("#example").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it2/api/notice/all_notice.php",
    method: "post",
    data: function (d) {
      d.year = select_year;
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "notice_date" },
    { data: "notice_from" },
    { data: "notice_noti" },
    { data: "notice_receive" },
    { data: "notice_type" },
    { data: "notice_description" },
    { data: "notice_procedure" },
    {
      data: null,
      render: function (data, type, row) {
        return `
        <div class="btn-group">
        <button type="button" class="btn btn-success me-2" tabindex="0" aria-controls="example" data-bs-toggle="modal" data-placement="right" title="تعديل البلاغ" data-bs-target="#Edit_Notice_Modal">
          <i class="bi bi-pencil-square"></i>
        </button>
       <button type="button" class="btn btn-danger" tabindex="0" aria-controls="example" data-bs-toggle="modal" data-placement="right" title="حذف البلاغ" data-bs-target="#Delete_Notice_Modal">
          <i class="bi bi-x-lg"></i>
        </button>
        </div>
        `;
      },
    },
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
    $("tr#filterboxrow th:not(:last-of-type)").each(function () {
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

    $("#example tbody").on(
      "click",
      "td button.btn-success ,td button.btn-danger",
      function () {
        var data_notice = table.row($(this).parents("tr")).data();
        $(".notice_date").val(data_notice.notice_date);
        $(".notice_noti").val(data_notice.notice_noti);
        $(".notice_from_edit").val(data_notice.notice_from);
        $(".notice_receive").val(data_notice.notice_receive);
        $(".notice_type").val(data_notice.notice_type);
        $(".notice_description").val(data_notice.notice_description);
        $(".notice_procedure").val(data_notice.notice_procedure);
        return (notice_id = data_notice.notice_id);
      }
    );

    $(".filte_div")
      .append($(".dataTables_filter input"))
      .children()
      .addClass("form-control")
      .attr("placeholder", "بحث عام");
    $(".bt_div").append($(".dt-buttons button")).children().addClass("btn");
    $("thead tr#filterboxrow").css("display", "table-row");
    $("thead tr#filterboxrow th input").addClass("form-control");
    $("table").removeClass("dataTable");
    $("table tbody").addClass("table-success");
  },
});
