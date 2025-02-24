
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {



    // Update  Property Type For An Ajax Request
    $("body").on("click", ".edit_property_type_btn", function (e) {
        e.preventDefault();

        var data_hide = $(this).data("data_hide");

        var int_prop_id = $(this).attr("id");

        if (data_hide == false) {
            $(".myTblRowEdit" + int_prop_id).hide();
            $(".myTblRowShow" + int_prop_id).show();
            $(".edit_type_btn" + int_prop_id).hide();
            $(".save_type_btn" + int_prop_id).show();
            $(".delete_type_btn" + int_prop_id).show();
        } else if (data_hide == true) {
            $(".myTblRowEdit" + int_prop_id).show();
            $(".myTblRowShow" + int_prop_id).hide();
            $(".edit_type_btn" + int_prop_id).show();
            $(".save_type_btn" + int_prop_id).hide();
            $(".delete_type_btn" + int_prop_id).hide();
        }

    });


    // Update Property Type Ajax Request
    $("body").on("click", ".update_property_type_btn", function (e) {
        e.preventDefault();

        var data_hide = $(this).data("data_hide");

        var int_prop_id = $(this).attr("id");

        var name_val = $(".name_val" + int_prop_id).val();
        var code_name_val = $(".code_name_val" + int_prop_id).val();
        var filter_val = $(".filter_val" + int_prop_id).val();


        if (data_hide == false) {
            $(".myTblRowEdit" + int_prop_id).hide();
            $(".edit_type_btn" + int_prop_id).hide();

            $(".myTblRowShow" + int_prop_id).show();
            $(".save_type_btn" + int_prop_id).show();
            $(".delete_type_btn" + int_prop_id).show();
        } else if (data_hide == true) {
            $(".myTblRowEdit" + int_prop_id).show();
            $(".edit_type_btn" + int_prop_id).show();

            $(".myTblRowShow" + int_prop_id).hide();
            $(".save_type_btn" + int_prop_id).hide();
            $(".delete_type_btn" + int_prop_id).hide();
        }
        $.ajax({
            url: 'update_property_type_data/'+int_prop_id,
            method: 'GET',
            dataType: 'json',
            async: false,
            data: {
                'id': int_prop_id,
                'name': name_val,
                'code_name': code_name_val,
                'filters': filter_val,
            },
            success: function (response) {
                if (response.success) {

                    toast(toast_type[0], 'Property type has been successfully saved.', 'Property Type', toast_posi[0], 4000);

                    getPropertTypeTable();

                } else {
                    toast(toast_type[1], 'Property type was not saved.', 'Property Type', toast_posi[0], 4000);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });

    });


    // Delete Property Type Ajax Request
    $("body").on("click", ".delete_prop_type_btn", function (e) {
        e.preventDefault();

        var data_hide = $(this).data("data_hide");

        var int_prop_id = $(this).attr("id");
 
        Swal.fire({
            title: "Delete Property Type",
            text: "Are you sure you want to delete property type?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {


                if (data_hide == false) {
                    $(".myTblRowEdit" + int_prop_id).hide();
                    $(".edit_type_btn" + int_prop_id).hide();

                    $(".myTblRowShow" + int_prop_id).show();
                    $(".save_type_btn" + int_prop_id).show();
                    $(".delete_type_btn" + int_prop_id).show();
                } else if (data_hide == true) {
                    $(".myTblRowEdit" + int_prop_id).show();
                    $(".edit_type_btn" + int_prop_id).show();

                    $(".myTblRowShow" + int_prop_id).hide();
                    $(".save_type_btn" + int_prop_id).hide();
                    $(".delete_type_btn" + int_prop_id).hide();
                }
                
                $.ajax({
                    url: 'delete_property_type/'+id,
                    type: 'GET',
                    dataType: 'json',
                    async: false,
                    data: {
                        'id': id,
                        'purpose': 'delete_property_type',
                    },
                    success: function(response) {
            
                            // console.log('Old Status: '+response.data);
                           
                            if (response.success) {
                                toast(toast_type[0], 'Property type has been deleted.', 'Property Type', toast_posi[0], 4000);

                                getPropertTypeTable();
                                
                            } else {
                                toast(toast_type[0], 'Property type was not deleted.', 'Property Type', toast_posi[0], 4000);
                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                   
               
            }
        });

    });


    getPropertTypeTable();
    function getPropertTypeTable() {

        var table_head = '<div class="table-responsive">'+
                '<table id="property_table"  class="table align-middle table-hover table-centered">'+
                    '<thead class="bg-light-subtle">'+
                        '<tr>'+
                            '<th>#</th>'+
                            '<th>Name</th>'+
                            '<th>Code Name</th>'+
                            '<th>Filter Name</th>'+
                            '<th>Status</th>'+
                            '<th>Action</th>'+
                        '</tr>'+
                    '</thead>'+
                '<tbody>';

        var table_body = '';

        var table_foot = '</tbody>'+
                            '</table>'+
                    '</div';

        $.ajax({
            url: 'get_property_type_data',
            method: 'GET',
            dataType: 'json',
            async: false,
        
            success: function (response) {
                if (response.success) {

                  response.data.forEach(prop_type => {

                    var my_status = '';

                    if (prop_type.status == 1) {
                        my_status = 'checked';
                    } else {
                        my_status = '';
                    }

                    table_body += '<tr>'+
                        '<td>' + prop_type.id + '</td>'+
                        '<td><div id="' + prop_type.id + '" class="myTblRowEdit' + prop_type.id + '">' + prop_type.name + '</div> <input id="' + prop_type.id + '" style="display: none;" class="form-control myTblRowShow' + prop_type.id + ' name_val' + prop_type.id + '" name="name"  type="text" value="' + prop_type.name + '"/></td>'+
                        '<td><div id="' + prop_type.id + '" class="myTblRowEdit' + prop_type.id + '">' + prop_type.code_name + '</div> <input id="' + prop_type.id + '" style="display: none;" class="form-control myTblRowShow' + prop_type.id + ' code_name_val' + prop_type.id + '" name="code_name"  type="text" value="' + prop_type.code_name + '"/></td>'+
                        '<td><div id="' + prop_type.id + '" class="myTblRowEdit' + prop_type.id + '">' + prop_type.filters + '</div> <input id="' + prop_type.id + '" style="display: none;" class="form-control myTblRowShow' + prop_type.id + ' filter_val' + prop_type.id + '" name="filters"  type="text" value="' + prop_type.filters + '"/></td>'+
                        '<td>'+
                            '<div class="form-check form-switch" id="user_status_div_' + prop_type.id + '">'+
                                '<input class="form-check-input prop_status_btn" data-data_id="' + prop_type.id + '" type="checkbox" role="switch" id="flexSwitchCheckChecked1" '+ my_status +' >'+
                            '</div>' + 
                        '</td>'+
                        '<td>'+
                            
                            '<a href="avascript:void(0)" id="' + prop_type.id + '" class="edit_property_type_btn btn btn-soft-primary edit_type_btn' + prop_type.id + '" data-data_hide="false" title="Edit Property"><iconify-icon icon="ant-design:edit-fill" class="align-middle fs-18"></iconify-icon></a>' +
                            '<a href="avascript:void(0)" id="' + prop_type.id + '" class="update_property_type_btn btn btn-soft-success save_type_btn' + prop_type.id + '" style="display: none;"  data-data_hide="true" title="Save Property"><iconify-icon icon="ri:save-2-fill" class="align-middle fs-18"></iconify-icon></a>' +
                            '<a href="avascript:void(0)" id="' + prop_type.id + '" data-data_hide="true" style="display: none;"  class="delete_prop_type_btn btn btn-soft-danger btn-sm delete_type_btn' + prop_type.id + '" title="Delete Property"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>' +

                        '</td>'+
                    '</tr>';
                  });

                  $(".property_type_table_div").html(table_head+table_body+table_foot);

                  $("#property_table").DataTable({
                        order: [0, 'desc'],
                        pageLength: 10 ,
                        responsive: true,
                        dom: 'Bfrtip',
                        buttons: [
                            'columnsToggle'
                        ],
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print',
                        ],
                    });
            
        
                }
            },
            error: function (response) {
                console.log(response);
            }
        });

    }



    $("body").on("change", ".prop_status_btn", function(e) {
        e.preventDefault();

        const id = $(this).data('data_id');
   
        $.ajax({
            url: 'single_property_type/'+id,
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

                        console.log('Old Status: '+myData.status);

                        if (myData.status == 1) {
                            status_val = 0;
                        } 

                        $.ajax({
                            url: 'sendPropTypeStausState/'+id,
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
                
                                        getPropertTypeTable();
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
    



    // Submit Property Type Category Infomation
    $("body").on("submit", "#add_new_property_cat_form", function(e) {
        e.preventDefault();

        var serializedForm = $(this).serialize();

        // console.log(serializedForm);
        // console.log(status_val);

        $.ajax({
            url: 'add_new_property_cat_form',
            type: 'POST',
            dataType: 'json',
            data: serializedForm,
            success: function(response) {
    
                console.log('Old Status: '+response.success);

                if (response.success) {
                    // $(".employ_info_btn").trigger('click');
                    toast(toast_type[0], response.message, response.title, toast_posi[0], 7000);
                    getPropertTypeTable();

                } else {
                    toast(toast_type[1], response.message, response.title, toast_posi[0], 7000);
                }

                },
                error: function(data) {
                    console.log(data);
                }
            });

    });

    

    ///////////////////////////////////////////////////////////////////////////////////////////
    
    


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
            "onclick" : '',
        };

        toastr[type == null ? 'success' : type](msg == null ? 'Message here' : msg, title  == null ? 'Title' : title, toastr.options);


        return true;
    }



});


