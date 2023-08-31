<?php

?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>صلاحيات المستخدمين</title>
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

        tbody tr td:last-of-type button {
            float: left
        }

        .dataTables_info {
            display: inline-block
        }

        .btn:focus {
            outline: none;
            box-shadow: none;
        }

        .icons_auth {}
    </style>
</head>

<body>
    <div class="pcoded-navbar navbar-collapsed">
        <?php include './views\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views\layout\header\m-hader.html'; ?>
        <ul class="navbar-nav ">
        </ul>
        <ul class="navbar-nav ms-auto">
            <li>
                <div class="btn-group bt_div">
                    <button class="btn" tabindex="0" aria-controls="example" data-bs-toggle="modal" data-placement="right" title="اضافه مستخدم" id="" data-bs-target="#Add_USER_Modal">
                        <label class="btn btn-primary">اضافه مستخدم</label>
                    </button>
                </div>
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
            <div class="mt-5">
                <div id="post_group" class="">
                    <fieldset id="0fieldset">
                        <legend id="0count_office">
                            <div class="btn-group">
                            </div>
                        </legend>
                        <table id="users_table" class="table dataTable no-footer" aria-describedby="0_info" style="width: 1463px;">
                            <thead>
                                <tr>
                                    <th>رقم الملف</th>
                                    <th>الاسم</th>
                                    <th>الوظيفه</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                </div>
            </div>
        </div>
        <?php include './views/component/modals/users/add_user_modal.php' ?>
        <?php include './views/component/modals/users/edit_user_modal.php' ?>
        <?php include './views/component/modals/user_exit.php' ?>
        <?php include './views/component/modals/user_password_change.php' ?>
    </div>
    <script src="./views/assets/js/plugins/jquery.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="./views/assets/js/pcoded.min2.js"></script>
    <script src="./views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/buttons.print.js"></script>
    <script src="./views/data_tables/users.js"></script>
    <script src="./views/js/tbl_user/update_user_auth.js"></script>
    <script src="./views/js/tbl_user/reset_user_password.js"></script>
    <script src="./views/js/tbl_user/add_user.js"></script>
    <script src="./views/js/tbl_user/edit_user.js"></script>
    <script src="./views/js/log/change_password.js"></script>
</body>

</html>