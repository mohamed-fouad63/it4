function dismiss_modal_check(chk_btn, action_btn) {
  var checkBox = document.getElementById(chk_btn);
  var Add_Post_Office_btn = document.getElementById(action_btn);
  if (checkBox.checked == true) {
    Add_Post_Office_btn.dataset.bsDismiss = "";
  } else {
    Add_Post_Office_btn.dataset.bsDismiss = "modal";
  }
}
