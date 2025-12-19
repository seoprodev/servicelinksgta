// custom file size rule (2 MB)
$.validator.addMethod("filesize", function (value, element, param) {
    if (element.files.length === 0) {
        return true;
    }
    return element.files[0].size <= param;
}, "File size must be less than 2 MB");

$(document).ready(function () {
    $("#provider-sign-up-form").validate({
        rules: {
            company__name: {
                required: true,
                minlength: 3
            },
            username: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 12
            },
            password: {
                required: true,
                minlength: 6
            },
            business_license_file: {
                required: true,
                extension: "jpg|jpeg|png|pdf",
                filesize: 2097152
            },
            government_doc: {
                required: true,
                extension: "jpg|jpeg|png|pdf",
                filesize: 2097152
            },
            terms_policy: {
                required: true
            }
        },
        messages: {
            company__name: {
                required: "Please enter your company name",
                minlength: "Company name must be at least 3 characters long"
            },
            username: {
                required: "Please enter your username",
                minlength: "Username must be at least 3 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Please enter your phone number",
                digits: "Only numbers are allowed",
                minlength: "Phone must be at least 10 digits",
                maxlength: "Phone cannot exceed 12 digits"
            },
            password: {
                required: "Please provide a password",
                minlength: "Password must be at least 6 characters"
            },
            business_license_file: {
                required: "Please upload your business license",
                extension: "Only jpg, jpeg, png, pdf files allowed",
                filesize: "File size must be less than 2 MB"
            },
            government_doc: {
                required: "Please upload your government ID",
                extension: "Only jpg, jpeg, png, pdf files allowed",
                filesize: "File size must be less than 2 MB"
            },
            terms_policy: {
                required: "You must agree to Terms & Conditions"
            }
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id") + "_error";
            if ($("#" + id).length) {
                $("#" + id).html(error);
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        }
    });


    $("#provider-sign-up-form").on("submit", function (e) {
        e.preventDefault();

        if (!$(this).valid()) {
            return false; // agar validation fail hai to ajax call na ho
        }

        var formData = new FormData(this);

        $.ajax({
            url: "/provider/register",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                // button disable + loading show
                $("button[type=submit]").prop("disabled", true).text("Submitting...");
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    window.location.href = response.redirect_url; // redirect to verification page
                } else {
                    alert("Something went wrong!");
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    // laravel validation errors ko show karo
                    $.each(errors, function (key, value) {
                        $("#" + key + "_error").html('<span class="text-danger">' + value[0] + '</span>');
                        $("#" + key).addClass("is-invalid");
                    });
                }
            },
            complete: function () {
                $("button[type=submit]").prop("disabled", false).text("Sign up");
            }
        });
    });
});

$("#cleint-sign-up-form").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: "/user/register",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("button[type=submit]").prop("disabled", true).text("Please wait...");
            $(".invalid-feedback").text(""); // old errors clear
            $(".form-control").removeClass("is-invalid");
        },
        success: function (response) {
            if (response.success) {
                alert(response.message);
                window.location.href = response.redirect_url; // redirect to verification page
            } else {
                alert("Something went wrong!");
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    let input = $(`#${key}`);
                    input.addClass("is-invalid");
                    $(`#provider_${key}_error`).text(value[0]);
                });
            }
        },
        complete: function () {
            $("button[type=submit]").prop("disabled", false).text("Get Started");
        }
    });
});;


$("#all-user-login").on("submit", function (e) {
    e.preventDefault();

    let formData = {
        email: $("#login-email").val(),
        password: $("#login_password").val(),
        _token: $("input[name=_token]").val()
    };

    $.ajax({
        url: "/user-login-process",
        type: "POST",
        data: formData,
        beforeSend: function () {
            $("#error_login_message").text("");
            $("button[type=submit]").prop("disabled", true).text("Signing in...");
        },
        success: function (response) {
            if (response.success) {
                window.location.href = response.redirect_url;
            } else {
                $("#error_login_message").text(response.message);
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                if (errors.email) {
                    $("#login-email").addClass("is-invalid");
                    $("#login-email").siblings(".invalid-feedback").text(errors.email[0]);
                }
                if (errors.password) {
                    $("#login_password").addClass("is-invalid");
                    $("#login_password").parent().siblings(".invalid-feedback").text(errors.password[0]);
                }
            } else {
                $("#error_login_message").text("Something went wrong, please try again.");
            }
        },
        complete: function () {
            $("button[type=submit]").prop("disabled", false).text("Sign in");
        }
    });
});











$("#forgot-password-form").on("submit", function (e) {
    e.preventDefault();

    let formData = {
        email: $("#forgot_email").val(),
        _token: $("input[name=_token]").val()
    };

    $.ajax({
        url: "/forgot-password",
        type: "POST",
        data: formData,
        beforeSend: function () {
            $("#forgot_email_error").text("");
            $("#forgot_email").removeClass("is-invalid");
            $("#forget-password-button").prop("disabled", true).text("Submitting...");
        },
        success: function (response) {
            if (response.success) {
                alertify.success(response.message);
                window.location.href = response.redirect_url;
            } else {
                $("#forgot_email_error").text(response.message);
                $("#forgot_email").addClass("is-invalid");
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                if (errors.email) {
                    $("#forgot_email").addClass("is-invalid");
                    $("#forgot_email_error").text(errors.email[0]);
                }
            } else {
                alertify.error('Something went wrong, please try again.');
            }
        },
        complete: function () {
            $("#forget-password-button").prop("disabled", false).text("Submit");
        }
    });
});


