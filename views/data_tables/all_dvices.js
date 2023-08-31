var table = $("#example").DataTable({
    bProcessing: true,
    ajax: {
        url: "/it4/ajaxAllDvices",
        method: "post",
        data: function (d) {
            d.auth = "";
        },
        dataSrc: "",
    },
    deferRender: true,
    columnDefs: [
        { width: "5%", targets: 0 },
        { width: "20%", targets: 2 },
        { width: "5%", targets: 4 },
        { width: "20%", targets: 5 },
    ],
    columns: [
        {
            data: "",
            render: function (data, type, row, meta) {
                return meta.row + 1;
            },
        },
        { data: "office_name" },
        { data: "dvice_name" },
        { data: "sn" },
        { data: "ip" },
        {
            data: "",
            render: function (data, type, row) {
                return `${row.note}${row.note_move_to}`;
            },
        },
    ],
    // select: {style: 'multi'},
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
            .addClass("form-control");
        $("thead tr#filterboxrow").css("display", "table-row");
        $("thead tr#filterboxrow th input").addClass("form-control");
        $("table").removeClass("dataTable");
        $("table tbody").addClass("table-success");
    },
});
