
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {
    
    // Change Cuisine Status
    $("body").on("change", ".status_change", function(e) {
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
    
                if (response.data.status == 0) {
                    send_val = 1;
                } else if (response.status == 1) {
                    send_val = 0;
                }

                console.log('Old Status: '+response.data.status);

                $.ajax({
                    url: 'send_cuisine_status/'+id,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        'status': send_val,
                        id: id,
                        '_token': '{{ csrf_field() }}'
                    },
                    success: function(datas) {
            
                        // if (response.status == 0) {
                        //     send_val = 1;
                        // } else if (response.status == 1) {
                        //     send_val = 0;
                        // }
        
                        console.log('New Status: '+datas.data.status);
            
                        }
                    });
    
                },
                error: function(data) {
                    console.log(data);
                }
            });

    });


    // $("body").on("ckick", ".openFileInputBtn", function(e) {
    //     e.preventDefault();
    //     $("#uploadUserfile").trigger('click');;
    // });

    // Load User Profile Add New Image Selected
    $("body").on("change", "#uploadUserfile", function(e) {
        e.preventDefault();

        const files = this.files[0];
        const myId = $("#myId").val();

        // console.log(files);
        
        if (files.size < 2097152) {
            toast(toast_type[0], 'Good, you selected an image less than 2MB.', 'Image Success', toast_posi[1], 7000);
            const imgSrc = (window.URL ? URL : webkitURL).createObjectURL(files);
            $("#add_display_img")[0].src = imgSrc;

            uploadUserImg($(this), myId);
        } else {
            toast(toast_type[1], 'Sorry, select an image less than 2MB.', 'Image Error', toast_posi[1], 7000);
            $(this).val('');
        }

    });


    function uploadUserImg(theFile, id) {
        const myId = id;
        var myFile = theFile;
        // var formData = new FormData(); 
        // var files = myFile[0].files[0]; 
        // formData.append('user_img', files); 
        // formData.append('user_id', myId); 

        console.log(myId);

        // $.ajax({
        //     url: 'send_add_user_img/'+myId,
        //     method: 'GET',
        //     dataType: 'json',
        //     // mimeType: 'multipart/form-data',
        //     async: false,
        //     // processData: false,
        //     data: {myId:myId},
        //     success: function (response) {

        //         console.log(response);
             
        //     },
        //     // error: function (response) {
        //     //     console.log(response);
        //     // }
        // });


        // $.ajax({
        //     url: 'send_add_user_img',
        //     method: 'GET',
        //     dataType: 'json',
        //     mimeType: 'multipart/form-data',
        //     async: false,
        //     processData: false,
        //     data: formData,
        //     success: function (response) {

        //         console.log(response);
        //         // // location.href = myUrl;
        //         // if (response.success == 'success') {

        //         //     $("#pincode_div").hide();
        //         //     $("#new_password_div").show();
    
        //         // } else {
        //         //     var progressBar = '<div class="mb-4">'+
        //         //         '<span class="badge  text-danger ">Wrong pin code, please check.</span>'+
        //         //         '</div>';
        //         //         $("#errorPinCode").html(progressBar);
                        
        //         //         $(".myPinBtn").html('<button id="submit_pincode_btn" class="btn btn-info w-100 waves-effect waves-light" type="submit">Submit Pin Code</button>');

        //         // }
  
        //     },
        //     error: function (response) {
        //         console.log(response);
        //     }
        // });

        // let formData = new FormData(myFile);
        let formData = new FormData(); 
        var files = myFile[0].files[0]; 
        formData.append('user_img', files); 
        //    $('#image-input-error').text('');
      
           $.ajax({
                type:'POST',
                url: "send_add_user_img",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    this.reset();
                    alert('Image has been uploaded successfully');
                },
                error: function(response){
                    $('#image-upload').find(".print-error-msg").find("ul").html('');
                    $('#image-upload').find(".print-error-msg").css('display','block');
                    $.each( response.responseJSON.errors, function( key, value ) {
                        $('#image-upload').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
           });

    }

    // Load Cuisine Update Image Selected
    $("body").on("change", "#edit_img_file", function(e) {
        e.preventDefault();

        const files = this.files[0];

        // console.log(files);
        
        if (files.size < 2097152) {
            toast(toast_type[0], 'Good, you selected an image less than 2MB.', 'Image Success', toast_posi[1], 7000);
            const imgSrc = (window.URL ? URL : webkitURL).createObjectURL(files);
            $("#display_img")[0].src = imgSrc;
        } else {
            toast(toast_type[1], 'Sorry, select an image less than 2MB.', 'Image Error', toast_posi[1], 7000);
            $(this).val('');
        }

        
        // $("#img_file_logo_display")[0].src = (window.URL ? URL : webkitURL).createObjectURL(files);
    
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


});