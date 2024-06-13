// $(function(){
//     $("#form-register").validate({
//         // rules: {
//         //     password : {
//         //         required : true,
//         //     },
//         //     confirm_password: {
//         //         equalTo: "#password"
//         //     }
//         // },
//         messages: {
//             username: {
//                 required: "Please provide an username"
//             },
//             email: {
//                 required: "Please provide an email"
//             },
//             password: {
//                 required: "Please provide a password"
//             },
//             confirm_password: {
//                 required: "Please provide a password",
//                 equalTo: "Please enter the same password"
//             }
//         }
//     });
//     $("#form-total").steps({
//         headerTag: "h2",
//         bodyTag: "section",
//         transitionEffect: "fade",
//         // enableAllSteps: true,
//         autoFocus: true,
//         transitionEffectSpeed: 500,
//         titleTemplate : '<div class="title">#title#</div>',
//         labels: {
//             previous : 'Back',
//             next : '<i class="zmdi zmdi-arrow-right"></i>',
//             finish : '<i class="zmdi zmdi-arrow-right"></i>',
//             current : ''
//         },
//         onStepChanging: function (event, currentIndex, newIndex) { 
//             var username = $('#username').val();
//             var email = $('#email').val();
//             var cardtype = $('#card-type').val();
//             var cardnumber = $('#card-number').val();
//             var cvc = $('#cvc').val();
//             var month = $('#month').val();
//             var year = $('#year').val();

//             $('#username-val').text(username);
//             $('#email-val').text(email);
//             $('#card-type-val').text(cardtype);
//             $('#card-number-val').text(cardnumber);
//             $('#cvc-val').text(cvc);
//             $('#month-val').text(month);
//             $('#year-val').text(year);

//             var name = $('#name').val();
//             var foodName = $('#food-name').val();
//             var price = $('#food-price').val();
//             var description = $('#description').val();
//             var quantity = $('#quantity').val();

//             $('#name-val').text(name);
//             $('#food-name-val').text(foodName);
//             $('#food-price-val').text(price);
//             $('#description-val').text(description);
//             $('#quantity-val').text(quantity);

//             $("#form-register").validate().settings.ignore = ":disabled,:hidden";
//             return $("#form-register").valid();
//         }
//     });
// });


$(function() {
    $("#form-register").validate({
        messages: {
            username: {
                required: "Please provide a username"
            },
            email: {
                required: "Please provide an email"
            },
            password: {
                required: "Please provide a password"
            },
            confirm_password: {
                required: "Please provide a password",
                equalTo: "Please enter the same password"
            }
        }
    });

    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate: '<div class="title">#title#</div>',
        labels: {
            previous: 'Back',
            next: '<i class="zmdi zmdi-arrow-right"></i>',
            finish: 'Finish',
            current: ''
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            var name = $('#name').val();
            var foodName = $('#food-name').val();
            var price = $('#food-price').val();
            var description = $('#description').val();
            var quantity = $('#quantity').val();

            // Extract numeric value from formatted price
            var numericPrice = parseFloat(price.replace(/[^\d]/g, ''));
            var numericQuantity = parseInt(quantity, 10);

            // Ensure numericPrice is correct
            if (isNaN(numericPrice) || isNaN(numericQuantity)) {
                alert("Please enter valid numeric values.");
                return false;
            }

            var totalPrice = numericPrice * numericQuantity;

            // Format the total price as Indonesian Rupiah
            var formattedTotalPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(totalPrice);

            $('#name-val').text(name);
            $('#food-name-val').text(foodName);
            $('#food-price-val').text(price);
            $('#description-val').text(description);
            $('#quantity-val').text(quantity);
            $('#total-price-val').text(formattedTotalPrice);

            $("#form-register").validate().settings.ignore = ":disabled,:hidden";
            return $("#form-register").valid();
        },
        onFinished: function(event, currentIndex) {
            $("#form-register").submit();
        }
    });
});
