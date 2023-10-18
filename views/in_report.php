<!DOCTYPE html>
<html lang="ar">

<head>
     <title>المسجلات الوارده</title>
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
               /* width: 100%; */
          }

          .table td,
          .table th {
               padding: 0;
               vertical-align: middle;

          }

          .table td {
               height: 70px;
          }

          .container {
               width: auto;
               margin: auto;
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
          <h4>حافظه استلام مسجلات مصلحيه الى الدعم الفنى بتاريخ
               <?= date('Y-m-d'); ?>
          </h4>
          <button id="print" class="btn btn-danger" onclick="myFunction()">طباعه</button>
          <div id="order_table">
               <table class="table table-bordered">
                    <tr>
                         <th style="width:20%">رقم المسجل</th>
                         <th>الراسل</th>
                         <th style="width:50%">الموضوع</th>
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
                                   </td>
                                   <td>
                                        <?php echo $value["subject"]; ?>
                                   </td>
                              </tr>
                         <?php }
                    } ?>
               </table>
          </div>
          <p> استلمت عدد
               <?= $regCount; ?> مسجل لا غير
          </p>
     </div>
</body>

</html>