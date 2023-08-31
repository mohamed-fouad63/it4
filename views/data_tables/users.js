function load_users_tables() {
  users_table = $("#users_table").DataTable({
    destroy: true,
    bProcessing: true,
    ajax: {
      url: "/it4/ajaxUsersAuth",
      method: "post",
      data: function (d) {
        d.auth = "";
      },
      dataSrc: "",
    },
    deferRender: true,
    columns: [
      { data: "id" },
      { data: "first_name" },
      { data: "job" },
      {
        data: null,
        render: function (data, type, row) {
          return `
        <div class="btn-group">
        <button type="button" class="btn btn-info me-2" id="user_reset_password_${row.id}" title="استعاده كلمه المرور">
          استعاده كلمه المرور
        </button>
        <button type="button" class="btn btn-success me-2 user_edit" id="user_edit_${row.id}" title="تعديل" data-bs-toggle="modal" data-placement="right" data-bs-target="#Edit_USER_Modal">
            تعديل
        </button>
        </div>
        `;
        },
      },
    ],
    dom: "irt",
    paging: false,
    // order: [[2, "desc"]],
    ordering: false,
    language: {
      zeroRecords: " ",
      infoEmpty: "0",
      info: "_TOTAL_",
    },
    rowCallback: function (row, data) {},
    createdRow: function (row, data, dataIndex) {},
    initComplete: function () {
      $("#users_table tbody").on("click", ".user_edit", function () {
        var tr = $(this).closest("tr");
        var row = users_table.row(tr);
        $("#edit_user_id").val(row.data().id);
        $("#edit_user_name").val(row.data().first_name);
        $("#edit_user_job").val(row.data().job);
      });
      // $("#users_table tbody").on("click", ".btn-info", function () {
      //   var tr = $(this).closest("tr");
      //   var row = users_table.row(tr);
      //   alert(row.data().id);
      // });

      $("#users_table tbody td").each(function () {
        var tr = $(this).closest("tr");
        var row = users_table.row(tr);
        row.child(format(row.data()));
        row.child().addClass("user_auth_tr");
        row.child().attr("id", row.data().id);
        row.child.show();
      });
    },
  });
}
load_users_tables();
function format(d) {
  d.post == 1 ? (post = "checked") : (post = "");
  d.add_dvice == 1 ? (add_dvice = "checked") : (add_dvice = "");
  d.edit == 1 ? (edit = "checked") : (edit = "");
  d.move == 1 ? (move = "checked") : (move = "");
  d.to_it == 1 ? (to_it = "checked") : (to_it = "");
  d.resent == 1 ? (resent = "checked") : (resent = "");
  d.in_it == 1 ? (in_it = "checked") : (in_it = "");
  d.edit_in_it == 1 ? (edit_in_it = "checked") : (edit_in_it = "");
  d.move_in_it == 1 ? (move_in_it = "checked") : (move_in_it = "");
  d.to_tts == 1 ? (to_tts = "checked") : (to_tts = "");
  d.resent_in_it == 1 ? (resent_in_it = "checked") : (resent_in_it = "");
  d.delete_in_it == 1 ? (delete_in_it = "checked") : (delete_in_it = "");
  d.in_tts == 1 ? (in_tts = "checked") : (in_tts = "");
  d.edit_in_tts == 1 ? (edit_in_tts = "checked") : (edit_in_tts = "");
  d.resent_in_tts == 1 ? (resent_in_tts = "checked") : (resent_in_tts = "");
  d.retweet == 1 ? (retweet = "checked") : (retweet = "");
  d.replace_dvices == 1 ? (replace_dvices = "checked") : (replace_dvices = "");
  d.all_dvices == 1 ? (all_dvices = "checked") : (all_dvices = "");
  d.Incoming == 1 ? (Incoming = "checked") : (Incoming = "");
  d.move_dvices == 1 ? (move_dvices = "checked") : (move_dvices = "");
  d.deleted_dvices == 1 ? (deleted_dvices = "checked") : (deleted_dvices = "");
  d.all_misin == 1 ? (all_misin = "checked") : (all_misin = "");
  d.misins == 1 ? (misins = "checked") : (misins = "");
  d.notice == 1 ? (notice = "checked") : (notice = "");
  d.link_office_group == 1
    ? (link_office_group = "checked")
    : (link_office_group = "");
  d.edit_office == 1 ? (edit_office = "checked") : (edit_office = "");
  d.add_office == 1 ? (add_office = "checked") : (add_office = "");
  d.office_group == 1 ? (office_group = "checked") : (office_group = "");
  d.my_misin == 1 ? (my_misin = "checked") : (my_misin = "");
  d.edit_misin == 1 ? (edit_misin = "checked") : (edit_misin = "");
  d.users == 1 ? (users = "checked") : (users = "");
  d.reg_to == 1 ? (reg_to = "checked") : (reg_to = "");
  d.to_filter == 1 ? (to_filter = "checked") : (to_filter = "");
  d.reg_to_edi == 1 ? (reg_to_edi = "checked") : (reg_to_edi = "");
  d.reg_parcel_to == 1 ? (reg_parcel_to = "checked") : (reg_parcel_to = "");
  d.parcel_to_filter == 1
    ? (parcel_to_filter = "checked")
    : (parcel_to_filter = "");
  d.reg_in == 1 ? (reg_in = "checked") : (reg_in = "");
  d.in_filter == 1 ? (in_filter = "checked") : (in_filter = "");
  d.link_record == 1 ? (link_record = "checked") : (link_record = "");
  d.counts == 1 ? (counts = "checked") : (counts = "");
  d.wrong == 1 ? (wrong = "checked") : (wrong = "");

  return `
<form class="users_auth d-flex flex-wrap card-columns" style="gap: 3px;">
    <div class="card">
    <div class="card-header">
        <label>الاجهزه</label>
    </div>
    <div class="card-body d-flex flex-column">
    <input type="checkbox" class="btn-check" ${post} value="post" id="dvice_office${d.id}" autocomplete="off">
    <label class="btn btn-outline-success" for="dvice_office${d.id}"><div class="mb-1">اجهزه مكتب</div></label>
        <div class="mb-1 icons_auth">
            <input type="checkbox" ${edit} class="btn-check" value="edit" id="dvice_edit${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="dvice_edit${d.id}"><i class="bi bi-pencil-square"></i></label>

            <input type="checkbox" ${to_it} class="btn-check" value="to_it" id="dvice_to_it${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="dvice_to_it${d.id}"><i class="bi bi-screwdriver"></i></label>

            <input type="checkbox" ${move} class="btn-check" value="move" id="dvice_move_to${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="dvice_move_to${d.id}"><i class="bi bi-arrows-move"></i></label>

            <input type="checkbox" class="btn-check" ${add_dvice} value="add_dvice" id="add_dvice${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="add_dvice${d.id}"><i class="bi bi-plus"></i></label>
        </div>

<input type="checkbox" class="btn-check" ${in_it} value="in_it" id="in_it${d.id}" autocomplete="off">
<label class="btn btn-outline-success" for="in_it${d.id}">اجهزه بقسم الدعم الفنى</label>
        <div class="mb-1 icons_auth">
            <input type="checkbox" ${edit_in_it} class="btn-check" value="edit_in_it" id="edit_in_it${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="edit_in_it${d.id}"><i class="bi bi-pencil-square"></i></label>

            <input type="checkbox" ${to_tts} class="btn-check" value="to_tts" id="dvice_to_tts${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="dvice_to_tts${d.id}"><i class="bi bi-truck"></i></label>

            <input type="checkbox" ${resent_in_it} class="btn-check" value="resent_in_it" id="resent_to_office${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="resent_to_office${d.id}"><i class="bi bi-reply-fill"></i></label>

            <input type="checkbox" ${move_in_it} class="btn-check"  value="move_in_it" id="dvice_move_to_in_it${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="dvice_move_to_in_it${d.id}"><i class="bi bi-arrows-move"></i></label>

            <input type="checkbox" class="btn-check" ${delete_in_it} value="delete_in_it" id="delete_dvice${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="delete_dvice${d.id}"><i class="bi bi-x-octagon-fill"></i></label>
        </div>

<input type="checkbox" class="btn-check" ${in_tts} value="in_tts" id="in_tts${d.id}" autocomplete="off">
<label class="btn btn-outline-success" for="in_tts${d.id}">اجهزه بقطاع الدعم الفنى</label>
        <div class="mb-1 icons_auth">
            <input type="checkbox" ${edit_in_tts} class="btn-check" value="edit_in_tts" id="edit_in_tts${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="edit_in_tts${d.id}"><i class="bi bi-pencil-square"></i></label>

            <input type="checkbox" ${retweet} class="btn-check" value="retweet" id="retweet${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="retweet${d.id}"><i class="bi bi-arrow-repeat"></i></label>

            <input type="checkbox" ${resent_in_tts} class="btn-check" value="resent_in_tts" id="resent_in_tts${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="resent_in_tts${d.id}"><i class="bi bi-reply-fill"></i></label>
        </div>
</div>
</div>

<div class="card">
<div class="card-header">
<label>السجلات</label>

</div>
<div class="card-body d-flex flex-column">
<input type="checkbox" class="btn-check" ${all_dvices} value="all_dvices" id="all_dvices${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="all_dvices${d.id}">سجل الاجهزه</label>

<input type="checkbox" class="btn-check" ${Incoming} value="Incoming" id="record1${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="record1${d.id}">سجل الصيانه</label>

<input type="checkbox" class="btn-check" ${move_dvices} value="move_dvices" id="record2${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="record2${d.id}">سجل المنقول</label>


<input type="checkbox" class="btn-check" ${replace_dvices} value="replace_dvices" id="replace_dvices${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="replace_dvices${d.id}"> سجل تغيير مكونات الاجهزه</label>

<input type="checkbox" class="btn-check" ${notice} value="notice" id="record3${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="record3${d.id}">سجل البلاغات</label>

<input type="checkbox" class="btn-check" ${deleted_dvices} value="deleted_dvices" id="record4${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="record4${d.id}">سجل استنزال العهد</label>


<input type="checkbox" class="btn-check" ${all_misin} value="all_misin" id="all_misin${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="all_misin${d.id}">سجل التحركات و الاجازات</label>

</div>
</div>

<div class="card">
<div class="card-header">
<label>الماموريات</label>

</div>
<div class="card-body d-flex flex-column">
<input type="checkbox" class="btn-check" ${my_misin} value="my_misin" id="mision1${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="mision1${d.id}">مامورياتى</label>

<input type="checkbox" class="btn-check" ${misins} value="misins" id="mision2${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="mision2${d.id}">الخطه الشهريه</label>
</div>
</div>

<div class="card">
<div class="card-header">
<label>المراسلات</label>

</div>
<div class="card-body d-flex flex-column">
<input type="checkbox" class="btn-check" ${reg_to} value="reg_to" id="reg1${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="reg1${d.id}">تسجيل الصادر</label>

<input type="checkbox" class="btn-check" ${to_filter} value="to_filter" id="reg2${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="reg2${d.id}">استعلام الصادر</label>

<input type="checkbox" class="btn-check" ${reg_in} value="reg_in" id="reg3${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="reg3${d.id}">تسجيل الوارد</label>

<input type="checkbox" class="btn-check" ${in_filter} value="in_filter" id="reg4${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="reg4${d.id}">استعلام الوارد</label>

<input type="checkbox" class="btn-check" ${reg_parcel_to} value="reg_parcel_to" id="reg5${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="reg5${d.id}">تسجيل الطرود الصادره</label>

<input type="checkbox" class="btn-check" ${parcel_to_filter} value="parcel_to_filter" id="reg6${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="reg6${d.id}">استعلام الطرود الصادره</label>
</div>
</div>
<div class="card">
<div class="card-header">
<label>مجموعات و مكاتب</label>

</div>
<div class="card-body d-flex flex-column">
<input type="checkbox" class="btn-check" ${office_group} value="office_group" id="office1${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="office1${d.id}">اداره المكاتب</label>
        <div class="mb-1 icons_auth">
            <input type="checkbox" ${edit_office} class="btn-check" value="edit_office" id="edit_office${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="edit_office${d.id}"><i class="bi bi-pencil-square"></i></label>

            <input type="checkbox" class="btn-check" ${add_office} value="add_office" id="add_office${d.id}" autocomplete="off">
            <label class="btn btn-outline-dark" for="add_office${d.id}"><i class="bi bi-plus"></i></label>
        </div>
</div>
</div>
<div class="card">
<div class="card-header">
<label>المستخدمين</label>

</div>
<div class="card-body d-flex flex-column">
<input type="checkbox" class="btn-check" ${users} value="users" id="users1${d.id}" autocomplete="off">
<label class="btn btn-outline-success mb-1" for="users1${d.id}">صلاحيات المستخدمين</label>
</div>
</div>
<!--<button type="button" class="btn btn-danger h-100 ms-1" id="user_del_${d.id}">حذف</button>-->
<button type="button" class="btn btn-warning h-100" id="user_update_${d.id}">تحديث</button>
</form>
`;
}
