var options_select_it_name = "<option selected value='0'>اختر القائم بالمامويه</option>";
$.post(
  "/it4/usersInfo",
  { x: "" },
  function (data) {
    $.each(data, function (key, val) {
      options_select_it_name +=
        "<option value='" + val.id + "'>" + val.first_name + "</option>";
    });
    $("#select_it_name").append(options_select_it_name);
  },
  "json"
);

var options_office_name;
$.getJSON("/it4/ajaxOfficesNames", function (data) {
  $.each(data, function (key, val) {
    options_office_name +=
      "<option value='" +
      val.office_name +
      "'>" +
      val.office_name +
      "</option>";
  });
  $("#select_office_name").append(options_office_name);
});

var table = $("#example").DataTable({
  bProcessing: true,
  // stateSave: true,
  ajax: {
    url: "/it4/ajaxMissions",
    method: "post",
    data: {
      getid2: function () {
        var getid = $("#select_it_name").val();
        return getid;
      },
      getmy: function () {
        var getmy = $("#month_missin").val();
        return getmy;
      },
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
    {
      data: "mission_table",
      render: function (data, type, row) {
        if (data == "misin_it") {
          type1 = type;
          return '<button type="button" class="btn btn-danger" title="حذف الماموريه"><i class="bi bi-x-lg"></i></button>';
        }
        if (data == "not") {
          return "";
        }
        if (data == "misin_it_online") {
          return '<div class="btn-group" role="group" aria-label="Basic mixed styles example"><button type="button" class="btn btn-danger" title="حذف الماموريه"><i class="bi bi-x-lg"></i></button><button type="button" class="btn btn-success  ms-2" title="اضافه الماموريه"><i class="bi bi-plus-lg"></i></button></div>';
        }
      },
    },
  ],
  rowCallback: function (row, data) {
    if (data.mission_table == "misin_it_online") {
      $(row).css("color", "blue");
    }
    if (data.mission_table == "misin_it") {
      $(row).css("color", "black");
    }
    if (data.mission_table == "not") {
      $(row).css("color", "red");
    }
  },
  ordering: false,
  dom: "Brti",
  paging: false,
  buttons: [
    {
      extend: "print",
      text: '<i class="btn btn-warning bi bi-printer" title="طباعه هذا الشهر"></i>',
      title: "",
      messageTop: function () {
        return (
          "خطه /  " +
          $("#select_it_name option:selected").text() +
          " عن شهر " +
          $("#month_missin").val()
        );
      },
      autoPrint: true,
      exportOptions: { columns: [1, 2, 3, 4, 5, 6] },
    },
  ],
  language: {
    zeroRecords: "اختر القائم بالماموريه و حدد الشهر و السنه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  initComplete: function () {
    $(".bt_div")
      .append($(".dt-buttons button"))
      .children()
      .addClass("btn disabled");
    $(".info_div")
      .append($(".dataTables_info"))
      .children()
      .addClass("form-control");
    $(".add_div").append(
      '<button class="btn disabled" data-bs-toggle="modal" data-placement="right" title="اضافه  ماموريه" id="mission_add_btn" data-bs-target="#add_mission_modal"><i class="btn btn-primary bi bi-plus"></i></button>'
    );
    // $(".lock_mission").html(
    //   '<button class="btn" id="mission_lock_btn" title="اغلاق هذا الشهر" ><i class="btn btn-danger bi bi-lock-fill"></i></button>'
    // );
  },
});
