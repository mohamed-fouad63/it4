<div class="modal fade" id="Resend_To_Office_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">اعاده الجهاز للمكتب</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" attachments>نوع الجهاز </span>
                    <input type="text" class="form-control me-3 dvice_name" placeholder="نوع الجهاز"
                        value="BARCODE PRINTER INTERMEC PC43T">
                    <span class="input-group-text  col-sm-2" attachments>السريال</span>
                    <input type="text" class="form-control dvice_sn" placeholder="السريال">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" attachments>التاريخ</span>
                    <input type="date" class="form-control me-3" id="resen_to_office_date" value="<?php echo date('Y-m-d') ?>">
                    <span class="input-group-text  col-sm-2">ارسال بواسطه</span>
                    <input type="text" class="form-control" id="resen_to_office_by" placeholder="ارسال بواسطه">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success">ارسال</button>
            </div>
        </div>
    </div>
</div>