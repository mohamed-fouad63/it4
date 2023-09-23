<?php


if(isset($_GET['dvice_num'])){



$result = json_decode($data[0], true);


    foreach($result as $row){

            $pc_name_ticket1 = $row['dvice_name'];
            $pc_sn_ticket = $row['sn'];
            $pc_damage_ticket = $row['damage'];
        }

    $pc_name_ticket1 = strtoupper($pc_name_ticket1);
    $pc_name_ticket = trim($pc_name_ticket1);

switch ($pc_name_ticket) {
    case 'HP 21" LED':
    case 'HP 21 LED':
    case 'HP 21.5 LED':
    case 'HP 20 LED':
    case 'HP 20.8 LED':
        $pc_name_ticket = 'HP';
        break;
    case 'FUJITSU 20 LCD':
    case 'FUJITSU 20 LED':
    case 'FUJITSU 17 LCD':
    case 'FUJITSU 17 LED':
        $pc_name_ticket = 'Fujitsu';
    break;
    case 'SAMSUNG 20" LED':
    case 'SAMSUNG 19" LED':
    case 'SAMSUNG 18" LED':
    case 'SAMSUNG 18 LED':
        $pc_name_ticket = 'Samsung';
    break;
    case 'LENOVO 19 LCD':
    case 'LENOVO LCD':
    case 'LENOVO 21.6 LED':
        $pc_name_ticket = 'LENOVO';
    break;
    case 'DELL 17 LCD':
        $pc_name_ticket = 'DELL';
    break;
    case 'ACER 20 LED':
        $pc_name_ticket = 'ACER';
    break;
    case 'PHILIPS 20 LED':
        $pc_name_ticket = 'Philips';
    break;
    case 'HP LASERJET ENTERPRISE M605N':
    case 'HP LASERJET P2055DN':
    case 'HP LASERJET P2015n':
    case 'HP LASERJET ENTERPRISE M506N':
    case 'HP LASERJET 1150':
        $pc_name_ticket = 'HP PRINTER';
    break;
    case 'SAMSUNG ML-4510ND':
    case 'SAMSUNG ML-3750ND':
    case 'SAMSUNG PROXPRESS SL-M4020ND':
    case 'SAMSUNG ML-5510N':
        $pc_name_ticket = 'SAMSUNG PRINTER';
    break;
    case 'RICOH 1100':
    case 'RICOH SP C231':
        $pc_name_ticket = 'RICOH PRINTER';
    break;
    case 'METTLER TOLEDO SCALE':
        $pc_name_ticket = 'Metlar';
    break;
    case 'BIXOLON BCD1100':
        $pc_name_ticket = 'Bixlon';
    break;
    case 'VFD PD220V':
        $pc_name_ticket = 'VFD';
    break;
    case 'BARCODE SCANNER DATALOGIC QW2120':
        $pc_name_ticket = 'Data Logic';
    break;
    case 'BARCODE SCANNER HONEYWELL XENON 1900':
        $pc_name_ticket = 'Honeywell';
    break;
    case 'BARCODE SCANNER SYMBAL':
    case 'BARCODE SCANNER SYMBAL 2208':
        $pc_name_ticket = 'Symbol';
    break;
    case 'BARCODE PRINTER ZEBRA ZT 410':
    case 'BARCODE PRINTER ZEBRA GC420T':
    case 'BARCODE PRINTER ZEBRA ZD 220':
        $pc_name_ticket = 'Zebra';
    break;
    case 'BARCODE PRINTER INTERMEC PC43T':
        $pc_name_ticket = 'Intermec';
    break;
    
    default:
        # code...
        break;
}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اذن صيانة أجهزة الحاسب الالى وملحقاتها</title>
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

        .post_logo {
            height: 1.25cm;
            width: 3.45cm;
        }

        .flex {
            display: flex;
            justify-content: space-between;
        }

        .flex_around {
            display: flex;
            justify-content: space-around;
        }

        hr {
            border: 1px solid;
        }

        table.table_ezn_date,
        table.dvice_info,
        table.rep_result {
            border-collapse: collapse;
        }

        table.table_ezn_date th,
        table.table_ezn_date td {
            border: 1px solid black;
            width: 130px;
            height: 20px;
        }

        table.dvice_info,
        table.rep_result {
            width: 100%;
        }

        table.dvice_info tr:nth-child(2) {
            height: 0.35in;
        }

        table.dvice_info tr:nth-child(3) {
            background-color: #e0e0e0;
        }

        table.dvice_info tr:nth-child(5) {
            vertical-align: top;
        }

        table.dvice_info th,
        table.dvice_info td,
        table.rep_result th,
        table.rep_result td {
            border: 1px solid black;
            text-align: center;
        }

        table.rep_result tr:nth-child(3) td:nth-child(4),
        table.rep_result tr:nth-child(3) td:nth-child(5) {
            padding: unset;
        }

        table.rep_result tr:nth-child(3) td:nth-child(4) ul li:not(:nth-child(5)),
        table.rep_result tr:nth-child(3) td:nth-child(5) ul li:not(:nth-child(5)) {
            border-bottom: 1px solid black;
            text-align: end;
            min-height: 21px;
        }

        ul {
            list-style: none;
            margin-left: unset;
            padding-right: 0;
            text-align: end;
            /* reset ul */
            margin-block-start: 0px;
            margin-block-end: 0px;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 0px;
        }

        .no_wrap li {
            white-space: nowrap;
        }

        ul li:not(ul.foo >li):after {
            content: "";
            display: inline-block;
            width: 6px;
            height: 9px;
            border: 1px solid;
            margin: 0 3px;
        }

        .margin_top {
            margin-top: 15px;
        }

        h6 {
            display: inline;
        }

        .select_dvice {
            box-shadow: inset 0 0 0 1000px #201e1e54;
        }
        .btn_print{
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
                display :none
            }
        }
    </style>
</head>

<body class="A4 landscape">
<button type="button" class="btn_print" onclick="window.print();"> طباعه الماموريه </button>
    <div class="sheet padding-5mm">
        <div class="flex">
            <div>
                <div>قطاع الدعم الفنى</div>
                <div>الادارة العامة لدعم الاجهزة الطرفية</div>
            </div>
            <div>اذن صيانة أجهزة الحاسب الالى وملحقاتها</div>
            <div><img class="post_logo" src="./views/assets/images/post.png" alt=""></div>
        </div>
        <hr>
        <div class="flex margin_top">
            <div>
                <div> ادارة / منطقة بريد<?= " ".$_SESSION['area_name']?></div>
                <div>يعتمد </div>
            </div>
            <div><img class="post_logo" src="./views/assets/images/khtm.png" alt=""></div>
            <div>
                <table class="table_ezn_date">
                    <tr>
                        <th>رقم الاذن</th>
                        <th>التاريخ</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="margin_top">
            <table class="dvice_info">
                <tr>
                    <td colspan="3">ملاحظات</td>
                    <td>ضمان</td>
                    <td>صيانة </td>
                    <td colspan="2">الحالة الظاهريه</td>
                    <td colspan="2">SN/ رقم الجهاز</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="2"><?php echo $pc_sn_ticket; ?></td>
                </tr>
                <tr>
                    <td colspan="2">طابعة</td>
                    <td>ماسح ضوئى</td>
                    <td>بروجيكتور</td>
                    <td>شاشة عميل</td>
                    <td>قارئ باركود</td>
                    <td>ميزان الكترونى</td>
                    <td>شاشة</td>
                    <td>جهاز حاسب آلي</td>
                </tr>
                <tr>
                    <td>باركود</td>
                    <td>ليزر</td>
                    <td>موديل</td>
                    <td>موديل</td>
                    <td>موديل</td>
                    <td>موديل</td>
                    <td>موديل</td>
                    <td>موديل</td>
                    <td>موديل</td>
                </tr>
                <tr>
                    <td>
                        <ul class="no_wrap">
                            <li>Honeywell</li>
                            <li <?php if($pc_name_ticket == 'Zebra'){ echo 'class="select_dvice"';} ?> >Zebra</li>
                            <li <?php if($pc_name_ticket == 'Intermec'){ echo 'class="select_dvice"';} ?>>Intermec</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="no_wrap">
                            <li <?php if($pc_name_ticket == 'HP PRINTER'){ echo 'class="select_dvice"';} ?>>HP</li>
                            <li <?php if($pc_name_ticket == 'SAMSUNG PRINTER'){ echo 'class="select_dvice"';} ?>>Samsung</li>
                            <li <?php if($pc_name_ticket == 'RICOH PRINTER'){ echo 'class="select_dvice"';} ?>>Ricoh</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="no_wrap">
                            <li>Epson</li>
                            <li>Panasonic</li>
                            <li>Panasonic</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="no_wrap">
                            <li>Epson</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="no_wrap">
                            <li <?php if($pc_name_ticket == 'Bixlon'){ echo 'class="select_dvice"';} ?>>Bixlon</li>
                            <li <?php if($pc_name_ticket == 'VFD'){ echo 'class="select_dvice"';} ?>>VFD</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="no_wrap">
                            <li <?php if($pc_name_ticket == 'Data Logic'){ echo 'class="select_dvice"';} ?>>Data Logic</li>
                            <li <?php if($pc_name_ticket == 'Symbol'){ echo 'class="select_dvice"';} ?>>Symbol</li>
                            <li <?php if($pc_name_ticket == 'Honeywell'){ echo 'class="select_dvice"';} ?>>Honeywell</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="no_wrap">
                            <li <?php if($pc_name_ticket == 'Metlar'){ echo 'class="select_dvice"';} ?>> Metlar</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="no_wrap">
                            <li <?php if($pc_name_ticket == 'Fujitsu'){ echo 'class="select_dvice"';} ?>>Fujitsu</li>
                            <li <?php if($pc_name_ticket == 'Samsung'){ echo 'class="select_dvice"';} ?>>Samsung</li>
                            <li <?php if($pc_name_ticket == 'DELL'){ echo 'class="select_dvice"';} ?>>DELL</li>
                            <li <?php if($pc_name_ticket == 'ACER'){ echo 'class="select_dvice"';} ?>>ACER</li>
                            <li <?php if($pc_name_ticket == 'HP'){ echo 'class="select_dvice"';} ?>>HP</li>
                            <li <?php if($pc_name_ticket == 'LENOVO'){ echo 'class="select_dvice"';} ?>>LENOVO</li>
                            <li <?php if($pc_name_ticket == 'Philips'){ echo 'class="select_dvice"';} ?>>Philips</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="no_wrap">
                            <li <?php if($pc_name_ticket == 'FUJITSU ESPRIMO P420'){ echo 'class="select_dvice"';} ?>>Fujitsu P420</li>
                            <li <?php if($pc_name_ticket == 'FUJITSU ESPRIMO P400'){ echo 'class="select_dvice"';} ?>>Fujitsu P400</li>
                            <li <?php if($pc_name_ticket == 'FUJITSU ESPRIMO P2540'){ echo 'class="select_dvice"';} ?>>Fujitsu P2540</li>
                            <li <?php if($pc_name_ticket == 'FUJITSU ESPRIMO P3510'){ echo 'class="select_dvice"';} ?>>Fujitsu P3510</li>
                            <li <?php if($pc_name_ticket == 'FUJITSU ESPRIMO P3500'){ echo 'class="select_dvice"';} ?> >Fujitsu P3500</li>
                            <li <?php if($pc_name_ticket == 'FUJITSU ESPRIMO P7935'){ echo 'class="select_dvice"';} ?>>Fujitsu P7935</li>
                            <li <?php if($pc_name_ticket == 'FUJITSU ESPRIMO P556'){ echo 'class="select_dvice"';} ?>>Fujitsu P556</li>
                            <li <?php if($pc_name_ticket == 'FUJITSU ESPRIMO P2560'){ echo 'class="select_dvice"';} ?>>Fujitsu P2560</li>
                            <li <?php if($pc_name_ticket == 'Laptop'){ echo 'class="select_dvice"';} ?>>Laptop</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <div class="mrgin_top">
            <h6>نتيجه الاصلاح</h6>
            <table class="rep_result">
                <tr>
                    <td style="width: 1.72in;" rowspan="2">نوع العطل</td>
                    <td colspan="2 ">ماتم انجازه بالجهاز</td>
                    <td style="width: 3in;" rowspan="2">موديل قطع الغيار </td>
                    <td style="width: 2in;" rowspan="2">قطع الغيار المستخدمة للصيانة</td>
                <tr>
                    <td>اصلاح</td>
                    <td>تكهين</td>
                </tr>
                <tr>
                    <td><?php echo $pc_damage_ticket ; ?></td>
                    <td></td>
                    <td></td>
                    <td>
                        <ul class="foo">
                            <li class="flex_around">
                                <span> H110 (&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                                <span>H81 (&nbsp;&nbsp;&nbsp;&nbsp;) </span>
                                <span>H61 (&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                            </li>
                            <li> : SN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li class="flex_around">
                                <span style="
                                visibility: hidden;">DDR3 (&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                                <span>DDR4 (&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                                <span>DDR4 (&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                            </li>
                            <li></li>
                            <li class=" flex_around">
                                <span>G3900 (&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                                <span> G1820 (&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                                <span>G1620 (&nbsp;&nbsp;&nbsp;&nbsp;)</span>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>Motherboard </li>
                            <li>Hard Disk 1 Tera</li>
                            <li>RAM </li>
                            <li>Power Supply</li>
                            <li>Processor</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <div class="flex margin_top">
            <div>اسم المسلم من المنطقة /الادارة : </div>
            <div> المستلم من المنطقة أو الإدارة :</div>
            <div>المستلم للصيانة : </div>
            <div></div>
        </div>
        <div class="flex margin_top">
            <div> القائم بصيانة الجهاز : </div>
        </div>
        <div class="flex margin_top">
            <div>
                <div>
                    مدير ادارة صيانة الطابعات
                </div>
                <div>محروس صادق</div>
            </div>
            <div>
                <div>مشرف ادارة صيانة الملحقات</div>
                <div>عثمان رامى</div>
            </div>
            <div>
                <div>مدير ادارة صيانة الحاسبات</div>
                <div>احمد خيرى</div>
            </div>
            <div><img src="./views/assets/images/hktm_cairo.png" alt=""></div>
        </div>
    </div>
</body>

</html>