function add_reg_parcel_to_sub(el) {
  reg_parcel_to_sub = $(el).text();
  textarea = $("#sub_reg_parcel_to");
  textarea.val(textarea.val() + " " + reg_parcel_to_sub);
  $("#sub_reg_parcel_to").focus();
}
