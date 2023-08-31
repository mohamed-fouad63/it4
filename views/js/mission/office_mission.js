$("#select_office_name").on("change", function () {
  let select_office_name = $(this).val();
  switch (select_office_name) {
    case "المنطقه":
      $("#mission_type_label").css("display", "none");
      $("#mission_type").css("display", "none");
      $("#mission_type").val("");
      $("#misin_cairo_type").css("display", "none");
      $("#misin_cairo_type").val("");
      $("#vaction_div").css("visibility", "hidden");
      $("#mission_time").css("display", "flex");
      $("#mission_date_start_label").css("display", "flex");
      $("#mission_date_start").css("display", "flex");
      $("#mission_date_end_label").css("display", "flex");
      $("#mission_date_end").css("display", "flex");
      break;
    case "اجازه عارضه":
    case "اجازه اعتياديه":
      $("#mission_time").css("display", "none");
      $("#mission_time").val("");
      $("#mission_type").css("display", "none");
      $("#mission_type").val("");
      $("#mission_type_label").css("display", "none");
      $("#misin_cairo_type").css("display", "none");
      $("#misin_cairo_type").val("");
      $("#mission_date_start_label").css("display", "flex");
      $("#mission_date_start").css("display", "flex");
      $("#mission_date_end_label").css("display", "flex");
      $("#mission_date_end").css("display", "flex");
      $("#vaction_div").css("visibility", "visible");
      break;
    case "اجازه مرضيه":
    case "اجازه رسميه":
      $("#mission_time").css("display", "none");
      $("#mission_time").val("");
      $("#mission_type").css("display", "none");
      $("#mission_type").val("");
      $("#mission_type_label").css("display", "none");
      $("#misin_cairo_type").css("display", "none");
      $("#misin_cairo_type").val("");
      $("#mission_date_start_label").css("display", "flex");
      $("#mission_date_start").css("display", "flex");
      $("#mission_date_end_label").css("display", "flex");
      $("#mission_date_end").css("display", "flex");
      $("#vaction_div").css("visibility", "hidden");
      break;
    case "ماموريه القاهره":
      $("#mission_date_end_label").css("display", "none");
      $("#mission_date_end").css("display", "none");
      $("#vaction_div").css("visibility", "hidden");
      $("#mission_time").css("display", "none");
      $("#mission_time").val("");
      $("#mission_type").css("display", "none");
      $("#mission_type").val("");
      $("#mission_date_start_label").css("display", "flex");
      $("#mission_date_start").css("display", "flex");
      $("#mission_type_label").css("display", "flex");
      $("#misin_cairo_type").css("display", "flex");
      break;

    case "":
      $("#mission_date_start_label").css("display", "none");
      $("#mission_date_start").css("display", "none");
      $("#mission_type_label").css("display", "none");
      $("#mission_type").css("display", "none");
      $("#mission_type").val("");
      $("#mission_time").css("display", "none");
      $("#mission_time").val("");
      $("#mission_date_end_label").css("display", "none");
      $("#mission_date_end").css("display", "none");
      $("#vaction_div").css("visibility", "hidden");
      $("#misin_cairo_type").css("display", "none");
      $("#misin_cairo_type").val("");
      break;

    default:
      $("#mission_date_start_label").css("display", "flex");
      $("#mission_date_start").css("display", "flex");
      $("#mission_type_label").css("display", "flex");
      $("#mission_type").css("display", "flex");
      $("#mission_time").css("display", "flex");
      $("#mission_date_end_label").css("display", "none");
      $("#mission_date_end").css("display", "none");
      $("#vaction_div").css("visibility", "hidden");
      $("#misin_cairo_type").css("display", "none");
      $("#misin_cairo_type").val("");
      break;
  }
});
