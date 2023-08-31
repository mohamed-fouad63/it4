function reg_sub_del(el) {
  $(el).parent().remove();
  var reg_parcel_to_sub = [];
  $(".reg_parcel_to_sub").each(function (i, elem) {
    reg_parcel_to_sub.push($(elem).text());
  });
  $.ajax({
    type: "POST",
    url: "/it4/ajaxParcelToAddSub",
    data: { reg_parcel_to_sub: reg_parcel_to_sub },
  });
}
