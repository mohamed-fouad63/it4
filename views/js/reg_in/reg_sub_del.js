function reg_sub_del(el) {
  $(el).parent().remove();
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
}
