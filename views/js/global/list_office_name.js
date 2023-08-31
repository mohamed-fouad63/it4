var options_select_dvice_name = "<option></option>";
$.getJSON("localhost/it2/api/office/selesct_office_name.php", function (data) {
  $.each(data, function (key, val) {
    options_select_dvice_name +=
      "<option style='' value='" +
      val.office_name +
      "'>" +
      val.office_name +
      "</option>";
  });
});
$("#office_name_to").html(options_select_dvice_name);
