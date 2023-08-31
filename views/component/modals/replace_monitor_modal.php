<div class="modal fade" id="Replace_Monitor" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">استبدال شاشه</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">نوع الجهاز </span>
                    <input type="text" class="form-control me-3 dvice_name" id="dvice_name" placeholder="نوع الجهاز"
                        readonly>
                    <span class="input-group-text  col-sm-2">السريال القديم</span>
                    <input type="text" class="form-control dvice_sn" id="dvice_sn" placeholder="السريال" readonly>
                </div>
                <div class="input-group mb-3" id="ip_domain">
                    <span class="input-group-text  col-sm-2">تاريخ الاستبدال</span>
                    <input type="date" class="form-control me-3" id="replace_monitor_date" value="<?php echo date('Y-m-d') ?>">
                    <span class="input-group-text  col-sm-2">السريال الجديد</span>
                    <input type="text" class="form-control pc_domian_name" id="replace_monitor_new_sn" placeholder="سريال الشاشه الجديد">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success dvice_num" id="dvice_num">تعديل</button>
            </div>
        </div>
    </div>
</div>