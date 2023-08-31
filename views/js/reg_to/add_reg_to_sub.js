function add_reg_to_sub(el) {
  reg_to_sub = $(el).text();
  textarea = $("#sub_reg_to");
  textarea.val(textarea.val() + " " + reg_to_sub);
  $("#sub_reg_to").focus();
}
