<?php

$id = $_SESSION['id'];

$office_name = $data['office_name'];
$misin_date = $data['misin_date'];
$misin_type = $data['misin_type'];
$start_time = $data['start_time'];
$end_time = $data['end_time'];
$Network_Status = $_POST['Network_Status'];
$Network_points = $_POST['Network_points'];
$pc_damage = $_POST['pc_damage'];
$pc_program = $_POST['pc_program'];
$pc_os = $_POST['pc_os'];
$pc_domain = $_POST['pc_domain'];
$num_pc_domain = $_POST['num_pc_domain'];
$note_not_domain = $_POST['note_not_domain'];
$date = $misin_date;
$nameOfDay = date('D', strtotime($date));
$rowcount1 = $data['pc'];
$rowcount2 = $data['monitor'];
$rowcount3 = $data['printer'];
$rowcount4 = $data['posfinance'];
$rowcount5 = $data['vx510'] + $data['V200T'] + $data['BITEL'];
$rowcount6 = $data['postalscale'];
$rowcount7 = $data['postalprinter'];
$rowcount8 = $data['postalscanner'];
$rowcount9 = $data['postalmonitor'];
$office_type  = $data['office_type'];
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./views/assets/css/web-fonts-with-css/css/all.css">
    <link rel="stylesheet" href="./views/assets/css/bootstrap.css">
    <link rel="stylesheet" href="./views/assets/css/print_test.css">
    <style>
        .username {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 0;
            margin-top: 0;
        }

        fieldset {
            margin: -10px;
        }
    </style>
    <script type="text/javascript">
        var replaceDigits = function() {
            var map = ["&#x0660;", "&#x0661;", "&#x0662", "&#x0663", "&#x0664;", "&#x0665", "&#x0666", "&#x0667", "&#x0668", "&#x0669"]
            document.body.innerHTML = document.body.innerHTML.replace(/\d(?=[^<>]*(<|$))/g, function($0) {
                return map[$0]
            });
        }
        window.onload = replaceDigits;
    </script>
</head>

<body dir="rtl">
    <div class="page">
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" name="misin_form_sub2" onclick="window.print();"> طباعه الماموريه </button>
            <button type="button" class="btn btn-warning" onclick="window.close()" data-dismiss="modal">تم</button>
        </div>
        <form method="post">
            <label class='username'>القائم بالمرور / <?php echo $_SESSION['first_name'];  ?></label>
            <fieldset>
                <legend>
                    <span class="badge">بيانات المكتب</span>
                </legend>
                <table class="">
                    <tr>
                        <th>المجموعه</th>
                        <th>اسم المكتب</th>
                        <th>الرقم المالى</th>
                        <th>التليفون</th>
                        <th>التاريخ</th>
                        <th>خطه \ بلاغ</th>
                        <th> الحضور</th>
                        <th> الانصراف</th>
                    </tr>
                    <tr>
                        <td><?php echo $data['post_group']; ?></td>
                        <td><?php echo $data['office_name']; ?></td>
                        <td><?php echo $data['money_code']; ?></td>
                        <td><?php echo $data['tel']; ?></td>
                        <td><?php echo $data['misin_date']; ?></td>
                        <td><?php echo $misin_type; ?></td>
                        <td><?php echo $start_time; ?></td>
                        <td><?php echo $end_time; ?></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset id="network">
                <legend>
                    <span class="badge">بيانات الشبكه</span>
                </legend>
                <table>
                    <tr>
                        <th>حاله الشبكه</th>
                        <th>هل المكتب يحتاج لنقاط شبكه</th>
                        <th>LEASD LINE</th>
                        <th>3G</th>
                    </tr>
                    <tr>
                        <td><?php echo $Network_Status; ?></td>
                        <td><?php echo $Network_points; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset id="dvice">
                <legend><span class="badge">بيان و حاله الاجهزه </span></legend>
                <table>
                    <tr>
                        <th>عدد الاجهزه</th>
                        <th>عدد الشاشات</th>
                        <th>عدد الطابعات</th>
                        <th>عدد pos البريد</th>
                        <th>عدد pos efiniance</th>
                        <th>ميزان</th>
                        <th>طابعه باركود</th>
                        <th>قارئ باركود</th>
                        <th> شاشه عميل</th>
                    </tr>
                    <tr>
                        <td><?php echo $rowcount1; ?></td>
                        <td><?php echo $rowcount2; ?></td>
                        <td><?php echo $rowcount3; ?></td>
                        <td><?php echo $rowcount4; ?></td>
                        <td><?php echo $rowcount5; ?></td>
                        <td><?php echo $rowcount6; ?></td>
                        <td><?php echo $rowcount7; ?></td>
                        <td><?php echo $rowcount8; ?></td>
                        <td><?php echo $rowcount9; ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan="3">هل يوجد اعطال بالاجهزه</th>
                        <th colspan="3">هل تم تنزيل برامج الخدمات و البرامج المساعده و مكافح الفيروسات</th>
                        <th colspan="2">هل نظام التشغيل النسخه المعتمده من قطاع الدعم الفنى</th>
                    </tr>
                    <tr>
                        <td colspan="3"><?php echo $pc_damage; ?></td>
                        <td colspan="3"><?php echo $pc_program; ?></td>
                        <td colspan="2"><?php echo $pc_os; ?></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset id="domain">
                <legend><span class="badge"> الدومين </span></legend>
                <table>
                    <tr>
                        <th> الاجهزه مربوطه بالدومين ؟</th>
                        <th>عدد الاجهزه</th>
                        <th>اسم الدومين</th>
                        <th colspan="5">عدد الاجهزه خارج الدومين و السبب</th>
                    </tr>
                    <tr>
                        <td><?php echo $pc_domain; ?></td>
                        <td><?php echo $num_pc_domain; ?></td>
                        <td><?php echo $data['domain_name']; ?></td>
                        <td colspan="5"><?php echo $note_not_domain; ?></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset id="service">
                <legend><span class="badge"> الخدمات </span></legend>
                <table>
                    <tr>
                        <th>الشباك الموحد</th>
                        <th>مراقبه النقديه</th>
                        <th>الحوالات الفوريه</th>
                        <th>التحصيل و الاخطار</th>
                        <th>المصريه لاتصالات</th>
                        <th>منظومه الطوابع</th>
                        <th>البريد الالكترونى</th>
                    </tr>
                    <tr>
                        <td><?php if (isset($_POST['shm'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            }  ?></td>
                        <td><?php if (isset($_POST['mn'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['hf'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['th'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['et'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['tw'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['email'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>

                    </tr>
                    <tr>
                        <th>باك اوفيس</th>
                        <th>فرونت اوفيس</th>
                        <th>الخدمات الحكوميه</th>
                        <th>الاحوال المدنيه</th>
                        <th>مصر الرقميه</th>
                        <th>موقع المنشورات</th>
                        <th>الحوالات الخارجيه</th>
                    </tr>
                    <tr>
                        <td><?php if (isset($_POST['bo'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['fo'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['khh'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['am'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['des'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['mnsh'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['hkh'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset id="tools">
                <legend><span class="badge"> مستلزمات التشغيل </span></legend>
                <table>
                    <tr>
                        <th>حباره</th>
                        <th>درام</th>
                        <th>لوحه مفاتيح</th>
                        <th>ماوس</th>
                        <th>قارئ باركود</th>
                        <th>جهاز حاسب</th>
                        <th>شاشه حاسب</th>
                        <th>طابعه ليزر</th>
                    </tr>
                    <tr>
                        <td><?php if (isset($_POST['toner'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['dram'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['keyboard'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['mouse'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['barscan'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['pc'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            }; ?></td>
                        <td><?php if (isset($_POST['monitor'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                        <td><?php if (isset($_POST['printer'])) {
                                echo "<i class='fas fa-check'></i>";
                            } else {
                                echo "<i class='fas fa-times'></i>";
                            } ?></td>
                    </tr>
                </table>
            </fieldset>
            <table>
                <tr>
                    <th colspan="">ما تم عمله</th>
                </tr>
                <tr>
                    <td colspan=""><?php echo $data['does']; ?></td>
                </tr>
            </table>
            <div class="">
                <label style="float:right;">اخصائى تشغيل نظم</label>
                <label style="text-align: center;">ختم المكتب</label>
                <label style="float:left;">وكيل المكتب</label>
            </div>

            <!--
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" name="misin_form_sub2" onclick="window.print();"> طباعه الماموريه </button>
                <button type="button" class="btn btn-warning" onclick="window.location.href='my_misin.php'" data-dismiss="modal">تم</button>
                </div>
                    -->
        </form>
    </div>
    <div class="page">
        <div class="containermissin">
            <div class="missinletter">
                <div class="missintitle">خطاب انهاء الماموريه</div>
                <div class="missinto">
                    <label>
                        السيد الاستاذ / مدير عام الاداره العامة لمنطقة بريد جنوب الشرقية
                    </label>
                </div>
                <div class="missintro">
                    <label>
                        بعد التحيه
                    </label>
                </div>
                <div class="missinbody">
                    <div class="missinsection">
                        <span>تم اليوم <?php echo $misin_date; ?></span>
                        <span>المرور على <?php echo $office_type . " " . $office_name; ?></span>
                        <span> وذلك بناء على <?php echo $misin_type; ?></span>
                    </div>
                    <div class="missinsection">
                        <span>ساعة الحضور : <?php echo $start_time; ?></span>
                        <span>ساعة الانصراف : <?php echo $end_time; ?></span>
                        <span>وقد تم عمل الاتى : -</span>
                    </div>
                    <div class="missinsection"><?php echo $data['does']; ?>
                    </div>
                </div>
                <div class="">
                    <label style="float:right;">اخصائى تشغيل نظم</label>
                    <label style="text-align: center;">ختم المكتب</label>
                    <label style="float:left;">وكيل المكتب</label>
                </div>
            </div>
            <div class="missinletter">
                <div class="missintitle">خطاب انهاء الماموريه</div>
                <div class="missinto">
                    <label>
                        السيد الاستاذ / مدير عام الاداره العامة لمنطقة بريد جنوب الشرقية
                    </label>
                </div>
                <div class="missintro">
                    <label>
                        بعد التحيه
                    </label>
                </div>
                <div class="missinbody">
                    <div class="missinsection">
                        <span>تم اليوم <?php echo $misin_date; ?></span>
                        <span>المرور على <?php echo $office_type . " " . $office_name; ?></span>
                        <span> وذلك بناء على <?php echo $misin_type; ?></span>
                    </div>
                    <div class="missinsection">
                        <span>ساعة الحضور : <?php echo $start_time; ?></span>
                        <span>ساعة الانصراف : <?php echo $end_time; ?></span>
                        <span>وقد تم عمل الاتى : -</span>
                    </div>
                    <div class="missinsection"><?php echo $data['does']; ?>
                    </div>
                </div>
                <div class="">
                    <label style="float:right;">اخصائى تشغيل نظم</label>
                    <label style="text-align: center;">ختم المكتب</label>
                    <label style="float:left;">وكيل المكتب</label>
                </div>
            </div>
            <div class="missinletter">
                <div class="missintitle">خطاب انهاء الماموريه</div>
                <div class="missinto">
                    <label>
                        السيد الاستاذ / مدير عام منطقة بريد
                    </label>
                </div>
                <div class="missintro">
                    <label>
                        بعد التحيه
                    </label>
                </div>
                <div class="missinbody">
                    <div class="missinsection">
                        <span>تم اليوم <?php echo $misin_date; ?></span>
                        <span>المرور على <?php echo $office_type . " " . $office_name; ?></span>
                        <span> وذلك بناء على <?php echo $misin_type; ?></span>
                    </div>
                    <div class="missinsection">
                        <span>ساعة الحضور : <?php echo $start_time; ?></span>
                        <span>ساعة الانصراف : <?php echo $end_time; ?></span>
                        <span>وقد تم عمل الاتى : -</span>
                    </div>
                    <div class="missinsection"><?php echo $data['does']; ?>
                    </div>
                </div>
                <div class="">
                    <label style="float:right;">اخصائى تشغيل نظم</label>
                    <label style="text-align: center;">ختم المكتب</label>
                    <label style="float:left;">وكيل المكتب</label>
                </div>
            </div>
        </div>
    </div>
    <div class=" page">
        <div class="missinmsgto">
            <div class="centering rotating">
                <h3>قسم الدعم الفنى </h3>
                <h3>الى</h3>
            </div>
        </div>
        <div class="missinmsgfrom">
            <div class="centering">
                <h3>الراسل</h3>
                <h3><?php echo $_SESSION['first_name'];  ?></h3>
                <h4><?php echo $office_name; ?></h4>
            </div>
        </div>
    </div>
</body>

</html>
<?php
// $conn->query($sql_insert_in_misin);
// $sql_del_repeat_misin = "DELETE n1 FROM misin_it_online n1, misin_it_online n2 WHERE n1.counter < n2.counter AND n1.misin_date = n2.misin_date AND n1.office_name = n2.office_name AND n1.id = $id ";
// $conn->query($sql_del_repeat_misin);

?>