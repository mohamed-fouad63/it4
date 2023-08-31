var dvice_office_pc = $("#dvice_office_pc").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInTts?dvice_id=pc",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "date_auth_repair" },
    { data: "auth_repair" },
    {
      data: "",
      render: function (data, type, row) {
        if (Settings.auth_edit_in_tts == 1) {
          edit_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-pencil-square"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_Tts_Modal">
            <label>تعديل البيانات</label>
            </a>
            </li>`;
        } else {
          edit_in_tts = ``;
        }
        if (Settings.auth_replace_dvices == 1) {
          if (row.dvice_name == "HP ProDesk 400 G5 MT") {
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
        if (Settings.auth_resent_in_tts == 1) {
          resent_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-reply-fill"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resen_To_It_Modal">
            <label>اعاده الجهاز لقسم الدعم الفنى</label>
            </a>
            </li>`;
        } else {
          resent_in_tts = ``;
        }
        if (edit_in_tts != "" || replace_dvices != "" || resent_in_tts != "") {
          return `
            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_tts}
                    ${replace_dvices}
                    ${resent_in_tts}
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
  language: {
    zeroRecords: "لا يوجد اجهزه مسحوبه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("#pc_office_count").append($("#dvice_office_pc_info"));
    $("#dvice_office_pc tbody").on("click", ".dropdown-item", function () {
      var data_pc = dvice_office_pc.row($(this).parents("tr")).data();
      $(".office_name").val(data_pc.office_name);
      office_name_from = data_pc.office_name;
      $(".dvice_name").val(data_pc.dvice_name);
      $(".dvice_sn").val(data_pc.sn);
      $(".auth_repair").val(data_pc.auth_repair);
      $(".date_auth_repair").val(data_pc.date_auth_repair);
      $(".damage").val(data_pc.damage);
      $(".in_it_note").val(data_pc.in_it_note);
      $(".dvice_type").val(data_pc.dvice_type);
      $(".dvice_num").val(data_pc.num);
      return (dvice_num = data_pc.count_in_it);
    });
  },
});

var dvice_office_monitor = $("#dvice_office_monitor").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInTts?dvice_id=monitor",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "date_auth_repair" },
    { data: "auth_repair" },
    {
      data: "",
      render: function () {
        if (Settings.auth_edit_in_tts == 1) {
          edit_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-pencil-square"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_Tts_Modal">
            <label>تعديل البيانات</label>
            </a>
            </li>`;
        } else {
          edit_in_tts = ``;
        }
        if (Settings.auth_resent_in_tts == 1) {
          resent_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-reply-fill"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resen_To_It_Modal">
            <label>اعاده الجهاز لقسم الدعم الفنى</label>
            </a>
            </li>`;
        } else {
          resent_in_tts = ``;
        }
        if (
          Settings.auth_edit_in_tts == 1 ||
          Settings.auth_resent_in_tts == 1
        ) {
          return `
            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_tts}
                    ${resent_in_tts}
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
  language: {
    zeroRecords: "لا يوجد شاشات مسحوبه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("monitor_office_count").append($("#dvice_office_monitor_info"));
    $("#dvice_office_monitor tbody").on("click", ".dropdown-item", function () {
      var data_monitor = dvice_office_monitor.row($(this).parents("tr")).data();
      $(".office_name").val(data_monitor.office_name);
      $(".dvice_name").val(data_monitor.dvice_name);
      $(".dvice_sn").val(data_monitor.sn);
      $(".auth_repair").val(data_monitor.auth_repair);
      $(".date_auth_repair").val(data_monitor.date_auth_repair);
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

var dvice_office_printer = $("#dvice_office_printer").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInTts?dvice_id=printer",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "date_auth_repair" },
    { data: "auth_repair" },
    {
      data: "",
      render: function () {
        if (Settings.auth_edit_in_tts == 1) {
          edit_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-pencil-square"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_Tts_Modal">
            <label>تعديل البيانات</label>
            </a>
            </li>`;
        } else {
          edit_in_tts = ``;
        }
        if (Settings.auth_resent_in_tts == 1) {
          resent_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-reply-fill"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resen_To_It_Modal">
            <label>اعاده الجهاز لقسم الدعم الفنى</label>
            </a>
            </li>`;
        } else {
          resent_in_tts = ``;
        }
        if (
          Settings.auth_edit_in_tts == 1 ||
          Settings.auth_resent_in_tts == 1
        ) {
          return `
            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_tts}
                    ${resent_in_tts}
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
  language: {
    zeroRecords: "لا يوجد طابعات مسحوبه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("printer_office_count").append($("#dvice_office_printer_info"));
    $("#dvice_office_printer tbody").on("click", ".dropdown-item", function () {
      var data_printer = dvice_office_printer.row($(this).parents("tr")).data();
      $(".office_name").val(data_printer.office_name);
      $(".dvice_name").val(data_printer.dvice_name);
      $(".dvice_sn").val(data_printer.sn);
      $(".auth_repair").val(data_printer.auth_repair);
      $(".date_auth_repair").val(data_printer.date_auth_repair);
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

var dvice_office_pos = $("#dvice_office_pos").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInTts?dvice_id=pos",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "date_auth_repair" },
    { data: "auth_repair" },
    {
      data: "",
      render: function () {
        if (Settings.auth_edit_in_tts == 1) {
          edit_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-pencil-square"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_Tts_Modal">
            <label>تعديل البيانات</label>
            </a>
            </li>`;
        } else {
          edit_in_tts = ``;
        }
        if (Settings.auth_resent_in_tts == 1) {
          resent_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-reply-fill"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resen_To_It_Modal">
            <label>اعاده الجهاز لقسم الدعم الفنى</label>
            </a>
            </li>`;
        } else {
          resent_in_tts = ``;
        }
        if (
          Settings.auth_edit_in_tts == 1 ||
          Settings.auth_resent_in_tts == 1
        ) {
          return `
            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_tts}
                    ${resent_in_tts}
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
  language: {
    zeroRecords: "لا يوجد نقاط بيع مسحوبه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("pos_office_count").append($("#dvice_office_pos_info"));
    $("#dvice_office_pos tbody").on("click", ".dropdown-item", function () {
      var data_pos = dvice_office_pos.row($(this).parents("tr")).data();
      $(".office_name").val(data_pos.office_name);
      $(".dvice_name").val(data_pos.dvice_name);
      $(".dvice_sn").val(data_pos.sn);
      $(".auth_repair").val(data_pos.auth_repair);
      $(".date_auth_repair").val(data_pos.date_auth_repair);
      $(".damage").val(data_pos.damage);
      $(".in_it_note").val(data_pos.in_it_note);
      $(".dvice_type").val(data_pos.dvice_type);
      $(".dvice_num").val(data_pos.num);
      $(".sub_print_ticket").attr(
        "href",
        "../views/auth_repair.php?dvice_num=" + data_pos.count_in_it + ""
      );
      return (dvice_num = data_pos.count_in_it);
    });
  },
});

var dvice_office_network = $("#dvice_office_network").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInTts?dvice_id=network",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "date_auth_repair" },
    { data: "auth_repair" },
    {
      data: "",
      render: function () {
        if (Settings.auth_edit_in_tts == 1) {
          edit_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-pencil-square"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_Tts_Modal">
            <label>تعديل البيانات</label>
            </a>
            </li>`;
        } else {
          edit_in_tts = ``;
        }
        if (Settings.auth_resent_in_tts == 1) {
          resent_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-reply-fill"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resen_To_It_Modal">
            <label>اعاده الجهاز لقسم الدعم الفنى</label>
            </a>
            </li>`;
        } else {
          resent_in_tts = ``;
        }
        if (
          Settings.auth_edit_in_tts == 1 ||
          Settings.auth_resent_in_tts == 1
        ) {
          return `
            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_tts}
                    ${resent_in_tts}
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
  language: {
    zeroRecords: "لا يوجد اجهزه شبكه مسحوبه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("network_office_count").append($("#dvice_office_network_info"));
    $("#dvice_office_network tbody").on("click", ".dropdown-item", function () {
      var data_network = dvice_office_network.row($(this).parents("tr")).data();
      $(".office_name").val(data_network.office_name);
      $(".dvice_name").val(data_network.dvice_name);
      $(".dvice_sn").val(data_network.sn);
      $(".auth_repair").val(data_network.auth_repair);
      $(".date_auth_repair").val(data_network.date_auth_repair);
      $(".damage").val(data_network.damage);
      $(".in_it_note").val(data_network.in_it_note);
      $(".dvice_type").val(data_network.dvice_type);
      $(".dvice_num").val(data_network.num);
      return (dvice_num = data_network.count_in_it);
    });
  },
});

var dvice_office_postal = $("#dvice_office_postal").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInTts?dvice_id=postal",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "date_auth_repair" },
    { data: "auth_repair" },
    {
      data: "",
      render: function () {
        if (Settings.auth_edit_in_tts == 1) {
          edit_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-pencil-square"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_Tts_Modal">
            <label>تعديل البيانات</label>
            </a>
            </li>`;
        } else {
          edit_in_tts = ``;
        }
        if (Settings.auth_resent_in_tts == 1) {
          resent_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-reply-fill"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resen_To_It_Modal">
            <label>اعاده الجهاز لقسم الدعم الفنى</label>
            </a>
            </li>`;
        } else {
          resent_in_tts = ``;
        }
        if (
          Settings.auth_edit_in_tts == 1 ||
          Settings.auth_resent_in_tts == 1
        ) {
          return `
            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_tts}
                    ${resent_in_tts}
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
  language: {
    zeroRecords: "لا يوجد اجهزه بوستال مسحوبه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("postal_office_count").append($("#dvice_office_postal_info"));
    $("#dvice_office_postal tbody").on("click", ".dropdown-item", function () {
      var data_postal = dvice_office_postal.row($(this).parents("tr")).data();
      $(".office_name").val(data_postal.office_name);
      $(".dvice_name").val(data_postal.dvice_name);
      $(".dvice_sn").val(data_postal.sn);
      $(".auth_repair").val(data_postal.auth_repair);
      $(".date_auth_repair").val(data_postal.date_auth_repair);
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

var dvice_office_other = $("#dvice_office_other").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesInTts?dvice_id=other",
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "damage" },
    { data: "in_it_note" },
    { data: "date_auth_repair" },
    { data: "auth_repair" },
    {
      data: "",
      render: function () {
        if (Settings.auth_edit_in_tts == 1) {
          edit_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-pencil-square"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Edit_In_Tts_Modal">
            <label>تعديل البيانات</label>
            </a>
            </li>`;
        } else {
          edit_in_tts = ``;
        }
        if (Settings.auth_replace_dvices == 1) {
          replace_dvices = `<li class="d-flex align-items-center">
                                <i class="bi bi-arrow-repeat"></i>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Replace_Pices_Modal">
                                <label>استبدال قطع غيار</label>
                                </a>
                                </li>`;
        } else {
          replace_dvices = ``;
        }
        if (Settings.auth_resent_in_tts == 1) {
          resent_in_tts = `<li class="d-flex align-items-center">
            <i class="bi bi-reply-fill"></i>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Resen_To_It_Modal">
            <label>اعاده الجهاز لقسم الدعم الفنى</label>
            </a>
            </li>`;
        } else {
          resent_in_tts = ``;
        }
        if (
          auth_edit_in_tts != "" ||
          auth_replace_dvices != "" ||
          auth_resent_in_tts != ""
        ) {
          return `
            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton1">
                    ${edit_in_tts}
                    ${replace_dvices}
                    ${resent_in_tts}
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
  language: {
    zeroRecords: "لا يوجداجهزه اخرى مسحوبه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {},
  initComplete: function () {
    $("other_office_count").append($("#dvice_office_other_info"));
    $("#dvice_office_other tbody").on("click", ".dropdown-item", function () {
      var data_other = dvice_office_other.row($(this).parents("tr")).data();
      $(".office_name").val(data_other.office_name);
      $(".dvice_name").val(data_other.dvice_name);
      $(".dvice_sn").val(data_other.sn);
      $(".auth_repair").val(data_other.auth_repair);
      $(".date_auth_repair").val(data_other.date_auth_repair);
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
function datatable_ajax_reload() {
  dvice_office_pc.ajax.reload();
  dvice_office_monitor.ajax.reload();
  dvice_office_printer.ajax.reload();
  dvice_office_pos.ajax.reload();
  dvice_office_network.ajax.reload();
  dvice_office_postal.ajax.reload();
  dvice_office_other.ajax.reload();
}
