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
    data.phrase = $("#input_search").val();
    return data;
  },
  list: {
    maxNumberOfElements: 10,
    onClickEvent: function () {
      details_offfice.ajax.reload(function () {
        if (!details_offfice.data().count()) {
          $("#details_offfice_field").css("display", "none");
        } else {
          $("#details_offfice_field").css("display", "block");
          $("#print_dvices").removeClass("disabled");
          $("#print_dvices").attr(
            "href",
            "../../it2/grd/?office_name=" + office_name
          );
          $("#add_dvice").removeClass("disabled");
        }
      });
      datatable_ajax_reload();
    },
  },
};
$("#input_search").easyAutocomplete(options);
