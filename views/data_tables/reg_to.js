var table = $("#example").DataTable({
  bProcessing: true,
  // stateSave: true,
  ajax: {
    url: "/it4/ajaxRegTo",
    method: "post",
    data: {
      getmy: function () {
        var getmy = $("#month_missin").val();
        return getmy;
      },
    },
    dataSrc: "",
  },
  columns: [
    { data: "date" },
    { data: "barcode" },
    { data: "send_to" },
    { data: "subject" },
    {
      data: null,
      render: function (data, type, row) {
        return (
          '<button type="button" class="btn btn-danger me-2" id=' +
          data.id +
          ' title="حذف المسجل"><i class="bi bi-x-lg"></i></button><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>'
        );
      },
    },
  ],
  order: [[1, "asc"]],
  ordering: false,
  dom: "irt",
  scrollY: "50vh",
  scrollCollapse: true,
  paging: false,
  fixedHeader: true,
  fnInitComplete: function () {},
  language: {
    zeroRecords: "لا توجد مسجلات صادره بتاريخ اليوم",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
});
