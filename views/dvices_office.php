<?php

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>اجهزه مكتب </title>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./views/assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./views/assets/css/plugins/easy-autocomplete.css">
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

        .easy-autocomplete {
            width: 100%
        }
    </style>
</head>

<body>
    <div class="pcoded-navbar navbar-collapsed">
        <?php include dirname(__FILE__) . '..\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views/layout/header/m-hader.html'; ?>
        <ul class="navbar-nav ">
            <li>
                <?php include '.\views\component\search.html'; ?>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li>
                <div class="btn-group bt_div">
                    <?php if ($_SESSION['add_dvice'] == 1) { ?>
                        <button class="btn disabled" tabindex="0" aria-controls="example" data-bs-toggle="modal" data-placement="right" title="اضافه  الجهاز" id="add_dvice" data-bs-target="#Add_dvice_Modal">
                            <i class="btn btn-primary bi bi-plus"></i>
                        </button>
                    <?php } ?>
                    <a class="btn disabled" id="print_dvices" target="blank" tabindex="0" aria-controls="example" data-placement="right" title="طباعه جرد المكتب">
                        <i class="btn btn-warning bi bi-printer"></i>
                    </a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include './views/layout/header/user.php'; ?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="d-flex mt-5">
                <div class="flex-grow-1">
                    <!-- start office deatails -->
                    <fieldset class="mb-3" id="details_offfice_field" style="/* display:none */">
                        <legend><i class="bi bi-info-lg"></i><span class="count me-2"></span></legend>
                        <table id="details_offfice" class="table align-middle table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th colspan='7' class='fs-5'></th>
                                </tr>
                                <tr>
                                    <th>الكود المالى</th>
                                    <th>الكود البريدى</th>
                                    <th> كود بوستال</th>
                                    <th>مجموعه بريد</th>
                                    <th> اسم الدومين</th>
                                    <th>رقم التليفون</th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end office deatails -->
                    <!-- start pc -->
                    <fieldset class="mb-3" id="dvice_office_pc_field" style="/* display:none */">
                        <legend>
                            <i class="bi bi-pc me-2 "></i>
                            <span class="count me-2" id="pc_office_count"></span>اجهزه
                        </legend>
                        <table class="table align-middle table-hover" id="dvice_office_pc" style="width:100%">
                            <thead>
                                <tr>
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>IP</th>
                                    <th>Domain Name</th>
                                    <th>موقفه</th>
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
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>موقفه</th>
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
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>IP</th>
                                    <th>موقفه</th>
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
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>IP</th>
                                    <th>موقفه</th>
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
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>IP</th>
                                    <th>موقفه</th>
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
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>موقفه</th>
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
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>موقفه</th>
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
        <?php
        if ($_SESSION['edit'] == 1) {
            include './views/component/modals/dvices_office/edit_modal_pc.html';
        }
        if ($_SESSION['to_it'] == 1) {
            include './views/component/modals/dvices_office/to_it_modal.php';
        }
        if ($_SESSION['move'] == 1) {
            include './views/component/modals/dvices_office/move_to_modal.php';
        }
        if ($_SESSION['add_dvice'] == 1) {
            include './views/component/modals/dvices_office/add_dvice_modal.php';
        }
        include './views/component/modals/user_exit.php';
        include './views/component/modals/user_password_change.php';
        ?>
    </div>
    <script src="./views/assets/js/plugins/jquery.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="./views/assets/js/plugins/jquery.easy-autocomplete.min.js"></script>
    <script src="./views/assets/js/pcoded.min2.js"></script>
    <script src="./views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/buttons.print.js"></script>
    <script src="./views/js/dvices_office/live_search.js"></script>
    <script src="./views/js/log/change_password.js"></script>
    <script>
        var Settings = {
            dropdown_dvieces_office_url: `<?php include './views/component/dropdown_dvieces_office.php' ?>`
        }
    </script>
    <script src="./views/data_tables/dvices_office.js"></script>
    <?php if ($_SESSION['edit'] == 1) { ?>
        <script src="./views/js/dvices_office/edit_dvice.js"></script>
    <?php }
    if ($_SESSION['to_it'] == 1) { ?>
        <script src="./views/js/dvices_office/to_it.js"></script>
    <?php }
    if ($_SESSION['add_dvice'] == 1) { ?>
        <script src="./views/js/global/dismiss_modal_check.js"></script>
        <script src="./views/js/dvices_office/add_dvice.js"></script>
    <?php }
    if ($_SESSION['move'] == 1) { ?>
        <script src="./views/js/dvices_office/move_to.js"></script>
    <?php } ?>
</body>

</html>