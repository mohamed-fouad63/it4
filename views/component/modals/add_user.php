<div class="modal fade" id="Add_dvice_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">اضافه اجهزه</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text  col-sm-2" id="basic-addon1">صنف الجهاز </span>
                    <select class="form-select text-end me-3" id="id_dvice_type" required>
                        <option></option>
                    </select>

                    <span class="input-group-text  col-sm-2" id="basic-addon1">موديل الجهاز</span>
                    <select class="form-select " id="select_dvice_name">
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-sm-2" id="basic-addon1">نوع الجهاز</span>
                    <input type="text" class="form-control me-3" id="divce_type" placeholder="نوع الجهاز">
                    <span class="input-group-text col-sm-2" id="basic-addon1">كود مخزنى</span>
                    <input type="text" class="form-control" id="code_inventory" placeholder="كود مخزنى">
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-check flex-grow-1">
                    <label class="form-check-label" for="flexSwitchCheckDefault">ابقاء النافذه مفتوحه</label>
                    <input class="form-check-input" type="checkbox" value="" id="chk_btn"
                        onclick="dismiss_modal_check()">
                </div>
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success disabled" data-bs-dismiss="modal"
                    id="add_dvice_btn">اضافه</button>
            </div>
        </div>
    </div>
</div>