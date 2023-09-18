<?php

$f = $data['f'];
$t = $data['t'];
$p = $data['p'];
$s = $data['s'];
$d = $data['d'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اذن تحويل / نقل</title>
      <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/plugins/paper.css">
    <style>
        * {
            font-family: serif;
        }

        body {
            direction: rtl;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            text-align: center;
        }

        .flex {
            display: flex;
            justify-content: space-between;
        }

        .flex_around {
            display: flex;
            justify-content: space-around;
        }

        table.table_ezn_date {
            border-collapse: collapse;
        }

        table.table_ezn_date th,
        table.table_ezn_date td {
            border: 1px solid black;
            width: 130px;
            height: 20px;
        }

        table.table_ezn_date thead tr:nth-of-type(1) th:nth-of-type(2) {
            width: 35cm;
        }

        table.table_ezn_date thead tr:nth-of-type(1) th:nth-of-type(7) {
            width: 20cm;
        }

        table.table_ezn_date thead tr:nth-of-type(2) th:nth-of-type(1) {
            width: 5cm;
        }

        .u_l_office {
            border-bottom: 2px solid;
            width: max-content;
            margin: 10px auto;
        }

        .split {
            width: 50%;
        }

        .margin_top_100 {
            margin-top: 100px;
            margin-bottom: 20px;
        }

        .btn_print {
            color: #fff;
            background-color: #337ab7;
            padding: 6px 12px;
            -ms-touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            border: none;
            border-radius: 4px;
        }

        @media print {
            .btn_print {
                display: none
            }
        }

        /* 5cm = 188.97637795px */
    </style>
</head>

<body class="A4 landscape">
    <button type="button" class="btn_print" onclick="window.print();"> طباعه اذن النقل </button>
    <div class="sheet padding-5mm">
        <div class="flex margin_top_100 ">
            <div>
                <div style="text-align: right;">اسم المكتب المنقول منه : <?php echo $f; ?> </div>
                <div style="text-align: right;">اسم المكتب المنقول اليه :  <?php echo $t; ?></div>
            </div>
            <div>
                <div>اذن تحويل / نقل</div>
            </div>
            <div>
                <div>4 مخازن</div>
                <div>التاريخ :<?php echo $d; ?></div>
            </div>
        </div>
        <div class="">
            <table class="table_ezn_date">
                <thead>
                    <tr>
                        <th colspan="4">كود الصنف</th>
                        <th rowspan="2">اسم الصنف</th>
                        <th rowspan="2">الوحده</th>
                        <th rowspan="2">الكميه</th>
                        <th rowspan="2" colspan="2">سعر الوحده</th>
                        <th rowspan="2" colspan="2">القيمه</th>
                        <th rowspan="2">ملاحظات</th>
                    </tr>
                    <tr>
                        <th>الصنف</th>
                        <th>قسم</th>
                        <th>مجموعه</th>
                        <th>باب</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: left;padding-left: 5px;"><?php echo $p; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: left;padding-left: 5px;"><?php echo "SN: ".$s; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>

                    <tr>
                        <td rowspan="2"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="2"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="flex_around">
            <div class="split">
                <h4 class="u_l_office">المكتب المنقول منه</h4>
            </div>
            <div class="split">
                <h4 class="u_l_office">المكتب المنقول اليه</h4>
                <h4>استلمت الاصناف الموضحه بعاليه و تم اضافتها الى دفتر عهده المكتب</h4>
                <div class="flex_around">
                    <h4 class="split">المستلم</h4>
                    <h4 class="split">الختم</h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>