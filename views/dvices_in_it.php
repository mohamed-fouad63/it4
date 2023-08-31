<?php
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>اجهزه بقسم الدعم الفنى </title>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./views/assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./views/assets/DataTables/Select-1.4.0/css/select.dataTables.css">
    <link rel="stylesheet" href="./views/assets/css/style2.css">
    <link rel="stylesheet" href="./views/assets/css/layout-rtl2.css">
    <link rel="stylesheet" href="./views/assets/css/plugins/perfect-scrollbar.css">
    <style>
        /* */
        fieldset {
            text-align: center;
        }

        .input-group-text {
            background-color: var(--bs-teal);
            border: 1px solid var(--bs-teal);
        }

        .form-control {
            border: 1px solid var(--bs-teal);
        }

        .modal-content {
            border: 1px solid var(--bs-teal);
            border-radius: unset;

        }

        .dropdown .dropdown-menu {
            border: 1px solid var(--bs-teal);
        }

        /* */
        .filte_div {
            width: 30rem;
        }

        thead tr {
            background-color: #8fbc8f33;
        }

        tbody tr td:last-of-type button {
            float: left
        }

        .dataTables_info {
            display: inline-block
        }

        #imagePreview {}

        /* start upload file */
        .wrapper {
            width: 430px;
            background: #fff;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 7px 7px 12px rgba(0, 0, 0, 0.05);
        }

        section .row {
            margin-bottom: 10px;
            background: #E9F0FF;
            list-style: none;
            padding: 15px 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        section .row i {
            color: #6990F2;
            font-size: 30px;
        }

        section .details span {
            font-size: 14px;
        }

        .progress-area1 .row .content {
            width: 100%;
            margin-left: 15px;
        }

        .progress-area1 .details {
            display: flex;
            align-items: center;
            margin-bottom: 7px;
            justify-content: space-between;
        }

        .progress-area1 .content .progress-bar {
            height: 6px;
            width: 100%;
            margin-bottom: 4px;
            background: #fff;
            border-radius: 30px;
        }

        .content .progress-bar .progress {
            height: 100%;
            width: 0%;
            background: #6990F2;
            border-radius: inherit;
        }

        .uploaded-area1 {
            max-height: 232px;
            overflow-y: scroll;
            gap: 5px;
        }

        .uploaded-area1.onprogress {
            max-height: 150px;
        }

        .uploaded-area1::-webkit-scrollbar {
            width: 0px;
        }

        .uploaded-area1 .row .content {
            display: flex;
            align-items: center;
        }

        .uploaded-area1 .row .details {
            display: flex;
            margin-left: 15px;
            flex-direction: column;
        }

        .uploaded-area1 .row .details .size {
            color: #404040;
            font-size: 11px;
        }

        .uploaded-area1 li {
            border: 1px solid var(--bs-teal);
            max-width: 50%;
        }

        .uploaded-area1 i.fa-check {
            font-size: 16px;
        }

        .text-center {
            text-align: center;
        }

        @media print {
            #printTable {
                color: red;
            }
        }
    </style>
</head>

<body>
    <div class="pcoded-navbar navbar-collapsed">
        <?php include './views/layout/aside/nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views/layout/header/m-hader.html'; ?>
        <ul class="navbar-nav ms-auto">
            <li>
                <div class="btn-group bt_div">
                    <a class="btn" type="button" href="#link_pc">
                        <span>
                            <i class="btn btn-info btn-success  bi bi-pc" title="الى الاجهزه"></i>
                        </span>
                    </a>
                    <a class="btn" type="button" href="#link_monitor">
                        <span>
                            <i class="btn btn-info btn-primary bi-display-fill" title="الى الشاشات"></i>
                        </span>
                    </a>
                    <a class="btn" type="button" href="#link_printer">
                        <span>
                            <i class="btn btn-info btn-info bi bi-printer-fill" title="الى الطابعات"></i>
                        </span>
                    </a>
                    <a class="btn" type="button" href="#link_pos">
                        <span>
                            <i class="btn btn-info bi-credit-card-2-back-fill" title="الى ماكينات نقاط البيع"></i>
                        </span>
                    </a>
                    <a class="btn" type="button" href="#link_network">
                        <span>
                            <i class="btn btn-info bi-hdd-network-fill" title="الى اجهزه الشبكه"></i>
                        </span>
                    </a>
                    <a class="btn" type="button" href="#link_postal">
                        <span>
                            <i class="btn btn-info bi-envelope-paper-fill" title="الى اجهزه بوستال"></i>
                        </span>
                    </a>
                    <a class="btn" type="button" href="#link_other">
                        <span>
                            <i class="btn btn-info bi-question-square-fill" title="الى اخرى"></i>
                        </span>
                    </a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li>
                <?php include './views/layout/header/user.php'; ?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="d-flex mt-5">
                <div class="flex-grow-1">
                    <div id="link_pc" style="
    padding: 60px 0 0 0;">
                        <fieldset class="mb-3" id="dvice_office_pc_field" style="/* display:none */">
                            <legend>
                                <i class="bi bi-pc me-2 "></i>
                                <span class="count me-2" id="pc_office_count"></span>اجهزه
                            </legend>
                            <table class="table align-middle table-hover" id="dvice_office_pc" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>اسم المكتب </th>
                                        <th>نوع الجهاز </th>
                                        <th>السريال</th>
                                        <th>العطل</th>
                                        <th>ملاحظات</th>
                                        <th>عن طريق</th>
                                        <th>تاريخ الورود</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </fieldset>
                    </div>
                    <div id="link_monitor" style="
    padding: 60px 0 0 0;">
                        <fieldset class="mb-3" id="dvice_office_monitor_field" style="/* display:none */">
                            <legend>
                                <i class="bi bi-display-fill me-2"></i>
                                <span class="count me-2" id="monitor_office_count"></span>شاشات
                            </legend>
                            <table id="dvice_office_monitor" class="table align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>اسم المكتب </th>
                                        <th>نوع الجهاز </th>
                                        <th>السريال</th>
                                        <th>العطل</th>
                                        <th>ملاحظات</th>
                                        <th>عن طريق</th>
                                        <th>تاريخ الورود</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </fieldset>
                    </div>
                    <div id="link_printer" style="
    padding: 60px 0 0 0;">
                        <fieldset class="mb-3" id="dvice_office_printer_field" style="/* display:none */">
                            <legend>
                                <i class="bi bi-printer-fill me-2"></i>
                                <span class="count me-2" id="printer_office_count"></span>طابعات
                            </legend>
                            <table id="dvice_office_printer" class="table align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>اسم المكتب </th>
                                        <th>نوع الجهاز </th>
                                        <th>السريال</th>
                                        <th>العطل</th>
                                        <th>ملاحظات</th>
                                        <th>عن طريق</th>
                                        <th>تاريخ الورود</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </fieldset>
                    </div>
                    <div id="link_pos" style="
    padding: 60px 0 0 0;">
                        <fieldset class="mb-3" id="dvice_office_pos_field" style="/* display:none */">
                            <legend>
                                <i class="bi bi-credit-card-2-back-fill me-2"></i>
                                <span class="count me-2" id="pos_office_count"></span>ماكينات نقاط بيع
                                <!-- <button type="button" class="btn btn-primary position-relative float-end disabled" onclick="add_dt(this)">
                                    نموذج تسليم نقاط بيع
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="pos_select_info"></span>
                                    </button> -->
                                <div class="btn-group mb-1 ms-1 float-end" role="group">
                                    <button type="button" class="btn btn-secondary disabled reg_to_sub_report" onclick="pos_deliver_moda()" data-bs-toggle="modal" data-bs-target="#Pos_Deliver_Report_Modal">
                                        <span>تسليم V200T</span>
                                        <span class="badge bg-info" id="deliver_pos_num"></span>
                                    </button>
                                    <button type="button" class="btn btn-primary add_btn_deliver_pos" onclick="add_reg_to_sub()"><i class="bi bi-clipboard-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning reg_to_sub_del d-none" onclick="reg_sub_del()"><i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </legend>
                            <table id="dvice_office_pos" class="table align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>اسم المكتب </th>
                                        <th>نوع الجهاز </th>
                                        <th>السريال</th>
                                        <th>العطل</th>
                                        <th>ملاحظات</th>
                                        <th>عن طريق</th>
                                        <th>تاريخ الورود</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </fieldset>
                    </div>
                    <div id="link_network" style="
    padding: 60px 0 0 0;">
                        <fieldset class="mb-3" id="dvice_office_network_field" style="/* display:none */">
                            <legend>
                                <i class="bi bi-hdd-network-fill me-2"></i>
                                <span class="count me-2" id="network_office_count"></span>اجهزه شبكه
                            </legend>
                            <table id="dvice_office_network" class="table align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>اسم المكتب </th>
                                        <th>نوع الجهاز </th>
                                        <th>السريال</th>
                                        <th>العطل</th>
                                        <th>ملاحظات</th>
                                        <th>عن طريق</th>
                                        <th>تاريخ الورود</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </fieldset>
                    </div>
                    <div id="link_postal" style="
    padding: 60px 0 0 0;">
                        <fieldset class="mb-3" id="dvice_office_postal_field" style="/* display:none */">
                            <legend>
                                <i class="bi bi-envelope-paper-fill"></i>
                                <span class="count me-2" id="postal_office_count"></span>اجهزه بوستال
                            </legend>
                            <table id="dvice_office_postal" class="table align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>اسم المكتب </th>
                                        <th>نوع الجهاز </th>
                                        <th>السريال</th>
                                        <th>العطل</th>
                                        <th>ملاحظات</th>
                                        <th>عن طريق</th>
                                        <th>تاريخ الورود</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </fieldset>
                    </div>
                    <div id="link_other" style="
    padding: 60px 0 0 0;">
                        <fieldset class="mb-3" id="dvice_office_other_field" style="/* display:none */">
                            <legend>
                                <i class="bi bi-question-square-fill"></i>
                                <span class="count me-2" id="other_office_count"></span>اخرى
                            </legend>
                            <table id="dvice_office_other" class="table align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>اسم المكتب </th>
                                        <th>نوع الجهاز </th>
                                        <th>السريال</th>
                                        <th>العطل</th>
                                        <th>ملاحظات</th>
                                        <th>عن طريق</th>
                                        <th>تاريخ الورود</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </fieldset>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <?php
        if ($_SESSION['edit_in_it'] == 1) {
            include './views/component/modals/dvices_in_it/edit_in_it_modal.html';
        }
        if ($_SESSION['to_tts'] == 1) {
            include './views/component/modals/dvices_in_it/to_tts_modal.php';
        }
        if ($_SESSION['move_in_it'] == 1) {
            include './views/component/modals/dvices_office/move_to_modal.php';
        }
        if ($_SESSION['resent_in_it'] == 1) {
            include './views/component/modals/dvices_in_it/resend_to_office_modal.php';
        }
        if ($_SESSION['delete_in_it'] == 1) {
            include './views/component/modals/dvices_in_it/delete_modal.php';
        }
        if ($_SESSION['retweet'] == 1) {
            include './views/component/modals/dvices_in_it/replace_pices_modal2.php';
        }
        if ($_SESSION['retweet'] == 1) {
            include './views/component/modals/dvices_in_it/replace_pices_modal.php';
        }
        if ($_SESSION['retweet'] == 1) {
            include './views/component/modals/dvices_in_it/replace_pices_modal3.php';
        } ?>
        <?php include './views/component/modals/dvices_in_it/pos_deliver_report_modal.php'; ?>
        <?php include './views/component/modals/user_exit.php' ?>
        <?php include './views/component/modals/user_password_change.php' ?>
    </div>
    <script src="./views/assets/js/plugins/jquery-3.6.0.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="./views/assets/js/pcoded.min2.js"></script>
    <script src="./views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/buttons.print.js"></script>
    <script src="./views/assets/DataTables/Select-1.4.0/js/dataTables.select.min.js"></script>
    <script>
        var Settings = {
            auth_edit_in_it: '<?= $_SESSION['edit_in_it'] ?>',
            auth_to_tts: '<?= $_SESSION['to_tts'] ?>',
            auth_resent_in_it: '<?= $_SESSION['resent_in_it'] ?>',
            auth_delete_in_it: '<?= $_SESSION['delete_in_it'] ?>',
            auth_replace_dvices: '<?= $_SESSION['retweet'] ?>',
            auth_move_in_it: '<?= $_SESSION['move_in_it'] ?>'
        }
    </script>
    <script src="./views/data_tables/dvices_in_it.js"></script>
    <?php if ($_SESSION['edit_in_it'] == 1) { ?>
        <script src="./views/js/dvices_in_it/edit_in_it.js"></script>
    <?php } ?>
    <?php if ($_SESSION['to_tts'] == 1) { ?>
        <script src="./views/js/dvices_in_it/to_tts.js"></script>
    <?php } ?>
    <?php if ($_SESSION['resent_in_it'] == 1) { ?>
        <script src="./views/js/dvices_in_it/resent_to_office.js"></script>
    <?php } ?>
    <?php if ($_SESSION['delete_in_it'] == 1) { ?>
        <script src="./views/js/dvices_in_it/delete_in_it.js"></script>
    <?php } ?>
    <?php if ($_SESSION['retweet'] == 1) { ?>
        <script src="./views/js/dvices_in_it/replace_pices1.js"></script>
        <script src="./views/js/dvices_in_it/replace_pices2.js"></script>
        <script src="./views/js/dvices_in_it/replace_pices3.js"></script>

    <?php } ?>
    <?php if ($_SESSION['move_in_it'] == 1) { ?>
        <script src="./views/js/dvices_in_it/move_to_in_it.js"></script>
    <?php } ?>
    <script src="./views/js/log/change_password.js"></script>
    <script>
        function reset_radio(e) {
            var ele = document.getElementsByName(e);
            for (var i = 0; i < ele.length; i++)
                ele[i].checked = false;
        }
    </script>
    <script>
        dvice_office_pos.on('select', function(e, dt, type, indexes) {
            if (dvice_office_pos.row(indexes).data().dvice_name == 'VERIFONE V200T') {
                $(".reg_to_sub_report").removeClass('disabled ');
                selectedData = dvice_office_pos.rows('.selected').data().toArray();
                $("#deliver_pos_num").append($('.select-info')).html($('.select-info').text());
            } else {
                dvice_office_pos.row(indexes).deselect();
            };
        }).on('deselect', function(e, dt, type, indexes) {
            selectedData = dvice_office_pos.rows('.selected').data().toArray();
            if (selectedData == 0) {
                $(".reg_to_sub_report").addClass('disabled ');
            }
            $("#deliver_pos_num").append($('.select-info')).html($('.select-info').text());
        });
    </script>
    <script>
        function add_reg_to_sub() {
            dvice_office_pos.select.style('multi');
            $("tbody tr td button.btn").css('visibility', 'hidden');
            $(".reg_to_sub_del").removeClass('d-none');
            $(".add_btn_deliver_pos").addClass('d-none');
        };

        function reg_sub_del() {
            dvice_office_pos.select.style('api');
            $("tbody tr td button.btn").css('visibility', 'visible');
            dvice_office_pos.rows('.selected').deselect();
            $("#dvice_office_pos tbody tr").removeClass('selected');
            selectedData = [];
            $("#pos_deliver_report_table_body").html("");
            $("#deliver_pos_num").text('');
            $(".reg_to_sub_del").addClass('d-none');
            $(".add_btn_deliver_pos").removeClass('d-none');
            $(".reg_to_sub_report").addClass('disabled ');
        };

        function pos_deliver_moda() {
            pos_tr = "";
            if (selectedData.length > 0) {
                $.each(selectedData, function(key, val) {
                    k = 1;
                    key++;
                    pos_tr += `
                <tr>
                <td>${key}<input type='hidden' name='names[${key}]' value='${key}'></td>
                <td>${val.office_name}<input type='hidden' name='names${key}[${k++}]' value='${val.office_name}'></td>
                <td>${val.sn}<input type='hidden' name='names${key}[${k++}]' value='${val.sn}'></td>
                <td>${val.damage}<input type='hidden' name='names${key}[${k++}]' value='${val.damage}' readonly></td>
                <td class="d-none"><?php echo $_SESSION['first_name']; ?><input type='hidden' name='names${key}[${k++}]' value='<?php echo $_SESSION['first_name']; ?>'></td>
                <td>${val.in_it_note}<input type='hidden' name='names${key}[${k++}]' value='${val.in_it_note}' readonly></td>
                </tr>`;
                    key++;
                });
                $("#pos_deliver_report_table_body").html(pos_tr);
            } else {
                $("#pos_deliver_report_table_body").html("");
                alert('حافظه التسليم فارغه');
            }
        };
    </script>
    <script src="./views/js/dvices_in_it/deliver_pos_v200t.js"></script>
</body>

</html>