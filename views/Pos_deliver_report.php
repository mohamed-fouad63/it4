<?php

$pos_count = count($_POST['names']);
$pos_deliver = filter_var($_POST['pos_deliver'], FILTER_SANITIZE_STRING);
$pos_deliver_date = $_POST['pos_deliver_date'];
$tr = "<tr>";
for ($i = 1; $i <= $pos_count; $i++) {
    $variable = $_POST["names" . "$i"];
    $tr .= "<td>$i</td>";
    foreach ($variable as $x => $val) {
        $tr .= "<td>$val</td>";
    }
    $tr .= "</tr>";
    $body_table = $tr;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ايصال استلام</title>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon">
    <link rel="stylesheet" href="./views/assets/css/plugins/paper.css">
    <style>
        * {
            font-family: serif;
        }

        body {
            direction: rtl;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            /* text-align: center; */
        }

        body.A4 .sheet {
            min-height: 296mm;
        }

        .table-collapse {
            border-collapse: collapse;
            width: 100%;
        }

        table thead tr th:nth-of-type(5),
        table thead tr th:nth-of-type(3) {
            width: 15%
        }

        .table-collapse th,
        .table-collapse td {
            border: 1px solid black;
            padding: 5px 5px;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }


        .margin_top {
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

<body class="A4 portrat">
    <div class="sheet padding-5mm">
        <?php echo "
<div class='margin_top'>
<h2 class='text-center'>ايصال استلام</h2>
<h4 class='text-center'>POS VeriFone V200T</h4>
<h3 id='deliver_date'></h3>
<h3>استلمت انا / <span>$pos_deliver </span></h3>
<h3>مندوب شركة مصر للنظم الهندسية SEE</h3>
<h3> من مقر الادارة العامة منطقة بريد  {$_SESSION["area_name"]} عدد ( $pos_count ) ماكينة نقاط البيع </h3>
</div>
<table class='table-collapse text-center font-bold'>
<thead class=''>
<tr>
<th>م</th>
<th>اسم المكتب</th>
<th>S/N</th>
<th>نوع العطل</th>
<th>القائم بالتسليم فى المنطقة</th>
<th>ملاحظات</th>
</tr>
</thead>
$body_table
</table>
<h3>مسئول  شركة SEE :</h3>
<h3>الرقم القومى :</h3>
<h3>رقم المحمول :</h3>
<h3> التوقيع :</h3>
";
        ?>
    </div>
    <script>
        const date = new Date("<?php echo date($pos_deliver_date) ?>");
        const option_day = {
            weekday: 'long'
        };

        // console.log(date.toLocaleDateString('ar-EG', option_day));
        // console.log(Intl.DateTimeFormat('ar-EG').format(date));
        var deliver_date = date.toLocaleDateString('ar-EG', option_day) + " : " + Intl.DateTimeFormat('ar-EG').format(date);
        console.log(deliver_date);
        document.getElementById("deliver_date").innerText = "انه فى يوم " + deliver_date;
    </script>
</body>

</html>