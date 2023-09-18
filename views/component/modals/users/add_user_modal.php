        <div class="modal fade" id="Add_USER_Modal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditModalLabel">اضافه مستخدم</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                        @csrf
                            <span class="input-group-text  col-sm-2">رقم الملف </span>
                            <input type="number" min="1000" class="form-control text-start me-3" id="user_id" required>
                            <span class="input-group-text  col-sm-2">اسم المستخدم</span>
                            <input type="text" class="form-control"  id="user_name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text col-sm-2">الوظيفه</span>
                            <select class="form-select text-start" id="job" required="">
                                <option></option>
                                <option value="مدير اداره تكنولجيا المعلومات">مدير اداره تكنولجيا المعلومات</option>
                                <option value="رئيس قسم الدعم الفنى">رئيس قسم الدعم الفنى</option>
                                <option value="اخصائى تشغيل نظم">اخصائى تشغيل نظم</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-check flex-grow-1">
                            <label class="form-check-label" for="flexSwitchCheckDefault">ابقاء النافذه مفتوحه</label>
                            <input class="form-check-input" type="checkbox" value="" id="chk_btn"
                                onclick="dismiss_modal_check()">
                        </div>
                        <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                            id="add_dvice_btn">اضافه</button>
                    </div>
                </div>
            </div>
        </div>