function del_group_modal(e, k) {
  groupname = $(e).data("groupname");
  $("#Del_Office_Group .modal-body").html(`
        <h4>هل تريد حذف مجموعه ( ${groupname} ) </h4>
        `);
  $("#Del_Office_Group .modal-footer").html(`
            <button type="button" class="btn" data-bs-dismiss="modal">الغاء</button>
            <button type="button" class="btn btn-danger" data-key="${k}" data-delgroupname = "${groupname}" onclick="del_group_name(this)">حذف</button>
        `);
}
