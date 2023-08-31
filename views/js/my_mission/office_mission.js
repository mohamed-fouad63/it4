$("#select_office_name").on("change", function () {
  let select_office_name = $(this).val();
  switch (select_office_name) {
    case "اجازه عارضه":
    case "اجازه اعتياديه":
      $("#mission_time").css("display", "none");
      $("#mission_time").val("");
      $("#mission_type").css("display", "none");
      $("#mission_type").val("");
      $("#mission_type_label").css("display", "none");
      $("#network").css("display", "none");
      $("#dvice").css("display", "none");
      $("#service").css("display", "none");
      $("#tools").css("display", "none");
      $("#does").css("display", "none");
      $("#first_form").css("display", "none");
      $("#second_form").css("display", "block");
      $("#mission_date_start_label").css("display", "flex");
      $("#mission_date_start").css("display", "flex");
      $("#mission_date_end_label").css("display", "flex");
      $("#mission_date_end").css("display", "flex");
      break;
    case "":
      $("#mission_date_start_label").css("display", "flex");
      $("#mission_date_start").css("display", "flex");
      $("#mission_type_label").css("display", "flex");
      $("#mission_type").css("display", "flex");
      $("#mission_time").css("display", "flex");
      $("#network").css("display", "block");
      $("#dvice").css("display", "block");
      $("#service").css("display", "block");
      $("#tools").css("display", "block");
      $("#does").css("display", "block");
      $("#first_form").css("display", "none");
      $("#mission_date_end_label").css("display", "none");
      $("#mission_date_end").css("display", "none");
      $("#mission_date_end").val("");
      $("#second_form").css("display", "none");
      break;
    default:
      $("#mission_date_start_label").css("display", "flex");
      $("#mission_date_start").css("display", "flex");
      $("#mission_type_label").css("display", "flex");
      $("#mission_type").css("display", "flex");
      $("#mission_time").css("display", "flex");
      $("#network").css("display", "block");
      $("#dvice").css("display", "block");
      $("#service").css("display", "block");
      $("#tools").css("display", "block");
      $("#does").css("display", "block");
      $("#first_form").css("display", "block");
      $("#mission_date_end_label").css("display", "none");
      $("#mission_date_end").css("display", "none");
      $("#mission_date_end").val("");
      $("#second_form").css("display", "none");
      break;
  }
});
