<div class="modal fade" id="Edit_In_Tts_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">تعديل بيانات</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">نوع الجهاز</span>
                    <input type="text" class="form-control me-3 dvice_name" placeholder="نوع الجهاز" readonly>
                    <span class="input-group-text  col-sm-2">السريال</span>
                    <input type="text" class="form-control dvice_sn" placeholder="السريال" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">بتاريخ</span>
                    <input type="date" class="form-control me-3 date_auth_repair" id="date_auth_repair" value="<?php echo date('Y-m-d') ?>">
                    <span class="input-group-text  col-sm-2">رقم الاذن</span>
                    <input type="text" class="form-control auth_repair" id="auth_repair" placeholder="رقم الاذن">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success">تعديل</button>
            </div>
        </div>
    </div>
</div>