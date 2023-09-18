$("#example tbody").on("click", ".btn-danger", function () {
  var data = table.row($(this).parents("tr")).data();
  $.ajax({
    url: "/it4/ajaxRegInDel",
    method: "post",
    data: {
      id: data.id,
      _token: $("#_token").val(),
    },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        table.ajax.reload();
      }
    },
  });
});
