<div class="modal fade" id="Resen_To_It_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">اعاده الجهاز لقسم الدعم الفنى</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">نوع الجهاز </span>
                    <input type="text" class="form-control me-3 dvice_name" placeholder="نوع الجهاز" readonly>
                    <span class="input-group-text  col-sm-2">السريال</span>
                    <input type="text" class="form-control dvice_sn" placeholder="السريال" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">التاريخ</span>
                    <input type="date" class="form-control me-3" id="date_from_auth_repair" value="<?php echo date('Y-m-d') ?>">
                    <span class="input-group-text  col-sm-2">بواسطه</span>
                    <input type="text" class="form-control" id="by_from_auth_repair" placeholder="بواسطه">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success">استلام</button>
            </div>
        </div>
    </div>
</div>