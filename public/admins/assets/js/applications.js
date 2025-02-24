
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {


    $("#applications_table").DataTable({
        order: [0, 'desc'],
        pageLength: 10 ,
        "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
        responsive: true,
    });

 
    // Reviewed Applications
    $("body").on("click", ".reviewed_btn", function(e) {
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
                'rent_status': 3
            },
            success: function(response) {
    
                    // console.log('Old Status: '+response);

                    if (response.success) {
                        
                        $(".new_reviewed_btn_div").html('<a href="javascript:void(0);" disabled class="btn btn-secondary disabled">Reviewed <i class="bx bx-check-shield text-white"></i></a>');
                        window.location.href = "../aplication_detail/"+id;
                    } 

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });
    

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

     

              
    // Delete Tenant Application For Next Applications
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
            
                            // console.log('Old Status: '+response);
                            var hhh = toast(toast_type[0], 'Application has been deleted, user can apply for a new rent assistance.', 'Loan Application', toast_posi[0], 4000);

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

     
                  
    // Disable Detail View
    $("body").on("click", ".disabled_details_btn", function(e) {
        e.preventDefault();
 
        Swal.fire({
            title: "Denied Details View",
            text: "Sorry! Details cannot be viewed at this status. The system is opened to a new application for this tenant.",
            icon: "info",
        });

    });

     


      
    // Submit Selfie Image
    $("body").on("submit", "#document_selfie_form", function(e) {
        e.preventDefault();

        var serializedForm = new FormData(this);

        $.ajax({
            url: 'document_selfie_form',
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.success);

                if (response.success) {
                    Webcam.reset();
                   
                    $(".finished_btn").trigger('click');

                    toast(toast_type[0], response.message, 'Accomodation Information', toast_posi[0], 7000);
                    
                    Webcam.reset();

                    $('#my_camera').addClass('d-block');
                    $('#my_camera').removeClass('d-none');

                    $('#results').addClass('d-none');

                    $('#takephoto').addClass('d-block');
                    $('#takephoto').removeClass('d-none');

                    $('#retakephoto').addClass('d-none');
                    $('#retakephoto').removeClass('d-block');

                    $('#uploadphoto').addClass('d-none');
                    $('#uploadphoto').removeClass('d-block');
                    $('#photoModal').modal('hide');
                    
                    var rest = window.location.href = "apply";
                    
                } else {
                    toast(toast_type[1], response.message, 'Accomodation Information', toast_posi[0], 7000);

                    Webcam.reset();

                    $('#my_camera').addClass('d-block');
                    $('#my_camera').removeClass('d-none');

                    $('#results').addClass('d-none');

                    $('#takephoto').addClass('d-block');
                    $('#takephoto').removeClass('d-none');

                    $('#retakephoto').addClass('d-none');
                    $('#retakephoto').removeClass('d-block');

                    $('#uploadphoto').addClass('d-none');
                    $('#uploadphoto').removeClass('d-block');
                    $('#photoModal').modal('hide');
                }

                },
                error: function(data) {
                    console.log(data);
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





    
    // Publish Property
    $("body").on("change", ".d_paid_apply_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');
        var vals = $(this).val();

        $.ajax({
            url: '../aplication_det_ajax/'+id,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': id,
                'purpose': 'payed_app',
            },
            success: function(response) {
    
                    console.log(response.data);
                var status_val = 1;

                    if (response.success) {
                        var myData = response.data;

                        console.log('Old Status: '+myData.payed_app);

                        if (myData.payed_app == 1) {
                            status_val = 0;
                        } 

                        $.ajax({
                            url: '../send_payed_info_status/'+id,
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
                
                                        // console.log(myData);
                                        loadPaidButton();
                                    } else {
                                        // loadPaidButton();
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


    loadPaidButton();
    function loadPaidButton() {
        var url = window.location.href;
        var segments = url.split('/');
        var idSeg = segments[7]; 

        console.log(idSeg);
        

        var payed = 0; 
        // var id = 7;
        $.ajax({
            url: '../aplication_det_ajax/'+idSeg,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': idSeg,
                'purpose': 'payed',
            },
            success: function(response) {
                console.log(response.data);

                var paidBtnDiv =  '';
                if (response.data.rent_status >= 5) {

                 paidBtnDiv = `<span class="badge bg-${ response.data.payed_app == 1 ? 'success' : 'danger' }-subtle text-${ response.data.payed_app == 1 ? 'success' : 'danger' }  px-2 py-1 fs-13 mx-2">${ response.data.payed_app == 1 ? 'Paid' : 'Not Paid' }
                            <span>
                                <div class="form-check form-switch">
                                    <input class="form-check-input d_paid_apply_btn" disabled data-data_id="${response.data.id}" type="checkbox" role="switch" id="flexSwitchCheckChecked1" ${ response.data.payed_app == 1 ? 'checked' : '' } >
                                </div>
                            </span>
                    </span>
                    <span class="border border-warning text-warning fs-13 px-2 py-1 rounded"> Progress</span>`;
            
                } else {
                     paidBtnDiv = `<span class="badge bg-${ response.data.payed_app == 1 ? 'success' : 'danger' }-subtle text-${ response.data.payed_app == 1 ? 'success' : 'danger' }  px-2 py-1 fs-13 mx-2">${ response.data.payed_app == 1 ? 'Paid' : 'Not Paid' }
                            <span>
                                <div class="form-check form-switch">
                                    <input class="form-check-input d_paid_apply_btn" data-data_id="${response.data.id}" type="checkbox" role="switch" id="flexSwitchCheckChecked1" ${ response.data.payed_app == 1 ? 'checked' : '' } >
                                </div>
                            </span>
                    </span>
                    <span class="border border-warning text-warning fs-13 px-2 py-1 rounded"> Progress</span>`;
            
                }

                $("#paid_apply_div").html(paidBtnDiv);


            }
        });

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



    
    $("body").on("click", ".del_cuisine_btn", function(e) {
        e.preventDefault();
    
        const urlToRedirect = $(this).attr('href');
        const nameOfUser = $(this).data('name');

        console.log(urlToRedirect);
    
        Swal.fire({
            title: "Delete",
            text: "Are you sure you want to delete "+nameOfUser+"?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: urlToRedirect,
                    method: 'GET',
                    dataType: 'json',
                    // data: formData,
                    success: function (response) {
                        
                        var trimText = $.trim(response);
                        window.location.href = "cuisine";
                        
                    }
                });


            }
        });

       
    });


    //   Open Add New Cuisine Modal 
    $("body").on("click", "#add_new_cuisine_btn", function(e) {
        e.preventDefault();
        $('#add_new_cuisine').modal('show'); 
    });


    // Update Cuisine
    $("body").on("click", ".edit_cuisine_btn", function(e) {
        e.preventDefault();

        var id = $(this).attr('id');
        // var status_val = $(this).val();
        var send_val = 0;

        console.log(id);
        // console.log(status_val);

        $.ajax({
            url: 'get_cuisine_status/'+id,
            method: 'GET',
            dataType: 'json',
            // data: 'id',
            success: function(response) {

            console.log(response);

            const imgSrc = 'public/upload/cuisine/'+response.data.img+'';
            $('#edit_name').val(response.data.name);
            $('#edit_id').val(response.data.id);

            $("#display_img")[0].src = imgSrc;
            // $("#display_img").html('<img class="" width="100%" src="public/upload/cuisine/'+response.data.img+'" alt="">');
            $('#edit_cuisine_modal').modal('show'); 

            },
            error: function(data) {
                console.log(data);
            }
        });

    });


    
          
    // Documents Verifications
    $("body").on("click", "#virify_documents", function(e) {
        e.preventDefault();

        verifyMomoNumber('mtn', '242330799');
        verifyBankAccount();
        verifyGhanaCard();

    });


    function verifyMomoNumber(channel, phone) {

        console.log('Mobile Money');
        
        var settings = {
            "url": "https://rnv.hubtel.com/v2/merchantaccount/merchants/2023577/mobilemoney/verify?channel="+channel+"-gh&customerMsisdn=233"+phone,
            "method": "GET",
            "timeout": 0,
            "headers": {
            "Authorization": "Basic RFlMTVozNjo5MTQzMzlhMTYzZmQ0YTRmYWUxZDQxMTY3YTA3OTNiOQ=="
            },
        };
        
        $.ajax(settings).done(function (response) {
            console.log(response);
        }); 
        
    }
    
    
    function verifyBankAccount(account) {

        console.log('Bank Verify');
        
        var settings = {
            "url": "https://rnv.hubtel.com/v2/merchantaccount/merchants/2023577/bank/verify/210/106934/1/59/0",
            "method": "GET",
            "timeout": 0,
            "headers": {
              "Authorization": "Basic RFlMTVozNjo5MTQzMzlhMTYzZmQ0YTRmYWUxZDQxMTY3YTA3OTNiOQ=="
            },
          };
          
          $.ajax(settings).done(function (response) {
            console.log(response);
          });
    }


        
    function verifyGhanaCard(account) {

        console.log('Ghana Card');
        
        var settings = {
            "url": "https://rnv.hubtel.com/v2/merchantaccount/merchants/2023577/idcard/verify?idtype=ghanacard&idnumber=GHA-000834329-1",
            "method": "GET",
            "timeout": 0,
            "headers": {
              "Authorization": "Basic RFlMTVozNjo5MTQzMzlhMTYzZmQ0YTRmYWUxZDQxMTY3YTA3OTNiOQ=="
            },
          };
          
          $.ajax(settings).done(function (response) {
            console.log(response);
          });
    }

});


