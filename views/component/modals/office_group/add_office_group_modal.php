        <div class="modal fade" id="Post_Group" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    @csrf
                        <h5 class="modal-title" id="exampleModalLabel">اضافه مجموعه بريديه</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="" class="mb-2" id="post_group_error" style="color:red"></label>
                        <input type="text" class="form-control me-3" name="" id="post_group_input">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">الغاء</button>
                        <button type="button" class="btn btn-primary">اضافه</button>
                    </div>
                </div>
            </div>
        </div>