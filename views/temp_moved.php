<?php

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>اجهزه منقوله مؤقتا </title>
      <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./views/assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./views/assets/css/style2.css">
    <link rel="stylesheet" href="./views/assets/css/layout-rtl2.css">
    <link rel="stylesheet" href="./views/assets/css/plugins/perfect-scrollbar.css">
    <!-- <link rel="stylesheet" href="../assets/css/all.css"> -->
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

        tbody tr td:last-of-type button{
            float:left
        }
        .dataTables_info {
            display: inline-block
        }
    </style>
</head>

<body>
    <nav class="pcoded-navbar navbar-collapsed">
        <?php include './views/layout/aside/nav.php';?>
    </nav>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views/layout/header/m-hader.html';?>
        <ul class="navbar-nav ">

        </ul>
        <ul class="navbar-nav  ml-auto">
            <li>
                <?php include './views/layout/header/user.php';?>
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
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>من</th>
                                    <th>الى</th>
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
                                    <th>من</th>
                                    <th>الى</th>
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
                                    <th>من</th>
                                    <th>الى</th>
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
                                    <th>من</th>
                                    <th>الى</th>
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
                                    <th>من</th>
                                    <th>الى</th>
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
                                    <th>من</th>
                                    <th>الى</th>
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
                                    <th>من</th>
                                    <th>الى</th>
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
        <!-- start resend dvice modal -->
        <?php if($_SESSION['resent_in_it'] == 1){ 
        include './views/component/modals/dvices_in_it/resend_to_office_modal.php';
        }
         ?>
        <!-- end resend dvice modal -->
        <!-- start to it modal -->
        <?php
        if($_SESSION['to_it'] == 1){
        include './views/component/modals/dvices_office/to_it_modal.php';
        }
         ?>
        <!-- end to it modal -->
        <!-- start move to modal -->
        <?php
        if($_SESSION['move'] == 1){
        include ("./views/component/modals/dvices_office/move_to_modal.php");
        }
         ?>
        <!-- end move to modal -->
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
            auth_move: '<?= $_SESSION['move'] == 1 ?>',
            auth_to_it: '<?= $_SESSION['to_it'] == 1 ?>',
            auth_resent_to_office: '<?= $_SESSION['resent'] ?>'
        }
    </script>
    <script src="./views/data_tables/temp_moved.js"></script>
    <?php if($_SESSION['move'] == 1){ ?>
    <script src="./views/js/temp_moved/move_to.js"></script>
    <script src="./views/js/temp_moved/resent_to_office.js"></script>
    <?php } ?>
    <?php if($_SESSION['to_it'] == 1){ ?>
    <script src="./views/js/temp_moved/to_it.js"></script>
    <?php } ?>
</body>

</html>