<div class="modal fade" id="Delete_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">استنزال عهده</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                @csrf
                    <span class="input-group-text  col-sm-2">نوع الجهاز </span>
                    <input type="text" class="form-control me-3 dvice_name" placeholder="نوع الجهاز" readonly>
                    <span class="input-group-text  col-sm-2">السريال</span>
                    <input type="text" class="form-control dvice_sn" placeholder="السريال" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">التاريخ</span>
                    <input type="date" class="form-control me-3" id="delete_date" value="<?php echo date('Y-m-d'); ?>">
                    <span class="input-group-text  col-sm-2">بواسطه</span>
                    <input type="text" class="form-control" id="delete_by" placeholder="كيفيه استنزال العهده">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success">ارسال</button>
            </div>
        </div>
    </div>
</div>