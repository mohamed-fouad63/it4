<form method="post" action="print.php" target="_blank" class="modal fade" id="Pos_Deliver_Report_Modal" tabindex="-1" aria-labelledby="pos_deliver_report_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تسليم ماكينات نقاط بيع VERIFONE V200T الى مندوب شركه SEE</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                @csrf
                    <span class="input-group-text  col-sm-2">المستلم</span>
                    <input type="text" class="form-control me-3" name="pos_deliver" id="pos_deliver" placeholder="اسم مندوب شركه SEE">
                    <span class="input-group-text  col-sm-2">بتاريخ</span>
                    <input type="date" class="form-control" name="pos_deliver_date" id="pos_deliver_date" value="<?php echo date('Y-m-d') ?>" placeholder="بتاريخ">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th>اسم المكتب</th>
                            <th>S/N</th>
                            <th>نوع العطل</th>
                            <th class="d-none">القائم بالتسليم فى المنطقة</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody id="pos_deliver_report_table_body">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-file-earmark-text-fill"></i>استخراج </button>
                <button type="button" class="btn btn-success">تسليم</button>
            </div>
        </div>
    </div>
</form>