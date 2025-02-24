
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {

    getAllMyRentInfo();
    function getAllMyRentInfo() {
        $.ajax({
            url: 'get_rentDetail_info',
            method: 'GET',
            dataType: 'json',
            // data: 'id',
            success: function(response) {

            // console.log(response.all_data);
            var myData = response.all_data;

            if (myData.length > 0) {
                
                $("#show_application_menu_counts").html('<span class="badge rounded-pill bg-success float-end">'+myData.length+'</span>');

            }

            if (response.success) {
                var myData = response.data;
                var texts = '';
                var badge_type = '';

                if (myData.rent_status == 1) {
                    texts = 'INCOMPLETE';
                    badge_type = 'warning';
                } else if (myData.rent_status == 2) {
                    texts = 'PENDING';
                    badge_type = 'info';
                } else if (myData.rent_status == 3) {
                    texts = 'REVIEW';
                    badge_type = 'dark';
                } else if (myData.rent_status == 4) {
                    texts = 'APPROVED';
                    badge_type = 'success';
                }else if (myData.rent_status == 5) {
                    texts = 'DELIVERED';
                    badge_type = 'primary';
                } else if (myData.rent_status == 0) {
                    texts = 'DECLINED';
                    badge_type = 'danger';
                } else {
                    texts = 'NOT APPLIED';
                    badge_type = 'dark';
                }

                var myHtml = "<div><div class='data-value'> <span class='badge badge-sm bg-outline-"+badge_type+"'>"+texts+"</span></div></div>";

                $("#rent_status_div").html(myHtml);
                $("#rent_status_div_aside").html(myHtml);

            } else {
                var myHtml = "<div><div class='data-value'> <span class='badge badge-sm bg-outline-"+badge_type+"'>NOT APPLIED</span></div></div>";

                $("#rent_status_div").html(myHtml);
                $("#rent_status_div_aside").html(myHtml);

            }

            // $("#display_img");

            },
            error: function(data) {
                console.log(data);
            }
        });

    }

    getAllProperties();
    function getAllProperties() {
        $.ajax({
            url: 'prop_list_ajax',
            method: 'GET',
            dataType: 'json',
            // data: 'id',
            success: function(response) {

            // console.log(response.data);
            var myData = response.data;

            if (myData.getAllProperties.length > 0) {
                
                $("#show_property_menu_counts").html('<span class="badge rounded-pill bg-danger float-end">'+myData.getAllProperties.length+'</span>');

            }
            // $("#display_img");

            },
            error: function(data) {
                console.log(data);
            }
        });

    }


    function getFileExtension(fileName) {
        // let fileName = 'image.jpeg';
        let regex = new RegExp('[^.]+$');
        let extension = fileName.match(regex);
        // console.log('File extension:', extension[0]);
        return extension[0];
    }

    function isExtension(ext, extnArray) {
        var result = false;
        var i;
        if (ext) {
            ext = ext.toLowerCase();
            for (i = 0; i < extnArray.length; i++) {
                if (extnArray[i].toLowerCase() === ext) {
                    result = true;
                    break;
                }
            }
        }
        return result;
    }

    var toast_posi = ['toast-top-right', 'toast-top-center', 'toast-top-left', 'toast-bottom-right', 'toast-bottom-center', 'toast-bottom-left'];
    var toast_type = ['success', 'error', 'warning', 'info'];
    //Toasters
    function toast(type, msg, title, positionClass, timeOut) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": positionClass == null ? 'toast-top-right' : positionClass,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": timeOut == null ? 5000 : timeOut,
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        };

        toastr[type == null ? 'success' : type](msg == null ? 'Message here' : msg, title  == null ? 'Title' : title, toastr.options);


    }


    getRentDetailInfo();
    function getRentDetailInfo() {
        $.ajax({
            url: 'get_rentDetail_info',
            method: 'GET',
            dataType: 'json',
            // data: 'id',
            success: function(response) {

            // console.log(response.data);
            
            if (response.success) {
                var myData = response.data;
                var texts = '';
                var badge_type = '';


                // console.log(myData);
                

                if (myData.rent_status == 1) {
                    texts = 'INCOMPLETE';
                    badge_type = 'warning';
                } else if (myData.rent_status == 2) {
                    texts = 'PENDING';
                    badge_type = 'info';
                } else if (myData.rent_status == 3) {
                    texts = 'REVIEW';
                    badge_type = 'dark';
                } else if (myData.rent_status == 4) {
                    texts = 'APPROVED';
                    badge_type = 'success';
                }else if (myData.rent_status == 5) {
                    texts = 'DECLINED';
                    badge_type = 'danger';
                } else if (myData.rent_status == 6) {
                    texts = 'DELIVERED';
                    badge_type = 'primary';
                } else {
                    texts = 'CAN APPLY NEW';
                    badge_type = 'dark';
                }
                
                var myHtml = '<span class="badge bg-'+badge_type+' text-light">'+texts+'</span>';
                $("#rent_status_div").html(myHtml);
                $("#rent_status_div_aside").html(myHtml);

            } else {
                var myHtml = '<span class="badge bg-'+badge_type+' text-light"> NOT APPLIED</span>';

                $("#rent_status_div").html(myHtml);
                $("#rent_status_div_aside").html(myHtml);

            }

            // $("#display_img");

            },
            error: function(data) {
                console.log(data);
            }
        });

    }
    


    
    // var sessionTimeout;

    // var counts = 0;

    // $(document).bind("mousemove keypress", function() {
    //   clearTimeout(sessionTimeout);

    //   counts++;
    
    //     sessionTimeout = setTimeout(sessionExpired, 5000); // 10 minutes

    // });
    
    // function sessionExpired() {
    //     counts++;
    //     // window.location.href = window.location.href.split('?')[0];
    //     getRentDetailInfo();
    // }



    //Run updates every 5 seconds
    // var k = setInterval(checkUserOnline, 5000);

    // function checkUserOnline() {
    //     //Do whatever updating you need
    //     getRentDetailInfo();

    // }

   
});