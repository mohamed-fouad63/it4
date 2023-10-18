
var ajaxRequest;
 function printer_status(printer_data) {
  ajaxRequest = $.ajax({
        url: '/it4/ajaxPrinterStatus',
        type: 'post',
        data:printer_data,
        beforeSend:function(){
          console.log(this);
        },
        complete: function() {
          // Request is completed, do something here
          ajaxRequest.abort();
          console.log("AJAX request completed");
        },
        success: function(data) {
        $('.popover-header').text(data.name+' * '+data.ready+' * '+data.toner);
        $('.popover-body').text(data.notReady);
        
        if(data === ''){
          console.log("success is "+data);
          ajaxRequest.abort();
          console.log("after aborted is ");
        } else {
          console.log(' success data returned '+data)
        }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log("error is "+errorThrown);
          ajaxRequest.abort();
        }
      });
    };

    function abortAjaxRequest() {
      if (ajaxRequest) {
        ajaxRequest.abort();
        console.log('AJAX request aborted.');
      }
    }


