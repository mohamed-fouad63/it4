<?php

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>سجل الصيانه</title>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./views/assets/DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="./views/assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./views/assets/css/style2.css">
    <link rel="stylesheet" href="./views/assets/css/layout-rtl2.css">
    <!-- <link rel="stylesheet" href="./views/assets/DataTables/FixedHeader-3.2.3/css/fixedHeader.dataTables.css"> -->
    <link rel="stylesheet" href="./views/assets/css/plugins/perfect-scrollbar.css">
    <style>
        /* table {
  text-align: left;
  position: relative;
  border-collapse: collapse;
} */
        /* table thead {
    top: 60px;
    position: fixed;
    overflow: hidden;
    height: 92.1875px;
    left: 25px;
    z-index: 2;
    width: 1290.75px !important;
} */
        #main {
            position: relative;
            top: 35px;
        }

        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dt-buttons,
        table thead #filterboxrow {
            display: none
        }

        .form-control {
            border: 1px solid var(--bs-teal);
        }

        thead tr {
            /* background-color: #8fbc8f33; */
        }

        thead #filterboxrow {
            display: none
        }

        table tbody tr td:nth-child(1) {
            width: 7%;
        }

        .filte_div {
            width: 30rem;
        }

        .fixedTableHeader {
            position: sticky;
            top: 51px;
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
    </style>
</head>

<body>

    <div class="pcoded-navbar navbar-collapsed">
        <?php include './views\layout\aside\nav.php';?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views\layout\header\m-hader.html';?>
        <ul class="navbar-nav ">
            <li>
                <div class="d-flex filte_div" role="search"></div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li>
                <div class="btn-group bt_div"></div>
            </li>
            <ul class="navbar-nav ms-auto">
                <li>
                    <div class="p-2 info_div"></div>
                </li>
            </ul>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include './views\layout\header\user.php';?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div id="main">
                <table id="repair_dvices" class="table table-hover" style="width:100%">
                    <thead id="tablehead">
                        <tr id="filterboxrow">
                            <th></th>
                            <th>اسم المكتب</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>عن طريق</th>
                            <th>العطل</th>
                            <th>ملاحظات</th>
                            <th>موقفه</th>
                            <th>صادر عن طريق</th>
                            <th></th>
                        </tr>
                        <tr id="">
                            <th>اسم المكتب</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>تاريخ الورود</th>
                            <th>عن طريق</th>
                            <th>العطل</th>
                            <th>ملاحظات</th>
                            <th>موقفه</th>
                            <th>صادر عن طريق</th>
                            <th>تاريخ التصدير</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
                <!-- start user exit  modal -->
        <?php include './views/component/modals/user_exit.php'?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include './views/component/modals/user_password_change.php'?>
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
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
    <script src="./views/assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="./views/js/log/change_password.js"></script>
    <script src="./views/data_tables/repair_dvices.js"></script>
</body>

</html>