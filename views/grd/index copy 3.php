<?php
session_start();
include '../connection.php';
$office_name = $_GET['office_name'];
$query ="SELECT * FROM dvice WHERE office_name = '$office_name'
ORDER BY FIELD(id,'pc', 'monitor','printer','pos','postal','network') ASC";
$result=mysqli_query($conn,$query ) ;
// while($row1=mysqli_fetch_assoc($result))
// {
//     echo $row1["code_inventory"] ;
//     echo $row1["dvice_type"] ;
//     echo $row1["dvice_name"] ;
//     echo $row1["sn"] ;
//     echo $row1["note"] ;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-weight: bold
        }

        table {
            direction: rtl;
            border-collapse: collapse;
            width: 99%;
            margin: auto;
            padding: 15PX;
        }

        table  tr{
            height:25.1px;
        }
        table thead tr:nth-of-type(5) th {
            border:1px solid;
            border-collapse: collapse;
            height:10px
        }
        table thead tr:nth-of-type(4),table tfoot tr:nth-of-type(1) {
        height:15px
        }

        table thead th:nth-of-type(1) {
            width: 2%;
        }

        table thead th:nth-of-type(2) {
            width:20%;
            text-align: start;
        }

        table thead th:nth-of-type(3) {
            width:10%;
        }
        table thead th:nth-of-type(4) {
            width:10%;
        }
        table thead th:nth-of-type(5),
        table thead th:nth-of-type(6),
        table thead th:nth-of-type(7),
        table thead th:nth-of-type(8),
        table thead th:nth-of-type(9),
        table thead th:nth-of-type(10),
        table thead th:nth-of-type(11) {
            width: 5%;
        }
        table tbody td:nth-of-type(2){
            width:10%
        }
        table tbody td:nth-of-type(3){
            width:10%
        }
        table tbody td:nth-of-type(8),
        table tbody td:nth-of-type(10),
        table tbody td:nth-of-type(12),
        table tbody td:nth-of-type(14) {
            width: 2%;
        }



        thead {
            /* position: relative;
            top: 0;
            left: 0;
            display: table-header-group;
            border: none; */
        }
        table thead th:nth-of-type(5),
        table thead th:nth-of-type(6),
        table thead th:nth-of-type(7),
        table thead th:nth-of-type(8),
        table thead th:nth-of-type(9),
        table thead th:nth-of-type(10),
        table thead th:nth-of-type(11) {
            
        }
        table tbody td {
            border: 1px solid;
            padding: 2px 5px;
        }

        /* thead tr:nth-of-type(3)::before
{
  content: '';
  display: block;
  height: 15px;
  margin-bottom:5px

} */
        tfoot {
            /* position: relative;
            bottom: 0;
            left: 0;
            display: table-footer-group; */
        }

        tfoot tr {
            border:1px solid transparent;
        }

.text_left{
    text-align:left;
}

        @media print {
            table {
            border-collapse: collapse;
            width: 99%;
            margin: auto;
            padding: 0;
        }
            thead {
                /* position: relative;
                top: 0;
                left: 0;
                display: table-header-group; */
            }

            table tbody {
                /* position: relative;
                top: 10px;
                left: 0;
                height: 1024px;
                background-color: red;
                height: 100vh; */
            }

            tfoot {
                /* position: fixed;
                bottom: 0;
                left: 0;
                display: table-footer-group; */
            }

        }
    </style>
</head>

    <body class="myPageBreak">
        <div class="container" id="container">
            <table id="grd_table">
                <thead>
                <tr>
                        <th>الجهه</th>
                        <th colspan="4"><?php echo $office_name ?></th>
                        
                    </tr>
                    <tr>
                        <th>مخزن</th>
                        <th colspan="4">اجهزه</th>
                        <th colspan="3">محضر جرد اصناف</th>
                    </tr>
                    <tr>
                        <th>تاريخ</th>
                        <th>30/06/2022</th>
                        <th colspan="6"></th>
                        <th colspan="2"></th>
                        <th colspan="4">اسم صاحب العهده</th>
                        <th colspan="4">----------------</th>
                            </tr>
                            <tr></tr>
                            <tr>
                        <th>رقم الصنف</th>
                        <th colspan="4">اسم الصنف</th>
                        <th>الوحده</th>
                        <th>الموجود من واقع الجرد</th>
                        <th>حاله الصنف</th>
                        <th>الرصيد الدفترى</th>
                        <th>حاله الصنف</th>
                        <th colspan="2">الزياده</th>
                        <th colspan="2">العجز</th>
                        <th colspan="2">سعر الوحده</th>
                        <th colspan="2">القيمه</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
while($row1=mysqli_fetch_assoc($result))
{
    if($row1["note"] == 'بقطاع الدعم الفنى بالقاهره'){
        $row1["note"] = 'بقطاع الدعم الفنى';
    }
    if($row1["dvice_name"] == 'BARCODE SCANNER HONEYWELL XENON 1900'){
        $row1["dvice_name"] = 'BARCODE SCANNER HONEYWELL';
    }
    if($row1["dvice_name"] == 'BARCODE SCANNER DATALOGIC QW2120'){
        $row1["dvice_name"] = 'BARCODE SCANNER DATALOGIC ';
    }
    ?>

<tr>
                        <td><?php echo $row1["code_inventory"] ; ?></td>
                        <td class="text_left" colspan="4"><?php echo $row1["dvice_name"] ; ?></td>
                        <td class="text_left"><?php echo $row1["sn"] ; ?></td>
                        <td><?php echo $row1["note"] ; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
<?php }
                    ?>
                </tbody>
                <tfoot>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td colspan="4">توقيع كاتب الشطب</td>
                        <td colspan="2">توقيع صاحب العهده</td>
                        <td></td>
                        <td colspan="3">توقيع لجنه الجرد</td>
                        <td colspan="4">مدير المخازن</td>
                        <td colspan="4">رئيس المصلحه</td>
                    </tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- <script>
for (let index = 0; index < 15; index++) {
let table = document.getElementById("grd_table");
var tableHeight =  document.getElementById("grd_table").offsetHeight;
var tr_height = table.rows[0].offsetHeight;
var totalNumbeOfRows = table.rows.length;
var totalNumbeOfRowsOffsetHeight = table.rows.offsetHeight;
let tbody = table.getElementsByTagName('tbody')[0];
// Insert a row at the end of the table
let newRow = tbody.insertRow(-1);
// Insert a cell in the row at index 0
for (let index_new_cell = 0; index_new_cell < 15 ; ) {
    if(index_new_cell == 1){
        newRow.insertCell(index_new_cell).colSpan = "4";
    }
    else{
    newRow.insertCell(index_new_cell);
    }
    index_new_cell++
}
    console.log("Total Number Of Rows="+totalNumbeOfRows);
   console.log("tableHeight="+tableHeight);
}
        </script> -->
        <script>
        var table = document.getElementById("grd_table");
        var count_body_rows = document.getElementsByTagName('tbody')[0].rows.length;
        var tableHeight =  document.getElementById("grd_table").offsetHeight;
        var tr_height = table.rows[0].offsetHeight;

        console.log("tableHeight="+tableHeight);
        console.log("tr_height="+tr_height);
        console.log("count_body_rows="+count_body_rows);
       
       
// 39-27 = 12
//12+15 = 27
var ba = count_body_rows % 19 ;
console.log("ba1="+ba);

     if(ba <= 19 ){
         ba = 19 - ba;
         console.log("ba2="+ba);
        };
    
    for (let index = 0; index < ba; index++) {
        console.log("ba3="+ba);
let table = document.getElementById("grd_table");
var tableHeight =  document.getElementById("grd_table").offsetHeight;
var tr_height = table.rows[0].offsetHeight;
var totalNumbeOfRows = table.rows.length;
var totalNumbeOfRowsOffsetHeight = table.rows.offsetHeight;
let tbody = table.getElementsByTagName('tbody')[0];
// Insert a row at the end of the table
let newRow = tbody.insertRow(-1);
// Insert a cell in the row at index 0
for (let index_new_cell = 0; index_new_cell < 15 ; ) {
    if(index_new_cell == 1){
        newRow.insertCell(index_new_cell).colSpan = "4";
    }
    else{
    newRow.insertCell(index_new_cell);
    }
    index_new_cell++
}
}

        </script>
        <script type="text/javascript">
          window.onload = addPageNumbers;

          function addPageNumbers() {
            var totalPages = Math.round(document.body.offsetHeight / 649);  //842px A4 pageheight for 72dpi, 1123px A4 pageheight for 96dpi, 
            for (var i = 1; i <= totalPages; i++) {
              var pageNumberDiv = document.createElement("div");
              var pageNumber = document.createTextNode( i + " / " + totalPages);
              pageNumberDiv.style.position = "absolute";
           pageNumberDiv.style.top = "calc(( 649 * " +  i + "px - 630px) + (( " +  i + " - 1 ) * 60px )"; //297mm A4 pageheight; 0,5px unknown needed necessary correction value; additional wanted 40px margin from bottom(own element height included)
        //    pageNumberDiv.style.top = "calc((" + i + " * (297mm - 0.5px)) - 80px)"; //297mm A4 pageheight; 0,5px unknown needed necessary correction value; additional wanted 40px margin from bottom(own element height included)
              pageNumberDiv.style.height = "16px";
              pageNumberDiv.appendChild(pageNumber);
              document.body.insertBefore(pageNumberDiv, document.getElementById("content"));
              pageNumberDiv.style.right = "calc(100% - (" + pageNumberDiv.offsetWidth + "px + 20px))";
            }
          }
        </script>
    </body>

</html>