$(".append_reg_to_sub").click(function () {
  var val_reg_to_sub = $(".input_reg_to_sub").val();
  $(".reg_to_sub_container").append(
    '<div class="btn-group mb-1 ms-1 reg_to_sub_div" role="group"><button type="button" class="btn btn-secondary reg_to_sub" onclick="add_reg_to_sub(this)">' +
      val_reg_to_sub +
      '</button><button type="button" class="btn btn-warning reg_to_sub_del " onclick="reg_sub_del(this)"><i class="bi bi-x-lg"></i></button></div>'
  );
  var reg_to_sub = [];
  $(".reg_to_sub").each(function (i, elem) {
    reg_to_sub.push($(elem).text());
  });
  console.log(reg_to_sub);
  $.ajax({
    type: "POST",
    url: "/it4/ajaxregToAddSub",
    data: { reg_to_sub: reg_to_sub },
  });
});
