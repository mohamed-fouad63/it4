<?php

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/m.css">
    <script src="./views/assets/DataTables/FixedHeader-3.2.3/css/fixedHeader.dataTables.min.css"></script>
    <style>
        table {
            text-align: left;
            position: relative;
            border-collapse: collapse;
            top: 56px;
            width: 100%
        }

        thead {
            text-align: center;
            background: white;
            top: 0;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
        }

        th,
        td {
            border: 1px solid
        }

        .pcoded-header {
            z-index: 1029;
            position: fixed;
            display: flex;
            min-height: 56px;
            padding: 0;
            top: 0;
            background: #fff;
            color: rgba(44, 62, 80, 0.8);
            width: 100%;
            transition: all 0.3s ease-in-out;
            background: #2c3e50;
        }

        .pcoded-header .navbar-nav>li {
            line-height: 40px;
            display: inline-block;

        }

        .pcoded-header .navbar-nav>li:last-child {
            padding-right: 25px;
        }

        .pcoded-header:before,
        .pcoded-main-container:before {
            content: "";
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body dir="rtl">
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <ul class="navbar-nav ">
            <li>
                <div class="d-flex filte_div" role="search"></div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li>
                <div class="btn-group bt_div"></div>
            </li>
        </ul>
    </header>
    <div class="">
        <div class="">
            <table id="dvice_office_report">
            <thead>
                    <tr class="">
                        <th rowspan='2'>اسم المكتب</th>
                        <th rowspan='2'>نوع المكتب</th>
                        <th rowspan='2'>كود مالى</th>
                        <th colspan='2'>عدد الاجهزه</th>
                        <th colspan='2'>عدد الشاشات</th>
                        <th colspan='3'>عدد الطابعات</th>
                        <th colspan='4'>عدد ماكينات نقاط البيع</th>
                        <th colspan='4'>عدد اجهزه بوستال</th>
                    </tr>
                    <tr class="">
                        <th>كل الاجهزه</th>
                        <th>اجهزه بالصيانه</th>
                        <th>كل الشاشات</th>
                        <th>شاشات بالصيانه</th>
                        <th>طابعات ليزر</th>
                        <th>طابعات متعدده</th>
                        <th>طابعات بالصيانه</th>
                        <th>FINANC</th>
                        <th>VX510</th>
                        <th>V200T</th>
                        <th>BITEL</th>
                        <th>قارئ باركود</th>
                        <th>طابعه باركود</th>
                        <th>شاشه عرض العملاء</th>
                        <th>ميزان اليكترونى</th>
                    </tr>
                 </thead>
            </table>
        </div>
    </div>
    <script>
        var Settings = {
            ajax_url: '<?= $data ?>'
        }
    </script>
    <script src="./views/assets/js/plugins/jquery.min.js"></script>
    <script src="./views/assets/DataTables/jquery.dataTables.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="./views/assets/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
    <script src="./views/assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="./views/assets/DataTables/FixedHeader-3.2.3/js/dataTables.fixedHeader.min.js"></script>
    <script src="./views/data_tables/dvice_office_report.js"></script>
</body>

</html>