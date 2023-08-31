<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>تسجيل الدخول لقاعده بياتات الدعم الفنى</title>
  <link rel="icon" href="../it4/views/assets/images/it1.svg" type="image/x-icon" />
  <style>
    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      font-family: system-ui;
      min-width: 700px;
      overflow: hidden;
    }

    .splitdiv {
      height: 100%;

    }

    #leftdiv {
      float: right;
      width: 40%;
      background-color: #FAFAFA;
    }

    #leftdivcard {
      margin: 0 auto;
      width: 50%;
      /* background-color:white; */
      margin-top: 50vh;
      transform: translateY(-50%);
      /* box-shadow: 10px 10px 1px 0px rgba(78, 205, 196, .2); */
      border-radius: 10px;
      display: flex;
      flex-direction: column;
    }

    .leftbutton {
      background-color: #2c3e50;
      border-radius: 5px;
      color: #FAFAFA;
      cursor: pointer;
    }

    #rightdiv {
      float: left;
      width: 60%;
      background-color: #2c3e50;
    }

    #rightdivcard {
      margin: 0 auto;
      width: 50%;
      margin-top: 50vh;
      transform: translateY(-50%);
    }

    #rightbutton {
      background-color: #FFFFFF;
      border-radius: 5px;
      color: #2c3e50;
    }

    h1 {
      font-family: system-ui;
      color: #2c3e50
    }

    input {}

    input,
    select {
      font-family: system-ui;
      font-size: 16px;
      text-align: right;
      font-size: 1.5rem;
      padding: 10px;
      margin-left: 2%;
      margin-right: 2%;
      margin-top: 10px;
      margin-bottom: 10px;
      display: inline-block;
      background-color: #FAFAFA;
      border: none;
      outline: none !important;
      border: 1px solid #2c3e50;
      box-shadow: 0 0 5px #719ECE;
      direction: rtl
    }

    button {
      outline: none !important;
      font-family: system-ui;
      margin-bottom: 15px;
      border: none;
      font-size: 20px;
      padding: 8px;
      padding-left: 20px;
      padding-right: 20px;
    }
  </style>
</head>

<body>
  <div style="height:100%;">
    <div class="splitdiv" id="leftdiv">
      <form method="get" action="/it4/submit_login">
        <div id="leftdivcard">
          <select class="custom-select" name="db" id="db" style="">
            <option>اختر المنطقه</option>
            <?php
            $fgc = file_get_contents("http://localhost/it2/jsons/area_name.json");
            $jc = json_decode($fgc, true);
            foreach ($jc as $key => $value) { ?>
              <option value="<?php echo $key ?>"><?php echo $value; ?></option>
            <?php } ?>
          </select>
          <input type="text" name="user_id" placeholder="رقم الملف" required>
          <input type="password" name="user_pass" placeholder="كلمه المرور" required>
          <div style="text-align:center">
            <button type="submit" name="login_btn" class="leftbutton">تسجيل الدخول</button>
          </div>
        </div>
      </form>
    </div>
    <div class="splitdiv" id="rightdiv">
      <div id="rightdivcard">
        <h1 style="padding-top:20px;text-align:center;color:white">اداره الاجهزه و الاعمال الاداريه</h1>
        <h4 id="result"></h4>
        <p style="color:white;text-align:center">احصائيات | اضافه | تعديل | تكهين | نقل | خطط شهريه</p>
        <div style="text-align:center">
          <img src="/it4/views/assets/images/it1.svg" style="height:50vh" class="logo">
        </div>
      </div>
    </div>
  </div>
  <script src="/it4/views/assets/js/plugins/jquery.min.js"></script>
  <script>
    $("form").submit(function(event) {
      event.preventDefault();
      $.ajax({
        type: "post",
        url: "/it4/submit_login",
        data: $('form').serialize(),
        success: function(result) {
          console.log(result);
          if (result == 'done') {
            window.location.replace('/it4/dashboard');
            console.log(result);
          } else {
            alert(result)
            // console.log(result)
          }
        }
      })
      // var xhttp = new XMLHttpRequest();
      // xhttp.onreadystatechange = function() {
      //   if (this.readyState == 4 && this.status == 200) {
      //     console.log(xhttp.responseText);
      //   }
      // };
      // xhttp.open("POST", "/it4/submit_login", true);
      // xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      // xhttp.send('mo');
    });
  </script>
  <script>
    function readCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.trim()
        };
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
    }

    var selectbox = document.getElementById("db");
    window.onload = function() {
      selectbox.selectedIndex = readCookie("db");
    }
    selectbox.onchange = function() {
      var d = new Date();
      d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = 'db = ' + this.selectedIndex + ';' + expires + '; path=/;';
    }
  </script>
</body>

</html>