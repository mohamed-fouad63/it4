<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <link rel="stylesheet" href="./views/assets/css/bootstrap.css">
  <style>
    p {
      font-size: 39px;
      text-align: justify;

    }

    .page {
      text-align: center;
      width: 230mm;
      min-height: 297mm;
      padding: 20mm;
      margin: 10mm auto;
      border: 1px #D3D3D3 solid;
      border-radius: 5px;
      background: white;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      font-weight: bold !important;
    }

    h1,
    h2,
    h3 {
      font-weight: bold;
    }

    @page {
      size: A4;
      margin: 0;
    }

    @media print {

      html,
      body {
        width: 210mm;
        height: 297mm;

      }

      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
        font-weight: bold;
      }

      .btn {
        display: none;
      }

      .date_misin {
        direction: ltr;
      }
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

<body>
  <div class="page">
    <div class="btn">
      <button type="button" class="btn btn-primary" name="misin_form_sub2" onclick="window.print();"> طباعه </button>
      <button type="button" class="btn btn-warning" onclick="window.close();" data-dismiss="modal">تم</button>
    </div>
    <div>
      <h1>
        السيد الاستاذ / مدير عام منطقه بريد
      </h1>
    </div>
    <div>
      <h3>
        بعد التحيه
      </h3>
    </div>
    <div>
      <p>
        الرجاء من سيادتكم الموافقه على اعطائى
        <?= $data['office_name'] ?>
        يوم
        <?= $data['day_name'] ?>
        الموافق
        <span class="date_misin">
          <?= $data['misin_date'] ?>
        </span>
        و ذلك

        <?php echo "لـ" . $data['reason_vacation']; ?>
      </p>
    </div>
    <div>
      <h2>
        و لسيادتكم جزيل الشكر
      </h2>
    </div>
    <div style="text-align: end;">
      <h2>
        مقدمه لسيادتكم /
      </h2>
      <h3>
        <?= $data['it_name'] ?>
      </h3>
    </div>
  </div>

</body>

</html>
<?php



?>