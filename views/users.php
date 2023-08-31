<?php

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>اجهزه كل المكاتب</title>
    <link rel="icon" href="../../../it2/assets/images/it1.svg" type="image/x-icon" />
    {{baseLinkCss}}
    {{PageCss}}

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

        .form-control {
            border: 1px solid var(--bs-teal);
        }

        table tr {
            text-align: center;
        }

        .filte_div {
            width: 30rem;
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
    <div class="navbar-collapsed pcoded-navbar">
        <?php include '../it4/views\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include '../it4/views\layout\header\m-hader.html'; ?>
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
                <?php include '../it4/views\layout\header\user.php'; ?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div id="main">
                <table id="example" class="table table-hover" style="width:100%">
                    <thead id="tablehead">
                        <tr id="filterboxrow">
                            <th> #</th>
                            <th> المكتب</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>IP</th>
                            <th>موقفه</th>
                        </tr>
                        <tr>
                            <th> #</th>
                            <th> المكتب</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>IP</th>
                            <th>موقفه</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <?php include '../it4/views/component/modals/user_exit.php' ?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include '../it4/views/component/modals/user_password_change.php' ?>
        <!-- end user password modal -->
    </div>
    {{baseLinkJs}}
    {{PageJs}}
</body>

</html>