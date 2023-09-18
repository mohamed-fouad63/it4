<div class="modal fade" id="Move_To_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">نقل </h5>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                    @csrf
                        <span class="input-group-text  col-sm-2">نوع الجهاز</span>
                        <input type="text" class="form-control me-3 dvice_name" id="move_to_dvice_name" placeholder="نوع الجهاز" readonly>
                        <span class="input-group-text  col-sm-2">السريال</span>
                        <input type="text" class="form-control dvice_sn" id="move_to_dvice_sn" placeholder="السريال" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text  col-sm-2">من</span>
                        <input type="text" class="form-control me-3 office_name" id="move_to_office_name" placeholder="من" readonly>
                        <span class="input-group-text  col-sm-2">الى</span>
                        <select class="form-control" id="office_name_to" required>

                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text  col-sm-2">تم النقل بواسطه</span>
                        <input type="text" class="form-control me-3" id="move_by" placeholder="تم النقل بواسطه">
                        <span class="input-group-text  col-sm-2">بتاريخ</span>
                        <input type="date" class="form-control" id="move_to_date" value="<?php echo date('Y-m-d'); ?>" placeholder="بتاريخ">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text  col-sm-2">ملاحظات</span>
                        <textarea type="text" class="form-control" id="move_note" placeholder="ملاحظات"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                    <a class="btn btn-primary" id="auth_move_to_btn" target="_blank" href="">
                <i class="bi bi-file-earmark-text-fill"></i>
                استخراج اذن نقل العهده</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success disabled" id="move_to_btn">نقل كـ</button>
                            <select class="btn btn-success dropdown-toggle-split" id="move_like">
                            <option value=""></option>
                            <option value="مؤقت">مؤقت</option>
                            <option value="عهده">عهده</option>
                        </select>
                        </div>
                    </div>
            </div>
        </div>
    </form>
</div>