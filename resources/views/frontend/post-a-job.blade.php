@extends('frontend.partials.master')
@section('title', 'Post a Job')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            color: #222;
            margin: 0;
            padding: 40px;
        }
        .form-container {
            max-width: 800px;
            margin: auto;
            border-top: 2px solid #eee;
            padding-top: 20px;
            position: relative;
        }
        .form-container h2 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .postal-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow: hidden;
            max-width: 400px;
        }
        .postal-wrapper input {
            border: none;
            padding: 12px;
            font-size: 16px;
            flex: 1;
            outline: none;
        }
        .postal-wrapper span {
            background: #f5f5f5;
            padding: 12px;
            font-size: 16px;
            border-left: 1px solid #ccc;
            color: #333;
        }
        .next-btn {
            margin-top: 20px;
            background: linear-gradient(90deg, #00C0D3 0%, #003B57 100%);
            color: #FFF;
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .next-btn:hover {
            background: #003B57;
        }
        .service-title {
            color: #555;
            font-weight: 700 !important;
            font-size: 16px;
            margin-bottom: 10px;
            border-bottom: 1px solid grey;
            padding-bottom: 20px;
        }
        .close-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 20px;
            cursor: pointer;
        }
        .step {
            margin-bottom: 40px;
            width: 70%;
        }
        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 15px;
        }
        .radio-box {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .radio-box input {
            margin-right: 10px;
        }
        .radio-box:hover {
            border-color: #00c0d3;
            background: #faf5ff;
        }
        .radio-box input:checked + span {
            font-weight: bold;
            color: #003B57;
            border-color: #00c0d3;
        }
        input.form-control {
            width: 100%;
            height: 30px;
            padding: 5px;
        }
        input.other-input, input.file-input {
            width: 100%;
            height: 30px;
            padding: 5px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }


    </style>
@endpush

@section('main-content')
    <!-- Breadcrumb -->
    <form id="job-post-form" enctype="multipart/form-data">
    @csrf
    <div class="form-container" id="formContainer">

        <div class="service-title">{{ $category->name }}</div>
        <input type="hidden" name="job_category" id="job_category" value="{{ $category->slug }}">
        <div class="close-btn"><a href="{{ route('front.home') }}" style="text-decoration: none;color: grey">✕</a></div>
        <h1 style="width: 80%">Describe your job and get in touch with pros near you.</h1>

        <!-- Step 1 -->
        <div class="step" id="step1">
            <h2>Postal code for the job</h2>
            <div class="postal-wrapper">
                <input type="text" name="postal_code" id="postalCode" placeholder="Enter postal code">
                <span id="cityName">City</span>
            </div>
            <small id="postalError" class="text-danger" style="display:none;"></small>
            <div class="btn-group">
                <button type="button" class="next-btn" onclick="validatePostalCode()">Next</button>
            </div>
        </div>
    </div>
    </form>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        function validatePostalCode() {
            let postal = document.getElementById("postalCode").value;
            let postalInput = $("#postalCode");
            let postalError = $("#postalError");

            // Reset states
            postalInput.css("border", "1px solid #ccc");
            postalError.hide().text("");

            if (!postal) {
                postalError.text("Please enter postal code").show();
                postalInput.css("border", "1px solid red");
                return;
            }

            $.ajax({
                url: "{{ route('front.validate.postal') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    postal_code: postal
                },
                success: function (response) {
                    if (response.success) {
                        $("#cityName").text(response.city);
                        goToNextStep(1);
                    } else {
                        postalError.text(response.message).show();
                        postalInput.css("border", "1px solid red");
                    }
                },
                error: function () {
                    postalError.text("Something went wrong. Please try again.").show();
                    postalInput.css("border", "1px solid red");
                }
            });
        }

    </script>
    <script>
        let stepCount = 1;

        function goToNextStep(currentStep) {
            stepCount++;
            document.querySelector(`#step${currentStep} .btn-group`).style.display = "none";
            showStep(stepCount);
        }

        function goToPrevStep(currentStep) {
            // alert(currentStep)
            stepCount--;
            const container = document.getElementById("formContainer");
            container.removeChild(document.getElementById(`step${currentStep}`));
            document.querySelector(`#step${stepCount} .btn-group`).style.display = "flex";
        }

        function showStep(step) {
            const container = document.getElementById("formContainer");
            let newStep = document.createElement("div");
            newStep.classList.add("step");
            newStep.id = `step${step}`;

            if (step === 2) {
                let categorySlug = $("#job_category").val();

                $.ajax({
                    url: "{{ route('front.get.subcategories') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        category_slug: categorySlug
                    },
                    success: function (response) {
                        // Agar subcategories exist karti hain
                        if (response.success && response.data.length > 0) {
                            let options = response.data.map(sub => `
                    <label class="radio-box">
                        <input type="radio" name="subcategory" value="${sub.id}">
                        <span>${sub.name}</span>
                    </label>
                `).join("");

                            let newStep = `
                    <div class="step" id="step2">
                        <h2>Select a specific service</h2>
                        <div class="radio-group" id="subCategoryOptions">
                            ${options}
                        </div>
                        <div class="btn-group">
                            <button class="next-btn" type="button" onclick="goToPrevStep(2)">Back</button>
                            <button type="button" class="next-btn" onclick="validateSubCategory()">Next</button>
                        </div>
                    </div>
                `;

                            $("#formContainer").append(newStep);
                        }
                        // Agar subcategories nahi hain → seedha step 3 dikhao
                        else {
                            stepCount++;
                            showStep(stepCount);
                        }
                    },
                    error: function () {
                        alert("Something went wrong. Please try again.");
                    }
                });
            }
            else if (step === 3) {
                $.ajax({
                    url: "{{ route('front.get.property.types') }}",
                    type: "GET",
                    success: function (response) {
                        let options = "";

                        if (response.success && response.data.length > 0) {
                            options = response.data.map(pt => `
                    <label class="radio-box">
                        <input type="radio"
                               name="property"
                               value="${pt.id}"
                               onchange="hideOtherField('propertyOptions'); clearError('propertyOptions')">
                        <span>${pt.name}</span>
                    </label>
                `).join("");
                        }

                        // Always add "Other" option
                        options += `
                <label class="radio-box">
                    <input type="radio"
                           name="property"
                           value="Other"
                           onchange="showOtherField(this,'propertyOptions'); clearError('propertyOptions')">
                    <span>Other</span>
                </label>
            `;

                        const newStep = `
                <div class="step" id="step3">
                    <h2>What type of property does your job involve?</h2>
                    <div class="radio-group" id="propertyOptions">
                        ${options}
                    </div>
                    <div id="propertyOptions_otherContainer"></div>
                    <div class="text-danger mt-2" id="propertyOptions_error" style="display:none;"></div>
                    <div class="btn-group">
                        <button type="button" class="next-btn" onclick="goToPrevStep(3)">Back</button>
                        <button type="button" class="next-btn" onclick="validatePropertyType()">Next</button>
                    </div>
                </div>
            `;

                        $("#formContainer").append(newStep);
                    },
                    error: function () {
                        alert("Failed to fetch property types. Try again later.");
                    }
                });
            }
            else if (step === 4) {
                $.ajax({
                    url: "{{ route('front.get.priorities') }}",
                    type: "GET",
                    success: function (response) {
                        let options = "";

                        if (response.success && response.data.length > 0) {
                            options = response.data.map(pr => `
                    <label class="radio-box">
                        <input type="radio" name="priority" value="${pr.id}">
                        <span>${pr.name}</span>
                    </label>
                `).join("");
                        } else {
                            options = `<p>No priorities available.</p>`;
                        }

                        const newStep = `
                <div class="step" id="step4">
                    <h2>When would you like to have the job done? (Optional)</h2>
                    <div class="radio-group" id="priorityOptions">
                        ${options}
                    </div>
                    <div class="btn-group">
                        <button type="button" class="next-btn" onclick="goToPrevStep(4)">Back</button>
                        <button type="button" class="next-btn" onclick="validatePriority()">Next</button>
                    </div>
                </div>
            `;

                        $("#formContainer").append(newStep);
                    },
                    error: function () {
                        alert("Failed to fetch priorities. Try again later.");
                    }
                });
            }

            else if (step === 5) {
                const newStep = `
        <div class="step" id="step5">
            <h2>Would you like to add any photos or plans? (Optional)</h2>
            <p>Photos give pros more context and details to provide accurate quotes.</p>

            <div class="radio-group" id="fileUploadOptions">
                <label class="radio-box">
                    <input type="radio" name="photos" value="Yes" onchange="toggleDropzone(true)">
                    <span>Yes</span>
                </label>
            <div id="fileUploadContainer"></div>

                <label class="radio-box">
                    <input type="radio" name="photos" value="No" onchange="toggleDropzone(false)">
                    <span>No, maybe later</span>
                </label>
            </div>

            <div class="btn-group">
                <button type="button" class="next-btn" onclick="goToPrevStep(5)">Back</button>
                <button type="button" class="next-btn" onclick="validateFileOption()">Next</button>
            </div>
        </div>
    `;

                $("#formContainer").append(newStep);
            }



            else if (step === 6) {
                newStep.innerHTML = `
          <h2>Provide some details about your job (Optional)</h2>
          <textarea rows="8" style="width:100%;padding: 10px;font-size: 14px;" name="description" placeholder="Include any details you think the professional should know (type of work, measurements, etc.)"></textarea>
          <div class="btn-group">
            <button class="next-btn" type="button" onclick="goToPrevStep(6)">Back</button>
            <button class="next-btn" type="button" onclick="goToNextStep(6)">Next</button>
          </div>
        `;
            }
            else if (step === 7) {
                newStep.innerHTML = `
          <h2>Get responses from pros near you</h2>
          <p>We will connect you with available professionals near your area.</p>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your email Address">
          </div>
          <div class="btn-group">
            <button class="next-btn" type="button" onclick="goToPrevStep(7)">Back</button>
            <button class="next-btn" type="button" onclick="validateEmailStep()">Next</button>
          </div>
        `;
            }
            else if (step === 8) {
                newStep.innerHTML = `
          <h2>Create an account to track your job</h2>
          <input type="text" placeholder="Full Name" name="full_name" style="width:100%; padding:10px; margin-bottom:10px;">
          <input type="email" placeholder="Email" name="email" id="user-email" style="width:100%; padding:10px; margin-bottom:10px;">
          <input type="text" placeholder="Phone" name="phone" style="width:100%; padding:10px; margin-bottom:10px;">
          <input type="password" placeholder="Password" name="password" style="width:100%; padding:10px; margin-bottom:10px;">
            <div style="margin-bottom: 15px;">
                <label>
                    <input type="checkbox" name="terms" id="termsCheckbox">
                    I accept the <a href="{{ route('front.terms') }}" target="_blank">Terms & Conditions</a>
                </label>
                <div id="termsError" class="text-danger mt-1" style="display:none;"></div>
            </div>
        <div class="btn-group">
            <button class="next-btn" type="button" onclick="goToPrevStep(8)">Back</button>
            <button type="submit" class="next-btn">Submit</button>
          </div>
        `;
            }
            else {
                newStep.innerHTML = `
          <h2>All steps completed ✅</h2>
          <p>Thank you for submitting your job request.</p>
        `;
            }

            container.appendChild(newStep);
        }

        // Other Field Functions
        function showOtherField(radio, containerId) {
            hideOtherField(containerId);

            if (radio.checked && radio.value === "Other") {
                const container = document.getElementById(containerId + "_otherContainer");
                const input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Please specify...";
                input.classList.add("other-input");

                // on typing → clear error & reset border
                input.oninput = function () {
                    $("#" + containerId + "_error").hide();
                    this.style.border = "1px solid #ccc";
                };

                container.appendChild(input);
            }
        }

        function hideOtherField(containerId) {
            const container = document.getElementById(containerId + "_otherContainer");
            container.innerHTML = "";
        }

        function validateSubCategory() {
            let selected = $("input[name='subcategory']:checked").val();
            if (!selected) {
                if (!$("#subcategoryError").length) {
                    $("#subCategoryOptions").after('<div class="text-danger mt-2" id="subcategoryError">Please select a subcategory.</div>');
                }
            } else {
                $("#subcategoryError").remove();
                goToNextStep(2);
            }
        }
        function validatePropertyType() {
            let selected = $("input[name='property']:checked").val();
            let errorBox = $("#propertyOptions_error");
            let optionsBox = $("#propertyOptions");

            // Reset states
            errorBox.hide();
            optionsBox.css("border", "none").css("padding", "0");
            $("#propertyOptions_otherContainer input")?.css("border", "1px solid #ccc");
            if (!selected) {
                errorBox.text("Please select a property type.").show();
                optionsBox.css("border", "1px solid red").css("padding", "10px");
                return false;
            }
            if (selected === "Other") {
                let otherInput = $("#propertyOptions_otherContainer input");
                let otherValue = otherInput.val();

                if (!otherValue || otherValue.trim() === "") {
                    errorBox.text("Please specify your property type.").show();
                    otherInput.css("border", "1px solid red").focus();
                    return false;
                }
            }
            goToNextStep(3);
        }

        function validatePriority() {
            let selected = $("input[name='priority']:checked").val();
            let errorBox = $("#priorityOptions_error");

            errorBox.remove();
            $("#priorityOptions").css("border", "none").css("padding", "0");
            if (!selected) {
                $("#priorityOptions").after('<div id="priorityOptions_error" class="text-danger mt-2">Please select a priority.</div>');
                $("#priorityOptions").css("border", "1px solid red").css("padding", "10px");
                return false;
            }
            goToNextStep(4);
        }

        function validateFileOption() {
            let selected = $("input[name='photos']:checked").val();
            if (!selected) {
                // Show an error message if nothing is selected
                if (!$("#fileOptionError").length) {
                    $("#fileUploadOptions").after('<div id="fileOptionError" class="text-danger mt-2">Please select an option.</div>');
                }
                $("#fileUploadOptions").css("border", "1px solid red").css("padding", "10px");
                return false;
            } else {
                // Remove error if selected
                $("#fileOptionError").remove();
                $("#fileUploadOptions").css("border", "none").css("padding", "0");
                goToNextStep(5);
            }
        }

        function validateEmailStep() {
            let emailInput = $("#email").val().trim();
            let errorBox = $("#emailStepError");

            // Remove previous error
            errorBox?.remove();

            if (!emailInput) {
                $("#email").after('<div id="emailStepError" class="text-danger mt-2">Please enter your email.</div>');
                $("#email").css("border", "1px solid red");
                return false;
            }

            // Simple email format check
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailInput)) {
                $("#email").after('<div id="emailStepError" class="text-danger mt-2">Please enter a valid email.</div>');
                $("#email").css("border", "1px solid red");
                return false;
            }

            // Clear error and border
            $("#emailStepError").remove();
            $("#email").css("border", "1px solid #ccc");

            // Move to next step
            goToNextStep(7);
        }



        function clearError(containerId) {
            $("#" + containerId + "_error").hide();
            $("#" + containerId).css("border", "none").css("padding", "0");
        }


    </script>
    <script>
        let myDropzone = null;

        function toggleDropzone(show) {
            const container = $("#fileUploadContainer");
            container.empty();

            if (show) {
                container.append(`<form action="{{ route('front.upload.temp') }}"
                                class="dropzone" id="jobFileDropzone"></form>`);

                if (myDropzone) myDropzone.destroy();

                myDropzone = new Dropzone("#jobFileDropzone", {
                    url: "{{ route('front.upload.temp') }}",
                    paramName: "job_file",
                    maxFilesize: 5,
                    acceptedFiles: "image/*,application/pdf",
                    addRemoveLinks: true,
                    dictDefaultMessage: "Drag & drop files here or click to upload",
                    headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                    success: function (file, response) {
                        if (response.success) {
                            // Hidden input add karo
                            $("#job-post-form").append(
                                `<input type="hidden" name="job_files[]" value="${response.path}">`
                            );
                        }
                    },
                    removedfile: function(file) {
                        file.previewElement.remove();
                        // hidden input bhi remove
                        $(`#job-post-form input[value="${file.uploadedPath}"]`).remove();
                    }
                });
            }
        }

        // Submit form
        // Submit form with account validation
        // Submit form with account validation
        $(document).on("submit", "#job-post-form", function (e) {
            e.preventDefault();

            // Selectors
            let fullNameInput = $("input[name='full_name']");
            let emailInput = $("#user-email");
            let phoneInput = $("input[name='phone']");
            let passwordInput = $("input[name='password']");
            let termsCheckbox = $("#termsCheckbox");

            // Get values
            let fullName = fullNameInput.val().trim();
            let email = emailInput.val().trim();
            let phone = phoneInput.val().trim();
            let password = passwordInput.val().trim();
            let termsChecked = termsCheckbox.is(":checked");

            // Remove previous errors
            $(".accountError").remove();
            $("#termsError").hide();
            $("input").css("border", "1px solid #ccc");

            let isValid = true;

            // Full Name
            if (!fullName) {
                fullNameInput.after('<div class="accountError text-danger mt-1">Please enter your full name.</div>');
                fullNameInput.css("border", "1px solid red");
                isValid = false;
            }

            // Email
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
                emailInput.after('<div class="accountError text-danger mt-1">Please enter your email.</div>');
                emailInput.css("border", "1px solid red");
                isValid = false;
            } else if (!emailPattern.test(email)) {
                emailInput.after('<div class="accountError text-danger mt-1">Please enter a valid email.</div>');
                emailInput.css("border", "1px solid red");
                isValid = false;
            }

            // Phone
            if (!phone) {
                phoneInput.after('<div class="accountError text-danger mt-1">Please enter your phone number.</div>');
                phoneInput.css("border", "1px solid red");
                isValid = false;
            }

            // Password
            if (!password) {
                passwordInput.after('<div class="accountError text-danger mt-1">Please enter a password.</div>');
                passwordInput.css("border", "1px solid red");
                isValid = false;
            } else if (password.length < 6) {
                passwordInput.after('<div class="accountError text-danger mt-1">Password must be at least 6 characters.</div>');
                passwordInput.css("border", "1px solid red");
                isValid = false;
            }

            // Terms & Conditions
            if (!termsChecked) {
                $("#termsError").text("You must accept the Terms & Conditions.").show();
                isValid = false;
            }

            if (!isValid) return; // Stop if validation fails

            // All fields valid → submit via AJAX
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('submit.job.form.data') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("button[type=submit]").prop("disabled", true).text("Submitting...");
                },
                success: function (response) {
                    if (response.success) {
                        alertify.success("Job posted successfully!");
                        window.location.href = response.redirect_url ?? "{{ route('front.home') }}";
                    } else {
                        alertify.error(response.message || "Something went wrong");
                    }
                },
                error: function (xhr) {
                    alertify.error("Error: " + (xhr.responseJSON?.message ?? "Server error"));
                },
                complete: function () {
                    $("button[type=submit]").prop("disabled", false).text("Submit");
                }
            });
        });


    </script>

@endpush
