var options = {
  url: function (phrase) {
    return "../api/office/office_name.php";
  },
  getValue: function (element) {
    return element.office_name;
  },
  ajaxSettings: {
    dataType: "json",
    method: "GET",
    data: {
      dataType: "json",
    },
  },
  preparePostData: function (data) {
    data.phrase = $("#input_office_search").val();
    return data;
  },
  list: {
    maxNumberOfElements: 10,
    onClickEvent: function () {
      bitel_users_office.ajax.reload(function () {});
      v200t_users_office.ajax.reload(function () {});
    },
  },
};
$("#input_office_search").easyAutocomplete(options);
