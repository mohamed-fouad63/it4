/* start data table pc  */
var dvice_office_pc = $("#dvice_office_pc").DataTable({
  ajax: {
    url: "/it4/ajaxTempMoved?dvice_id=pc",
    method: "get",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "office_name" },
    { data: "note_move_to" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_move == 1) {
          move = `<li class="d-flex align-items-center">
                <i class="bi bi-arrows-move"></i>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                    <label>نقل لمكتب اخر</label>
                </a>
            </li>`;
        } else {
          move = ``;
        }
        if (Settings.auth_to_it == 1) {
          to_it = `<li class="d-flex align-items-center">
                        <i class="bi bi-screwdriver"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_It_Modal">
                            <label>صيانه بقسم الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_it = ``;
        }
        if (Settings.auth_move == 1) {
          resent_resent_to_office = `<li class="d-flex align-items-center">
                                        <i class="bi bi-reply-fill"></i>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                            <label>اعاده الجهاز للمكتب</label>
                                        </a>
                                    </li>`;
        } else {
          resent_resent_to_office = ``;
        }
        if (move != "" || to_it != "" || resent_resent_to_office != "") {
          return `
                  <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical" value=""></i>
                      </button>
                      <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                          ${move}
                          ${to_it}
                          ${resent_resent_to_office}
                      </ul>
                  </div>
                  `;
        } else {
          return ``;
        }
      },
    },
  ],
  rowReorder: true,
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "ابحث باسم المكتب او الكود المالى او البريدى او كود بوستال",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("#pc_office_count").append($("#dvice_office_pc_info"));
    $("#dvice_office_pc tbody").on("click", ".dropdown-item", function () {
      var data_pc = dvice_office_pc.row($(this).parents("tr")).data();
      $(".office_name").val(data_pc.office_name);
      office_name = data_pc.office_name;
      office_name_from = data_pc.office_name;
      $(".dvice_name").val(data_pc.dvice_name);
      $(".dvice_sn").val(data_pc.sn);
      $(".dvice_num").val(data_pc.num);
      $(".note_move_to").val(data_pc.note_move_to);
      note_move_to = data_pc.note_move_to;
      return (divce_num = data_pc.num);
    });
  },
});
/* end data table pc  */

/* start data table monitor  */
var dvice_office_monitor = $("#dvice_office_monitor").DataTable({
  ajax: {
    url: "/it4/ajaxTempMoved?dvice_id=monitor",
    method: "get",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "office_name" },
    { data: "note_move_to" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_move == 1) {
          move = `<li class="d-flex align-items-center">
                <i class="bi bi-arrows-move"></i>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                    <label>نقل لمكتب اخر</label>
                </a>
            </li>`;
        } else {
          move = ``;
        }
        if (Settings.auth_to_it == 1) {
          to_it = `<li class="d-flex align-items-center">
                      <i class="bi bi-screwdriver"></i>
                      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_It_Modal">
                          <label>صيانه بقسم الدعم الفنى</label>
                      </a>
                    </li>`;
        } else {
          to_it = ``;
        }
        if (Settings.auth_move == 1) {
          resent_resent_to_office = `<li class="d-flex align-items-center">
                                        <i class="bi bi-reply-fill"></i>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                            <label>اعاده الجهاز للمكتب</label>
                                        </a>
                                    </li>`;
        } else {
          resent_resent_to_office = ``;
        }
        if (move != "" || to_it != "" || resent_resent_to_office != "") {
          return `
                  <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical" value=""></i>
                      </button>
                      <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                          ${move}
                          ${to_it}
                          ${resent_resent_to_office}
                      </ul>
                  </div>
                  `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "ابحث باسم المكتب او الكود المالى او البريدى او كود بوستال",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("#monitor_office_count").append($("#dvice_office_monitor_info"));
    $("#dvice_office_monitor tbody").on("click", ".dropdown-item", function () {
      var data_monitor = dvice_office_monitor.row($(this).parents("tr")).data();
      $(".office_name").val(data_monitor.office_name);
      office_name = data_monitor.office_name;
      office_name_from = data_monitor.office_name;
      $(".dvice_name").val(data_monitor.dvice_name);
      $(".dvice_sn").val(data_monitor.sn);
      $(".dvice_num").val(data_monitor.num);
      $(".note_move_to").val(data_monitor.note_move_to);
      note_move_to = data_monitor.note_move_to;
      return (divce_num = data_monitor.num);
    });
  },
});
/* end data table monitor  */

/* start data table printer  */
var dvice_office_printer = $("#dvice_office_printer").DataTable({
  ajax: {
    url: "/it4/ajaxTempMoved?dvice_id=printer",
    method: "get",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "office_name" },
    { data: "note_move_to" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_move == 1) {
          move = `<li class="d-flex align-items-center">
                <i class="bi bi-arrows-move"></i>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                    <label>نقل لمكتب اخر</label>
                </a>
            </li>`;
        } else {
          move = ``;
        }
        if (Settings.auth_to_it == 1) {
          to_it = `<li class="d-flex align-items-center">
                        <i class="bi bi-screwdriver"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_It_Modal">
                            <label>صيانه بقسم الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_it = ``;
        }
        if (Settings.auth_move == 1) {
          resent_resent_to_office = `<li class="d-flex align-items-center">
                                        <i class="bi bi-reply-fill"></i>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                            <label>اعاده الجهاز للمكتب</label>
                                        </a>
                                      </li>`;
        } else {
          resent_resent_to_office = ``;
        }
        if (move != "" || to_it != "" || resent_resent_to_office != "") {
          return `
                  <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical" value=""></i>
                      </button>
                      <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                          ${move}
                          ${to_it}
                          ${resent_resent_to_office}
                      </ul>
                  </div>
                  `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "ابحث باسم المكتب او الكود المالى او البريدى او كود بوستال",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("#printer_office_count").append($("#dvice_office_printer_info"));
    $("#dvice_office_printer tbody").on("click", ".dropdown-item", function () {
      var data_printer = dvice_office_printer.row($(this).parents("tr")).data();
      $(".office_name").val(data_printer.office_name);
      office_name = data_printer.office_name;
      office_name_from = data_printer.office_name;
      $(".dvice_name").val(data_printer.dvice_name);
      $(".dvice_sn").val(data_printer.sn);
      $(".dvice_num").val(data_printer.num);
      $(".note_move_to").val(data_printer.note_move_to);
      note_move_to = data_printer.note_move_to;
      return (divce_num = data_printer.num);
    });
  },
});
/* end data table printer  */

/* start data table pos  */
var dvice_office_pos = $("#dvice_office_pos").DataTable({
  ajax: {
    url: "/it4/ajaxTempMoved?dvice_id=pos",
    method: "get",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "office_name" },
    { data: "note_move_to" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_move == 1) {
          move = `<li class="d-flex align-items-center">
                <i class="bi bi-arrows-move"></i>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                    <label>نقل لمكتب اخر</label>
                </a>
            </li>`;
        } else {
          move = ``;
        }
        if (Settings.auth_to_it == 1) {
          to_it = `<li class="d-flex align-items-center">
                        <i class="bi bi-screwdriver"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_It_Modal">
                            <label>صيانه بقسم الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_it = ``;
        }
        if (Settings.auth_move == 1) {
          resent_resent_to_office = `<li class="d-flex align-items-center">
                                        <i class="bi bi-reply-fill"></i>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                            <label>اعاده الجهاز للمكتب</label>
                                        </a>
                                    </li>`;
        } else {
          resent_resent_to_office = ``;
        }
        if (move != "" || to_it != "" || resent_resent_to_office != "") {
          return `
                  <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical" value=""></i>
                      </button>
                      <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                          ${move}
                          ${to_it}
                          ${resent_resent_to_office}
                      </ul>
                  </div>
                  `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "ابحث باسم المكتب او الكود المالى او البريدى او كود بوستال",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("#pos_office_count").append($("#dvice_office_pos_info"));
    $("#dvice_office_pos tbody").on("click", ".dropdown-item", function () {
      var data_pos = dvice_office_pos.row($(this).parents("tr")).data();
      $(".office_name").val(data_pos.office_name);
      office_name = data_pos.office_name;
      office_name_from = data_pos.office_name;
      $(".dvice_name").val(data_pos.dvice_name);
      $(".dvice_sn").val(data_pos.sn);
      $(".dvice_num").val(data_pos.num);
      $(".note_move_to").val(data_pos.note_move_to);
      note_move_to = data_pos.note_move_to;
      return (divce_num = data_pos.num);
    });
  },
});
/* end data table pos  */

/* start data table network  */
var dvice_office_network = $("#dvice_office_network").DataTable({
  ajax: {
    url: "/it4/ajaxTempMoved?dvice_id=network",
    method: "get",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "office_name" },
    { data: "note_move_to" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_move == 1) {
          move = `<li class="d-flex align-items-center">
                <i class="bi bi-arrows-move"></i>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                    <label>نقل لمكتب اخر</label>
                </a>
            </li>`;
        } else {
          move = ``;
        }
        if (Settings.auth_to_it == 1) {
          to_it = `<li class="d-flex align-items-center">
                      <i class="bi bi-screwdriver"></i>
                      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_It_Modal">
                          <label>صيانه بقسم الدعم الفنى</label>
                      </a>
                  </li>`;
        } else {
          to_it = ``;
        }
        if (Settings.auth_move == 1) {
          resent_resent_to_office = `<li class="d-flex align-items-center">
                                        <i class="bi bi-reply-fill"></i>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                            <label>اعاده الجهاز للمكتب</label>
                                        </a>
                                    </li>`;
        } else {
          resent_resent_to_office = ``;
        }
        if (move != "" || to_it != "" || resent_resent_to_office != "") {
          return `
                  <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical" value=""></i>
                      </button>
                      <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                          ${move}
                          ${to_it}
                          ${resent_resent_to_office}
                      </ul>
                  </div>
                  `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "ابحث باسم المكتب او الكود المالى او البريدى او كود بوستال",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("#network_office_count").append($("#dvice_office_network_info"));
    $("#dvice_office_network tbody").on("click", ".dropdown-item", function () {
      var data_network = dvice_office_network.row($(this).parents("tr")).data();
      $(".office_name").val(data_network.office_name);
      office_name = data_network.office_name;
      office_name_from = data_network.office_name;
      $(".dvice_name").val(data_network.dvice_name);
      $(".dvice_sn").val(data_network.sn);
      $(".dvice_num").val(data_network.num);
      $(".note_move_to").val(data_network.note_move_to);
      note_move_to = data_network.note_move_to;
      return (divce_num = data_network.num);
    });
  },
});
/* end data table network  */

/* start data table postal  */
var dvice_office_postal = $("#dvice_office_postal").DataTable({
  ajax: {
    url: "/it4/ajaxTempMoved?dvice_id=postal",
    method: "get",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "office_name" },
    { data: "note_move_to" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_move == 1) {
          move = `<li class="d-flex align-items-center">
                <i class="bi bi-arrows-move"></i>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                    <label>نقل لمكتب اخر</label>
                </a>
            </li>`;
        } else {
          move = ``;
        }
        if (Settings.auth_to_it == 1) {
          to_it = `<li class="d-flex align-items-center">
                      <i class="bi bi-screwdriver"></i>
                      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_It_Modal">
                          <label>صيانه بقسم الدعم الفنى</label>
                      </a>
                  </li>`;
        } else {
          to_it = ``;
        }
        if (Settings.auth_move == 1) {
          resent_resent_to_office = `<li class="d-flex align-items-center">
                                        <i class="bi bi-reply-fill"></i>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                            <label>اعاده الجهاز للمكتب</label>
                                        </a>
                                    </li>`;
        } else {
          resent_resent_to_office = ``;
        }
        if (move != "" || to_it != "" || resent_resent_to_office != "") {
          return `
                  <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical" value=""></i>
                      </button>
                      <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                          ${move}
                          ${to_it}
                          ${resent_resent_to_office}
                      </ul>
                  </div>
                  `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "ابحث باسم المكتب او الكود المالى او البريدى او كود بوستال",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("#postal_office_count").append($("#dvice_office_postal_info"));
    $("#dvice_office_postal tbody").on("click", ".dropdown-item", function () {
      var data_postal = dvice_office_postal.row($(this).parents("tr")).data();
      $(".office_name").val(data_postal.office_name);
      office_name = data_postal.office_name;
      office_name_from = data_postal.office_name;
      $(".dvice_name").val(data_postal.dvice_name);
      $(".dvice_sn").val(data_postal.sn);
      $(".dvice_num").val(data_postal.num);
      $(".note_move_to").val(data_postal.note_move_to);
      note_move_to = data_postal.note_move_to;
      return (divce_num = data_postal.num);
    });
  },
});
/* end data table postal  */

/* start data table other  */
var dvice_office_other = $("#dvice_office_other").DataTable({
  ajax: {
    url: "/it4/ajaxTempMoved?dvice_id=other",
    method: "get",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "office_name" },
    { data: "note_move_to" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_move == 1) {
          move = `<li class="d-flex align-items-center">
                <i class="bi bi-arrows-move"></i>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                    <label>نقل لمكتب اخر</label>
                </a>
            </li>`;
        } else {
          move = ``;
        }
        if (Settings.auth_to_it == 1) {
          to_it = `<li class="d-flex align-items-center">
                      <i class="bi bi-screwdriver"></i>
                      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_It_Modal">
                          <label>صيانه بقسم الدعم الفنى</label>
                      </a>
                  </li>`;
        } else {
          to_it = ``;
        }
        if (Settings.auth_move == 1) {
          resent_resent_to_office = `<li class="d-flex align-items-center">
                                        <i class="bi bi-reply-fill"></i>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                            <label>اعاده الجهاز للمكتب</label>
                                        </a>
                                    </li>`;
        } else {
          resent_resent_to_office = ``;
        }
        if (move != "" || to_it != "" || resent_resent_to_office != "") {
          return `
                  <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical" value=""></i>
                      </button>
                      <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                          ${move}
                          ${to_it}
                          ${resent_resent_to_office}
                      </ul>
                  </div>
                  `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "ابحث باسم المكتب او الكود المالى او البريدى او كود بوستال",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("#other_office_count").append($("#dvice_office_other_info"));
    $("#dvice_office_other tbody").on("click", ".dropdown-item", function () {
      var data_other = dvice_office_other.row($(this).parents("tr")).data();
      $(".office_name").val(data_other.office_name);
      office_name = data_other.office_name;
      office_name_from = data_other.office_name;
      $(".dvice_name").val(data_other.dvice_name);
      $(".dvice_sn").val(data_other.sn);
      $(".dvice_num").val(data_other.num);
      $(".note_move_to").val(data_other.note_move_to);
      note_move_to = data_other.note_move_to;
      return (divce_num = data_other.num);
    });
  },
});
/* end data table other  */
function datatable_ajax_reload() {
  dvice_office_pc.ajax.reload();
  dvice_office_monitor.ajax.reload();
  dvice_office_printer.ajax.reload();
  dvice_office_pos.ajax.reload();
  dvice_office_network.ajax.reload();
  dvice_office_postal.ajax.reload();
  dvice_office_other.ajax.reload();
}
