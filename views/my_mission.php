<?php

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>مامورياتى</title>
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

        table tbody tr td:nth-child(1) {}

        table tr {
            text-align: center;
        }

        table tbody tr td:nth-child(3) {}

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

        select * {}

        .card-body {
            background-color: var(--bs-teal);
            min-height: 80px;
        }

        #mission_date_end_label,
        #mission_date_end,
        #first_form,
        #second_form {
            display: none
        }

        .form-check-input[type=checkbox] {
            height: 25px;
            width: 25px
        }
    </style>
</head>

<body>

    <div class="pcoded-navbar navbar-collapsed" id="pcoded-navba">
        <?php include './views\layout\aside\nav.php';?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views\layout\header\m-hader.html';?>
        <ul></ul>
        <ul class="navbar-nav">
            <li class="btn-group add_div">
            </li>
            <li class="btn-group bt_div">
            </li>
            <li class="p-2 info_div">
            </li>
            <li class="p-2">
                <input type="month" class="form-control col-sm-2" id="month_missin" value="<?php echo date('Y-m') ?>">
            </li>
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
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <?php include './views/component/modals/user_exit.php'?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include './views/component/modals/user_password_change.php'?>
        <!-- end user password modal -->
    </div>
    <script>var Settings = {it_id: '<?= $_SESSION['id'] ?>',}</script>
    <script src="./views/assets/js/plugins/jquery.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="./views/assets/js/pcoded.min2.js"></script>
    <script src="./views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/data_tables/my_mission.js"></script>
    <script src="./views/js/log/change_password.js"></script>
</body>

</html>