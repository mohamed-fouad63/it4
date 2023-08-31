function add_reg_in_sub(el) {
  reg_in_sub = $(el).text();
  textarea = $("#sub_reg_in");
  textarea.val(textarea.val() + " " + reg_in_sub);
  $("#sub_reg_in").focus();
}
