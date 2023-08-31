<?php
// print_r($data[0])
$data = json_decode($data[0], true);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/all.css">
    <link rel="stylesheet" href="./views/assets/css/count_dvice.css">
    <style>
        .middle {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body dir="rtl">
    <div class="middle">
        <div class="menu">

            <table class="">
                <tr class="">
                    <th>اسم المكتب</th>
                    <th>نوع المكتب</th>
                    <th>قارئ باركود</th>
                    <th> طابعه باركود</th>
                    <th>ميزان اليكترونى</th>
                    <th>شاشه عرض عملاء</th>
                </tr>
                <?php
                foreach ($data as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['office_name']; ?></td>
                        <td><?php echo $value['office_type'] ?></td>
                        <td <?PHP if ($value['postalscanner'] == 0) {
                                echo 'style="background-color:#a51717" ';
                            } ?>><?php echo $value['postalscanner']; ?></td>
                        <td><?php echo $value['postalprinter']; ?></td>
                        <td><?php echo $value['postalscale']; ?></td>
                        <td><?php echo $value['postalmonitor']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>
<?php  ?>