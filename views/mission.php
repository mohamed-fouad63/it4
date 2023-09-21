<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>الخطه الشهريه</title>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./views/assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./views/assets/css/style2.css">
    <link rel="stylesheet" href="./views/assets/css/layout-rtl2.css">
    <link rel="stylesheet" href="./views/assets/css/plugins/perfect-scrollbar.css">

    <style>
        #main {
            position: relative;
            top: 35px;
        }

        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dt-buttons,
        table thead #filterboxrow {
            display: none
        }

        .form-control,
        .form-select {
            border: 1px solid var(--bs-teal);
        }

        .input-group-text {
            background-color: var(--bs-teal);
            border: 1px solid var(--bs-teal);
        }

        table tr {
            text-align: center;
        }

        .filte_div {
            width: 30rem;
        }

        th.sorting.sorting_desc:before {
            content: "\F145";
            font-family: 'bootstrap-icons';
            position: relative;
            display: block;
            opacity: 1;
            right: 80%;
            line-height: 9px;
            font-size: .9em;
        }

        th.sorting.sorting_asc:after {
            content: "\F124";
            font-family: 'bootstrap-icons';
            position: relative;
            display: block;
            opacity: 1;
            right: 80%;
            line-height: 9px;
            font-size: .9em;
        }

        div.dataTables_processing {
            position: fixed;
            top: 0;
            left: 0;
            margin: 0;
            padding: 400px;
            background-color: #26212133;
            height: 100%;
            width: 100%;
            z-index: 1000
        }

        select * {
            height: 70px;
            font-size: 1.3rem;
        }

        select *:hover {
            color: var(--bs-danger);
        }

        #mission_type_label,
        #mission_date_start_label,
        #mission_date_start,
        #mission_date_end_label,
        #mission_date_end,
        #mission_time,
        #mission_type,
        #misin_cairo_type ,
        #misin_cairo ,
        #badl_raha_label ,
        #badlRahaFormSubOnLine,
        #vactionFormSub,
        #badal_raha_date {
            display: none
        }

        #vaction_div {
            visibility: hidden
        }
    </style>
</head>

<body>

    <div class="pcoded-navbar navbar-collapsed" id="pcoded-navba">
        <?php include './views\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views\layout\header\m-hader.html'; ?>
        <ul class="navbar-nav ">
            <li>
                <div class="d-flex filte_div" id="select_it_name_div" role="search">
                    <select class="form-select" id="select_it_name">
                    </select>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="btn-group add_div">
            </li>
            <li class="btn-group bt_div">
            </li>
            <li class="btn-group lock_mission">
                <!-- <button class="btn disabled" id="mission_lock_btn" title="اغلاق هذا الشهر" ><i class="btn btn-danger bi bi-lock-fill"></i></button> -->
            </li>
            <li class="p-2 info_div">

            </li>
            <li class="p-2">
                <input type="month" class="form-control col-sm-2" id="month_missin" value="<?php echo date('Y-m') ?>">
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include './views\layout\header\user.php'; ?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div id="main">
                <table id="example" class="table table-hover align-middle">
                    <thead id="tablehead">
                        <tr>
                            <th>القائم بالماموريه</th>
                            <th>يوم</th>
                            <th>التاريخ</th>
                            <th>المكتب</th>
                            <th>نوع الماموريه</th>
                            <th>من الساعه</th>
                            <th>حتى الساعه</th>
                            <th>ما تم عمله</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <?php include './views/component/modals/mission/add_mission_modal.php'; ?>
        <!-- start user exit  modal -->
        <?php include './views/component/modals/user_exit.php' ?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include './views/component/modals/user_password_change.php' ?>
        <!-- end user password modal -->
    </div>

    <script src="./views/assets/js/plugins/jquery.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="./views/assets/js/pcoded.min2.js"></script>
    <script src="./views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/buttons.print.js"></script>
    <script src="./views/data_tables/mission.js"></script>
    <script src="./views/js/mission/change_month_miision_it_name.js"></script>
    <script src="./views/js/mission/office_mission.js"></script>
    <script src="./views/js/mission/remove_mission.js"></script>
    <script src="./views/js/mission/add_mission.js"></script>
    <script src="./views/js/global/dismiss_modal_check.js"></script>
    <script src="./views/js/log/change_password.js"></script>
    <script src="./views/js/mission/change_vaction_date.js"></script>
</body>

</html>