@extends('frontend.partials.master')
@section('title', 'Privacy Policy')

@push('styles')
    <style>
        .privacy-cont {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.8;
            font-size: 15px;
        }

        .privacy-cont h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #1a1a1a;
        }

        .privacy-cont h3 {
            font-size: 20px;
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 10px;
            color: #1a1a1a;
        }

        .privacy-cont h6 {
            font-size: 16px;
            font-weight: 600;
            margin-top: 15px;
            margin-bottom: 8px;
        }

        .privacy-cont p {
            margin-bottom: 12px;
            text-align: justify;
        }

        .privacy-cont ul {
            margin-bottom: 15px;
            margin-left: 25px;
            list-style-type: disc;
        }

        .privacy-cont ul li {
            margin-bottom: 6px;
        }

        .breadcrumb-bar {
            background: #f8f9fa;
            padding: 40px 0;
        }

        .breadcrumb-title {
            font-weight: 700;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
@endpush

@section('main-content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Privacy &amp; Policy</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active" aria-current="page">Privacy &amp; Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-wrapper py-5">
        <div class="container">
            <div class="privacy-cont">

                <h2>ServiceLinksGTA – Privacy Policy</h2>
                <p><strong>Effective Date:</strong> October 6, 2025</p>
                <p><strong>Region Covered:</strong> Greater Toronto Area (GTA), Ontario Canada</p>

                <h3>1. Purpose</h3>
                <p>This Privacy Policy explains how ServiceLinksGTA (“ServiceLinksGTA,” “we,” “our,” or “us”) collects, uses, discloses, and protects personal information of users (“you”) who access our website, mobile application, and related online services (collectively, the “Platform”).</p>

                <p>We are committed to full compliance with all Canadian federal and Ontario provincial privacy, consumer, and accessibility laws, including:</p>

                <ul>
                    <li>Personal Information Protection and Electronic Documents Act (PIPEDA)</li>
                    <li>Freedom of Information and Protection of Privacy Act (FIPPA – Ontario)</li>
                    <li>Consumer Protection Act, 2002 (Ontario)</li>
                    <li>Canada’s Anti-Spam Legislation (CASL)</li>
                    <li>Accessibility for Ontarians with Disabilities Act (AODA)</li>
                    <li>Electronic Commerce Protection Act (Canada)</li>
                </ul>

                <p>By using the Platform, you consent to the collection, use, and disclosure of personal information in accordance with this Policy.</p>

                <h3>2. Who We Are</h3>
                <p>ServiceLinksGTA is a GTA-based digital platform that connects Homeowners seeking home or property services with verified service professionals (“Pros”).</p>
                <p>We facilitate introductions only — we do not perform or guarantee any service work.</p>

                <h3>3. Information We Collect</h3>

                <h6>(a) Information You Provide</h6>
                <ul>
                    <li>Name, email address, phone number, and postal code</li>
                    <li>Account credentials and profile details</li>
                    <li>Business name, licensing, insurance, and payment information (for Pros)</li>
                    <li>Messages, reviews, ratings, and other content you post</li>
                    <li>Support inquiries and communications</li>
                </ul>

                <h6>(b) Automatically Collected Information</h6>
                <ul>
                    <li>IP address, browser type, device type, and operating system</li>
                    <li>Session duration, pages visited, and actions taken</li>
                    <li>Cookies and similar tracking technologies</li>
                </ul>

                <h6>(c) Third-Party Information</h6>
                <p>We may receive limited data from payment processors, analytics tools, or verification partners to confirm identity or process transactions securely.</p>

                <h3>4. How We Use Personal Information</h3>
                <ul>
                    <li>Operate, maintain, and improve the Platform</li>
                    <li>Match Homeowners with Pros</li>
                    <li>Process Pro subscriptions and platform fees (Homeowners are never charged)</li>
                    <li>Verify Pro credentials and compliance</li>
                    <li>Provide support, updates, and confirmations</li>
                    <li>Display legitimate reviews and ratings</li>
                    <li>Enforce Terms &amp; Conditions and prevent fraud</li>
                    <li>Comply with legal and regulatory obligations</li>
                    <li>Conduct analytics to improve performance and user experience</li>
                </ul>
                <p>We never sell or trade user information.</p>

                <h3>5. Legal Basis for Processing</h3>
                <p>Processing is based on:</p>
                <ul>
                    <li>Consent (express or implied)</li>
                    <li>Contractual necessity (to deliver requested services)</li>
                    <li>Legal obligations (e.g., tax or regulatory reporting)</li>
                    <li>Legitimate business interests (security, analytics, service quality)</li>
                </ul>
                <p>You may withdraw consent at any time, subject to legal and contractual restrictions.</p>

                <h3>6. Disclosure of Information</h3>
                <ul>
                    <li>Service providers (hosting, payments, analytics, communication tools) under strict confidentiality contracts</li>
                    <li>Law enforcement or regulators, if required by law or court order</li>
                    <li>Successor entities in case of merger or acquisition, under equivalent privacy safeguards</li>
                </ul>
                <p>We do not share data for marketing without your explicit consent.</p>

                <h3>7. Payments and Fees</h3>
                <p>Only Pros are billed for platform fees or subscriptions. Homeowners are never charged for using the Platform.</p>
                <p>Payments are processed securely through verified third-party payment processors compliant with PCI-DSS standards.</p>
                <p>We retain only non-sensitive transactional records (e.g., amount, date).</p>

                <h3>8. Data Retention</h3>
                <p>Personal data is kept only as long as necessary for its purpose or as required by law. Accounts inactive for 24 months are deleted or anonymized. Backups are retained for limited periods for disaster recovery, then permanently erased.</p>

                <h3>9. Security Measures</h3>
                <ul>
                    <li>End-to-end SSL/TLS encryption</li>
                    <li>Restricted employee access on a need-to-know basis</li>
                    <li>Regular vulnerability and access-control audits</li>
                    <li>Secure Canadian-based data centers or equivalent jurisdiction</li>
                </ul>
                <p>Despite strong protections, no system is 100% secure; users should safeguard login details.</p>

                <h3>10. International Data Transfers</h3>
                <p>All primary data is stored in Canada. If a third-party provider stores data abroad, we ensure comparable protection through contractual and technical safeguards.</p>

                <h3>11. Your Rights (Under PIPEDA and FIPPA)</h3>
                <ul>
                    <li>Access and obtain a copy of your personal data</li>
                    <li>Correct or update inaccurate information</li>
                    <li>Withdraw consent for non-essential uses</li>
                    <li>Request deletion (subject to legal limits)</li>
                    <li>File a complaint with the Office of the Privacy Commissioner of Canada (OPC)</li>
                </ul>
                <p>Contact <a href="mailto:privacy@servicelinksgta.ca">privacy@servicelinksgta.ca</a> to exercise these rights.</p>

                <h3>12. Cookies &amp; Data Tracking Policy</h3>
                <h6>(a) Types of Cookies</h6>
                <ul>
                    <li>Essential cookies: required for site security and login sessions</li>
                    <li>Analytics cookies: help us measure traffic and improve usability</li>
                    <li>Preference cookies: remember user settings</li>
                    <li>Marketing cookies: used only with prior consent</li>
                </ul>

                <h6>(b) Third-Party Tools</h6>
                <p>We may use Google Analytics, Meta Pixel, or similar services; all data is anonymized where possible.</p>

                <h6>(c) Consent &amp; Control</h6>
                <p>When you first visit the site, a cookie-consent banner appears allowing you to accept, reject, or customize settings. You can manage cookies anytime through browser settings.</p>

                <h3>13. Communications &amp; CASL Compliance</h3>
                <p>We send promotional or marketing messages only with express consent. Each message contains an unsubscribe link and our contact details. Transactional emails (bookings, confirmations, security alerts) are exempt.</p>

                <h3>14. Children’s Privacy</h3>
                <p>The Platform is intended for users 18 years and older. We do not knowingly collect information from minors; any discovered data is deleted promptly.</p>

                <h3>15. Accessibility (AODA Compliance)</h3>
                <ul>
                    <li>Designing content to meet WCAG 2.0 Level AA standards</li>
                    <li>Providing information in accessible formats upon request</li>
                    <li>Training staff on accessible customer-service practices</li>
                </ul>
                <p>Requests for accessible formats can be sent to <a href="mailto:support@servicelinksgta.ca">support@servicelinksgta.ca</a>.</p>

                <h3>16. Third-Party Links</h3>
                <p>Our Platform may link to third-party websites or apps. We are not responsible for their privacy or security practices; users should review each site’s policy before engaging.</p>

                <h3>17. Updates to This Policy</h3>
                <p>We may revise this Policy periodically. The “Effective Date” above reflects the latest version. Significant changes will be announced via email or notice on our Platform. Continued use after posting constitutes acceptance.</p>

                <h3>18. Contact Information</h3>
                <p><strong>ServiceLinksGTA – Privacy Office</strong><br>
                    Greater Toronto Area, Ontario, Canada<br>
                    <a href="mailto:privacy@servicelinksgta.ca">privacy@servicelinksgta.ca</a><br>
                    <a href="mailto:info@servicelinksgta.ca">info@servicelinksgta.ca</a>
                </p>

                <h3>19. Legal Jurisdiction</h3>
                <p>All matters related to privacy or data handling are governed by the laws of the Province of Ontario and the laws of Canada applicable therein. Any dispute shall be brought exclusively before the courts located within the Greater Toronto Area (GTA), Ontario.</p>

                <p><strong>By using the ServiceLinksGTA Platform, you acknowledge that you have read, understood, and agreed to this comprehensive Privacy Policy, including our Cookie &amp; Data Tracking practices.</strong></p>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
