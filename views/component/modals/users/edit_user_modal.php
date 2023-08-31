        <div class="modal fade" id="Edit_USER_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditModalLabel">تعديل مستخدم</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text  col-sm-2" id="">رقم الملف </span>
                            <input type="number" min="1000" class="form-control text-start me-3" id="edit_user_id"
                                readonly>
                            <span class="input-group-text  col-sm-2" id="">اسم المستخدم</span>
                            <input type="text" class="form-control " id="edit_user_name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-sm-2" id="">الوظيفه</span>
                            <select class="form-select text-start" id="edit_user_job" required="">
                                <option></option>
                                <option value="مدير اداره تكنولجيا المعلومات">مدير اداره تكنولجيا المعلومات</option>
                                <option value="رئيس قسم الدعم الفنى">رئيس قسم الدعم الفنى</option>
                                <option value="اخصائى تشغيل نظم">اخصائى تشغيل نظم</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                            id="add_dvice_btn">تعديل</button>
                    </div>
                </div>
            </div>
        </div>