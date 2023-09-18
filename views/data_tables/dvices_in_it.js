var dvice_office_pc = $("#dvice_office_pc").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInIt?dvice_id=pc",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "parcel_in_it" },
    { data: "date_in_it" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_replace_dvices == 1) {
          if (row.dvice_name == "HP ProDesk 400 G5 MT" || row.dvice_name == "LENOVO M80T") {
            replace_dvices = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrow-repeat"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Replace_Pices_Modal2">
                            <label>استبدال قطع غيار</label>
                            </a>
                          </li>`;
          } else {
            replace_dvices = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrow-repeat"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Replace_Pices_Modal">
                            <label>استبدال قطع غيار</label>
                            </a>
                          </li>`;
          }
        } else {
          replace_dvices = ``;
        }
        if (Settings.auth_edit_in_it == 1) {
          edit_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-pencil-square"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_It_Modal">
                                <label>تعديل البيانات</label>
                            </a>
                        </li>`;
        } else {
          edit_in_it = ``;
        }
        if (Settings.auth_to_tts == 1) {
          to_tts = `<li class="d-flex align-items-center">
                        <i class="bi bi-truck"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_Tts_Modal">
                            <label>صيانه بقطاع الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_tts = ``;
        }
        if (Settings.auth_resent_in_it == 1) {
          resent_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-reply-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                  <label>اعاده الجهاز للمكتب</label>
                              </a>
                          </li>`;
        } else {
          resent_in_it = ``;
        }
        if (Settings.auth_delete_in_it == 1) {
          delete_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-x-octagon-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Delete_Modal">
                                  <label>استنزال العهده</label>
                              </a>
                          </li>`;
        } else {
          delete_in_it = ``;
        }
        if (Settings.auth_move_in_it == 1) {
          move_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrows-move"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                                <label>نقل لمكتب اخر</label>
                            </a>
                        </li>`;
        } else {
          move_in_it = ``;
        }
        if (
          edit_in_it != "" ||
          to_tts != "" ||
          resent_in_it != "" ||
          delete_in_it != "" ||
          move_in_it != "" ||
          replace_dvices != ""
        ) {
          return `
                  <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_it}
                    ${to_tts}
                    ${resent_in_it}
                    ${delete_in_it}
                    ${move_in_it}
                    ${replace_dvices}
                  </ul>
                        `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  order: [[7, "asc"]],
  language: {
    zeroRecords: "لا يوجد اجهزه بقسم الدعم الفنى",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#pc_office_count").append($("#dvice_office_pc_info"));
    $("#dvice_office_pc tbody").on("click", ".dropdown-item", function () {
      var data_pc = dvice_office_pc.row($(this).parents("tr")).data();
      $(".office_name").val(data_pc.office_name);
      office_name_from = data_pc.office_name;
      $(".dvice_name").val(data_pc.dvice_name);
      $(".dvice_sn").val(data_pc.sn);
      $(".parcel_in_it").val(data_pc.parcel_in_it);
      $(".date_in_it").val(data_pc.date_in_it);
      $(".damage").val(data_pc.damage);
      $(".in_it_note").val(data_pc.in_it_note);
      $(".dvice_type").val(data_pc.dvice_type);
      $(".dvice_num").val(data_pc.num);
      $(".sub_print_ticket").attr(
        "href",
        "/it4/authRepair?dvice_num=" + data_pc.count_in_it + ""
      );
      return (dvice_num = data_pc.count_in_it);
    });
  },
});
/* end data table pc  */

/* start data table monitpr  */
var dvice_office_monitor = $("#dvice_office_monitor").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInIt?dvice_id=monitor",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "parcel_in_it" },
    { data: "date_in_it" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_edit_in_it == 1) {
          edit_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-pencil-square"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_It_Modal">
                                <label>تعديل البيانات</label>
                            </a>
                        </li>`;
        } else {
          edit_in_it = ``;
        }
        if (Settings.auth_to_tts == 1) {
          to_tts = `<li class="d-flex align-items-center">
                        <i class="bi bi-truck"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_Tts_Modal">
                            <label>صيانه بقطاع الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_tts = ``;
        }
        if (Settings.auth_resent_in_it == 1) {
          resent_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-reply-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                  <label>اعاده الجهاز للمكتب</label>
                              </a>
                          </li>`;
        } else {
          resent_in_it = ``;
        }
        if (Settings.auth_delete_in_it == 1) {
          delete_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-x-octagon-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Delete_Modal">
                                  <label>استنزال العهده</label>
                              </a>
                          </li>`;
        } else {
          delete_in_it = ``;
        }
        if (Settings.auth_move_in_it == 1) {
          move_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrows-move"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                                <label>نقل لمكتب اخر</label>
                            </a>
                        </li>`;
        } else {
          move_in_it = ``;
        }
        if (
          to_tts != "" ||
          resent_in_it != "" ||
          delete_in_it != "" ||
          move_in_it != "" ||
          edit_in_it != ""
        ) {
          return `
                  <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_it}
                    ${to_tts}
                    ${resent_in_it}
                    ${delete_in_it}
                    ${move_in_it}
                  </ul>
                        `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  order: [[7, "asc"]],
  language: {
    zeroRecords: "لا يوجد شاشات بقسم الدعم الفنى",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#monitor_office_count").append($("#dvice_office_monitor_info"));
    $("#dvice_office_monitor tbody").on("click", ".dropdown-item", function () {
      var data_monitor = dvice_office_monitor.row($(this).parents("tr")).data();
      $(".office_name").val(data_monitor.office_name);
      office_name_from = data_monitor.office_name;
      $(".dvice_name").val(data_monitor.dvice_name);
      $(".dvice_sn").val(data_monitor.sn);
      $(".parcel_in_it").val(data_monitor.parcel_in_it);
      $(".date_in_it").val(data_monitor.date_in_it);
      $(".damage").val(data_monitor.damage);
      $(".in_it_note").val(data_monitor.in_it_note);
      $(".dvice_type").val(data_monitor.dvice_type);
      $(".dvice_num").val(data_monitor.num);
      $(".sub_print_ticket").attr(
        "href",
        "../views/auth_repair.php?dvice_num=" + data_monitor.count_in_it + ""
      );
      return (dvice_num = data_monitor.count_in_it);
    });
  },
});
/* end data table monitor  */

/* start data table printer  */
var dvice_office_printer = $("#dvice_office_printer").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInIt?dvice_id=printer",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "parcel_in_it" },
    { data: "date_in_it" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_edit_in_it == 1) {
          edit_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-pencil-square"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_It_Modal">
                                <label>تعديل البيانات</label>
                            </a>
                        </li>`;
        } else {
          edit_in_it = ``;
        }
        if (Settings.auth_to_tts == 1) {
          to_tts = `<li class="d-flex align-items-center">
                        <i class="bi bi-truck"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_Tts_Modal">
                            <label>صيانه بقطاع الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_tts = ``;
        }
        if (Settings.auth_resent_in_it == 1) {
          resent_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-reply-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                  <label>اعاده الجهاز للمكتب</label>
                              </a>
                          </li>`;
        } else {
          resent_in_it = ``;
        }
        if (Settings.auth_delete_in_it == 1) {
          delete_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-x-octagon-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Delete_Modal">
                                  <label>استنزال العهده</label>
                              </a>
                          </li>`;
        } else {
          delete_in_it = ``;
        }
        if (Settings.auth_move_in_it == 1) {
          move_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrows-move"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                                <label>نقل لمكتب اخر</label>
                            </a>
                        </li>`;
        } else {
          move_in_it = ``;
        }
        if (
          to_tts != "" ||
          resent_in_it != "" ||
          delete_in_it != "" ||
          move_in_it != "" ||
          edit_in_it != ""
        ) {
          return `
                  <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_it}
                    ${to_tts}
                    ${resent_in_it}
                    ${delete_in_it}
                    ${move_in_it}
                  </ul>
                        `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  order: [[7, "asc"]],
  language: {
    zeroRecords: "لا يوجد طابعات بقسم الدعم الفنى",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#printer_office_count").append($("#dvice_office_printer_info"));
    $("#dvice_office_printer tbody").on("click", ".dropdown-item", function () {
      var data_printer = dvice_office_printer.row($(this).parents("tr")).data();
      $(".office_name").val(data_printer.office_name);
      office_name_from = data_printer.office_name;
      $(".dvice_name").val(data_printer.dvice_name);
      $(".dvice_sn").val(data_printer.sn);
      $(".parcel_in_it").val(data_printer.parcel_in_it);
      $(".date_in_it").val(data_printer.date_in_it);
      $(".damage").val(data_printer.damage);
      $(".in_it_note").val(data_printer.in_it_note);
      $(".dvice_type").val(data_printer.dvice_type);
      $(".dvice_num").val(data_printer.num);
      $(".sub_print_ticket").attr(
        "href",
        "../views/auth_repair.php?dvice_num=" + data_printer.count_in_it + ""
      );
      return (dvice_num = data_printer.count_in_it);
    });
  },
});
/* end data table printer  */

/* start data table pos  */
var dvice_office_pos = $("#dvice_office_pos").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInIt?dvice_id=pos",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "parcel_in_it" },
    { data: "date_in_it" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_edit_in_it == 1) {
          edit_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-pencil-square"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_It_Modal">
                                <label>تعديل البيانات</label>
                            </a>
                        </li>`;
        } else {
          edit_in_it = ``;
        }
        if (Settings.auth_to_tts == 1) {
          to_tts = `<li class="d-flex align-items-center">
                        <i class="bi bi-truck"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_Tts_Modal">
                            <label>صيانه بقطاع الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_tts = ``;
        }
        if (Settings.auth_resent_in_it == 1) {
          resent_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-reply-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                  <label>اعاده الجهاز للمكتب</label>
                              </a>
                          </li>`;
        } else {
          resent_in_it = ``;
        }
        if (Settings.auth_delete_in_it == 1) {
          delete_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-x-octagon-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Delete_Modal">
                                  <label>استنزال العهده</label>
                              </a>
                          </li>`;
        } else {
          delete_in_it = ``;
        }
        if (Settings.auth_move_in_it == 1) {
          move_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrows-move"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                                <label>نقل لمكتب اخر</label>
                            </a>
                        </li>`;
        } else {
          move_in_it = ``;
        }
        if (
          to_tts != "" ||
          resent_in_it != "" ||
          delete_in_it != "" ||
          move_in_it != "" ||
          edit_in_it != ""
        ) {
          return `
                  <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_it}
                    ${to_tts}
                    ${resent_in_it}
                    ${delete_in_it}
                    ${move_in_it}
                  </ul>
                        `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  order: [[7, "asc"]],
  language: {
    zeroRecords: "لا يوجد اجهزه نقاط بيع بقسم الدعم الفنى",
    infoEmpty: "0",
    info: "_TOTAL_",
    select: {
      rows: {
        0: "",
        1: "1",
        _: "%d",
      },
    },
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#pos_office_count").append($("#dvice_office_pos_info"));
    $("#dvice_office_pos tbody").on("click", ".dropdown-item", function () {
      var data_pos = dvice_office_pos.row($(this).parents("tr")).data();
      $(".office_name").val(data_pos.office_name);
      office_name_from = data_pos.office_name;
      $(".dvice_name").val(data_pos.dvice_name);
      $(".dvice_sn").val(data_pos.sn);
      $(".parcel_in_it").val(data_pos.parcel_in_it);
      $(".date_in_it").val(data_pos.date_in_it);
      $(".damage").val(data_pos.damage);
      $(".in_it_note").val(data_pos.in_it_note);
      $(".dvice_type").val(data_pos.dvice_type);
      $(".dvice_num").val(data_pos.num);
      return (dvice_num = data_pos.count_in_it);
    });
  },
});
/* end data table pos  */
/* start data table network  */
var dvice_office_network = $("#dvice_office_network").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInIt?dvice_id=network",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "parcel_in_it" },
    { data: "date_in_it" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_edit_in_it == 1) {
          edit_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-pencil-square"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_It_Modal">
                                <label>تعديل البيانات</label>
                            </a>
                        </li>`;
        } else {
          edit_in_it = ``;
        }
        if (Settings.auth_to_tts == 1) {
          to_tts = `<li class="d-flex align-items-center">
                        <i class="bi bi-truck"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_Tts_Modal">
                            <label>صيانه بقطاع الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_tts = ``;
        }
        if (Settings.auth_resent_in_it == 1) {
          resent_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-reply-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                  <label>اعاده الجهاز للمكتب</label>
                              </a>
                          </li>`;
        } else {
          resent_in_it = ``;
        }
        if (Settings.auth_delete_in_it == 1) {
          delete_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-x-octagon-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Delete_Modal">
                                  <label>استنزال العهده</label>
                              </a>
                          </li>`;
        } else {
          delete_in_it = ``;
        }
        if (Settings.auth_move_in_it == 1) {
          move_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrows-move"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                                <label>نقل لمكتب اخر</label>
                            </a>
                        </li>`;
        } else {
          move_in_it = ``;
        }
        if (
          to_tts != "" ||
          resent_in_it != "" ||
          delete_in_it != "" ||
          move_in_it != "" ||
          edit_in_it != ""
        ) {
          return `
                  <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_it}
                    ${to_tts}
                    ${resent_in_it}
                    ${delete_in_it}
                    ${move_in_it}
                  </ul>
                        `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  order: [[7, "asc"]],
  language: {
    zeroRecords: "لا يوجد اجهزه شبكه بقسم الدعم الفنى",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#network_office_count").append($("#dvice_office_network_info"));
    $("#dvice_office_network tbody").on("click", ".dropdown-item", function () {
      var data_network = dvice_office_network.row($(this).parents("tr")).data();
      $(".office_name").val(data_network.office_name);
      office_name_from = data_network.office_name;
      $(".dvice_name").val(data_network.dvice_name);
      $(".dvice_sn").val(data_network.sn);
      $(".parcel_in_it").val(data_network.parcel_in_it);
      $(".date_in_it").val(data_network.date_in_it);
      $(".damage").val(data_network.damage);
      $(".in_it_note").val(data_network.in_it_note);
      $(".dvice_type").val(data_network.dvice_type);
      $(".dvice_num").val(data_network.num);
      return (dvice_num = data_network.count_in_it);
    });
  },
});
/* end data table network  */

/* start data table postal  */
var dvice_office_postal = $("#dvice_office_postal").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInIt?dvice_id=postal",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "parcel_in_it" },
    { data: "date_in_it" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_replace_dvices == 1) {
          if (row.dvice_name == "BARCODE PRINTER ZEBRA GC420T" || row.dvice_name == "BARCODE PRINTER ZEBRA ZT 410") {
            replace_dvices = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrow-repeat"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Replace_Pices_Modal3">
                            <label>استبدال قطع غيار</label>
                            </a>
                          </li>`;
          } else {
            replace_dvices = ``;
          }
        }
        if (Settings.auth_edit_in_it == 1) {
          edit_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-pencil-square"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_It_Modal">
                                <label>تعديل البيانات</label>
                            </a>
                        </li>`;
        } else {
          edit_in_it = ``;
        }
        if (Settings.auth_to_tts == 1) {
          to_tts = `<li class="d-flex align-items-center">
                        <i class="bi bi-truck"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_Tts_Modal">
                            <label>صيانه بقطاع الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_tts = ``;
        }
        if (Settings.auth_resent_in_it == 1) {
          resent_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-reply-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                  <label>اعاده الجهاز للمكتب</label>
                              </a>
                          </li>`;
        } else {
          resent_in_it = ``;
        }
        if (Settings.auth_delete_in_it == 1) {
          delete_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-x-octagon-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Delete_Modal">
                                  <label>استنزال العهده</label>
                              </a>
                          </li>`;
        } else {
          delete_in_it = ``;
        }
        if (Settings.auth_move_in_it == 1) {
          move_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrows-move"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                                <label>نقل لمكتب اخر</label>
                            </a>
                        </li>`;
        } else {
          move_in_it = ``;
        }
        if (
          to_tts != "" ||
          resent_in_it != "" ||
          delete_in_it != "" ||
          move_in_it != "" ||
          edit_in_it != ""
        ) {
          return `
                  <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_it}
                    ${to_tts}
                    ${resent_in_it}
                    ${delete_in_it}
                    ${move_in_it}
                    ${replace_dvices}
                  </ul>
                        `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  order: [[7, "asc"]],
  language: {
    zeroRecords: "لا يوجد اجهزه بوستال بقسم الدعم الفنى",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#postal_office_count").append($("#dvice_office_postal_info"));
    $("#dvice_office_postal tbody").on("click", ".dropdown-item", function () {
      var data_postal = dvice_office_postal.row($(this).parents("tr")).data();
      $(".office_name").val(data_postal.office_name);
      office_name_from = data_postal.office_name;
      $(".dvice_name").val(data_postal.dvice_name);
      $(".dvice_sn").val(data_postal.sn);
      $(".parcel_in_it").val(data_postal.parcel_in_it);
      $(".date_in_it").val(data_postal.date_in_it);
      $(".damage").val(data_postal.damage);
      $(".in_it_note").val(data_postal.in_it_note);
      $(".dvice_type").val(data_postal.dvice_type);
      $(".dvice_num").val(data_postal.num);
      $(".sub_print_ticket").attr(
        "href",
        "../views/auth_repair.php?dvice_num=" + data_postal.count_in_it + ""
      );
      return (dvice_num = data_postal.count_in_it);
    });
  },
});
/* end data table postal  */

/* start data table other  */
var dvice_office_other = $("#dvice_office_other").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInIt?dvice_id=other",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "parcel_in_it" },
    { data: "date_in_it" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_edit_in_it == 1) {
          edit_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-pencil-square"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_It_Modal">
                                <label>تعديل البيانات</label>
                            </a>
                        </li>`;
        } else {
          edit_in_it = ``;
        }
        if (Settings.auth_to_tts == 1) {
          to_tts = `<li class="d-flex align-items-center">
                        <i class="bi bi-truck"></i>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#To_Tts_Modal">
                            <label>صيانه بقطاع الدعم الفنى</label>
                        </a>
                    </li>`;
        } else {
          to_tts = ``;
        }
        if (Settings.auth_resent_in_it == 1) {
          resent_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-reply-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resend_To_Office_Modal">
                                  <label>اعاده الجهاز للمكتب</label>
                              </a>
                          </li>`;
        } else {
          resent_in_it = ``;
        }
        if (Settings.auth_delete_in_it == 1) {
          delete_in_it = `<li class="d-flex align-items-center">
                              <i class="bi bi-x-octagon-fill"></i>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Delete_Modal">
                                  <label>استنزال العهده</label>
                              </a>
                          </li>`;
        } else {
          delete_in_it = ``;
        }
        if (Settings.auth_move_in_it == 1) {
          move_in_it = `<li class="d-flex align-items-center">
                            <i class="bi bi-arrows-move"></i>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Move_To_Modal">
                                <label>نقل لمكتب اخر</label>
                            </a>
                        </li>`;
        } else {
          move_in_it = ``;
        }
        if (
          to_tts != "" ||
          resent_in_it != "" ||
          delete_in_it != "" ||
          move_in_it != "" ||
          edit_in_it != ""
        ) {
          return `
                  <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_it}
                    ${to_tts}
                    ${resent_in_it}
                    ${delete_in_it}
                    ${move_in_it}
                  </ul>
                        `;
        } else {
          return ``;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  order: [[7, "asc"]],
  language: {
    zeroRecords: "لا يوجد اجهزه اخرى بقسم الدعم الفنى",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#other_office_count").append($("#dvice_office_other_info"));
    $("#dvice_office_other tbody").on("click", ".dropdown-item", function () {
      var data_other = dvice_office_other.row($(this).parents("tr")).data();
      $(".office_name").val(data_other.office_name);
      office_name_from = data_other.office_name;
      $(".dvice_name").val(data_other.dvice_name);
      $(".dvice_sn").val(data_other.sn);
      $(".parcel_in_it").val(data_other.parcel_in_it);
      $(".date_in_it").val(data_other.date_in_it);
      $(".damage").val(data_other.damage);
      $(".in_it_note").val(data_other.in_it_note);
      $(".dvice_type").val(data_other.dvice_type);
      $(".dvice_num").val(data_other.num);
      $(".sub_print_ticket").attr(
        "href",
        "../views/auth_repair.php?dvice_num=" + data_other.count_in_it + ""
      );
      return (dvice_num = data_other.count_in_it);
    });
  },
});
/* end data table postal  */
function datatable_ajax_reload() {
  dvice_office_pc.ajax.reload(function () {
    // if (!dvice_office_pc.data().count()) {
    //   $("#dvice_office_pc_field").css("display", "none");
    // } else {
    //   $("#dvice_office_pc_field").css("display", "block");
    // }
  });
  dvice_office_monitor.ajax.reload(function () {
    // if (!dvice_office_monitor.data().count()) {
    //   $("#dvice_office_monitor_field").css("display", "none");
    // } else {
    //   $("#dvice_office_monitor_field").css("display", "block");
    // }
  });
  dvice_office_printer.ajax.reload(function () {
    // if (!dvice_office_printer.data().count()) {
    //   $("#dvice_office_printer_field").css("display", "none");
    // } else {
    //   $("#dvice_office_printer_field").css("display", "block");
    // }
  });
  dvice_office_pos.ajax.reload(function () {
    // if (!dvice_office_pos.data().count()) {
    //   $("#dvice_office_pos_field").css("display", "none");
    // } else {
    //   $("#dvice_office_pos_field").css("display", "block");
    // }
  });
  dvice_office_network.ajax.reload(function () {
    // if (!dvice_office_network.data().count()) {
    //   $("#dvice_office_network_field").css("display", "none");
    // } else {
    //   $("#dvice_office_network_field").css("display", "block");
    // }
  });
  dvice_office_postal.ajax.reload(function () {
    // if (!dvice_office_postal.data().count()) {
    //   $("#dvice_office_postal_field").css("display", "none");
    // } else {
    //   $("#dvice_office_postal_field").css("display", "block");
    // }
  });
  dvice_office_other.ajax.reload(function () {
    // if (!dvice_office_other.data().count()) {
    //   $("#dvice_office_other_field").css("display", "none");
    // } else {
    //   $("#dvice_office_other_field").css("display", "block");
    // }
  });
}
