@extends('frontend.partials.master')
@section('title', 'Home')
@push('styles')
    <style>
        li.MsoNormal {
            list-style: disc;
        }
    </style>
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
                            <h2 class="MsoNormal">ServiceLinksGTA – Terms & Conditions</h2>
                            <p class="MsoNormal">Effective Date: October 6, 2025</p>
                            <h3 class="MsoNormal">1. Purpose</h3>
                            <p class="MsoNormal">These Terms and Conditions (“Terms”) outline the rules, rights, and obligations for all users of the ServiceLinksGTA platform. By using our website, mobile applications, or any related services (collectively, the “Platform”), you agree to be bound by these Terms and all applicable laws of the Province of Ontario and Canada.</p>
                            <h3 class="MsoNormal">2. Definitions</h3>
                            <ol>
                                <li class="MsoNormal">“Platform” – refers to the ServiceLinksGTA website and any related applications or services.</li>
                                <li class="MsoNormal">“Homeowners” – individuals seeking to hire service professionals for one-time or occasional work.</li>
                                <li class="MsoNormal">“Pros” – verified service professionals offering their services (e.g., plumbers, electricians, cleaners).</li>
                                <li class="MsoNormal">“Users” – collectively refers to Homeowners and Pros.</li>
                                <li class="MsoNormal">“We,” “Us,” or “Our” – refers to ServiceLinksGTA.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3">3. Legal Framework</h3>
                            <p class="MsoNormal">ServiceLinksGTA operates in compliance with:</p>
                            <ol>
                                <li class="MsoNormal">Personal Information Protection and Electronic Documents Act (PIPEDA) (Federal)</li>
                                <li class="MsoNormal">Consumer Protection Act, 2002 (Ontario)</li>
                                <li class="MsoNormal">Electronic Commerce Act, 2000 (Ontario)</li>
                                <li class="MsoNormal">Accessibility for Ontarians with Disabilities Act, 2005 (AODA)</li>
                                <li class="MsoNormal">Canadian Anti-Spam Legislation (CASL)</li>
                            </ol>
                            <h3 class="MsoNormal mt-3">4. Role of ServiceLinksGTA</h3>
                            <p class="MsoNormal">ServiceLinksGTA is a referral and matching platform that connects Homeowners with verified Pros in the Greater Toronto Area.<br>When a Homeowner books a Pro through the Platform:</p>
                            <p class="MsoNormal">The agreement for the job is directly between the Homeowner and the Pro.</p>
                            <ol>
                                <li class="MsoNormal">ServiceLinksGTA does not provide the service, does not supervise the work, and is not a party to the service agreement.</li>
                                <li class="MsoNormal">Each job is a one-time engagement unless the Homeowner and Pro agree otherwise.</li>
                                <li class="MsoNormal">ServiceLinksGTA is not responsible for the quality, timeliness, safety, or outcome of any work performed by a Pro.</li>
                            </ol>






                            <h3 class="MsoNormal mt-3">5. Acceptable Use Policy</h3>
                            <p class="MsoNormal">All Users agree:</p>
                            <ol>
                                <li class="MsoNormal">Not to use the Platform for illegal, fraudulent, or misleading purposes.</li>
                                <li class="MsoNormal">Not to harass, discriminate, or abuse any person on or through the Platform.</li>
                                <li class="MsoNormal">Not to upload or distribute harmful, defamatory, or malicious code or files.</li>
                                <li class="MsoNormal">That Pros must hold and maintain all necessary business licences, trade certifications, and insurance as required by Ontario law.</li>
                            </ol>
                            <p class="MsoNormal mt-3">Violation of this section may result in account suspension or termination.</p>







                            <h3 class="MsoNormal mt-3 mb-2">6. Account Registration and Integrity</h3>
                            <ol>
                                <li class="MsoNormal">Users must provide accurate, current, and complete information during registration.</li>
                                <li class="MsoNormal">Accounts are for individual use only. Sharing credentials or creating multiple accounts for fraudulent purposes is prohibited.</li>
                                <li class="MsoNormal">Users are responsible for maintaining the confidentiality and security of their login information and all activity under their account.</li>
                                <li class="MsoNormal">ServiceLinksGTA reserves the right to verify identities, suspend, or remove accounts that violate these Terms.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3 mb-2">7. Service Matching and Bookings</h3>
                            <ol>
                                <li class="MsoNormal">The Platform facilitates introductions between Homeowners and Pros based on location, service category, and availability.</li>
                                <li class="MsoNormal">ServiceLinksGTA does not guarantee that a match will occur or that a particular Pro will accept a job.</li>
                                <li class="MsoNormal">Homeowners and Pros are responsible for confirming the scope of work, timing, and pricing before any work begins.</li>
                                <li class="MsoNormal">Disputes or service issues must be reported to <a href="mailto:support@servicelinksgta.ca">support@servicelinksgta.ca</a> within 48 hours of the job’s completion. ServiceLinksGTA may, at its discretion, assist in resolving such matters, but has no obligation to do so.</li>
                            </ol>

                            <h3 class="MsoNormal mt-3 mb-2">8. Payments and Fees</h3>
                            <ol>
                                <li class="MsoNormal">Homeowners: There are no fees or charges for using the Platform.</li>
                                <li class="MsoNormal">Pros: ServiceLinksGTA charges subscription or service fees as displayed during registration or plan selection.</li>
                                <li class="MsoNormal">Fees for Pros are automatically deducted or invoiced according to the billing plan.</li>
                                <li class="MsoNormal">All fees are subject to applicable taxes (HST) under Canadian law.</li>
                                <li class="MsoNormal">Payment processing may be managed through secure third-party providers compliant with Canadian banking and privacy standards.</li>
                                <li class="MsoNormal">Refunds for Pros are only issued in cases of system error or duplicate billing.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3 mb-2">9. Reviews and Ratings</h3>
                            <ol>
                                <li class="MsoNormal">Homeowners may leave reviews after a job is completed.</li>
                                <li class="MsoNormal">Reviews must be honest, accurate, and non-defamatory.</li>
                                <li class="MsoNormal">ServiceLinksGTA reserves the right to remove or edit any review that violates this policy, privacy rights, or applicable law.</li>
                                <li class="MsoNormal">Reviews reflect user opinions and do not represent ServiceLinksGTA’s views or guarantees.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3 mb-2">10. Privacy and Data Protection</h3>
                            <ol>
                                <li class="MsoNormal">ServiceLinksGTA collects and processes personal information in compliance with PIPEDA and Ontario’s privacy standards.</li>
                                <li class="MsoNormal">Data is collected only for legitimate purposes such as account verification, communication, and service facilitation.</li>
                                <li class="MsoNormal">Personal data will not be sold or shared with third parties except where required by law or necessary to provide services (e.g., payment processors).</li>
                                <li class="MsoNormal">Users may request access to, correction of, or deletion of their personal information by contacting <a href="mailto:privacy@servicelinksgta.ca">privacy@servicelinksgta.ca</a> .</li>
                                <li class="MsoNormal">Full details are available in our Privacy Policy.</li>
                            </ol>

                            <h3 class="MsoNormal mt-3 mb-2">11. Intellectual Property</h3>
                            <ol>
                                <li class="MsoNormal">All content, designs, trademarks, and software on the Platform are the property of ServiceLinksGTA and protected under Canadian intellectual property law.</li>
                                <li class="MsoNormal">Users may not copy, modify, or distribute any part of the Platform without written consent.</li>
                                <li class="MsoNormal">Pros may use their profile content only for legitimate business promotion related to the Platform.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3 mb-2">12. Limitation of Liability</h3>
                            <p class="MsoNormal">To the fullest extent permitted by law:</p>
                            <ol>
                                <li class="MsoNormal">ServiceLinksGTA is not liable for the actions, performance, or conduct of any Pro or Homeowner.</li>
                                <li class="MsoNormal">We are not responsible for any damage, injury, loss, or dissatisfaction arising from services provided through the Platform.</li>
                                <li class="MsoNormal">We do not guarantee uninterrupted or error-free operation of the Platform.</li>
                                <li class="MsoNormal">ServiceLinksGTA’s total liability to any User shall not exceed the total amount of fees paid by that User to ServiceLinksGTA in the previous 12 months (if any).</li>
                            </ol>

                            <h3 class="MsoNormal mt-3 mb-2">13. Dispute Resolution and Jurisdiction</h3>
                            <ol>
                                <li class="MsoNormal">Users agree to first attempt to resolve disputes through direct communication and good-faith negotiation.</li>
                                <li class="MsoNormal">If a dispute cannot be resolved, the matter may be submitted to mediation or arbitration in Toronto, Ontario.</li>
                                <li class="MsoNormal">If legal action is necessary, it shall be brought exclusively in the courts of the Province of Ontario, specifically within the Greater Toronto Area (GTA).</li>
                                <li class="MsoNormal">These Terms are governed by the laws of Ontario and the federal laws of Canada applicable therein.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3 mb-2">14. Suspension and Termination</h3>
                            <ol>
                                <li class="MsoNormal">ServiceLinksGTA may suspend or terminate a User’s account if these Terms are violated, or if required by law or regulatory authority.</li>
                                <li class="MsoNormal">Users may appeal a suspension by contacting <a href="mailto:support@servicelinksgta.ca">support@servicelinksgta.ca</a> with an explanation and supporting details.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3 mb-2">15. Accessibility Commitment (AODA Compliance)</h3>
                            <p class="MsoNormal">ServiceLinksGTA is committed to providing accessible and inclusive services in compliance with the Accessibility for Ontarians with Disabilities Act (AODA).</p>
                            <ol>
                                <li class="MsoNormal">Our digital services aim to meet or exceed WCAG 2.0 Level AA standards.</li>
                                <li class="MsoNormal">We provide support in alternative formats upon request.</li>
                                <li class="MsoNormal">Users with disabilities can contact us for accommodations or to provide feedback on accessibility at <a href="mailto:support@servicelinksgta.ca">support@servicelinksgta.ca</a> .</li>
                                <li class="MsoNormal">Our staff are trained in accessible communication and customer service best practices.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3 mb-2">16. Modifications to Terms</h3>
                            <p class="MsoNormal">We may update these Terms from time to time to reflect changes in our business practices or legal requirements.</p>
                            <ol>
                                <li class="MsoNormal">Material changes will be communicated via email or in-platform notification.</li>
                                <li class="MsoNormal">Continued use of the Platform after updates constitutes acceptance of the revised Terms.</li>
                            </ol>
                            <h3 class="MsoNormal mt-3 mb-2">17. Contact Information</h3>
                            <p class="MsoNormal">For questions, concerns, or requests under these Terms, contact:</p>
                            <p class="MsoNormal">&nbsp;<a href="mailto:support@servicelinksgta.ca" target="_blank" rel="noopener">support@servicelinksgta.ca</a></p>
                            <p class="MsoNormal">ServiceLinksGTA – Greater Toronto Area, Ontario, Canada</p>
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
