<!DOCTYPE html>
<html lang="ar">

<head>
     <title>الطرود الصادره</title>
     <script>
          function myFunction() {
               window.print();
          }
     </script>
     <link rel="stylesheet" href="./views/assets/css/bootstrap.min.css" />
     <style>
          @font-face {
               font-family: myFirstFont;
               src: url(C39SLOW.TTF);
          }

          * {
               font-weight: bold;
               direction: rtl;
               text-align: center;
          }

          table {
               width: 100%;
          }

          th {
               text-align: center;
          }

          .table td,
          .table th {
               padding: 0;
               vertical-align: middle;
          }

          .container {
               width: auto;
               margin: auto;
          }

          .barcode {
               height: 140px;
               width: 400px;
          }

          @media print {
               #print {
                    display: none;
               }
          }
     </style>
</head>

<body>
     <br /><br />
     <div class="container">
          <h4>حافظه ارسال طرود مصلحيه من الدعم الفنى بتاريخ
               <?php echo date('Y-m-d'); ?>
          </h4>
          <button id="print" class="btn btn-danger" onclick="myFunction()">طباعه</button>
          <div id="order_table">
               <table class="table table-bordered">
                    <tr>
                         <th>رقم المسجل</th>
                         <th>الى</th>
                    </tr>
                    <?php
                    $regCount = 0;
                    if (!isset($data['empty'])) {
                         foreach ($data as $key => $value) {
                              $regCount++;
                              ?>
                              <tr>
                                   <td class="barcode">
                                        <?php echo $value["barcode"]; ?>
                                   </td>
                                   <td>
                                        <?php echo $value["send_to"]; ?>
                                        <br>
                                        <?php echo $value["subject"]; ?>
                                   </td>
                              </tr>
                              <?php
                         }
                    }
                    ?>
               </table>
          </div>
          <p> استلمت عدد
               <?= $regCount ?> طرد لا غير
          </p>
     </div>
</body>

</html>