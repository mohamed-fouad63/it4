<div class="modal fade" id="Delete_Notice_Modal" tabindex="-1" aria-labelledby="DeleteNoticeModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteNoticeModal">حذف البلاغ</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                @csrf
                    <span class="input-group-text col-sm-2">جهه البلاغ</span>
                    <input class="form-control me-3 notice_from_edit" readonly>
                    <span class="input-group-text col-sm-2">مقدم البلاغ</span>
                    <input type="text" class="form-control notice_noti" readonly placeholder="مقدم البلاغ">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-sm-2">نوع البلاغ</span>
                    <select type="text" class="form-control me-3 notice_type"readonly placeholder="نوع البلاغ">
                        <option></option>
                        <option value="شبكه">شبكه</option>
                        <option value="جهاز - طابعه">جهاز - طابعه</option>
                        <option value="خدمه">خدمه</option>
                        <option value="اسماء مستخدمين">اسماء مستخدمين</option>
                        <option value="مستلزمات التشغيل">مستلزمات التشغيل</option>
                    </select>
                    <span class="input-group-text col-sm-2">تاريخ البلاغ</span>
                    <input type="date" class="form-control notice_date" value="<?php echo date('Y-m-d'); ?>" readonly placeholder="تاريخ البلاغ">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text col-sm-2">تفاصيل البلاغ</span>
                    <textarea type="text" class="form-control me-3 notice_description" style="height: 150px" readonly placeholder="ملاحظات"></textarea>
                    <span class="input-group-text col-sm-2">الاجراء</span>
                    <textarea type="text" class="form-control notice_procedure" style="height: 150px" readonly placeholder="ملاحظات"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-danger">حذف</button>
            </div>
        </div>
    </div>
</div>