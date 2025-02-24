
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {

    $("#properties_table").DataTable({
        order: [0, 'desc'],
        pageLength: 10 ,
        "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
        responsive: true,
      
    });



    var starRateProperties = {normalFill: "#213b5255",
                                ratedFill: "#ff9000",}


    // $('.comm_ratings').attr('id');
    comm_rating();
    function comm_rating() {
        var list = [];
        var list_id = [];

        const id = $('.comm_ratings').attr('id');
        const profile_rate = $('.profile_rate').data('rating_val');
        var oRows = $('.comm_ratings').length;

        $('.comm_ratings').each(function (index, element) {
            list.push(element.value);
            list_id.push(element.id);

            console.log(element.id);

            $('.comment_ratings_'+element.id).rateYo({
                rating: element.value,
                starWidth: '18px',
                spacing: "10px",
                ratedFill: "#ff9000",
                normalFill: "#213b5255"
              });
        });


        $('.profile_rate').rateYo({
            rating: profile_rate,
            starWidth: '18px',
            spacing: "10px",
          });


        // console.log(id);
        // console.log(oRows);
        console.log(list);
        // console.log(list_id);
        console.log(profile_rate);
    }

    var $rating_instance = $('.onChange-event-ratings').rateYo(starRateProperties);


    // onChange Event
    $rating_instance.on('rateyo.change', function(e, data) {
        var rating = data.rating;
        $(this).parent().find('.counter').text(rating);
    });



        
    // Init Ratings
    $('.btn-initialize').on('click', function() {
        $rating_instance.rateYo();
    });

    // Destroy Ratings
    $('.btn-destroy').on('click', function() {
        $rating_instance.rateYo('destroy');
    });

    // Get Ratings
    $('.post_comment_btn').on('click', function() {
        var rating = $rating_instance.rateYo('rating');

        console.log('Current Ratings are ' + rating);

    });

    // Set Ratings
    $('.btn-set-rating').on('click', function() {
        $rating_instance.rateYo('rating', 1);
    });


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    // Property Status
    $("body").on("change", ".status_btn", function(e) {
        e.preventDefault();

        var id = $(this).data('data_id');
        var status_val = $(this).data('status_val');
        var selected_value =  $(this).find(":selected").val();

        // console.log(id);
        // console.log(status_val);

        var stta = status_val == 1 ? "checked" : "Not";
        console.log(stta);
        if (selected_value == 2) {
            $("#publish_prop_div_"+id).html('<input class="form-check-input publish_prop_btn" data-data_id="'+id+'" type="checkbox" role="switch" id="flexSwitchCheckChecked1" '+stta+' >');
        } else {
            $("#publish_prop_div_"+id).html('<input class="form-check-input" type="checkbox" disabled >');
        }


        $.ajax({
            url: 'sendPropertyPublish/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'status',
                'prop_status': selected_value
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response.success);
                
                    if (response.success) {
                        var myData = response.data;

                        console.log('New Status: '+myData.status);

                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });


    });
    


    // Publish Property
    $("body").on("change", ".publish_prop_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');

        // console.log(id);
        // console.log(status_val);

        $.ajax({
            url: 'getEditProperty/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'published',
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response.success);
                var status_val = 1;

                    if (response.success) {
                        var myData = response.data;

                        // console.log('Old Status: '+myData.published);

                        if (myData.published == 1) {
                            status_val = 0;
                        } 

                        $.ajax({
                            url: 'sendPropertyPublish/'+id,
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {
                                'id': id,
                                'purpose': 'published',
                                'prop_status': status_val
                            },
                            success: function(response) {
                    
                                    // console.log('Old Status: '+response.success);
                                
                                    if (response.success) {
                                        var myData = response.data;
                
                                        // console.log('New Status: '+myData.published);
                
                                        if (myData.status == 1) {
                                            status_val = 0;
                                        } 
                                    }
                
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            });
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });
    


    ///////////////////////////////////////////////////////////////////////////////////////////
    
    
    // Property Details Status 
    $("body").on("change", ".d_status_btn", function(e) {
        e.preventDefault();

        var id = $(this).data('data_id');
        var status_val = $(this).data('status_val');
        var selected_value =  $(this).find(":selected").val();

        // console.log(id);
        // console.log(status_val);

        var stta = status_val == 1 ? "checked" : "Not";
        console.log(stta);
        if (selected_value == 2) {
            $("#publish_prop_div").html('<input class="form-check-input d_publish_prop_btn" data-data_id="'+id+'" type="checkbox" role="switch" id="flexSwitchCheckChecked1" '+stta+' >');
        } else {
            $("#publish_prop_div").html('<input class="form-check-input" type="checkbox" disabled >');
        }


        $.ajax({
            url: '../sendPropertyPublish/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'status',
                'prop_status': selected_value
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response.success);
                
                    if (response.success) {
                        var myData = response.data;

                        console.log('New Status: '+myData.status);

                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });


    });
    


    // Publish Property
    $("body").on("change", ".d_publish_prop_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');

        console.log(id);
        // console.log(status_val);

        $.ajax({
            url: '../getEditProperty/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'published',
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response.success);
                var status_val = 1;

                    if (response.success) {
                        var myData = response.data;

                        console.log('Old Status: '+myData.published);

                        if (myData.published == 1) {
                            status_val = 0;
                        } 

                        $.ajax({
                            url: '../sendPropertyPublish/'+id,
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {
                                'id': id,
                                'purpose': 'published',
                                'prop_status': status_val
                            },
                            success: function(response) {
                    
                                    // console.log('Old Status: '+response.success);
                                
                                    if (response.success) {
                                        var myData = response.data;
                
                                        console.log('New Status: '+myData.published);
                
                                        if (myData.status == 1) {
                                            status_val = 0;
                                        } 
                                    }
                
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            });
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });
    

    //////////////////////////////////////////////////////////////////////////////////////////////////////

    
    // Approve Applications
    $("body").on("click", ".approved_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');

        $.ajax({
            url: '../applcation_processing/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'reviewed',
                'rent_status': 4
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response);

                    if (response.success) {
                        
                        $(".new_approved_btn_div").html('<a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Approve <i class="bx bx-check-shield text-white"></i></a>');
                        window.location.href = "../aplication_detail/"+id;
                    } 

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });
    

    
    // Decline Applications
    $("body").on("click", ".declined_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');

        $.ajax({
            url: '../applcation_processing/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'reviewed',
                'rent_status': 5
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response);

                    if (response.success) {
                        
                        $(".new_declined_btn_div").html('<a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Decline <i class="bx bx-check-shield text-white"></i></a>');
                        window.location.href = "../aplication_detail/"+id;
                    } 

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

       
    // Money Delivered Applications
    $("body").on("click", ".delivered_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');

        $.ajax({
            url: '../applcation_processing/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'reviewed',
                'rent_status': 6
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response);

                    if (response.success) {
                        
                        $(".new_delivered_btn_div").html('<a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Money Delivered <i class="bx bx-check-shield text-white"></i></a>');
                        window.location.href = "../aplication_detail/"+id;
                    } 

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

          
    // Reset Tenant For Next Applications
    $("body").on("click", ".reset_tenant_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');

            
        Swal.fire({
            title: "Reset Account",
            text: "Are you sure you want to reset the account for the tenant to apply for a new rent assistance?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: 'applcation_processing/'+id,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    data: {
                        'id': id,
                        'purpose': 'reviewed',
                        'rent_status': 7
                    },
                    success: function(response) {
            
                            // console.log('Old Status: '+response);
                            var hhh = toast(toast_type[0], 'Account has been reset, user can apply for a new rent assistance.', 'Rent Application', toast_posi[0], 4000);

                            if (response.success) {
                                setTimeout(function() {
                                    window.location.href = "application";
                                  }, 4300); 
                                
                            } 

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    
            }
        });


    });

     

              
    // Delete Tenant Application 
    $("body").on("click", ".delete_tenant_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');

            
        Swal.fire({
            title: "Delete Application",
            text: "Are you sure you want to delete tenant's application?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: 'delete_application/'+id,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    data: {
                        'id': id,
                        'purpose': 'delete_apply',
                    },
                    success: function(response) {
            
                            // console.log('Old Status: '+response.data);
                            // var hhh = 

                            if (response.success) {
                                toast(toast_type[0], 'Application has been deleted, user can apply for a new rent assistance.', 'Rent Assistance', toast_posi[0], 4000);

                                setTimeout(function() {
                                    window.location.href = "application";
                                  }, 4300); 
                                
                            } else {
                                toast(toast_type[0], 'Application was not deleted.', 'Rent Assistance', toast_posi[0], 4000);
                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    
            }
        });


    });

     

                  
    // Delete A Property
    $("body").on("click", ".delete_property_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');
 
        Swal.fire({
            title: "Delete Property",
            text: "Are you sure you want to delete a submitted property?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: 'delete_property/'+id,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    data: {
                        'id': id,
                        'purpose': 'delete_prop',
                    },
                    success: function(response) {
            
                            // console.log('Old Status: '+response.data);
                           
                            // console.log(id);
           

                            if (response.success) {
                                toast(toast_type[0], 'Property has been deleted successfully.', 'Property', toast_posi[0], 4000);
                                setTimeout(function() {
                                    window.location.href = "properties";
                                  }, 4300); 
                                
                            } else {
                                toast(toast_type[1], 'Property was not deleted.', 'Property', toast_posi[0], 4000);
                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    
            }
        });


    });

                      
    // Delete A View Booking
    $("body").on("click", ".delete_booking_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');
 
        Swal.fire({
            title: "Delete Booking",
            text: "Are you sure you want to delete a submitted view booking?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: 'delete_booking/'+id,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    data: {
                        'id': id,
                        'purpose': 'delete_booking',
                    },
                    success: function(response) {
            
                            // console.log('Old Status: '+response.data);
                      
                            if (response.success) {
                                toast(toast_type[0], "Tenant's booking a view has been deleted successfully.", "Tenant's Viewing", toast_posi[0], 4000);
                                setTimeout(function() {
                                    window.location.href = "tenants";
                                  }, 4300); 
                                
                            } else {
                                toast(toast_type[1], "Tenant's booking was not deleted.", "Tenant's Viewing", toast_posi[0], 4000);
                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    
            }
        });


    });

     

                  
    // Disable Detail View
    $("body").on("click", ".disabled_details_btn", function(e) {
        e.preventDefault();
 
        Swal.fire({
            title: "Denied Details View",
            text: "Sorry! Details cannot be viewed at this status. The system is opened to a new application for this tenant.",
            icon: "info",
        });

    });

     



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////            USERS       SECTION         ////////////////////////////////////////////////////////////

    // USER STATUS 
    $("body").on("change", ".user_status_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');
        // const page = $(this).data('user_page');

        // console.log(id);
        // console.log(status_val);

        $.ajax({
            url: 'getEdithUsers/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'status',
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response.success);
                var status_val = 1;

                    if (response.success) {
                        var myData = response.data;

                        // console.log('Old Status: '+myData.status);

                        if (myData.status == 1) {
                            status_val = 0;
                        } 

                        $.ajax({
                            url: 'sendUserStausState/'+id,
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {
                                'id': id,
                                'purpose': 'status',
                                'prop_status': status_val
                            },
                            success: function(response) {
                    
                                    // console.log('Old Status: '+response.success);
                                
                                    if (response.success) {
                                        var myData = response.data;
                
                                        console.log('New Status: '+myData.status);
                
                                        if (myData.status == 1) {
                                            status_val = 0;
                                        } 
                                    }
                
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            });
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });
    


                      
    // Delete A User
    $("body").on("click", ".delete_user_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');
        const page = $(this).data('user_page');

        Swal.fire({
            title: "Delete User",
            text: "Are you sure you want to delete a user?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: 'delete_user/'+id,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    data: {
                        'id': id,
                        'purpose': 'delete_user',
                    },
                    success: function(response) {
            
                            // console.log('Old Status: '+response.data);
                      
                            if (response.success) {
                                toast(toast_type[0], "User has been deleted successfully.", "User", toast_posi[0], 4000);
                                setTimeout(function() {
                                    window.location.href = page;
                                  }, 4300); 
                                
                            } else {
                                toast(toast_type[1], "User was not deleted.", "User", toast_posi[0], 4000);
                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    
            }
        });


    });

     











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


        return true;
    }



});


