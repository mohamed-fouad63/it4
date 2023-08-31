        <div class="modal fade" id="Edit_Post_Office" tabindex="-1" aria-labelledby="EditModalLabel" aria-modal="true" role="dialog">
            <form action="">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditModalLabel">تعديل بيانات مكتب بريد</h5>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text  col-sm-2">اسم المكتب</span>
                                <input type="text" class="form-control me-3 office_name_input_edit" id="" placeholder="اسم المكتب" readonly>
                                <span class="input-group-text  col-sm-2">مجموعه</span>
                                <select class="form-control post_group_input_edit" id="post_group_input_edit" required>

                                </select>
                                <input type="hidden" class="form-control groupkeyedit1" id="groupkeyedit1" readonly>
                                <input type="hidden" class="form-control groupkeyedit2" id="groupkeyedit2" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text  col-sm-2">كود مالى</span>
                                <input type="number" min="1" class="form-control me-3 money_code_input_edit" id="edit_money_code" placeholder="كود مالى">
                                <span class="input-group-text  col-sm-2">كود بريدى</span>
                                <input type="number" min="1" class="form-control me-3 post_code_input_edit" id="edit_post_code" placeholder="كود بريدى">
                                <span class="input-group-text  col-sm-2">كود بوستال</span>
                                <input type="number" min="1" class="form-control postal_code_input_edit" id="edit_postal_code" placeholder="كود بوستال">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text  col-sm-2">نوع المكتب</span>
                                <select class="form-control me-3 office_type_input_edit" id="edit_office_type" required>

                                </select>
                                <span class="input-group-text  col-sm-1">تليفون</span>
                                <input type="text" class="form-control input_edit_tel me-3" id="edit_tel" placeholder="تليفون المكتب">
                                <span class="input-group-text  col-sm-1">دومين</span>
                                <input type="text" class="form-control input_domain_name" id="edit_domain_name" placeholder="الدومين">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text  col-sm-2" id="basic-addon1">العنوان</span>
                                <textarea type="text" class="form-control input_edit_address" id="edit_address" placeholder="العنوان"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" id="Edit_Post_Office_btn">تعديل</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>