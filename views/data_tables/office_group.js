function load_post_group_tables() {
  option_post_group = "<option></option>";
  option_office_type = "<option></option>";

  $.getJSON("./views/jsons/office_type.json", function (data) {
    $.each(data, function (key, val) {
      option_office_type +=
        "<option value='" +
        val.office_type +
        "'>" +
        val.office_type +
        "</option>";
    });
  });

  $.post(
    "/it4/ajaxofficeGroupName",
    { x: "" },
    function (data) {
      $.each(data, function (key, val) {
        option_post_group += `<option value="${key}">${val.post_group_name}</option>`;
        fieldset = document.createElement("fieldset");
        legend = document.createElement("legend");
        table = document.createElement("table");
        thead = document.createElement("thead");
        tr = document.createElement("tr");
        span_o_n = document.createElement("span");
        div_btn_group = document.createElement("div");
        th_array = [
          "",
          "نوع المكتب",
          "اسم المكتب",
          "الكود المالى",
          "الكود البريدى",
          "كود بوستال",
          "تليفون",
          "العنوان",
          "الدومين",
          "",
        ];
        $.each(th_array, function (key, val) {
          th = document.createElement("th");
          th.innerText = val;
          tr.appendChild(th);
          thead.appendChild(tr);
          table.appendChild(thead);
        });
        table.id = key;
        // fieldset.id = key + "fieldset";
        legend.id = key + "count_office";
        span_o_n.classList.add("group_name", "me-3");
        table.classList.add("table", "table-hover", "align-middle");
        div_btn_group.classList.add(key);
        div_btn_group.classList.add("btn-group");
        span_o_n.innerText = "مجموعه ( " + val.post_group_name + " )";
        legend.appendChild(span_o_n);
        legend.appendChild(div_btn_group);
        fieldset.appendChild(legend);
        fieldset.appendChild(table);
        document.getElementById("post_group").appendChild(fieldset);
        var tablekey = "t" + key;
        tablekey = $("#" + key).DataTable({
          destroy: true,
          bProcessing: true,
          ajax: {
            url: "/it4/ajaxofficeGroupDetails",
            method: "post",
            data: function (d) {
              d.input_search = val.post_group_name;
            },
            dataSrc: "",
          },
          deferRender: true,
          columns: [
            {
              data: "",
              render: function (data, type, row, meta) {
                  return meta.row + 1;
              },
          },
            { data: "office_type" },
            { data: "office_name" },
            { data: "money_code" },
            { data: "post_code" },
            { data: "postal_code" },
            { data: "tel" },
            { data: "address" },
            { data: "domain_name" },
            {
              data: "",
              render: function (data, type, row) {
                if (Settings.auth_edit_office == 1) {
                  return `
                <button type="button" class="btn" title = "تعديل بيانات الوحده البريديه" data-bs-toggle="modal" data-bs-target="#Edit_Post_Office">
                    <i class="btn btn-success bi bi-pencil-square"></i>
                </button>
                <a class="btn" id="print_dvices" target="blank" tabindex="0" data-placement="right" title="طباعه جرد المكتب" href="/it4/grd?office_name=${row.office_name}">
                        <i class="btn btn-warning bi bi-printer"></i>
                  </a>
                `;
                } else {
                  return ``;
                }
              },
            },
          ],
          dom: "irt",
          paging: false,
          order: false,
          language: {
            zeroRecords: " ",
            infoEmpty: "0",
            info: "_TOTAL_",
          },
          rowCallback: function (row, data) { },
          createdRow: function (row, data, dataIndex) { },
          initComplete: function () {
            // $("#" + key + "count_office").append($("#" + key + "_info"));
            if (Settings.auth_add_office == 1) {
              addbtn = `<button class="btn add_office_btn" data-groupkey = "${key}" data-groupname = "${val.post_group_name}" data-bs-toggle="modal" data-placement="right" title="اضافه مكتب جديد" id="" data-bs-target="#Add_Post_Office"
              style="float: left;" onclick="add_office_modal(this,${key});">
            <i class="btn btn-primary">اضافه وحده بريديه</i>
            </button>
            <button class="btn add_office_btn" data-groupkey = "${key}" data-groupname = "${val.post_group_name}" data-bs-toggle="modal" data-placement="right" title="اضافه مكتب جديد" id="" data-bs-target="#Edit_Post_Group"
              style="float: left;" onclick="edit_group_modal(this,${key});">
            <i class="btn btn-success">تعديل اسم المجموعه</i>
            </button>
            `;
            } else {
              addbtn = ``;
            }
            if (Settings.auth_office_group == 1) {
              delbtn = `<button type="button" class="btn delbtn" data-groupkey = "${key}" data-groupname = "${val.post_group_name}" data-bs-toggle="modal" data-bs-target="#Del_Office_Group" onclick="del_group_modal(this,${key})">
           <i class="btn btn-danger">حذف المجموعه</i>
            </button>`;
            } else {
              delbtn = ``;
            }

            if ($("#" + key + "_info").text() == 0) {
              $("#" + key + "count_office").append(`${addbtn}`);
              $("#" + key + "count_office").append(`${delbtn}`);
            } else {
              $("#" + key + "count_office").append(`${addbtn}`);
            }
            $("#" + key + " tbody").on("click", ".btn", function () {
              $(".office_name_input_edit").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().office_name
              );
              $(".post_group_input_edit").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().post_group
              );
              $(".money_code_input_edit").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().money_code
              );
              $(".post_code_input_edit").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().post_code
              );
              $(".postal_code_input_edit").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().postal_code
              );
              $(".office_type_input_edit").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().office_type
              );
              $(".input_edit_tel").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().tel
              );
              $(".input_edit_address").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().address
              );
              $(".input_domain_name").val(
                $("#" + key)
                  .DataTable()
                  .row($(this).parents("tr"))
                  .data().domain_name
              );
              $("#post_group_input_edit").prop("selectedIndex", key + 1);
              $(".groupkeyedit1").val(key);
              $(".groupkeyedit2").val(key);
              return (office_id = $("#" + key)
                .DataTable()
                .row($(this).parents("tr"))
                .data().id);
            });
          },
        });
      });
      $("#post_group_input_edit").html(option_post_group);
      $("#edit_office_type").html(option_office_type);
      $("#add_office_type").html(option_office_type);
      $("#post_group_input_edit").change(function () {
        $("#groupkeyedit2").val($(this).val());
      });
    },
    "json"
  );
}
load_post_group_tables();
