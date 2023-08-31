var options = {
  url: function (phrase) {
    return "../api/tbl_user/services_users.php";
  },
  getValue: function (element) {
    return element.stuff_name;
  },
  ajaxSettings: {
    dataType: "json",
    method: "GET",
    data: {
      dataType: "json",
    },
  },
  preparePostData: function (data) {
    data.phrase = $("#input_user_search").val();
    return data;
  },
  list: {
    maxNumberOfElements: 10,
    onClickEvent: function () {
      v200t.ajax.reload(function () {});
      bitel.ajax.reload(function () {});
      // get_users_v200t_table();
    },
  },
};
$("#input_user_search").easyAutocomplete(options);
