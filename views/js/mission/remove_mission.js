$("#example tbody").on("click", ".btn-danger", function () {
  var data = table.row($(this).parents("tr")).data();
  if(data.mission_table == 'misin_it_online'){
    ajaxUrl = '/it4/ajaxDelMissionOnline';
  } else {
    ajaxUrl = '/it4/ajaxDelMission';
  }
  $.ajax({
    url: ajaxUrl,
    method: "post",
    data: {
      counter: data.counter,
      mission_table: data.mission_table,
      _token: $("#_token").val(),
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        table.ajax.reload();
      }
    },
  });
});
