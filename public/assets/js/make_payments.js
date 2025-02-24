
$(document).ready(function () {


    console.log("Checking ...........................");

   // Make Payments
   $("body").on("click", "#send_getTrack", function(e) {
    e.preventDefault();

        const str = $(this).data('total_amount');
        var totalAmount = parseFloat(str);

        makePayment(totalAmount);
 
   });


   var getBaseUrl = window.location.href.split('?')[0];
    console.log(getUrlParameter('error'));


   function makePayment(totalAmount) {
        
        const id = $("#application_main_id").val();
        const status_val = 1;

        console.log("Checking ...........................");
        var settings = {
            "url": "https://payproxyapi.hubtel.com/items/initiate",
            "method": "POST",
            "timeout": 0,
            "headers": {
            "Content-Type": "application/json",
            "Authorization": "Basic RFlMTVozNjo5MTQzMzlhMTYzZmQ0YTRmYWUxZDQxMTY3YTA3OTNiOQ=="
            },
            "data": JSON.stringify({
            "totalAmount": totalAmount,
            "description": "EzirentGH Checkout",
            "callbackUrl": "https://webhook.site/861ec496-12ee-4dc0-9158-b4ae7d8dc025",
            "returnUrl": getBaseUrl+"?success=Payment successfull",
            "merchantAccountNumber": "2023577",
            "cancellationUrl": getBaseUrl+"?error=Transaction cancelled",
            "clientReference": makeid(30)
            }),
        };
        
        $.ajax(settings).done(function (response) {
            console.log(response);

            var url = response.data.checkoutDirectUrl;
            var segments = url.split("/");
            segments.pop(); // remove the last segment
            var newUrl = segments.join("/");
            console.log(newUrl); // "https://example.com/path/to"

            if (response.responseCode == '0000') {
                if (response.data.status == 'Paid') {
                    $.ajax({
                        url: 'send_payed_info_status/'+id,
                        type: 'GET',
                        dataType: 'json',
                        async: false,
                        data: {
                            'id': id,
                            'purpose': 'payed_app',
                            'app_status': status_val
                        },
                        success: function(response) {
                
                                console.log('New Status: '+response.data.payed_app);
                            
                                if (response.success) {
                                    var myData = response.data;
            
                                    window.location.href = newUrl;

                                } else {
                                    window.location.href = newUrl;
                                }
            
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                } else {
                    window.location.href = newUrl;
                }
            } else { window.location.href = newUrl; }
        });

   }


    function makeid(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;

        while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
        }
        return result;
    }

    console.log(makeid(30));



    
    function getUrlParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }
  
    // var sessionTimeout;
    // $(document).bind("mousemove keypress", function() {
    //   clearTimeout(sessionTimeout);
    //   sessionTimeout = setTimeout(sessionExpired, 5000); // 10 minutes
    // });
    
    // function sessionExpired() {
    //   alert("Your session has expired.");
    //   sessionStorage.clear();
    //   window.location.href = "http://localhost/laravel_proj/ezirent/admin/settings"; // Redirect to the login page
    // }


    var sessionTimeout;

    var counts = 0;

    $(document).bind("mousemove keypress", function() {
      clearTimeout(sessionTimeout);
      counts++;
      if (getUrlParameter('error') != null) {
        
        sessionTimeout = setTimeout(sessionExpired, 3000); // 10 minutes

      } 

    });
    
    function sessionExpired() {
        counts++;
        window.location.href = window.location.href.split('?')[0];

    }

});