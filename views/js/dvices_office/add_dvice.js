var options_select_id_dvice_type = "<option></option>";
$.getJSON("/it4/ajaxDvicesId", function (data) {
  $.each(data, function (key, val) {
    options_select_id_dvice_type +=
      "<option style='direction:ltr' value='" +
      val.id +
      "'>" +
      val.id +
      "</option>";
  });
  $("#id_dvice_type").html(options_select_id_dvice_type);
  if ($("#id_dvice_type").val() == "") {
    $("#divce_type").val("");
    $("#code_inventory").val("");
  }
});

$("#id_dvice_type").change(function () {
  id_dvice_type = $(this).val();
  var options_select_dvice_name = "<option></option>";
  $.getJSON(
    "/it4/ajaxDvicesNameById?dvice_id=" +
    id_dvice_type +
    "",
    function (data) {
      $.each(data, function (key, val) {
        options_select_dvice_name +=
          "<option style='direction:ltr' value='" +
          val.dvice_name_new +
          "'>" +
          val.dvice_name_new +
          "</option>";
      });
      $("#select_dvice_name").html(options_select_dvice_name);
      if ($("#id_dvice_type").val() == "") {
        $("#divce_type").val("");
        $("#code_inventory").val("");
        $("#add_dvice_btn").addClass("disabled");
      }
    }
  );
});

$("#select_dvice_name").change(function () {
  select_dvice_name = $(this).val();
  $.getJSON(
    "/it4/ajaxDviceTypeByName?dvice_name=" +
    select_dvice_name +
    "",
    function (data) {
      $.each(data, function (key, val) {
        $("#divce_type").val(val.dvice_type);
        $("#code_inventory").val(val.code_inventory);
      });
      $("#add_dvice_btn").removeClass("disabled");
      if ($("#select_dvice_name").val() == "") {
        $("#divce_type").val("");
        $("#code_inventory").val("");
        $("#add_dvice_btn").addClass("disabled");
      }
    }
  );
});

$("#add_dvice_btn").click(function () {
  var formData = {
    office_name: office_name,
    dvice_name: $("#select_dvice_name").val(),
    dvice_sn: $("#divce_sn_add").val(),
    _token: $("#_token").val(),
  };
  $.ajax({
    type: "POST",
    url: "/it4/ajaxAddDvice",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#id_dvice_type option").eq(0).prop("selected", true);
        $("#select_dvice_name option").eq(0).prop("selected", true);
        $("#divce_type").val("");
        $("#code_inventory").val("");
        $("#divce_sn_add").val("");
        $("#add_dvice_btn").addClass("disabled");
        datatable_ajax_reload();
      } else {
        alert("تعذر اضافه الجهاز ");
      }
    },
  });
});
