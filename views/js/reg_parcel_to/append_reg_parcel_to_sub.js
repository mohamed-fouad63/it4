$(".append_reg_parcel_to_sub").click(function () {
  var val_reg_parcel_to_sub = $(".input_reg_parcel_to_sub").val();
  $(".reg_parcel_to_sub_container").append(
    '<div class="btn-group mb-1 ms-1 reg_parcel_to_sub_div" role="group"><button type="button" class="btn btn-secondary reg_parcel_to_sub" onclick="add_reg_parcel_to_sub(this)">' +
      val_reg_parcel_to_sub +
      '</button><button type="button" class="btn btn-warning reg_parcel_to_sub_del " onclick="reg_sub_del(this)"><i class="bi bi-x-lg"></i></button></div>'
  );
  var reg_parcel_to_sub = [];
  $(".reg_parcel_to_sub").each(function (i, elem) {
    reg_parcel_to_sub.push($(elem).text());
  });
  console.log(reg_parcel_to_sub);
  $.ajax({
    type: "POST",
    url: "/it4/ajaxParcelToAddSub",
    data: { reg_parcel_to_sub: reg_parcel_to_sub },
  });
});
