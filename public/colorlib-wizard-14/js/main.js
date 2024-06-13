(function($) {
    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error); 
        },
        rules: {
            username: { required: true },
            name: { required: true },
            phone: { required: true },
            address: { required: true },
            email: { required: true, email: true },
            // password: { required: true },
            // password_confirmation: { required: true, equalTo: "#password" }
        },
        messages: {
            username: { required: "Please enter your username" },
            name: { required: "Please enter your name" },
            phone: { required: "Please enter your phone number" },
            address: { required: "Please enter your address" },
            email: { required: "Please enter your email", email: "Please enter a valid email address!" },
            // password: { required: "Please enter your password" },
            // password_confirmation: { required: "Please confirm your password", equalTo: "Passwords do not match" }
        },
        onfocusout: function(element) {
            $(element).valid();
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parent().parent().find('.form-group').addClass('form-error');
            $(element).removeClass('valid');
            $(element).addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parent().parent().find('.form-group').removeClass('form-error');
            $(element).removeClass('error');
            $(element).addClass('valid');
        }
    });

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Finish',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onInit: function(event, currentIndex) {
            if (currentIndex === 0) {
                form.find('.actions').addClass('test');
            }
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            if (confirm("Are you sure you want to submit the form?")) {
                form.submit();  // Perform a standard form submit
            } else {
                console.log("Form submission canceled by user.");
            }
        },
        onStepChanged: function(event, currentIndex, priorIndex) {}
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });

    window.readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.your_picture_image').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
})(jQuery);
