
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    var getBaseUrl = window.location.href.split('?')[0];
    var segments = getBaseUrl.split("/");
    segments.pop(); // remove the last segment
    var newUrl = segments.join("/");





    // jQuery("time.timeago").timeago();
    jQuery.timeago.settings.allowFuture = true;

    loadNotifications();
    function loadNotifications() {

        console.log("Loading ...");

        $.ajax({
            url: 'get_all_notifications',
            method: 'GET',
            dataType: 'json',
            // data: 'id',
            success: function(response) {

                console.log(response.data);
                
                if (response.user_type == 4) {
                    var show_noti_head_top = `<div class="dropdown topbar-item">
                    <button type="button" class="topbar-button position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <iconify-icon icon="solar:bell-bing-bold-duotone" class="fs-24 align-middle"></iconify-icon>`;
                    var show_noti_head_num = '';
                    if (response.data.length > 0) {
                        show_noti_head_num = `<span class="position-absolute topbar-badge fs-10 translate-middle badge bg-danger rounded-pill">${response.data.length}<span class="visually-hidden">unread messages</span></span>`; 
                    }
                    var show_noti_head_bottom = `</button>
                    <div class="dropdown-menu py-0 dropdown-lg dropdown-menu-end" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                </div>
                                <div class="col-auto">
                                        <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                            <small>Clear All</small>
                                        </a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 280px;">`;
        
                        var show_noti_head =  show_noti_head_top+show_noti_head_num+show_noti_head_bottom;
        
                        var show_noti_body = '';
        
                        var urlType = '';

                            response.data.forEach(noti_item => {
        
                                var userImages = '';
                                if (noti_item.user_img == null) {
                                    userImages = `<span class="avatar-title bg-soft-info text-info fs-20 rounded-circle">
                                                ${noti_item.f_name[0]+noti_item.l_name[0]}
                                        </span>`;
        
                                } else {
                                
                                    userImages = `<img src="../public/uploads/users/${noti_item.user_img}" class="img-fluid me-2 avatar-sm rounded-circle" alt="avatar-1" />`;
        
                                }

                                if (noti_item.purpose == 'apply') {
                                    urlType = newUrl+"/aplication_detail/"+noti_item.prod_id;
                                } else {
                                    urlType = newUrl+"/property_detail/"+noti_item.prod_id;
                                }

                                show_noti_body += `<!-- Item -->
                                <a href="javascript:void(0);" data-purpose="${noti_item.purpose}" data-url="${urlType}" data-id="${noti_item.id}" data-prod_id="${noti_item.prod_id}" class="dropdown-item py-3 border-bottom text-wrap open_notification_details_btn">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            ${userImages}
                                        </div>
                                        <div class="flex-grow-1">
                                                <p class="mb-0">
                                                    <span class="fw-medium">${noti_item.author}, </span>
                                                    ${noti_item.title}
                                                </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <time class="timeago" datetime="2024-11-28T12:10:17Z"> 
                                                <span class="fs-10"><iconify-icon icon="bx:time"></iconify-icon></span> 
                                                ${jQuery.timeago(noti_item.created_at) }
                                            </time>
                                        </div>
                                    </div>
                                </a>`
                            });

                            if (response.data.length == 0) {
                                show_noti_body += `<a href="javascript:void(0);" class="dropdown-item py-3 border-bottom text-wrap"><div class="d-flex">No New Notification</div></a>`;
                            }
            
                            var show_noti_foot = `</div>
                                        <div class="text-center py-3">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm get_all_notifications_btn">View All Notification <i class="bx bx-right-arrow-alt ms-1"></i></a>
                                        </div>
                                    </div>
                            </div>
                        `;
            
                        $("#getNotificationInfo").html(show_noti_head+show_noti_body+show_noti_foot);
            
                } else {
                    
                }

            },
            error: function(data) {
                console.log(data);
            }
        });

    }


    
    // Open Notification Infomation
    $("body").on("click", ".open_notification_details_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('id');
        const prod_id = $(this).data('prod_id');
        const purpose = $(this).data('purpose');
        const urls = $(this).data('url');

        console.log('Opened '+urls);
        

        $.ajax({
            url: 'open_notification/'+id,
            method: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'purpose': purpose,
            },
            success: function(response) {
    
                    console.log('Old Status: '+response.success);

                    if (response.success) {
                        loadNotifications();
                        window.location.href = urls;

                    } else {
                        toast(toast_type[1], "Sorry, already opened.", 'Notifications', toast_posi[0], 7000);
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

    
    // Open Notification Infomation
    $("body").on("click", ".get_all_notifications_btn", function(e) {
        e.preventDefault();
        window.location.href = 'get_notifications';
      
    });




    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c0966db6de461cb232d7', {
      cluster: 'mt1'
    });


    // Subscribe to the channel
    var channel = pusher.subscribe('notification');
    
    
    // Bind to the event
    channel.bind('test.notification', function(data) {

        console.log('Received data:', data); // Debugging line

        // Display Toastr notification with icons and inline content
        if (data.author && data.title) {

            toastr.info(
                `<div class="notification-content">
                    
                    <div class="col-lg-12">
                        <div class="row fs-14">
                            <span>  <iconify-icon icon="bytesize:book" class="text-white"></iconify-icon>  ${data.title}</span>
                        </div>
                        <div class="row fs-12">
                            <span> <iconify-icon icon="icomoon-free:user" class="text-white"></iconify-icon>  ${data.author}</span>
                        </div>
                    
                    </div>
                </div>`,
                'New Post Notification',
                {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 0, // Set timeOut to 0 to make it persist until closed
                    extendedTimeOut: 0, // Ensure the notification stays open
                    positionClass: 'toast-top-right',
                    enableHtml: true
                }
            );

            loadNotifications();

        } else {
            console.error('Invalid data received:', data);
        }
    });

    // Debugging line
    pusher.connection.bind('connected', function() {
        console.log('Pusher connected');
    });



    
    // Submit Notification Infomation
    $("body").on("submit", "#send_my_notifications", function(e) {
        e.preventDefault();

        var serializedForm = $(this).serialize();

        // console.log(serializedForm);
        // console.log(status_val);

        $.ajax({
            url: 'send_my_notifications',
            type: 'POST',
            dataType: 'json',
            data: serializedForm,
            success: function(response) {
    
                console.log('Old Status: '+response.success);

                if (response.success) {
                    // $(".employ_info_btn").trigger('click');
                    // toast(toast_type[0], response.message, response.title, toast_posi[0], 7000);
                    // getPropertTypeTable();

                } else {
                    // toast(toast_type[1], response.message, response.title, toast_posi[0], 7000);
                }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });


    
                      
    // Delete A Notification
    $("body").on("click", ".delete_notification_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');
        const page = $(this).data('user_page');

        Swal.fire({
            title: "Delete Notification",
            text: "Are you sure you want to delete notification?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: 'delete_notification/'+id,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    data: {
                        'id': id,
                        'purpose': 'delete_noti',
                    },
                    success: function(response) {
            
                            // console.log('Old Status: '+response.data);
                      
                            if (response.success) {
                                toast(toast_type[0], "Notification has been deleted successfully.", "Notification", toast_posi[0], 4000);
                                setTimeout(function() {
                                    window.location.href = page;
                                  }, 4300); 
                                
                            } else {
                                toast(toast_type[1], "Notification was not deleted.", "Notification", toast_posi[0], 4000);
                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    
            }
        });


    });

     



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

});