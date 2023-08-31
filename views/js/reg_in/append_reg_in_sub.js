$(".append_reg_in_sub").click(function () {
  var val_reg_in_sub = $(".input_reg_in_sub").val();
  $(".reg_in_sub_container").append(
    '<div class="btn-group mb-1 ms-1 reg_in_sub_div" role="group"><button type="button" class="btn btn-secondary reg_in_sub" onclick="add_reg_in_sub(this)">' +
      val_reg_in_sub +
      '</button><button type="button" class="btn btn-warning reg_in_sub_del " onclick="reg_sub_del(this)"><i class="bi bi-x-lg"></i></button></div>'
  );
  var reg_in_sub = [];
  $(".reg_in_sub").each(function (i, elem) {
    reg_in_sub.push($(elem).text());
  });
  console.log(reg_in_sub);
  $.ajax({
    type: "POST",
    url: "/it4/ajaxregInAddSub",
    data: { reg_in_sub: reg_in_sub },
  });
});
