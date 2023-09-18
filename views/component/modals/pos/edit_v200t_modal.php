<div class="modal fade" id="Edit_Pos_Modal" tabindex="-1" aria-labelledby="EditPosModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditPosModal">تعديل بيانات ماكينه V200T</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                @csrf
                    <span class="input-group-text col-sm-2">مكتب</span>
                    <input type="text" class="form-control me-3" id="office_name" placeholder="مكتب" readonly>
                    <span class="input-group-text col-sm-2">سريال </span>
                    <input type="text" class="form-control" id="pos_sn" placeholder="سريال" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-sm-2">كود مالى</span>
                    <input type="text" class="form-control me-3" id="money_code" placeholder="كود مالى" readonly>
                    <span class="input-group-text col-sm-2">عدد الموظفين</span>
                    <input type="number" class="form-control text-start" id="stuff_pos">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-sm-2">TERMINAL</span>
                    <input type="number" class="form-control text-start me-3" id="pos_terminal" placeholder="TERMINAL">
                    <span class="input-group-text col-sm-2">MERCHANT</span>
                    <input type="number" class="form-control text-start" id="pos_merchant" placeholder="MERCHANT">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-success">تعديل</button>
            </div>
        </div>
    </div>
</div>