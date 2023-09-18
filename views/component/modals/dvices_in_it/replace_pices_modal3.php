<div class="modal fade" id="Replace_Pices_Modal3" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">استبدال قطع غيار طابعه باركود</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                @csrf
                    <span class="input-group-text  col-sm-2" id="basic-addon1">اسم المكتب</span>
                    <input type="text" class="form-control me-3 office_name" id="office_name3" placeholder=">اسم المكتب"
                        readonly>
                    <span class="input-group-text  col-sm-2" id="basic-addon1">نوع الجهاز</span>
                    <input type="text" class="form-control dvice_name" id="dvice_name3" placeholder="نوع الجهاز"
                        readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">سريال</span>
                    <input type="text" class="form-control me-3 dvice_sn" id="dvice_sn3" placeholder="سريال" readonly>
                    <span class="input-group-text  col-sm-2" id="basic-addon1">التاريخ</span>
                    <input type="date" class="form-control" id="date_replace_Pices3" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="replace_Pices d-flex flex-wrap" style="gap: 3px;">
                    <div class="card flex-grow-1">
                        <div class="card-header">
                            <label>Head Print</label>
                            <i class="bi bi-arrow-clockwise" onclick="reset_radio('HeadPrint')"></i>
                        </div>
                        <div class="card-body">
                            <input type="radio" class="btn-check" name="HeadPrint" value="Head Print" id="HeadPrint" autocomplete="off">
                            <label class="btn btn-outline-success" for="HeadPrint">Head Print</label>
                        </div>
                    </div>
                    <div class="card flex-grow-1">
                        <div class="card-header">
                            <label>Rloe Print</label>
                            <i class="bi bi-arrow-clockwise" onclick="reset_radio('RolePrint')"></i>
                        </div>
                        <div class="card-body">
                            <input type="radio" class="btn-check" name="RolePrint" value="Role Print" id="RolePrint"
                                autocomplete="off">
                            <label class="btn btn-outline-success" for="RolePrint">Role Print</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success">استبدال</button>
            </div>

        </div>
    </div>
</div>