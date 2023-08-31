/* start data table office details */
var details_offfice = $("#details_offfice").DataTable({
  ajax: {
    url: "/it4/ajaxOfficesDetails",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "money_code" },
    { data: "post_code" },
    { data: "postal_code" },
    { data: "post_group" },
    { data: "domain_name" },
    { data: "tel" },
  ],
  dom: "rt",
  paging: false,
  language: {
    zeroRecords: "ابحث باسم المكتب او الكود المالى او البريدى او كود بوستال",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) {
    $("#details_offfice thead tr:first-of-type th").text(
      details_offfice.row().data().office_name
    );
    return (office_name = details_offfice.row().data().office_name);
  },
  initComplete: function () { },
});
/* end data table office details */

/* start data table pc  */
var dvice_office_pc = $("#dvice_office_pc").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesOfficePc",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "ip" },
    { data: "pc_doman_name" },
    {
      data: "note",
      render: function (data, type, row) {
        return row.note + "" + row.note_move_to;
      },
    },
    {
      data: "",
      render: function (data, type, row) {
        if (row.note != "" || row.note_move_to != "") {
          return "";
        } else {
          return `
                    ${Settings.dropdown_dvieces_office_url}
                `;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "لا يوجد اجهزه مدرجه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#pc_office_count").append($("#dvice_office_pc_info"));
    $("#dvice_office_pc tbody").on("click", ".dropdown-item", function () {
      $("#ip_domain").css("display", "flex");
      $("#dvice_ip_label").css("visibility", "visible");
      $("#dvice_ip_label").css("display", "flex");
      $("#dvice_ip").css("visibility", "visible");
      $("#dvice_ip").css("display", "flex");
      $("#pc_domian_name_label").css("visibility", "visible");
      $("#dvice_ip").css("display", "flex");
      $("#pc_domian_name_label").css("display", "flex");
      $("#pc_domian_name").css("visibility", "visible");
      $("#pc_domian_name").css("display", "flex");
      var data_pc = dvice_office_pc.row($(this).parents("tr")).data();
      $(".office_name").val(data_pc.office_name);
      office_name = data_pc.office_name;
      $(".dvice_name").val(data_pc.dvice_name);
      $(".dvice_sn").val(data_pc.sn);
      $(".dvice_ip").val(data_pc.ip);
      $(".pc_domian_name").val(data_pc.pc_doman_name);
      $(".dvice_num").val(data_pc.num);
      $(".dvice_id").val(data_pc.id);
      $(".dvice_type").val(data_pc.dvice_type);
      return (divce_num = data_pc.num);
    });
  },
});
/* end data table pc  */

/* start data table monitor  */
var dvice_office_monitor = $("#dvice_office_monitor").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesOfficeMonitor",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    {
      data: "note",
      render: function (data, type, row) {
        return row.note + "" + row.note_move_to;
      },
    },
    {
      data: "",
      render: function (data, type, row) {
        if (row.note != "" || row.note_move_to != "") {
          return "";
        } else {
          return `
                    ${Settings.dropdown_dvieces_office_url}
                `;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "لا يوجد شاشات مدرجه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#monitor_office_count").append($("#dvice_office_monitor_info"));
    $("#dvice_office_monitor tbody").on("click", ".dropdown-item", function () {
      $("#ip_domain").css("display", "none");
      $("#dvice_ip_label").css("visibility", "hidden");
      $("#dvice_ip").css("visibility", "hidden");
      $("#pc_domian_name_label").css("visibility", "hidden");
      $("#pc_domian_name").css("visibility", "hidden");
      var data_monitor = dvice_office_monitor.row($(this).parents("tr")).data();
      $(".office_name").val(data_monitor.office_name);
      $(".dvice_name").val(data_monitor.dvice_name);
      $(".dvice_sn").val(data_monitor.sn);
      $(".dvice_id").val(data_monitor.id);
      $(".dvice_type").val(data_monitor.dvice_type);
      return (divce_num = data_monitor.num);
    });
  },
});
/* end data table monitor  */

/* start data table printer  */
var dvice_office_printer = $("#dvice_office_printer").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesOfficePrinter",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "ip" },
    {
      data: "note",
      render: function (data, type, row) {
        return row.note + "" + row.note_move_to;
      },
    },
    {
      data: "",
      render: function (data, type, row) {
        if (row.note != "" || row.note_move_to != "") {
          return "";
        } else {
          return `
                    ${Settings.dropdown_dvieces_office_url}
                `;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "لا يوجد طابعات مدرجه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#printer_office_count").append($("#dvice_office_printer_info"));
    $("#dvice_office_printer tbody").on("click", ".dropdown-item", function () {
      $("#dvice_ip_label").css("visibility", "visible");
      $("#dvice_ip").css("visibility", "visible");
      $("#ip_domain").css("display", "flex");
      $("#pc_domian_name_label").css("visibility", "hidden");
      $("#pc_domian_name").css("visibility", "hidden");
      var data_printer = dvice_office_printer.row($(this).parents("tr")).data();
      $(".office_name").val(data_printer.office_name);
      office_name = data_printer.office_name;
      $(".dvice_name").val(data_printer.dvice_name);
      $(".dvice_sn").val(data_printer.sn);
      $(".dvice_ip").val(data_printer.ip);
      $(".dvice_id").val(data_printer.id);
      $(".dvice_type").val(data_printer.dvice_type);
      return (divce_num = data_printer.num);
    });
  },
});
/* end data table printer  */

/* start data table pos  */
var dvice_office_pos = $("#dvice_office_pos").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesOfficePos",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "ip" },
    {
      data: "note",
      render: function (data, type, row) {
        return row.note + "" + row.note_move_to;
      },
    },
    {
      data: "",
      render: function (data, type, row) {
        if (row.note != "" || row.note_move_to != "") {
          return "";
        } else {
          return `
                    ${Settings.dropdown_dvieces_office_url}
                `;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "لا يوجد نقاط بيع مدرجه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#pos_office_count").append($("#dvice_office_pos_info"));
    $("#dvice_office_pos tbody").on("click", ".dropdown-item", function () {
      $("#dvice_ip_label").css("visibility", "visible");
      $("#dvice_ip").css("visibility", "visible");
      $("#ip_domain").css("display", "flex");
      $("#pc_domian_name_label").css("visibility", "hidden");
      $("#pc_domian_name").css("visibility", "hidden");
      var data_pos = dvice_office_pos.row($(this).parents("tr")).data();
      $(".office_name").val(data_pos.office_name);
      office_name = data_pos.office_name;
      $(".dvice_name").val(data_pos.dvice_name);
      $(".dvice_sn").val(data_pos.sn);
      $(".dvice_ip").val(data_pos.ip);
      $(".dvice_id").val(data_pos.id);
      $(".dvice_type").val(data_pos.dvice_type);
      return (divce_num = data_pos.num);
    });
  },
});
/* end data table pos  */

/* start data table network  */
var dvice_office_network = $("#dvice_office_network").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesOfficeNetwork",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    { data: "ip" },
    {
      data: "note",
      render: function (data, type, row) {
        return row.note + "" + row.note_move_to;
      },
    },
    {
      data: "",
      render: function (data, type, row) {
        if (row.note != "" || row.note_move_to != "") {
          return "";
        } else {
          return `
                    ${Settings.dropdown_dvieces_office_url}
                `;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "لا يوجد اجهزه شبكه مدرجه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#network_office_count").append($("#dvice_office_network_info"));
    $("#dvice_office_network tbody").on("click", ".dropdown-item", function () {
      $("#dvice_ip_label").css("visibility", "visible");
      $("#dvice_ip").css("visibility", "visible");
      $("#pc_domian_name_label").css("visibility", "hidden");
      $("#pc_domian_name").css("visibility", "hidden");
      $("#ip_domain").css("display", "flex");
      var data_network = dvice_office_network.row($(this).parents("tr")).data();
      $(".office_name").val(data_network.office_name);
      office_name = data_network.office_name;
      $(".dvice_name").val(data_network.dvice_name);
      $(".dvice_sn").val(data_network.sn);
      $(".dvice_ip").val(data_network.ip);
      $(".dvice_id").val(data_network.id);
      $(".dvice_type").val(data_network.dvice_type);
      return (divce_num = data_network.num);
    });
  },
});
/* end data table network  */

/* start data table postal  */
var dvice_office_postal = $("#dvice_office_postal").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesOfficePostal",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    {
      data: "note",
      render: function (data, type, row) {
        return row.note + "" + row.note_move_to;
      },
    },
    {
      data: "",
      render: function (data, type, row) {
        if (row.note != "" || row.note_move_to != "") {
          return "";
        } else {
          return `
                    ${Settings.dropdown_dvieces_office_url}
                `;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "لا يوجد اجهزه بوستال مدرجه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  initComplete: function () {
    $("#postal_office_count").append($("#dvice_office_postal_info"));
    $("#dvice_office_postal tbody").on("click", ".dropdown-item", function () {
      $("#dvice_ip_label").css("visibility", "visible");
      $("#dvice_ip").css("visibility", "visible");
      $("#pc_domian_name_label").css("visibility", "hidden");
      $("#pc_domian_name").css("visibility", "hidden");
      $("#ip_domain").css("display", "none");
      var data_postal = dvice_office_postal.row($(this).parents("tr")).data();
      $(".office_name").val(data_postal.office_name);
      office_name = data_postal.office_name;
      $(".dvice_name").val(data_postal.dvice_name);
      $(".dvice_sn").val(data_postal.sn);
      $(".dvice_ip").val(data_postal.ip);
      $(".dvice_id").val(data_postal.id);
      $(".dvice_type").val(data_postal.dvice_type);
      return (divce_num = data_postal.num);
    });
  },
});
/* end data table postal  */
/* start data table other  */
var dvice_office_other = $("#dvice_office_other").DataTable({
  ajax: {
    url: "/it4/ajaxDvicesOfficeOther",
    method: "post",
    data: {
      input_search: function () {
        var input_search = $("#input_search").val();
        return input_search;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "dvice_name" },
    { data: "sn" },
    {
      data: "note",
      render: function (data, type, row) {
        return row.note + " " + row.note_move_to;
      },
    },
    {
      data: "",
      render: function (data, type, row) {
        if (row.note != "" || row.note_move_to != "") {
          return "";
        } else {
          return `
                    ${Settings.dropdown_dvieces_office_url}
                `;
        }
      },
    },
  ],
  dom: "irt",
  paging: false,
  language: {
    zeroRecords: "لا يوجد عهد اخرى مدرجه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  rowCallback: function (row, data) { },
  fnDrawCallback: function () { },
  initComplete: function (settings, json) {
    $("#other_office_count").append($("#dvice_office_other_info"));
    $("#dvice_office_other tbody").on("click", ".dropdown-item", function () {
      $("#dvice_ip_label").css("visibility", "hidden");
      $("#dvice_ip").css("visibility", "hidden");
      $("#pc_domian_name_label").css("visibility", "hidden");
      $("#pc_domian_name").css("visibility", "hidden");
      $("#ip_domain").css("display", "none");
      var data_other = dvice_office_other.row($(this).parents("tr")).data();
      $(".office_name").val(data_other.office_name);
      office_name = data_other.office_name;
      $(".dvice_name").val(data_other.dvice_name);
      $(".dvice_sn").val(data_other.sn);
      $(".dvice_id").val(data_other.id);
      $(".dvice_type").val(data_other.dvice_type);
      return (divce_num = data_other.num);
    });
  },
});
/* end data table other  */
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
