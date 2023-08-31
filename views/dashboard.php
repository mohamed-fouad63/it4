<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>قاعده بيانات دعم فنى المناطق</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="./views/assets/images/it1.svg" alt="" class="logo" type="image/x-icon">
    <!-- <link rel="stylesheet" href="/views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css"> -->
    <link rel="stylesheet" href="./views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./views/assets/DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="./views/assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./views/assets/css/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="./views/assets/css/style2.css">
    <link rel="stylesheet" href="./views/assets/css/layout-rtl2.css">
    <style>
        .dvices_count .pc {
            color: rgb(253 0 0);
            background-color: rgba(253 0 0 /20%);
        }

        .dvices_count .pc_list {
            background-color: rgba(253 0 0 /8%);
        }

        .dvices_count .monitor {
            color: rgb(220 53 69);
            background-color: rgba(220 53 69 /20%);
        }

        .dvices_count .monitor_list {
            background-color: rgba(220 53 69 /8%);
        }

        .dvices_count .printer {
            color: rgb(253 126 20);
            background-color: rgba(253 126 20 /20%);
        }

        .dvices_count .printer_list {
            background-color: rgba(253 126 20 /8%);
        }

        .dvices_count .pos {
            color: rgb(25 135 84);
            background-color: rgb(25 135 84 / 20%);
        }

        .dvices_count .pos_list {
            background-color: rgb(25 135 84 / 8%);
        }

        .dvices_count .scanner {
            color: rgb(32 201 151);
            background-color: rgba(32 201 151 /20%);
        }

        .dvices_count .scanner_list {
            background-color: rgba(32 201 151 /8%);
        }

        .dvices_count .parcode_printer {
            color: rgb(0 147 177);
            background-color: rgba(0 147 177 /20%);
        }

        .dvices_count .parcode_printer_list {
            background-color: rgba(0 147 177 /8%);
        }

        .dvices_count .weighter {
            color: rgb(92 145 45);
            background-color: rgba(92 145 45 /20%);
        }

        .dvices_count .weighter_list {
            background-color: rgba(92 145 45 /8%);
        }

        .dvices_count .displaying {
            color: rgb(123 153 7);
            background-color: rgba(123 153 7 /20%);
        }

        .dvices_count .displaying_list {
            background-color: rgba(123 153 7 /8%);
        }

        .dvices_count .network {
            color: rgb(172 153 7);
            background-color: rgba(172 153 7 /20%);
        }

        .dvices_count .network_list {
            background-color: rgba(172 153 7 /8%);
        }

        .card-title {
            color: #8f4545;
        }
    </style>


</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <div class="navbar-collapsed pcoded-navbar" id="pcoded-navba">
        <?php include dirname(__FILE__) . '..\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views/layout/header/m-hader.html'; ?>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include './views/layout/header/user.php'; ?>
            </li>
        </ul>
    </header>
    <!-- [ Header ] end -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <?php if ($_SESSION['all_dvices']) { ?>
                <div class="mt-5 mb-3">
                    <span class="p-3 badge btn-warning text-dark fs-5">احصائيات</span>
                </div>
                <!-- [ Main Content ] start -->
                <div id="main">
                    <div id="pills-tabContent">
                        <?php include dirname(__FILE__) . '..\layout\main\page-body\count-dvices.php'; ?>
                    </div>
                    <div class="mt-5 mb-3">
                        <span class="p-3 badge btn-warning text-dark fs-5">متابعه القاعده</span>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">اجماليات اجهزه المكاتب</h4>
                                    <p class="card-text">صفحه اجماليات اجهزه الحاسب و الشاشات و الطابعات و ماكينات نقاط البيع و اجهز بوستال قرين كل وحده بريديه مما يساعد فى اتخاذ القرارات</p>
                                    <a href="\it4\OfficesDvicesReport" target="_blank" class="btn btn-success">اضغط هنا</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">توافق اجهزه بوستال</h4>
                                    <p class="card-text">صفحه توافق اجهزه بوستال تساعد فى معرفه احتياجات المنافذ البريديه من قوارئ باركود و طابعات باركود و موازين اليكترونيه و شاشات عرض العملاء او وجود عدد زائد من احد الانواع</p>
                                    <a href="\it4\postalDvicesComptaible" target="_blank" class="btn btn-success">اضغط هنا</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">توافق اجهزه الحاسب مع الشاشات</h4>
                                    <p class="card-text">صفحه توافق اجهزه الحاسب مع الشاشات تساعد فى معرفه الوحدات البريديه التى تزيد فيها عدد الشاشات عن عدد اجهزه الحاسب الالى او العكس</p>
                                    <a href="\it4\pcsMonitorsComptaible" target="_blank" class="btn btn-success">اضغط هنا</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">سريالات الاجهزه المكرره</h4>
                                    <p class="card-text">صفحه سريالات الاجهزه المكرره تساعد فى ضمان عدم تكرار سريالات الاجهزه</p>
                                    <a href="/it4/repeatSn" target="_blank" class="btn btn-success">اضغط هنا</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- [ Main Content ] end -->
        </div>
        <!-- start user exit  modal -->
        <?php include dirname(__FILE__) . '../component/modals/user_exit.php' ?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include dirname(__FILE__) . '../component/modals/user_password_change.php' ?>
        <!-- end user password modal -->
    </div>

    <!-- Required Js -->
    <script src="./views/assets/js/plugins/jquery.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="./views/assets/js/plugins/jquery.easy-autocomplete.min.js"></script>
    <script src="./views/assets/js/pcoded.min2.js"></script>
    <script src="./views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/buttons.print.js"></script>
    <script src="./views/js/log/change_password.js"></script>
    <?php
    if ($_SESSION['all_dvices']) { ?>
        <script src="./views/js/office/countOfficeNameByType.js"></script>
        <script src="./views/data_tables/dashboard.js"></script>
    <?php } ?>

</body>

</html>