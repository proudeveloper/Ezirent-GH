$(document).ready(function() {
    Webcam.set({
        width: 720,
        height: 720,
        image_format: 'jpg',
        jpeg_quality: 300
    });

    $('#accesscamera').on('click', function() {
        Webcam.reset();
        Webcam.on('error', function() {
            $('#photoModal').modal('hide');
            swal({
                title: 'Warning',
                text: 'Please give permission to access your webcam',
                icon: 'warning'
            });
        });
        Webcam.attach('#my_camera');
    });

    $('#takephoto').on('click', take_snapshot);

    $('#retakephoto').on('click', function() {
        $('#my_camera').addClass('d-block');
        $('#my_camera').removeClass('d-none');

        $('#results').addClass('d-none');

        $('#takephoto').addClass('d-block');
        $('#takephoto').removeClass('d-none');

        $('#retakephoto').addClass('d-none');
        $('#retakephoto').removeClass('d-block');

        $('#uploadphoto').addClass('d-none');
        $('#uploadphoto').removeClass('d-block');
    });

    // $('#document_selfie_forms').on('submit', function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //         url: 'document_selfie_forms',
    //         type: 'POST',
    //         data: new FormData(this),
    //         contentType: false,
    //         processData: false,
    //         success: function(data) {

    //             console.log(data);
    //             if(data == 'success') {
    //                 Webcam.reset();

    //                 $('#my_camera').addClass('d-block');
    //                 $('#my_camera').removeClass('d-none');

    //                 $('#results').addClass('d-none');

    //                 $('#takephoto').addClass('d-block');
    //                 $('#takephoto').removeClass('d-none');

    //                 $('#retakephoto').addClass('d-none');
    //                 $('#retakephoto').removeClass('d-block');

    //                 $('#uploadphoto').addClass('d-none');
    //                 $('#uploadphoto').removeClass('d-block');

    //                 $('#photoModal').modal('hide');

    //                 swal({
    //                     title: 'Success',
    //                     text: 'Photo uploaded successfully',
    //                     icon: 'success',
    //                     buttons: false,
    //                     closeOnClickOutside: false,
    //                     closeOnEsc: false,
    //                     timer: 2000
    //                 })
    //             }
    //             else {
    //                 swal({
    //                     title: 'Error',
    //                     text: 'Something went wrong',
    //                     icon: 'error'
    //                 })
    //             }
    //         }
    //     })
    // })
})

function take_snapshot()
{
    //take snapshot and get image data
    var myData_uri = '';

    Webcam.snap(function(data_uri) {
        //display result image
        $('#results').html('<img src="' + data_uri + '" class="d-block mx-auto rounded"/>');
        
        $("#display_selfie_img")[0].src = myData_uri;

        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
        // $('#photoStore').val(raw_image_data);
        $('#photoStore').val(data_uri);
        myData_uri = data_uri;

    });

    $('#my_camera').removeClass('d-block');
    $('#my_camera').addClass('d-none');

    $('#results').removeClass('d-none');
    $("#display_selfie_img")[0].src = myData_uri;

    $('#takephoto').removeClass('d-block');
    $('#takephoto').addClass('d-none');

    $('#retakephoto').removeClass('d-none');
    $('#retakephoto').addClass('d-block');

    $('#uploadphoto').removeClass('d-none');
    $('#uploadphoto').addClass('d-block');
}