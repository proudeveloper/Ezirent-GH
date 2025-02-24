
$(document).ready(function () {

    typingloop();

    function typingloop() {
        var typing = new Typed(".typewriter_auto", {
            strings: ["Weekly", "Monthly"],
            typeSpeed: 150,
            backSpeed: 150,
            loop: true
        });

    }



    home_page_rating();
    function home_page_rating() {
        // var list = [];
        var list_id = [];
        
        var testimonial_rate = $('.testimonial_rate').data('rating_val');

        $('.testimonial_rate').each(function (index, element) {
            
            list_id.push(element.id);

            $('#testimonial_rate_'+element.id).rateYo({
                rating: element.value,
                starWidth: '24px',
                spacing: "10px",
                normalFill: "#213b5255",
                ratedFill: "#ff9000",
              });
    
        });
  

    }





    // Download Files  edit_song_details  download_song_file
    $("body").on("click", ".check_affordability_btn", function (e) {
        e.preventDefault();
        // $('#net_income').prop('required', true);

        const net_income = $("#net_income").val();
        const rent_amount = $("#rent_amount").val();
        const rent_duration = $("#rent_duration").find(":selected").val();
        const payback_duration = $("#payback_duration").find(":selected").val();
        const employment_status = $("#employment_status").find(":selected").val();

        if (net_income === '') {
            console.log('Net Income Cannot be empty');
            $("#net_income").css('border','1px solid var(--danger-color)');

            $("#rent_amount").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
            $("#rent_duration").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
            $("#payback_duration").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
            $("#employment_status").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');

        } else {
            if (rent_amount === '') {
                $("#rent_amount").css('border','1px solid var(--danger-color)');

                $("#net_income").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                $("#rent_duration").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                $("#payback_duration").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                $("#employment_status").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');

                console.log('Rent Amount Cannot be empty');

            } else {
                if (rent_duration === '') {
                    $("#rent_duration").css('border','1px solid var(--danger-color)');
                    console.log('Rent duration Cannot be empty');

                    $("#net_income").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                    $("#rent_amount").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                    $("#payback_duration").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                    $("#employment_status").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');

                } else {
                    if (payback_duration === '') {
                        $("#payback_duration").css('border','1px solid var(--danger-color)');
                        console.log('Payment duration Cannot be empty');

                            
                        $("#net_income").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                        $("#rent_amount").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                        $("#rent_duration").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');
                        $("#employment_status").css('border','1px solid color-mix(in srgb, var(--input-border), transparent 65%)');


                    } else {
                        if (employment_status === '') {
                            $("#employment_status").css('border','1px solid var(--danger-color)');
                            console.log('Employee status cannot be empty');

                                     
                            $("#net_income").css('border','1px solid var(--text-color)');
                            $("#rent_amount").css('border','1px solid var(--text-color)');
                            $("#rent_duration").css('border','1px solid var(--text-color)');
                            $("#payback_duration").css('border','1px solid var(--text-color)');


                        } else {
                            
                            var monthly_charge = (0.2 * rent_amount);
                            var expect_mon_pay_amount = sumOfNum([(0.3 * rent_amount), rent_amount]);
                            var payback_amount = (expect_mon_pay_amount * payback_duration);
                            // var what_can_afford = sumOfNum([(0.3 * net_income), net_income]);

                            var what_can_afford = (0.3 * net_income);

                            var annual_pay = (net_income * payback_duration);
                            
                            var percent_to_pay = ((payback_amount / annual_pay)*100);
                        
                    
                        if (percent_to_pay > 30) {
                            legit_for = false;
                
                            $(".expected_amount").html("<h4>"+currencyFormatter(0)+"</h4>");
                            $(".total_amount_to_pay").html("<div class=' mb-3 currency-usd'><i class='ri-close-fill text-danger'></i> <span>"+currencyFormatter(0)+"</span></div>");
                            $(".payback_durations").html("<div class=' mb-3 currency-usd'><i class='ri-close-fill text-danger'></i> <span>"+currencyFormatter(0)+"</span></div>");
                            $(".not_affordable").html("<div class=' mb-3 text-danger'><i class='ri-close-fill text-danger'></i> <span class='text-danger'>Sorry, this rental option exceeds 30% of your income. The maximum rent you can afford is <span>"+currencyFormatter(what_can_afford)+"</span></div>");
                
                            $(".apply_rental_btn").hide();
                
                            $('#rentCalculatorModal').modal('hide');
                            $('#confirmRenCalculationModal').modal('show');
                            console.log("Sorry, this rental option exceeds 30% of your income. The maximum rent you can afford is "+currencyFormatter(what_can_afford));
                        } else {
                
                            $(".expected_amount").html("<h4> "+currencyFormatter(expect_mon_pay_amount)+"</h4>");
                            $(".total_amount_to_pay").html("<divclass=' mb-3 '><i class='text-success ri-check-line'></i> <span>Total Amount Payable "+currencyFormatter(payback_amount)+"</span></div>");
                            $(".payback_durations").html("<divclass=' mb-3 '><i class='text-success ri-check-line'></i> <span>Payback Duration: "+payback_duration+" months</span></div>");
                            $(".not_affordable").html("<div class='mb-3 text-success'><i class='ri-check-line'></i> <span class='text-success'>Congratulations! This rental option fits perfectly within your budget.</span></div>");
                
                            $(".apply_rental_btn").show();
                
                            $('#rentCalculatorModal').modal('hide');
                            $('#confirmRenCalculationModal').modal('show');
                            legit_for = true
                            console.log("Congratulations! This rental option fits perfectly within your budget.");
                        }
                
                        }
                    }
                }
            }
        }

   


    });
    

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