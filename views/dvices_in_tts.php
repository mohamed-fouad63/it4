<?php

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>اجهزه بقطاع الدعم الفنى او مسحوبه</title>
      <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./views/assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
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

        .nav-link:hover,
        .nav-link:focus {
            color: unset;
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
    </style>
</head>

<body>
    <div class="pcoded-navbar navbar-collapsed">
        <?php include './views/layout/aside/nav.php';?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <?php include './views/layout/header/m-hader.html'; ?>
        <ul class="navbar-nav ">
        </ul>
        <ul class="navbar-nav  ml-auto">
            <li>
                <?php include './views/layout/header/user.php'; ?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="d-flex mt-5">
                <div class="flex-grow-1">
                    <!-- start pc -->
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
                                    <th>التاريخ</th>
                                    <th>رقم الاذن</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end pc -->
                    <!-- srart monitor -->
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
                                    <th>التاريخ</th>
                                    <th>رقم الاذن</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end montor -->
                    <!-- start printer -->
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
                                    <th>التاريخ</th>
                                    <th>رقم الاذن</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end printer -->
                    <!-- start pos -->
                    <fieldset class="mb-3" id="dvice_office_pos_field" style="/* display:none */">
                        <legend>
                            <i class="bi bi-paypal me-2"></i>
                            <span class="count me-2" id="pos_office_count"></span>ماكينات نقاط بيع
                        </legend>
                        <table id="dvice_office_pos" class="table align-middle table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>اسم المكتب </th>
                                    <th>نوع الجهاز </th>
                                    <th>السريال</th>
                                    <th>العطل</th>
                                    <th>ملاحظات</th>
                                    <th>التاريخ</th>
                                    <th>المستلم</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end pos -->
                    <!-- strat network -->
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
                                    <th>التاريخ</th>
                                    <th>رقم الاذن</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end network -->
                    <!-- start postal -->
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
                                    <th>التاريخ</th>
                                    <th>رقم الاذن</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end postal -->
                    <!-- start other -->
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
                                    <th>التاريخ</th>
                                    <th>رقم الاذن</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end other -->
                    <div class="clearfix"></div>
                    <!-- start footer -->
                    <!--<footer>-->
                </div>
            </div>
        </div>
    </div>
    <div>
        <!-- start edit modal -->
        <?php
        if($_SESSION['edit_in_tts']){
        include './views/component/modals/dvices_in_tts/edit_in_tts_modal.php';
        } ?>
        <!-- end edit modal -->
        <!-- start replace dvice modal -->
        <?php
        if($_SESSION['retweet'] == 1){
        include './views/component/modals/dvices_in_tts/replace_pices_modal.php';
        include './views/component/modals/dvices_in_tts/replace_pices_modal2.php';
         } ?>
        <!-- end replace dvice modal -->
        <!-- start resend dvice modal -->
        <?php
        if($_SESSION['resent_in_tts']){
        include './views/component/modals/dvices_in_tts/resend_to_it_modal.php';
        } ?>
        <!-- end resend dvice modal -->
        <?php include("./views/component/modals/user_exit.php") ?>
        <?php include("./views/component/modals/user_password_change.php") ?>
    </div>
    <script src="./views/assets/js/plugins/jquery.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="./views/assets/js/pcoded.min2.js"></script>
    <script src="./views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/buttons.print.js"></script>
    <script src="./views/js/log/change_password.js"></script>
        <script>
        var Settings = {
            auth_edit_in_tts: '<?= $_SESSION['edit_in_tts'] ?>',
            auth_replace_dvices: '<?= $_SESSION['retweet'] ?>',
            auth_resent_in_tts: '<?= $_SESSION['resent_in_tts'] ?>'
        }
    </script>
    <script src="./views/data_tables/dvices_in_tts.js"></script>
        <?php
        if($_SESSION['edit_in_tts']){ ?>
        <script src="./views/js/dvices_in_tts/edit_in_tts.js"></script>
        <?php } ?>
        <?php
        if($_SESSION['retweet'] == 1){ ?>
        <script src="./views/js/dvices_in_tts/replace_pices1.js"></script>
        <script src="./views/js/dvices_in_tts/replace_pices2.js"></script>
         <?php } ?>
        <?php
        if($_SESSION['resent_in_tts']){ ?>
        <script src="./views/js/dvices_in_tts/resent_to_it.js"></script>
        <?php } ?>
        <script>
        function reset_radio(e) {
            var ele = document.getElementsByName(e);
            for (var i = 0; i < ele.length; i++)
                ele[i].checked = false;
        }
    </script>
</body>

</html>