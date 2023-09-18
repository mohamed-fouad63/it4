<div class="modal fade" id="To_Tts_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">تسليم الى قطاع الدعم الفنى للصيانه</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                @csrf
                    <span class="input-group-text  col-sm-2" id="basic-addon1">اسم المكتب</span>
                    <input type="text" class="form-control me-3 office_name" placeholder="اسم المكتب" readonly
                        value="BARCODE PRINTER INTERMEC PC43T">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">نوع الجهاز</span>
                    <input type="text" class="form-control dvice_name" placeholder="نوع الجهاز" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">سريال</span>
                    <input type="text" class="form-control me-3 dvice_sn" placeholder="سريال" readonly>
                    <span class="input-group-text  col-sm-2" id="basic-addon1">العطل</span>
                    <input type="text" class="form-control damage" placeholder="العطل" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">بتاريخ</span>
                    <input type="date" class="form-control me-3" id="date_auth_repair"
                        value="<?php echo date('Y-m-d') ?>">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">رقم الاذن</span>
                    <input type="text" class="form-control" id="auth_repair" placeholder="رقم الاذن">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <a class="btn btn-primary sub_print_ticket"  target="_blank">
                <i class="bi bi-file-earmark-text-fill"></i>استخراج اذن الاصلاح</a>
                <button type="button" class="btn btn-success">تسليم</button>
            </div>
        </div>
    </div>
</div>