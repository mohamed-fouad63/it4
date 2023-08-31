<div class="modal fade" id="To_It_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">الى قسم الدعم الفنى للصيانه</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">اسم المكتب</span>
                    <input type="text" class="form-control me-3 office_name" id="office_name" placeholder="اسم المكتب"
                        readonly>
                    <span class="input-group-text  col-sm-2">نوع الجهاز</span>
                    <input type="text" class="form-control dvice_name" id="to_it_dvice_name" placeholder="نوع الجهاز"
                        readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">سريال</span>
                    <input type="text" class="form-control me-3 dvice_sn" id="to_it_dvice_sn" placeholder="سريال" readonly>
                    <span class="input-group-text  col-sm-2">ورد بواسطه</span>
                    <input type="text" class="form-control" id="to_it_by" placeholder="ورد بواسطه">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">بتاريخ</span>
                    <input type="date" class="form-control me-3" id="to_it_date" value="<?php echo date('Y-m-d')?>" placeholder="بتاريخ">
                    <span class="input-group-text  col-sm-2">العطل</span>
                    <input type="text" class="form-control" id="damage" placeholder="العطل Name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2">ملاحظات</span>
                    <textarea type="text" class="form-control" id="in_it_note" placeholder="ملاحظات"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <input type="hidden" class="dvice_id" id="dvice_id">
                <input type="hidden" class="dvice_type" id="dvice_type">
                <button type="button" class="btn btn-success" id="dvice_num">استلام</button>
            </div>
        </div>
    </div>
</div>