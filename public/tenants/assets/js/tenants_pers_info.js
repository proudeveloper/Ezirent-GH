
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {

    // Personal Information
    $("body").on("click", ".per_info_btn", function(e) {
        e.preventDefault();


        $("#p_info_one").show();
        $("#p_info_emergency").hide();
        $("#p_info_employment").hide();
        $("#p_info_accomodatoing").hide();
        $("#p_info_lanlord").hide();
        $("#p_info_document").hide();
        $("#p_info_finish").hide();


        $("#per_info_btn").attr("class", "active");
        $("#emer_cont_btn").removeAttr("class");
        $("#employ_info_btn").removeAttr("class");
        $("#accomodate_info_btn").removeAttr("class");
        $("#ladlord_info_btn").removeAttr("class");
        $("#document_info_btn").removeAttr("class");
        $("#finished_btn").removeAttr("class");
    });



    
    // Emergency  Contact
    $("body").on("click", ".emer_cont_btn", function(e) {
        e.preventDefault();

        $("#p_info_one").hide();
        $("#p_info_emergency").show();
        $("#p_info_employment").hide();
        $("#p_info_accomodatoing").hide();
        $("#p_info_lanlord").hide();
        $("#p_info_document").hide();
        $("#p_info_finish").hide();


        $("#per_info_btn").attr("class", "active complete");
        $("#emer_cont_btn").attr("class", "active");
        $("#employ_info_btn").removeAttr("class");
        $("#accomodate_info_btn").removeAttr("class");
        $("#ladlord_info_btn").removeAttr("class");
        $("#document_info_btn").removeAttr("class");
        $("#finished_btn").removeAttr("class");
    });




    // Employment Information
    $("body").on("click", ".employ_info_btn", function(e) {
        e.preventDefault();


        $("#p_info_one").hide();
        $("#p_info_emergency").hide();
        $("#p_info_employment").show();
        $("#p_info_accomodatoing").hide();
        $("#p_info_lanlord").hide();
        $("#p_info_document").hide();
        $("#p_info_finish").hide();


        $("#per_info_btn").attr("class", "active complete");
        $("#emer_cont_btn").attr("class", "active complete");
        $("#employ_info_btn").attr("class", "active");
        $("#accomodate_info_btn").removeAttr("class");
        $("#ladlord_info_btn").removeAttr("class");
        $("#document_info_btn").removeAttr("class");
        $("#finished_btn").removeAttr("class");
        
    });


    
    // Accomodation Information Section
    $("body").on("click", ".accomodate_info_btn", function(e) {
        e.preventDefault();

        // var jsonArray = JSON.parse(userPaid());
        console.log(userInfo());

        $("#p_info_one").hide();
        $("#p_info_emergency").hide();
        $("#p_info_employment").hide();
        $("#p_info_accomodatoing").show();
        $("#p_info_lanlord").hide();
        $("#p_info_document").hide();
        $("#p_info_finish").hide();


        $("#per_info_btn").attr("class", "active complete");
        $("#emer_cont_btn").attr("class", "active complete");
        $("#employ_info_btn").attr("class", "active complete");
        $("#accomodate_info_btn").attr("class", "active");
        $("#ladlord_info_btn").removeAttr("class");
        $("#document_info_btn").removeAttr("class");
        $("#finished_btn").removeAttr("class");
        
    });


    // Landlord Information Section
    $("body").on("click", ".ladlord_info_btn", function(e) {
        e.preventDefault();


        
        // var jsonArray = JSON.parse(userPaid());
        console.log(userInfo());

        if (userReg()) {
                   
            $("#p_info_one").hide();
            $("#p_info_emergency").hide();
            $("#p_info_employment").hide();
            $("#p_info_accomodatoing").hide();
            $("#p_info_lanlord").show();
            $("#p_info_document").hide();
            $("#p_info_finish").hide();


            $("#per_info_btn").attr("class", "active complete");
            $("#emer_cont_btn").attr("class", "active complete");
            $("#employ_info_btn").attr("class", "active complete");
            $("#accomodate_info_btn").attr("class", "active complete");
            $("#ladlord_info_btn").attr("class", "active");
            $("#document_info_btn").removeAttr("class");
            $("#finished_btn").removeAttr("class");


         } else {
            Swal.fire({
                title: 'Application',
                text:'Sorry '+userInfo()+'! Please start the application process from the begining.',
                icon: 'warning',
                showConfirmButton: false,
                allowOutsideClick: false,
                backdrop:true,
                allowEscapeKey: false,
                showConfirmButton: true,
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "apply";
                } else {
                    window.location.href = "apply";
                }
    
            });
        }
     
    });



    function userPaid() {
        
        var paid = false;
        var myArray = '';

        $.ajax({
            url: 'getFinanceAidInfo',
            method: 'GET',
            async: false,
            dataType: 'json',
            // data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.user);

                
                if (response.success) {
                    if (response.data.payed_app == 1) {
                        paid = true;
                        
                        myArray = '{"paid": true, "data": response.data, "user": response.user}';
                    }
                } 
            }
        });

        return paid;
    }


    function userReg() {
        
        var reg = false;

        $.ajax({
            url: 'getFinanceAidInfo',
            method: 'GET',
            async: false,
            dataType: 'json',
            // data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.user);

                if (response.success) {
                    
                    reg = true;
                  
                } 
            }
        });

        return reg;
    }

    
    
    function getPaymentAmount(purpose) {
        
        var reg = 0.00;

        $.ajax({
            url: 'get_payment_amount',
            method: 'GET',
            async: false,
            dataType: 'json',
            data: {
                'purpose': purpose,
            },
            success: function(response) {
    
                console.log(response);

                if (response.success) {
                    
                    reg = response.data.amount;
                  
                } 
            }
        });

        return reg;
    }



    
    function userInfo() {
        
        var paid = false;
        var myData;

        $.ajax({
            url: 'getFinanceAidInfo',
            method: 'GET',
            async: false,
            dataType: 'json',
            // data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.user);

                
                if (response.success) {
                    if (response.data.payed_app == 1) {
                        paid = true;
                        
                        myArray = '{"paid": true, "data": response.data, "user": response.user}';
                    }

                    myData = response.user;
                } else {
                    myData = response.user;
                }
            }
        });

        return myData;
    }
    
    // Documentation Information Section
    $("body").on("click", ".document_info_btn", function(e) {
        e.preventDefault();

        
        if (userReg()) {
            // $(".employ_info_btn").trigger('click');
            // toast(toast_type[0], 'Congratulations, you have successfully save updated you emergency contact information.', 'Emergency Contact', toast_posi[0], 7000);

            if (userPaid()) {
                

                $("#p_info_one").hide();
                $("#p_info_emergency").hide();
                $("#p_info_employment").hide();
                $("#p_info_accomodatoing").hide();
                $("#p_info_lanlord").hide();
                $("#p_info_document").show();
                $("#p_info_finish").hide();


                $("#per_info_btn").attr("class", "active complete");
                $("#emer_cont_btn").attr("class", "active complete");
                $("#employ_info_btn").attr("class", "active complete");
                $("#accomodate_info_btn").attr("class", "active complete");
                $("#ladlord_info_btn").attr("class", "active complete");
                $("#document_info_btn").attr("class", "active");
                $("#finished_btn").removeAttr("class");



            } else {
                Swal.fire({
                    title: 'Docment Verification Fee',
                    text: userInfo()+', make payment of GH¢'+getPaymentAmount('doc_veri')+', to upload your documents for verification.',
                    icon: 'warning',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    backdrop:true,
                    allowEscapeKey: false,
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                  }).then((result) => {
                    if (result.isConfirmed) {
        
            
                        makePayment(getPaymentAmount('doc_veri'));
        
                    } else {
                        window.location.href = "apply";
                    }
        
                });
            }
         } else {
            Swal.fire({
                title: 'Application',
                text:'Sorry '+userInfo()+'! Please start the application from the begining.',
                icon: 'warning',
                showConfirmButton: false,
                allowOutsideClick: false,
                backdrop:true,
                allowEscapeKey: false,
                showConfirmButton: true,
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "apply";
                } else {
                    window.location.href = "apply";
                }
    
            });
        }
     
        
    });
    
    
    // Documentation Information
    $("body").on("click", ".finished_btn", function(e) {
        e.preventDefault();

        
        if (userReg()) {
            // $(".employ_info_btn").trigger('click');
            // toast(toast_type[0], 'Congratulations, you have successfully save updated you emergency contact information.', 'Emergency Contact', toast_posi[0], 7000);

            if (userPaid()) {
                

                $("#p_info_one").hide();
                $("#p_info_emergency").hide();
                $("#p_info_employment").hide();
                $("#p_info_accomodatoing").hide();
                $("#p_info_lanlord").hide();
                $("#p_info_document").hide();
                $("#p_info_finish").show();
        
        
                $("#per_info_btn").attr("class", "active complete");
                $("#emer_cont_btn").attr("class", "active complete");
                $("#employ_info_btn").attr("class", "active complete");
                $("#accomodate_info_btn").attr("class", "active complete");
                $("#ladlord_info_btn").attr("class", "active complete");
                $("#document_info_btn").attr("class", "active complete");
                $("#finished_btn").attr("class", "active");

            } else {
                Swal.fire({
                    title: 'Docment Verification Fee',
                    text: userInfo()+', make payment of GH¢'+getPaymentAmount('doc_veri')+', to upload your documents for verification.',
                    icon: 'warning',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    backdrop:true,
                    allowEscapeKey: false,
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                  }).then((result) => {
                    if (result.isConfirmed) {
        
            
                        makePayment(getPaymentAmount('doc_veri'));
        
                    } else {
                        window.location.href = "apply";
                    }
        
                });
            }
         } else {
            Swal.fire({
                title: 'Application',
                text:'Sorry '+userInfo()+'! Please start the application from the begining.',
                icon: 'warning',
                showConfirmButton: false,
                allowOutsideClick: false,
                backdrop:true,
                allowEscapeKey: false,
                showConfirmButton: true,
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "apply";
                } else {
                    window.location.href = "apply";
                }
    
            });
        }
     
        
    });
    
 
    
    // Submit Personal Infomation
    $("body").on("submit", "#personal_info_form", function(e) {
        e.preventDefault();

        var serializedForm = $(this).serialize();

        // console.log(serializedForm);
        // console.log(status_val);

        $.ajax({
            url: 'personal_info_form',
            type: 'POST',
            dataType: 'json',
            data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.success);

                if (response.success) {
                    $(".emer_cont_btn").trigger('click');
                    toast(toast_type[0], response.message, 'Personal Information', toast_posi[0], 7000);

                } else {
                    toast(toast_type[1], response.message, 'Personal Information', toast_posi[0], 7000);
                }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

        
    // Load User Profile Add New Image Selected
    $("body").on("change", ".emer_relationship", function(e) {
        e.preventDefault();

        var event_val = $(this).find(":selected").val();

        console.log(event_val);

        if (event_val == 'Other')
        {
            $(".emer_relationship_other").show();
        } else {
            $(".emer_relationship_other").hide();
        }

    });


    selectOtherRelations();
    function selectOtherRelations() {
        var event_val = $(".emer_relationship").find(":selected").val();

        console.log(event_val);

        if (event_val == 'Other')
        {
            $(".emer_relationship_other").show();
        } else {
            $(".emer_relationship_other").hide();
        }

    }


    // Submit Emergency Contact Infomation
    $("body").on("submit", "#emergency_contact_form", function(e) {
        e.preventDefault();

        var serializedForm = $(this).serialize();

        // console.log(serializedForm);
        // console.log(status_val);

        $.ajax({
            url: 'emergency_contact_form',
            type: 'POST',
            dataType: 'json',
            data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.success);

                if (response.success) {
                    $(".employ_info_btn").trigger('click');
                    toast(toast_type[0], 'Congratulations, you have successfully save updated you emergency contact information.', 'Emergency Contact', toast_posi[0], 7000);

                } else {
                    toast(toast_type[1], 'Sorry, could not update your emergency contact information.', 'Emergency Contact', toast_posi[0], 7000);
                }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

      
    // Submit Employment Infomation
    $("body").on("submit", "#employment_form", function(e) {
        e.preventDefault();

        var serializedForm = $(this).serialize();

        // console.log(serializedForm);
        // console.log(status_val);

        $.ajax({
            url: 'employment_form',
            type: 'POST',
            dataType: 'json',
            data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.success);

                if (response.success) {
                    $(".accomodate_info_btn").trigger('click');
                    toast(toast_type[0], 'Congratulations, you have successfully save updated you employment status information.', 'Employment Status', toast_posi[0], 7000);

                } else {
                    toast(toast_type[1], 'Sorry, could not update your employment status information.', 'Employment Status', toast_posi[0], 7000);
                }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

      
    // Submit Accomodation Infomation
    $("body").on("submit", "#accomodation_form", function(e) {
        e.preventDefault();

        var serializedForm = $(this).serialize();

        // console.log(serializedForm);
        // console.log(status_val);

        $.ajax({
            url: 'accomodation_form',
            type: 'POST',
            dataType: 'json',
            data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.success);

                if (response.success) {
                    $(".ladlord_info_btn").trigger('click');
                    toast(toast_type[0], 'Congratulations, you have successfully save updated you accomodation information.', 'Accomodation Information', toast_posi[0], 7000);

                } else {
                    toast(toast_type[1], 'Sorry, could not update your accomodation information.', 'Accomodation Information', toast_posi[0], 7000);
                }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

      
    // Submit Landlord Information Infomation
    $("body").on("submit", "#landlord_info_form", function(e) {
        e.preventDefault();

        var serializedForm = new FormData(this);
 
        $.ajax({
            url: 'landlord_info_form',
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: serializedForm,
            success: function(response) {
    
                console.log('Old Status: '+response.success);

                if (response.success) {
                    $(".document_info_btn").trigger('click');
                    toast(toast_type[0], 'Congratulations, you have successfully save updated you accomodation information.', 'Accomodation Information', toast_posi[0], 7000);

                } else {
                    toast(toast_type[1], 'Sorry, could not update your accomodation information.', 'Accomodation Information', toast_posi[0], 7000);
                }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });


      
    // Submit Document Verification Infomation
    $("body").on("submit", "#document_verification_form", function(e) {
        e.preventDefault();

        var serializedForm = new FormData(this);

        $.ajax({
            url: 'document_verification_form',
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: serializedForm,
            success: function(response) {
    
                // console.log('Old Status: '+response.success);

                if (response.success) {
                    $(".finished_btn").trigger('click');
                    toast(toast_type[0], 'Congratulations, you have successfully save updated you accomodation information.', 'Accomodation Information', toast_posi[0], 7000);

                } else {
                    toast(toast_type[1], 'Sorry, could not update your accomodation information.', 'Accomodation Information', toast_posi[0], 7000);
                }

                },
                error: function(data) {
                    console.log(data);
                }
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

    // Load Landlord PDF Document or Image Selected
    $("body").on("change", "#landlord_doc_file", function(e) {
        e.preventDefault();

        // const files = this.files[0];
        const files = this.files[0];
        // var fileExtension = files.type;

        // console.log(fileExtension);
        var _docExts = ["pdf", "doc", "docx", "odt"];
        var _imgExts = ["jpg", "jpeg", "png", "gif", "ico"];

        let fileExtension = getFileExtension(files.name);
        let isImage = isExtension(fileExtension, _imgExts);

        // console.log(isImage);
        
        if (files.size < 2097152) {
            
            if (isImage) {
                toast(toast_type[0], 'Good, you selected a file less than 2MB.', 'Image Success', toast_posi[1], 7000);

                const imgSrc = (window.URL ? URL : webkitURL).createObjectURL(files);
                $("#display_img")[0].src = imgSrc;
                $(".error_land_img").text('');
            } else {
                toast(toast_type[0], 'Good, you selected a file less than 2MB.', 'Image Success', toast_posi[1], 7000);
                
                const imgSrc = '../public/tenants/images/pdf_upload.png';
                $("#display_img")[0].src = imgSrc;
                $(".error_land_img").text('');
            }

        } else {
            toast(toast_type[1], 'Sorry!, select an a file less than 2MB.', 'Image Error', toast_posi[1], 7000);
            $(this).val('');
           
            $("#display_img")[0].src = '';
            $(".error_land_img").text('Sorry!, select a file less than 2MB.');
            // $(".eg-swal-av1").trigger('click');
        }

        
        // $("#img_file_logo_display")[0].src = (window.URL ? URL : webkitURL).createObjectURL(files);
    
    });


    // Load Employer's PDF Document or Image Selected
    $("body").on("change", "#proof_of_doc_file", function(e) {
        e.preventDefault();

        // const files = this.files[0];
        const files = this.files[0];
        // var fileExtension = files.type;

        // console.log(fileExtension);
        var _docExts = ["pdf", "doc", "docx", "odt"];
        var _imgExts = ["jpg", "jpeg", "png", "gif", "ico"];

        let fileExtension = getFileExtension(files.name);
        let isImage = isExtension(fileExtension, _imgExts);

        // console.log(isImage);
        
        if (files.size < 2097152) {
            
            if (isImage) {
                toast(toast_type[0], 'Good, you selected a file less than 2MB.', 'Image Success', toast_posi[1], 7000);
          
                const imgSrc = (window.URL ? URL : webkitURL).createObjectURL(files);
                $("#doc_veri_display_img")[0].src = imgSrc;
                $(".error_employ_img").text('');
            } else {
                toast(toast_type[0], 'Good, you selected a file less than 2MB.', 'Image Success', toast_posi[1], 7000);
                
                const imgSrc = '../public/tenants/images/pdf_upload.png';
                $("#doc_veri_display_img")[0].src = imgSrc;
                $(".error_employ_img").text('');
            }

        } else {
            toast(toast_type[1], 'Sorry!, select a file less than 2MB.', 'Image Error', toast_posi[1], 7000);
            $(this).val('');
            
            $("#doc_veri_display_img")[0].src = '';
            $(".error_employ_img").text('Sorry!, select a file less than 2MB.');
            // $(".eg-swal-av1").trigger('click');
        }

        
        // $("#img_file_logo_display")[0].src = (window.URL ? URL : webkitURL).createObjectURL(files);
    
    });

    // Load ID CARD Document or Image Selected
    $("body").on("change", "#id_card_file", function(e) {
        e.preventDefault();

        // const files = this.files[0];
        const files = this.files[0];
        // var fileExtension = files.type;

        // console.log(fileExtension);
        var _docExts = ["pdf", "doc", "docx", "odt"];
        var _imgExts = ["jpg", "jpeg", "png"];

        let fileExtension = getFileExtension(files.name);
        let isImage = isExtension(fileExtension, _imgExts);

        // console.log(isImage);
        
        if (files.size < 2097152) {
            
            if (isImage) {
                toast(toast_type[0], 'Good, you selected an image less than 2MB.', 'Image Success', toast_posi[1], 7000);
   
                const imgSrc = (window.URL ? URL : webkitURL).createObjectURL(files);
                $("#doc_Id_veri_display_img")[0].src = imgSrc;
                $(".error_employ_id_img").text('');
            } else {
                toast(toast_type[1], 'Sorry!, select an image file less than 2MB.', 'Image Error', toast_posi[1], 7000);
                
                $("#doc_Id_veri_display_img")[0].src = '';
                $(".error_employ_id_img").text('Sorry!, select a file less than 2MB.');
            }

        } else {
            toast(toast_type[1], 'Sorry!, select a file less than 2MB.', 'Image Error', toast_posi[1], 7000);
            $(this).val('');
            
            $("#doc_Id_veri_display_img")[0].src = '';
            $(".error_employ_id_img").text('Sorry!, select a file less than 2MB.');
            // $(".eg-swal-av1").trigger('click');
        }

        // $("#img_file_logo_display")[0].src = (window.URL ? URL : webkitURL).createObjectURL(files);
    
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


    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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

    // console.log(makeid(30));



    
    function getUrlParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }


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


