<?php
$data = json_decode($data[0], true);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="./views/assets/images/it1.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./views/assets/css/all.css">
    <link rel="stylesheet" href="./views/assets/css/count_dvice.css">
    <style>

    </style>
</head>

<body dir="rtl">
    <div class="middle">
        <div class="menu">
            <table class="">
                <tr class="">
                    <th>اسم المكتب</th>
                    <th>الموديل</th>
                    <th>السريال</th>
                    <th>موقفه</th>
                </tr>
                <?php
                foreach ($data as $key => $value) {
                    echo '<tr>
                            <td>' . $value['office_name'] . '</td>
                            <td>' . $value['dvice_name'] . '</td>
                            <td>' . $value['sn'] . '</td>
                            <td>' . $value['note'] . $value['note_move_to'] . '</td>
                        </tr>
                        ';
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
<?php ?>