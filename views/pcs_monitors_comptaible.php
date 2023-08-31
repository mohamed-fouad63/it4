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
                    <th>عدد الاجهزه</th>
                    <th> عدد الشاشات</th>

                </tr>
                <?php
                foreach ($data as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['office_name'] ?></td>
                        <td><?php echo $value['pc']; ?></td>
                        <td><?php echo $value['monitor'] ?></td>
                    </tr>

                <?php }
                // }
                ?>

            </table>
        </div>
    </div>
</body>

</html>
<?php  ?>