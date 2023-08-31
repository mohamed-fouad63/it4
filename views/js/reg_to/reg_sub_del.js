function reg_sub_del(el) {
  $(el).parent().remove();
  var reg_to_sub = [];
  $(".reg_to_sub").each(function (i, elem) {
    reg_to_sub.push($(elem).text());
  });
  $.ajax({
    type: "POST",
    url: "/it4/ajaxregToAddSub",
    data: { reg_to_sub: reg_to_sub },
  });
}
