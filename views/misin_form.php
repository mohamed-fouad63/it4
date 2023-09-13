<?php


?>
<html>

<head>
    <link rel="stylesheet" href="./views/assets/css/bootstrap.css">
    <style>
        .w13 {
            width: 13.5%;
            position: relative;
            /* min-height: 1px; */
            /* padding-right: 15px; */
            padding-left: 15px;
            float: right;
            text-align: center;
        }

        input[type="checkbox"] {
            display: none;
        }

        .panel-heading {
            min-height: 65px;
            text-align: center;
        }

        .checkmark {
            position: absolute;
            top: 60%;
            left: 40%;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border: 1px solid #ED3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: inline-block;
        }

        input:checked~.checkmark {
            background-color: #2196F3;
        }

        input:checked~.checkmark:after {
            display: block;
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .list {
            direction: rtl;
            font-weight: bold;
            font-size: 18px;
            border: 1px solid green;

            text-align: center;
        }

        .trans {
            -webkit-transition: display 2s;
            /* For Safari 3.1 to 6.0 */
            transition: display 22s;
        }

        textarea {
            font-weight: bold;
            padding: 4px 12px;
            font-size: 18px;
        }

        #toggle_reson_of_vacance,
        #toggle_reson_of_vacance_abel,
        #toggle_badal_raha,
        #toggle_badal_raha_label {
            display: none;
        }
    </style>
</head>

<body dir="rtl" style="text-align: center;">
    <div class="" id="add_misin">
        <form method="POST" class="form-horizontal" target="_top">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="my_misin.php">
                            <button type="button" class="close" data-dismiss="modal">&times;</button></a>
                        <h4 class="modal-title">اضافه مامويه جديده</h4>
                    </div>
                    <div class="modal-body">
                        <!--<input style="display:none" type="text" name="pc_move_num" id="pc_move_num" placeholder="pc_move_num">-->
                        <!-- start first -->
                        <fieldset>
                            <legend><span class="badge">بيانات المكتب</span></legend>
                            <div class="form-group">

                                <div class="col-sm-4">
                                    <select class="form-control list" name="office_name" id="office_name" onchange="chanemisin()" required>
                                        <option></option>
                                        <option value="اجازه اعتياديه">اجازه اعتياديه</option>
                                        <option value="اجازه عارضه">اجازه عارضه</option>
                                        <option value="بدل راحه">بدل راحه</option>
                                    </select>
                                </div>
                                <label class="control-label col-sm-2">مكتب المرور</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control list" name="it_name" id="it_name" value="<?php echo $_SESSION['first_name'] ?>" placeholder="it_name" required>
                                </div>
                                <label class="control-label col-sm-2">اخصائى تشغيل نظم</label>
                            </div>
                            <!-- end first -->
                            <!-- start sec -->
                            <div class="form-group">
                                <div class="col-sm-4" id="toggle_badal_raha">
                                    <input type="date" class="form-control list" id="badal_raha_date" name="badal_raha_date" placeholder="تاريخ بدل الرحه">
                                </div>
                                <label class="control-label col-sm-2" id="toggle_badal_raha_label">عن يوم </label>
                                <div class="col-sm-4" id="toggle_reson_of_vacance">
                                    <input type="text" class="form-control list" name="reason_vacation" value="ظروف طارئه">
                                </div>
                                <label class="control-label col-sm-2" id="toggle_reson_of_vacance_abel">و ذلك لـ
                                </label>
                                <div class="col-sm-4">
                                    <select class="form-control list" name="misin_type" id="misin_type">
                                        <option value="خطه">خطه</option>
                                        <option value="بلاغ">بلاغ</option>
                                    </select>
                                </div>
                                <label class="control-label col-sm-2" id="misin_type_label"> نوع الماموريه</label>

                                <div class="col-sm-4">
                                    <input type="date" class="form-control list" id="misin_date" name="misin_date" value="<?php echo date('Y-m-d') ?>" placeholder="تاريخ الماموريه" required>
                                </div>
                                <label class="control-label col-sm-2">بتاريخ</label>
                            </div>
                            <!-- end sec -->
                            <!-- start thr -->
                            <div class="form-group" id="misin_time">
                                <div class="col-sm-4">
                                    <input type="time" class="form-control list" id="end_time" name="end_time" required>
                                </div>

                                <label class="control-label col-sm-2">الى الساعه</label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control list" id="start_time" name="start_time" required>
                                </div>

                                <label class="control-label col-sm-2">من الساعه</label>
                            </div>
                        </fieldset>
                        <div class="trans">
                            <fieldset id="network">
                                <legend><span class="badge">بيانات الشبكه</span></legend>
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <select class="form-control list" name="Network_Status" id="">
                                            <option value="جيده">جيده</option>
                                            <option value="متوسطه">متوسطه</option>
                                            <option value="ضعيفه">ضعيفه</option>
                                        </select>
                                    </div>
                                    <label class="control-label col-sm-2"> حاله الشبكه</label>

                                    <div class="col-sm-4">
                                        <select class="form-control list" name="Network_points" id="">
                                            <option value="لا">لا</option>
                                            <option value="نعم">نعم</option>
                                        </select>
                                    </div>
                                    <label class="control-label col-sm-2">المكتب يحتاج لنقاط شبكه</label>
                                </div>
                            </fieldset>
                            <fieldset id="dvice">
                                <legend><span class="badge">حاله الاجهزه </span></legend>
                                <div class="col-sm-4" style="float:right;">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title">هل تم تنزيل برامج الخدمات و البرامج المساعده و
                                                مكافح الفيروسات </label>
                                        </div>
                                        <div class="panel-body">
                                            <select class="form-control list" name="pc_program" id="">
                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4" style="float:right;">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title">هل يوجد اعطال بالاجهزه </label>
                                        </div>
                                        <div class="panel-body">
                                            <select class="form-control list" name="pc_damage" id="">
                                                <option value="لا">لا</option>
                                                <option value="نعم">نعم</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4" style="float:right;">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title">هل نظام التشغيل النسخه المعتمده من قطاع الدم
                                                الفنى </label>
                                        </div>
                                        <div class="panel-body">
                                            <select class="form-control list" name="pc_os" id="" required>
                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="domain">
                                <legend><span class="badge"> الدومين </span></legend>
                                <div class="col-sm-3" style="float:right;">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title">هل الاجهزه مربوطه بالدومين </label>
                                        </div>
                                        <div class="panel-body">
                                            <select class="form-control list" name="pc_domain" id="pc_domain">
                                                <option value="لا">لا</option>
                                                <option value="نعم">نعم</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3" style="float:right;">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title">عدد الاجهزه المربوطه بالدومين </label>
                                        </div>
                                        <div class="panel-body">
                                            <input type="number" min="0" max="99" class="form-control list" name="num_pc_domain" id="num_pc_domain">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="float:right;">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title">عدد الاجهزه خارج الدومين و السبب </label>
                                        </div>
                                        <div class="panel-body">
                                            <input type="text" class="form-control list" maxlength="50" name="note_not_domain" id="">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="service">
                                <legend><span class="badge"> الخدمات </span></legend>
                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="shm">الشباك الموحد </label>
                                        </div>
                                        <label for="shm">
                                            <div class="panel-body">
                                                <input type="checkbox" name="shm" id="shm" value="الشباك الموحد">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="mn">مراقبه النقديه</label>
                                        </div>
                                        <label for="mn">
                                            <div class="panel-body">
                                                <input type="checkbox" name="mn" id="mn" value="مراقبه النقديه">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="hf">الحوالات الفوريه </label>
                                        </div>
                                        <label for="hf">
                                            <div class="panel-body">
                                                <input type="checkbox" name="hf" id="hf" value="الحوالات الفوريه">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="th">التحصيل و الاخطار</label>
                                        </div>
                                        <label for="th">
                                            <div class="panel-body">
                                                <input type="checkbox" name="th" id="th" value="التحصيل و الاخطار">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="et"> المصريه للاتصالات</label>
                                        </div>
                                        <label for="et">
                                            <div class="panel-body">
                                                <input type="checkbox" name="et" id="et" value="المصريه للاتصالات">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="tw">منظومه الطوابع</label>
                                        </div>
                                        <label for="tw">
                                            <div class="panel-body">
                                                <input type="checkbox" name="tw" id="tw" value="منظومه الطوابع">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="e-mail">البريد الالكترونى </label>
                                        </div>
                                        <label for="e-mail">
                                            <div class="panel-body">
                                                <input type="checkbox" name="email" id="e-mail" value="البريد الالكترونى">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="des"> مصر الرقميه</label>
                                        </div>
                                        <label for="des">
                                            <div class="panel-body">
                                                <input type="checkbox" name="des" id="des" value="امصر الرقميه">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="bo">باك اوفيس </label>
                                        </div>
                                        <label for="bo">
                                            <div class="panel-body">
                                                <input type="checkbox" name="bo" id="bo" value="باك اوفيس">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="fo">فرونت اوفيس </label>
                                        </div>
                                        <label for="fo">
                                            <div class="panel-body">
                                                <input type="checkbox" name="fo" id="fo" value="فرونت اوفيس">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="khh"> الخدمات الحكوميه </label>
                                        </div>
                                        <label for="khh">
                                            <div class="panel-body">
                                                <input type="checkbox" name="khh" id="khh" value="الخدمات الحكوميه">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="am"> الاحوال المدنيه </label>
                                        </div>
                                        <label for="am">
                                            <div class="panel-body">
                                                <input type="checkbox" name="am" id="am" value="الاحوال المدنيه ">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="mnsh"> موقع المنشورات </label>
                                        </div>
                                        <label for="mnsh">
                                            <div class="panel-body">
                                                <input type="checkbox" name="mnsh" id="mnsh" value=" موقع المنشورات">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading">
                                            <label class="panel-title" for="hkh"> الحوالات الخارجيه </label>
                                        </div>
                                        <label for="hkh">
                                            <div class="panel-body">
                                                <input type="checkbox" name="hkh" id="hkh" value="الحوالات الخارجيه">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>


                            </fieldset>
                            <fieldset id="tools">
                                <legend><span class="badge"> مستلزمات التشغيل </span></legend>
                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="toner"> حباره </label>
                                        </div>
                                        <label for="toner">
                                            <div class="panel-body">
                                                <input type="checkbox" name="toner" id="toner" value="toner">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="dram">درام </label>
                                        </div>
                                        <label for="dram">
                                            <div class="panel-body">
                                                <input type="checkbox" name="dram" id="dram" value="dram">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="keyboard">لوحه مفاتيح</label>
                                        </div>
                                        <label for="keyboard">
                                            <div class="panel-body">
                                                <input type="checkbox" name="keyboard" id="keyboard" value="keyboard">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="mouse">فأره</label>
                                        </div>
                                        <label for="mouse">
                                            <div class="panel-body">
                                                <input type="checkbox" name="mouse" id="mouse" value="mouse">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="barscan">قارئ باركود</label>
                                        </div>
                                        <label for="barscan">
                                            <div class="panel-body">
                                                <input type="checkbox" name="barscan" id="barscan" value="barscan">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="pc">جهاز حاسب</label>
                                        </div>
                                        <label for="pc">
                                            <div class="panel-body">
                                                <input type="checkbox" name="pc" id="pc" value="pc">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="monitor">شاشه حاسب</label>
                                        </div>
                                        <label for="monitor">
                                            <div class="panel-body">
                                                <input type="checkbox" name="monitor" id="monitor" value="monitor">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="w13">
                                    <div class="panel panel-default dvice_mode">
                                        <div class="panel-heading panel-height">
                                            <label class="panel-title" for="printer">طابعه ليزر</label>
                                        </div>
                                        <label for="printer">
                                            <div class="panel-body">
                                                <input type="checkbox" name="printer" id="printer" value="printer">
                                                <span class="checkmark"></span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="does">
                                <legend><span class="badge"> ما تم عمله </span></legend>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea rows="7" cols="70" name="does"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div><!-- end body form -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="first_form" id="first_form" formaction="/it4/misinReport">
                            <i class="fas fa-check"></i> الماموريه
                        </button>
                        <button style="display:none;" type="hidden" class="btn btn-primary" id="second_form" formaction="/it4/vactionFormSubOnLine">
                            <i class="fas fa-check"></i>اضافه الاجازه
                        </button>
                        <button style="display: inline-block;" type="hidden" class="btn btn-primary" id="third_form" formaction="/it4/badlRahaFormSubOnLine">
                            <i class="fas fa-check"></i>اضافه بدل الرحه
                        </button>
                        <a href="">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="window.close();">
                                <i class="fas fa-ban"></i> الغاء
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "/it4/ajaxOfficesNames");
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send();
        xhr.onload =
            function() {
                data = JSON.parse(xhr.responseText);
                select = document.getElementById('office_name');
                data.forEach(function(ele) {
                    var option = document.createElement("option");
                    option.textContent = ele.office_name;
                    option.value = ele.office_name;
                    select.appendChild(option);
                });
            };
    </script>
    <script>
        function chanemisin() {
            var office = document.getElementById('office_name').value;
            switch (office) {
                case "اجازه اعتياديه":
                case "اجازه عارضه":
                    document.getElementById('network').style.display = "none";
                    document.getElementById('dvice').style.display = "none";
                    document.getElementById('domain').style.display = "none";
                    document.getElementById('service').style.display = "none";
                    document.getElementById('tools').style.display = "none";
                    document.getElementById('does').style.display = "none";
                    document.getElementById('misin_time').style.display = "none";
                    document.getElementById('misin_type').style.display = "none";
                    document.getElementById('misin_type_label').style.display = "none";
                    document.getElementById('first_form').style.display = "none";
                    document.getElementById('second_form').style.display = "inline-block";
                    document.getElementById('third_form').style.display = "none";
                    document.getElementById('toggle_badal_raha').style.display = "none";
                    document.getElementById('toggle_badal_raha_label').style.display = "none";
                    document.getElementById('toggle_reson_of_vacance').style.display = "inline-block";
                    document.getElementById('toggle_reson_of_vacance_abel').style.display = "inline-block";
                    document.getElementById("badal_raha_date").removeAttribute("required");
                    break;
                case "بدل راحه":
                    document.getElementById('network').style.display = "none";
                    document.getElementById('dvice').style.display = "none";
                    document.getElementById('domain').style.display = "none";
                    document.getElementById('service').style.display = "none";
                    document.getElementById('tools').style.display = "none";
                    document.getElementById('does').style.display = "none";
                    document.getElementById('misin_time').style.display = "none";
                    document.getElementById('misin_type').style.display = "none";
                    document.getElementById('misin_type_label').style.display = "none";
                    document.getElementById('first_form').style.display = "none";
                    document.getElementById('second_form').style.display = "none";
                    document.getElementById('third_form').style.display = "inline-block";
                    document.getElementById('toggle_badal_raha').style.display = "inline-block";
                    document.getElementById('toggle_badal_raha_label').style.display = "inline-block";
                    document.getElementById('toggle_reson_of_vacance').style.display = "none";
                    document.getElementById('toggle_reson_of_vacance_abel').style.display = "none";
                    document.getElementById("badal_raha_date").setAttribute("required", "");
                    break;
                default:
                    document.getElementById('network').style.display = "block";
                    document.getElementById('dvice').style.display = "block";
                    document.getElementById('domain').style.display = "block";
                    document.getElementById('service').style.display = "block";
                    document.getElementById('tools').style.display = "block";
                    document.getElementById('does').style.display = "block";
                    document.getElementById('misin_time').style.display = "block";
                    document.getElementById('misin_type').style.display = "block";
                    document.getElementById('misin_type_label').style.display = "inline-block";
                    document.getElementById('first_form').style.display = "inline-block";
                    document.getElementById('second_form').style.display = "none";
                    document.getElementById('third_form').style.display = "none";
                    document.getElementById('toggle_reson_of_vacance').style.display = "none";
                    document.getElementById('toggle_reson_of_vacance_abel').style.display = "none";
                    document.getElementById('toggle_badal_raha').style.display = "none";
                    document.getElementById('toggle_badal_raha_label').style.display = "none";
                    document.getElementById('toggle_reson_of_vacance').style.display = "none";
                    document.getElementById('toggle_reson_of_vacance_abel').style.display = "none";
                    document.getElementById("badal_raha_date").removeAttribute("required");
            }
        }
    </script>
    <script>
        document.getElementById("end_time").value = "15:00:00";
    </script>
    <script>
        document.getElementById("start_time").value = "08:00:00";
    </script>
</body>

</html>