<?php

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>مجموعات بريديه</title>
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

        table {
            width: 100%
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

        .dataTables_info {
            display: inline-block
        }

        .btn:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="pcoded-navbar navbar-collapsed">
        <?php include './views/layout/aside/nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views/layout/header/m-hader.html'; ?>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="btn-group bt_div">
                    <button class="btn" tabindex="0" aria-controls="example" data-bs-toggle="modal" data-placement="right" title="اضافه مجموعه بريديه" id="" data-bs-target="#Post_Group">
                        <label class="btn btn-primary">اضافه مجموعه جديده</label>
                    </button>
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
            <div class="mt-5">
                <div id="post_group" class="">
                </div>
            </div>
        </div>
        <?php include("./views/component/modals/office_group/add_office_group_modal.php") ?>
        <?php include("./views/component/modals/office_group/edit_office_group_modal.php") ?>
        <?php include("./views/component/modals/office_group/del_office_group_modal.php") ?>
        <?php include("./views/component/modals/office_group/add_post_office_modal.php") ?>
        <?php include("./views/component/modals/office_group/edit_post_office_modal.php") ?>
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
            auth_office_group: '<?= $_SESSION['office_group'] ?>',
            auth_add_office: '<?= $_SESSION['add_office'] ?>',
            auth_edit_office: '<?= $_SESSION['edit_office'] ?>',
        }
    </script>
    <script src="./views/data_tables/office_group.js"></script>
    <script src="./views/js/office/add_office_modal.js"></script>
    <script src="./views/js/office/del_group_modal.js"></script>
    <script src="./views/js/office/edit_group_modal.js"></script>
    <script src="./views/js/office/add_group.js"></script>
    <script src="./views/js/office/edit_group.js"></script>
    <script src="./views/js/office/del_group.js"></script>
    <script src="./views/js/office/add_office.js"></script>
    <script src="./views/js/office/edit_office.js"></script>
    <script src="./views/js/global/dismiss_modal_check.js"></script>
</body>

</html>