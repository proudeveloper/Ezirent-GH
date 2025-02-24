
$(document).ready(function () {


    // var pinContainer = document.getElementsByClassName("pin-code")[0];
    var pinContainer = document.querySelector(".pin-code");
    console.log('There is ' + pinContainer.length + ' Pin Container on the page.');

    pinContainer.addEventListener('keyup', function (event) {
        var target = event.srcElement;

        var maxLength = parseInt(target.attributes["maxlength"].value, 10);
        var myLength = target.value.length;

        if (myLength >= maxLength) {
            var next = target;
            while (next = next.nextElementSibling) {
                if (next == null) break;
                if (next.tagName.toLowerCase() == "input") {
                    next.focus();
                    break;
                }
            }
        }

        if (myLength === 0) {
            var next = target;
            while (next = next.previousElementSibling) {
                if (next == null) break;
                if (next.tagName.toLowerCase() == "input") {
                    next.focus();
                    break;
                }
            }
        }
    }, false);

    pinContainer.addEventListener('keydown', function (event) {
        var target = event.srcElement;
        target.value = "";
    }, false);



    //////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////
    // Event Name And Date Selected User Ajax


    // Submit Pin Code
    $("body").on("click", "#submit_pincode_btn", function (e) {
        e.preventDefault();

        $(".myPinBtn").html('<div class="spinner-border text-warning m-1" role="status">'+
        '<span class="sr-only">Loading...</span></div>');

        var pin1 = $("#pin1").val();
        var pin2 = $("#pin2").val();
        var pin3 = $("#pin3").val();
        var pin4 = $("#pin4").val();
        var pin5 = $("#pin5").val();
        var pin6 = $("#pin6").val();
        var email = $("#email").val();

        var pincode = pin1 + pin2 + pin3 + pin4 + pin5 + pin6;

        var myUrl = "list";

        $.ajax({
            url: 'send_pincode',
            method: 'GET',
            dataType: 'json',
            async: false,
            data: {
                email: email,
                pincode: pincode,
            },
            success: function (response) {

                console.log(response);
                // location.href = myUrl;
                if (response.success == 'success') {

                    $("#pincode_div").hide();
                    $("#new_password_div").show();
    
                } else {
                    var progressBar = '<div class="mb-4">'+
                        '<span class="badge  text-danger ">Wrong pin code, please check.</span>'+
                        '</div>';
                        $("#errorPinCode").html(progressBar);
                        
                        $(".myPinBtn").html('<button id="submit_pincode_btn" class="btn btn-info w-100 waves-effect waves-light" type="submit">Submit Pin Code</button>');

                }
  
            },
            error: function (response) {
                console.log(response);
            }
        });


    });


    $("body").on("keyup", "#password", function (e) {
        e.preventDefault();

        var password = $(this).val();

        var text_length = password.length;
        var text_has_caps = containsUppercase(password);
        var text_has_symb = containsSpecialChars(password);
        var text_has_num = containsNumbers(password);

        var passStrength = 0;

        if(text_length >= 3) {
            passStrength++;
        }

        if(text_length >= 8) {
            passStrength++;
        }

        if(text_has_caps == true) {
            passStrength++;
        }

        if(text_has_symb == true) {
            passStrength++;
        }

        if(text_has_num == true) {
            passStrength++;
        }


        var percentVal = percentNum(passStrength);
        var barBg = '';
        var progressText = '';

        if (passStrength >= 1) {
            barBg = 'bg-danger';
            progressText = 'Bad Password'
        } 
        
        if (passStrength >= 2) {
            barBg = 'bg-warning';
            progressText = 'Weak Password'
        }

        if (passStrength >= 3) {
            barBg = 'bg-dark';
            progressText = 'Good Password'
        }

        if (passStrength >= 4) {
            barBg = 'bg-info';
            progressText = 'Very Good Password'
        }

        if (passStrength >= 5) {
            barBg = 'bg-success';
            progressText = 'Excellent Password'
        }
        


        var progressBar = '<div class="progress mb-4">'+
                        '<div class="progress-bar '+barBg+'" role="progressbar" style="width: '+percentVal+'%" aria-valuenow="'+percentVal+'" aria-valuemin="0" aria-valuemax="100">'+progressText+'</div>'+
                        '</div>';

        // console.log(percentNum(passStrength));

        $("#passwordStrengthBar").html(progressBar);

    });

    $("body").on("keyup", "#cpassword", function (e) {
        e.preventDefault();

        var password = $("#password").val();
        var cpassword = $(this).val();

        var barBg = '';
        var progressText = '';

        if(password === cpassword) {
            barBg = 'success';
            progressText = 'Passwords Matched!';
        } else {
            barBg = 'danger';
            progressText = 'Passwords do not match!';
        }

      
        var progressBar = '<div class="mb-4">'+
                        '<span class="badge  text-'+barBg+' "><i>'+progressText+'</i></span>'+
                        '</div>';

        // console.log(percentNum(passStrength));

        $("#passwordStrengthBar").html(progressBar);

    });

    $("body").on("click", "#create_new_password_btn", function (e) {
        e.preventDefault();

        $(".myPassBtn").html('<div class="spinner-border text-warning m-1" role="status">'+
        '<span class="sr-only">Loading...</span></div>');

        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        var email = $("#email").val();

        var barBg = '';
        var progressText = ''; 

        var myUrl = "admin/auth/login";


        if(password === cpassword) {
             
            $.ajax({
                url: 'create_new_password',
                method: 'GET',
                dataType: 'json',
                async: false,
                data: {
                    email: email,
                    password: password,
                },
                success: function (response) {

                    console.log(response);
                    if (response.success) {
                        
                        location.href = myUrl;

                    } else {
                        var progressBar = '<div class="mb-4">'+
                        '<span class="badge  text-dark ">Error Creating New Password</span>'+
                        '</div>';
                        $("#passwordStrengthBar").html(progressBar);

                        $(".myPassBtn").html('<button id="create_new_password_btn" class="btn btn-info w-100 waves-effect waves-light" type="submit">Create New password</button>');
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });

        } else {
            var barBg = 'danger';
            var progressText = 'Passwords do not match! Please check.';

            var progressBar = '<div class="mb-4">'+
                        '<span class="badge  text-'+barBg+' "><i>'+progressText+'</i></span>'+
                        '</div>';

        
            $("#passwordStrengthBar").html(progressBar);
            // $(".myBtn").html('');
            $(".myPassBtn").html('<button id="create_new_password_btn" class="btn btn-info w-100 waves-effect waves-light" type="submit">Create New password</button>');
        }

     

    });

    function containsUppercase(str) {
        return /[A-Z]/.test(str);
    }


    function containsNumbers(str) {
        return /[0-9]/.test(str);
    }

    function containsSpecialChars(str) {
        const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
        return specialChars.test(str);
      }



    //Toasters
    function toast(type, msg, title, positionClass, timeOut) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": positionClass,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": timeOut,
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr[type](msg, title, toastr.options);


    }



    function diffOfNum(num1, num2) {

        fig1 = parseInt(num1);
        fig2 = parseInt(num2);

        total = 0;

        if (fig2 > fig1) {
            total = Math.abs(fig2 - fig1);
        } else {
            total = -(Math.abs(fig2 - fig1));
        }

        return total;
    }

    function sumOfNum(num1, num2, num3, num4) {

        fig1 = parseInt(num1);
        fig2 = parseInt(num2);
        fig3 = parseInt(num3);
        fig4 = parseInt(num4);

        total = 0;

        total = Math.abs(fig1 + fig2 + fig3 + fig4);

        return total;
    }

    function aveOfNum(num1, num2, num3, num4) {

        fig1 = parseInt(num1);
        fig2 = parseInt(num2);
        fig3 = parseInt(num3);
        fig4 = parseInt(num4);

        total = 0;

        total = Math.abs((fig1 + fig2 + fig3 + fig4) / 4);

        return total;
    }

    function percentNum(num1) {

        // num1/5 *100;

        fig1 = parseInt(num1);

        value = 0;

        value = Math.abs((fig1*100) / 5);

        return value;
    }


    function roundingFigures(figures) {

        onlyNum = figures;
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

        return displaying;
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



});