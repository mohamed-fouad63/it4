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
                    <th>نوع الوحده البريديه</th>
                    <th>اسم الوحده</th>
                    <th>مجموعه بريد</th>
                    <th>كود مالى</th>
                    <th>كود بريدى</th>
                    <th>كود بوستال</th>
                    <th>تليفون</th>
                    <th>عنوان</th>
                </tr>

                <?php
                foreach ($data as $key => $value) {
                    echo '<tr>
                        <td>' . $value['office_type'] . '</td>
                        <td>' . $value['office_name'] . '</td>
                        <td>' . $value['post_group'] . '</td>
                        <td>' . $value['money_code'] . '</td>
                        <td>' . $value['post_code'] . '</td>
                        <td>' . $value['postal_code'] . '</td>
                        <td>' . $value['tel'] . '</td>
                        <td>' . $value['address'] . '</td>
                        </tr>
                        ';
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
<?php  ?>