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
    data.phrase = $(".notice_from").val();
    return data;
  },
};
$(".notice_from").easyAutocomplete(options);

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
    data.phrase = $(".notice_from_edit").val();
    return data;
  },
};
$(".notice_from_edit").easyAutocomplete(options);
