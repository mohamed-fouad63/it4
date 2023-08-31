var options = {
  url: function (phrase) {
    return "/it4/ajaxOfficesName";
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
    data.phrase = $("#name_reg_parcel_to").val();
    return data;
  },
};
$("#name_reg_parcel_to").easyAutocomplete(options);
