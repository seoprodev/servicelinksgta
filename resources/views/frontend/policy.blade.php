@extends('frontend.partials.master')
@section('title', 'Home')
@push('styles')
@endpush

@section('main-content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Pivacy &amp; Policy</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active" aria-current="page">Pivacy &amp; Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('frontend-assets') }}/img/bg/breadcrumb-bg-01.png" class="breadcrumb-bg-1" alt="Img">
                <img src="{{ asset('frontend-assets') }}/img/bg/breadcrumb-bg-02.png" class="breadcrumb-bg-2" alt="Img">
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="terms-content privacy-cont">
                            <h2>ServiceLinksGTA – Privacy Policy</h2>
                            <p>At ServiceLinksGTA, we are committed to protecting the privacy and personal information of all users,<br>including homeowners, service providers (“Pros”), and business clients. This Privacy Policy outlines<br>how we collect, use, disclose, and protect your personal information in compliance with the **Personal<br>Information Protection and Electronic Documents Act (PIPEDA)** and relevant Ontario privacy laws.</p>
                            <h3>1. Collection of Personal Information</h3>
                            <p>We collect only the information necessary to provide and improve our services, including: Contact<br>details (name, email, phone number, address) Billing and payment information Service history and<br>preferences Device and usage data through cookies and analytics tools</p>
                            <h3>2. Use of Personal Information</h3>
                            <p>Your information is used to: Match homeowners with trusted service providers Facilitate secure<br>communication and payments Deliver customer service and support Send updates, promotions, and<br>service-related messages</p>
                            <h3>3. Consent and User Rights</h3>
                            <p>By using our platform, you consent to the collection and use of your information as outlined in this<br>policy. You have the right to: Access or correct your personal data Withdraw consent at any time<br>Request deletion of your account or data</p>
                            <h3>4. Sharing of Information</h3>
                            <p>We do not sell or rent your personal information. We may share your data with third parties only to:<br>Provide essential services (e.g., payment processing) Comply with legal obligations or law enforcement<br>requests Protect the rights, safety, or property of ServiceLinksGTA and its users</p>
                            <h3>5. Data Security</h3>
                            <p>We use administrative, technical, and physical safeguards to protect your information against<br>unauthorized access, loss, or misuse.</p>
                            <h3>6. Data Retention</h3>
                            <p>Personal information is retained only as long as necessary to fulfill the purposes described or as<br>required by law.</p>
                            <h3>7. Children’s Privacy</h3>
                            <p>Our services are not directed to individuals under the age of 16. We do not knowingly collect<br>information from minors.</p>
                            <h3>8. Cookies and Tracking</h3>
                            <p>We use cookies to personalize user experience, monitor site usage, and deliver targeted advertisements.<br>You may modify your browser settings to reject cookies.</p>
                            <h3>9. Third-Party Links</h3>
                            <p>Our website may contain links to third-party websites. We are not responsible for their privacy<br>practices.</p>
                            <h3>10. Changes to this Policy</h3>
                            <p>We may update this policy from time to time. Revisions will be posted on this page with an updated<br>revision date.</p>
                            <h3>11. Contact Us</h3>
                            <p>If you have questions or concerns regarding your personal data or this policy, please contact us at:<br>ServiceLinksGTA<br>5506 Fleur De Lis Crt<br>Mississauga, Ontario L5R 2Z5<br>Phone: <a href="tel:647-964-4034">647-964-4034</a><br>Email: <a href="mailto:privacy@servicelinksgta.ca">privacy@servicelinksgta.ca</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
