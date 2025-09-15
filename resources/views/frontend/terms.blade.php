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
                    <h2 class="breadcrumb-title mb-2">Terms &amp; Conditions</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active" aria-current="page">Terms &amp; Conditions</li>
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
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="terms-content privacy-cont">
                            <h2 class="MsoNormal">ServiceLinksGTA – General Website Policies</h2>
                            <p class="MsoNormal">Effective Date: August 11, 2025</p>
                            <h3 class="MsoNormal">1. Purpose</h3>
                            <p class="MsoNormal">This policy outlines the general rules and expectations for all users of the ServiceLinksGTA platform. By accessing or using our website and services, users (both Pros and Homeowners) agree to be bound by the terms below.</p>
                            <h3 class="MsoNormal">2. Definitions</h3>
                            <ol>
                                <li class="MsoNormal">“Platform” refers to ServiceLinksGTA’s website and any related mobile or desktop applications.</li>
                                <li class="MsoNormal">“Homeowners” are individuals seeking services.</li>
                                <li class="MsoNormal">“Pros” are verified professionals (e.g., plumbers) offering services.</li>
                                <li class="MsoNormal">“Users” refers collectively to Homeowners and Pros.</li>
                            </ol>
                            <h3 class="MsoNormal">3. Legal Framework</h3>
                            <p class="MsoNormal">This policy complies with applicable Ontario laws including:</p>
                            <ol>
                                <li class="MsoNormal">PIPEDA (Personal Information Protection and Electronic Documents Act)</li>
                                <li class="MsoNormal">Consumer Protection Act, 2002 (Ontario)</li>
                                <li class="MsoNormal">Contract Law under the Sale of Goods Act</li>
                                <li class="MsoNormal">Electronic Commerce Protection Act</li>
                            </ol>
                            <h3 class="MsoNormal">4. Acceptable Use Policy</h3>
                            <p class="MsoNormal">Users agree not to use the platform for illegal or fraudulent activities. Harassment, discrimination, or abuse of any kind is strictly prohibited. Malicious uploads or code are not allowed. Pros must comply with all licensing and regulatory requirements.</p>
                            <h3 class="MsoNormal">5. Account Integrity</h3>
                            <p class="MsoNormal">Each user must provide accurate, current, and complete information. Accounts are for individual use only; credential sharing is not allowed. Users are responsible for their account security.</p>
                            <h3 class="MsoNormal">6. Service Matching and Bookings</h3>
                            <p class="MsoNormal">We match Homeowners with Pros but do not guarantee service outcomes. Homeowners agree to pricing before booking. Disputes must be reported within 48 hours of service.</p>
                            <h3 class="MsoNormal">7. Payments and Fees</h3>
                            <p class="MsoNormal">All payments occur through our platform. Platform fees are deducted from Pros’ earnings. Refunds are processed under specific terms.</p>
                            <h3 class="MsoNormal">8. Reviews and Ratings</h3>
                            <p class="MsoNormal">Only honest, factual reviews are permitted. Inappropriate or defamatory content will be removed at our discretion.</p>
                            <h3 class="MsoNormal">9. Privacy &amp; Data Protection</h3>
                            <p class="MsoNormal">We follow strict privacy laws, including PIPEDA. User data is secured and used only as stated in our privacy policy.</p>
                            <h3 class="MsoNormal">10. Intellectual Property</h3>
                            <p class="MsoNormal">All content, branding, and platform designs are owned by ServiceLinksGTA and may not be copied or reused without permission.</p>
                            <h3 class="MsoNormal">11. Limitation of Liability</h3>
                            <p class="MsoNormal">We are not liable for:</p>
                            <ol>
                                <li class="MsoNormal">Performance of work by any Pro</li>
                                <li class="MsoNormal">Damage or injury resulting from services</li>
                                <li class="MsoNormal">Technical outages or bugs</li>
                            </ol>
                            <h3 class="MsoNormal">12. Dispute Resolution</h3>
                            <p class="MsoNormal">Disputes should be resolved between parties first. ServiceLinksGTA may assist in mediation. Legal actions are under Ontario jurisdiction.</p>
                            <h3 class="MsoNormal">13. Suspension and Termination</h3>
                            <p class="MsoNormal">Violations may result in account suspension or termination. Users may appeal through customer support.</p>
                            <h3 class="MsoNormal">14. Changes to Policy</h3>
                            <p class="MsoNormal">We may update this policy. Major changes will be communicated via email or platform notices.</p>
                            <h3 class="MsoNormal">15. Accessibility Commitment</h3>
                            <p class="MsoNormal">ServiceLinksGTA is committed to providing equal access and opportunity to all users, including people with disabilities. We strive to meet the requirements of the Accessibility for Ontarians with Disabilities Act (AODA) and ensure that our website, services, and customer interactions are inclusive.</p>
                            <p class="MsoNormal">We offer customer support through accessible formats upon request.</p>
                            <p class="MsoNormal">Users with disabilities are welcome to contact us to request accommodations or provide feedback on our accessibility practices.</p>
                            <p class="MsoNormal">We aim to design and maintain digital content that meets or exceeds the WCAG 2.0 Level AA accessibility standards where required.</p>
                            <p class="MsoNormal">Our team is trained on providing accessible customer service and using inclusive communication strategies.</p>
                            <p class="MsoNormal">To request information in an alternative format or offer suggestions, please contact:</p>
                            <p class="MsoNormal">&nbsp;<a href="mailto:support@servicelinksgta.ca" target="_blank" rel="noopener">support@servicelinksgta.ca</a></p>
                            <p class="MsoNormal">&nbsp;647-964-4034</p>
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
