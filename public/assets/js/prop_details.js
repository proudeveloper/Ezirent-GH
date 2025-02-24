
$(document).ready(function () {


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

            // console.log(element.id);

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
        // console.log(list);
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







    // Load Logo Selected
    // $("body").on("click", "#change_image", function(e) {
    //     e.preventDefault();

    //     const files = this.files[0];

    //     // console.log(files);
        
    //     if (files.size < 2097152) {
    //         toast(toast_type[0], 'Good, you selected an image less than 2MB.', 'Image Success', toast_posi[1], 7000);
    //         const imgSrc = (window.URL ? URL : webkitURL).createObjectURL(files);
    //         $("#img_file_logo_display")[0].src = imgSrc;
    //     } else {
    //         toast(toast_type[1], 'Sorry, select an image less than 2MB.', 'Image Error', toast_posi[1], 7000);
    //         $(this).val('');
    //     }

        
    //     // $("#img_file_logo_display")[0].src = (window.URL ? URL : webkitURL).createObjectURL(files);
    
    // });



    // Change Image To Selected Image
    $("body").on("click", ".change_prop_image", function (e) {
        e.preventDefault();
        
        const img_url = $(this).attr('href');
        
        change_image(img_url)

    });

    
    // Send Messages Error
    $("body").on("click", "#send_message_btn", function (e) {
        e.preventDefault();

        toast(toast_type[1], 'Please login first to send a message to this user.', 'Login', toast_posi[1], 5000)

    });
    
        
    // Not A Tenant Message Error
    $("body").on("click", "#not_agent_btn", function (e) {
        e.preventDefault();

        toast(toast_type[1], 'Please login as a tenant to send a message to this user.', 'Login', toast_posi[1], 5000)

    });



    // change_image();
    function change_image(imageUrl) {

        // var container = document.getElementById("main-image");
        $("#href-prop_image").attr("href", imageUrl);
        $("#main-prop_image").attr("src", imageUrl);

    //    container.src = image.src;
   }



    //Toasters
  
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






    function sumOfNum(myArrayValue) {

        var total = 0;

        // fig1 = parseInt(myValue);
        myArrayValue.forEach(function(num){total+=parseFloat(num) || 0;});

        // myArrayValue.forEach(element => {

        //     total += element.downloads;
            
        // });

        // total = Math.abs(fig1 + fig2 + fig3 + fig4);

        return total;
    }




    function changeDateFormat(datess) {
        const date = new Date(datess);
        formartedDate = date.toLocaleString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })
        return formartedDate;
    }

    // Convert To Readable Month And Year
    function makeMonthYear(datetimes) {
        // var d = new Date(Date.parse(datetimes.replace(/-/g, "/")));

        var d = new Date(datetimes);
        var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        var date = month[d.getMonth()] + ", " + d.getFullYear();
        var time = d.toLocaleTimeString().toUpperCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
        return (date);
    }

    // Convert To Readable Date And Time
    function changeDateTimeFormat(datetimes) {
        // var d = new Date(Date.parse(datetimes.replace(/-/g, "/")));

        var d = new Date(datetimes);
        var month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
        var time = d.toLocaleTimeString().toUpperCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
        return (date + " " + time);
    }


    function roundingFigures(figures) {

        var onlyNum = figures;
/*
        var onlyNum = figures;
        fig = onlyNum.toString();

        displaying = '';

        if (fig.length > 3) {

            num = fig.substring(0, fig.length - 2);

            bforePoint = num[0];
            afterPoint = num[1];

            if (bforePoint === '') {
                bforePoint = '0';
            } else if (bforePoint == '-') {
                bforePoint = '-0';
            } else {
                bforePoint = num[0];
            }

            if (afterPoint === '') {
                afterPoint = '00';
            } else {
                afterPoint = num[1];
            }

            displaying = bforePoint + '.' + afterPoint + 'K';

            // var displa = num.toFixed(1);

            // console.log(bforePoint);

        } else {
            displaying = onlyNum.toFixed(2);
        }
*/

        var amt = parseFloat(onlyNum);
        // $(this).val('$' + amt.toFixed(2));


        return amt.toFixed(2);
    }



    function formatNumber(n) {
        var parts = n.toString().split(".");
        parts[0] = parts[0].replace(/(\d)(\d{3})/g, "$1,$2");
        return parts.join(".");
    }


    function currencyFormatter(figure) {
        var xx = new Intl.NumberFormat('en-GH', {
            style: 'currency',
            currency: 'GHS',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          });

         return xx.format(parseFloat(figure)); 
    }




});