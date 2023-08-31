<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>تسجيل الطرود الصادره</title>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./views/assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./views/assets/css/plugins/easy-autocomplete.css">
    <link rel="stylesheet" href="./views/assets/css/style2.css">
    <link rel="stylesheet" href="./views/assets/css/layout-rtl2.css">
    <link rel="stylesheet" href="./views/assets/css/plugins/perfect-scrollbar.css">
    <style>
        #main {
            position: relative;
            top: 35px;
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

        table tbody tr td:nth-child(2) {}

        table tbody tr td:nth-child(3) {}


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

        .reg_parcel_to_sub_container {
            position: relative;
            overflow: auto;
            width: 550px;
            height: 215px;
        }

        #czcMask {
            display: none
        }

        .easy-autocomplete {
            width: 100%
        }
    </style>
</head>

<body>

    <div class="pcoded-navbar navbar-collapsed" id="pcoded-navba">
        <?php include './views\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include './views\layout\header\m-hader.html'; ?>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include './views\layout\header\user.php'; ?>
            </li>

        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div id="main">

                <div class="row">
                    <div class="col-6">
                        <fieldset>
                            <legend>بيانات تصدير الطرد</legend>
                            <div id="reg_parcel_to_form">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" id="inputGroupSelect01">التاريخ</label>
                                    <input type="date" class="form-control col-sm-6  me-3" id="date_reg_parcel_to" readonly value="<?php echo date('Y-m-d'); ?>">
                                    <select class="input-group-text" id="send_to_by">
                                        <option value="barcode" selected>بالمسجل</option>
                                        <!-- <option value="hand">بيد</option> -->
                                    </select>
                                    <input type="text" id="czc" placeholder="RR123456789EG" class="form-control col-sm-6 masked" data-charset="__XXXXXXXXX__" style="text-transform:uppercase" />
                                    <input type="text" id="hand" class="form-control col-sm-6" style="display:none" />
                                </div>
                                <div class="input-group d-flex flex-nowrap mb-3">
                                    <label class="input-group-text col-sm-3">الراسل</label>
                                    <input type="text" class="form-control col-sm-9" id="name_reg_parcel_to">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text col-sm-3">الموضوع</label>
                                    <textarea type="search" class="form-control col-sm-9" id="sub_reg_parcel_to" style="height: 110px;"></textarea>

                                </div>
                                <div class="mx-auto w-25">
                                    <button class="btn btn-primary" id="add_reg_parcel_to_btn"><i class="bi bi-plus"></i></button>
                                    <button class="btn btn-success" id="edit_reg_parcel_to_btn" style="display:none" value=""><i class="bi bi-pencil-square"></i></button>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-6">
                        <fieldset>
                            <legend>
                                ادخال سريع
                                <span class="dropdown">
                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <div class="d-flex">
                                            <input type="text" class="input_reg_parcel_to_sub ms-2">
                                            <button class="btn btn-success append_reg_parcel_to_sub ms-2"><i class="bi bi-check-lg"></i></button>
                                            <button class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                                        </div>
                                    </ul>
                                </span>
                            </legend>
                            <div class="reg_parcel_to_sub_container border border-success">
                                <div class="d-flex align-content-start flex-wrap pt-1">
                                    <?php
                                    // $reg_parcel_to_sub_json = '../jsons/'.$db.'/reg_parcel_to_sub.json';
                                    // if (file_exists($reg_parcel_to_sub_json)) {
                                    //     $reg_parcel_in_sub = file_get_contents($reg_parcel_to_sub_json);
                                    // } else {
                                    //     file_put_contents($reg_parcel_to_sub_json, '[]');
                                    //      mkdir('../jsons/'.$db.'', 0777, true);
                                    //     $reg_parcel_in_sub = file_get_contents($reg_parcel_to_sub_json);
                                    // }

                                    $reg_to_sub_json = './views/jsons/' . $_SESSION['db'] . '/';
                                    if (is_dir($reg_to_sub_json)) {
                                        if (is_file($reg_to_sub_json . 'reg_parcel_to_sub.json')) {
                                            $reg_to_sub = file_get_contents($reg_to_sub_json . 'reg_parcel_to_sub.json');
                                        } else {
                                            file_put_contents($reg_to_sub_json . 'reg_parcel_to_sub.json', '[]');
                                            $reg_to_sub = file_get_contents($reg_to_sub_json . 'reg_parcel_to_sub.json');
                                        }
                                    } else {
                                        mkdir($reg_to_sub_json, 0777, true);
                                        file_put_contents($reg_to_sub_json . 'reg_parcel_to_sub.json', '[]');
                                        $reg_to_sub = file_get_contents($reg_to_sub_json . 'reg_parcel_to_sub.json');
                                    }


                                    $arr_parcel_to_reg_sub = json_decode($reg_to_sub, true);
                                    foreach ($arr_parcel_to_reg_sub as $x => $val) {
                                        echo '
                                                            <div class="btn-group mb-1 ms-1 reg_parcel_to_sub_div" role="group">
                                                                <button type="button" class="btn btn-secondary reg_parcel_to_sub" onclick="add_reg_parcel_to_sub(this)">' . $val . '</button>
                                                                <button type="button" class="btn btn-warning reg_parcel_to_sub_del" onclick="reg_sub_del(this)"><i class="bi bi-x-lg"></i></button>
                                                            </div>
                                                            ';
                                    }
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <table id="example" class="table table-hover align-middle">
                    <thead id="tablehead">
                        <tr>
                            <th>التاريخ</th>
                            <th>الباركود</th>
                            <th>الى</th>
                            <th>الموضوع</th>
                            <th><a href="../api/reg_parcel_to/reg_parcel_to_report.php" target="_blank" class=""><i class="btn btn-warning bi bi-printer" title="طباعه طرود صادر اليوم"></i></a>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <?php include './views/component/modals/user_exit.php' ?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include './views/component/modals/user_password_change.php' ?>
        <!-- end user password modal -->
    </div>

    <script src="./views/assets/js/plugins/jquery.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="./views/assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="./views/assets/js/plugins/jquery.easy-autocomplete.min.js"></script>
    <script src="./views/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./views/assets/js/plugins/masking-input.js" data-autoinit="true"></script>
    <script src="./views/assets/js/pcoded.min2.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/data_tables/reg_parcel_to.js"></script>
    <script src="./views/js/reg_parcel_to/add_reg_parcel_to.js"></script>
    <script src="./views/js/reg_parcel_to/remove_reg_parcel_to.js"></script>
    <script src="./views/js/reg_parcel_to/edit_reg_parcel_to.js"></script>
    <script src="./views/js/reg_parcel_to/append_reg_parcel_to_sub.js"></script>
    <script src="./views/js/reg_parcel_to/reg_sub_del.js"></script>
    <script src="./views/js/reg_parcel_to/add_reg_parcel_to_sub.js"></script>
    <script src="./views/js/reg_parcel_to/send_to_by_change.js"></script>
    <script src="./views/js/reg_parcel_to/easyAutocomplete.js"></script>
    <script src="./views/js/log/change_password.js"></script>
    <script>
        const ps = new PerfectScrollbar('.reg_parcel_to_sub_container');
        const ps2 = new PerfectScrollbar('.dataTables_scrollBody');
    </script>



</body>

</html>