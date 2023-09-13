<div class="modal fade" id="add_mission_modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">اضافه ماموريه</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text col-sm-2" id="it_name_label">القائم بالماوريه</span>
                        <input type="text" class="form-control me-3" name="it_name" id="it_name" placeholder="القائم بالماوريه" readonly>
                        <span class="input-group-text col-sm-2" id="select_office_name_label">مكتب المرور</span>
                        <select class="form-select form-control" id="select_office_name" name="office_name" aria-label="Default select example">
                            <option></option>
                            <option value="المنطقه">المنطقه</option>
                            <option value="اجازه عارضه">اجازه عارضه</option>
                            <option value="اجازه اعتياديه">اجازه اعتياديه</option>
                            <option value="اجازه مرضيه">اجازه مرضيه</option>
                            <option value="اجازه رسميه">اجازه رسميه</option>
                            <option value="ماموريه القاهره">ماموريه القاهره</option>
                            <option value="بدل  راحه">بدل راحه</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-sm-2" id="mission_date_start_label">بتاريخ</span>
                        <input type="date" class="form-control me-3" id="mission_date_start" name="misin_date" value="<?php echo date('Y-m-d') ?>">
                        <span class="input-group-text col-sm-2" id="badl_raha_label">عن يوم</span>
                        <input type="date" class="form-control" name ="badal_raha_date" id="badal_raha_date" value="<?php echo date('Y-m-d') ?>">
                        <span class="input-group-text col-sm-2" id="mission_date_end_label">حتى تاريخ</span>
                        <input type="date" class="form-control" id="mission_date_end" value="<?php echo date('Y-m-d') ?>">
                        <span class="input-group-text col-sm-2" id="mission_type_label">نوع الماموريه</span>
                        <select class="form-select" id="mission_type" aria-label="Default select example">
                            <option></option>
                            <option value="خطه">خطه</option>
                            <option value="بلاغ">بلاغ</option>
                        </select>
                        <input type="text" class="form-control" id="misin_cairo_type" name="reason_vacation" placeholder="سبب الماموريه">
                    </div>
                    <div class="input-group mb-3" id="mission_time">
                        <span class="input-group-text col-sm-2" id="basic-addon1">من الساعه</span>
                        <input type="time" class="form-control me-3" id="mission_time_start">
                        <span class="input-group-text col-sm-2" id="basic-addon1">الى الساعه</span>
                        <input type="time" class="form-control" id="mission_time_end">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-check">

                        <label class="form-check-label" for="flexSwitchCheckDefault">ابقاء النافذه مفتوحه</label>
                        <input class="form-check-input" type="checkbox" value="" id="chk_btn" onclick="dismiss_modal_check('chk_btn','add_mission_btn')">
                    </div>
                    <div id="" class="flex-grow-1">
                        <button class="btn btn-primary" id="vactionFormSub" formaction="/it4/vactionFormSub" formtarget="_blank">
                            <i class="bi bi-file-earmark-text-fill"></i>طباعه الاجازه
                        </button>
                        <button class="btn btn-primary" id="badlRahaFormSubOnLine" formaction="/it4/badlRahaFormSubOnLine" formtarget="_blank">
                            <i class="bi bi-file-earmark-text-fill"></i>طباعه بدل الراحه
                        </button>
                    </div>
            </form>
            <a class="btn btn-teal" data-bs-dismiss="modal">الغاء</a>
            <button type="button" class="btn btn-success add_mission" id="add_mission_btn" data-bs-dismiss="modal">اضافه</button>
        </div>

    </div>
</div>
</div>