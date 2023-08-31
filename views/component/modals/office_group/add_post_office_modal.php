        <div class="modal fade" id="Add_Post_Office" tabindex="-1" aria-labelledby="EditModalLabel" aria-modal="true" role="dialog">
            <form action="">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditModalLabel">اضافه مكتب بريد</h5>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text  col-sm-2">اسم المكتب</span>
                                <input type="text" class="form-control me-3 office_name_input_modals" id="office_name" placeholder="اسم المكتب">
                                <span class="input-group-text  col-sm-2">مجموعه</span>
                                <input type="text" class="form-control post_group" id="post_group_input_modal" placeholder="مجموعه" readonly="">
                                <input type="hidden" id="groupkey" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text  col-sm-2">كود مالى</span>
                                <input type="number" min="1" class="form-control me-3" id="money_code" placeholder="كود مالى">
                                <span class="input-group-text  col-sm-2">كود بريدى</span>
                                <input type="number" min="1" class="form-control me-3" id="post_code" placeholder="كود بريدى">
                                <span class="input-group-text  col-sm-2">كود بوستال</span>
                                <input type="number" min="1" class="form-control" id="postal_code" placeholder="كود بوستال">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text  col-sm-2">نوع المكتب</span>
                                <select class="form-control me-3 add_office_type" id="add_office_type" required>
                                </select>
                                <span class="input-group-text  col-sm-1">تليفون</span>
                                <input type="text" class="form-control tel" id="tel" placeholder="تليفون المكتب">
                                <span class="input-group-text  col-sm-1">دومين</span>
                                <input type="text" class="form-control" id="domain_name" placeholder="الدومين">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text  col-sm-2" id="basic-addon1">العنوان</span>
                                <textarea type="text" class="form-control address" id="address" placeholder="العنوان"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-check flex-grow-1">
                            </div>
                            <button type="button" class="btn btn-teal" data-bs-dismiss="modal">الغاء</button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" id="Add_Post_Office_btn">اضافه</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>