@extends('frontend.partials.master')
@section('title', 'Independent Contractor Agreement')

@push('styles')
    <style>
        .agreement-cont {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.8;
            font-size: 15px;
        }

        .agreement-cont h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #1a1a1a;
        }

        .agreement-cont h3 {
            font-size: 20px;
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 10px;
            color: #1a1a1a;
        }

        .agreement-cont p {
            margin-bottom: 12px;
            text-align: justify;
        }

        .agreement-cont ul {
            margin-bottom: 15px;
            margin-left: 25px;
            list-style-type: disc;
        }

        .agreement-cont ul li {
            margin-bottom: 6px;
        }

        .agreement-cont strong {
            font-weight: 600;
        }

        .breadcrumb-bar {
            background: #f8f9fa;
            padding: 40px 0;
        }

        .breadcrumb-title {
            font-weight: 700;
        }

        .signature-block {
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 15px;
        }

        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            background: #fff;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            color: #333;
        }
    </style>
@endpush

@section('main-content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <h2 class="breadcrumb-title mb-2">Independent Contractor Agreement</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active" aria-current="page">Independent Contractor Agreement</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Agreement Content -->
    <div class="page-wrapper py-5">
        <div class="container">
            <div class="agreement-cont">

                <h2>INDEPENDENT CONTRACTOR AGREEMENT</h2>
                <p><strong>(Lead-Based Service Agreement)</strong></p>
                <p><strong>Effective Date:</strong> October 6, 2025</p>

                <pre>
This Independent Contractor Agreement (“Agreement”) is made and entered into as of the above Effective Date by and between:

ServiceLinksGTA, a business operating in the Province of Ontario, Canada, with its principal place of business in the Greater Toronto Area (GTA) (“Company” or “ServiceLinksGTA”),

AND

[Contractor’s Full Legal Name / Business Name], an independent contractor or business registered under the laws of Ontario (“Contractor” or “Pro”).

Together, the “Parties,” and each individually a “Party.”
</pre>

                <h3>1. Purpose</h3>
                <p>ServiceLinksGTA operates a digital platform that connects verified service professionals (“Pros”) with homeowners seeking property-related services within Ontario.</p>
                <p>This Agreement establishes the terms under which the Contractor participates in the ServiceLinksGTA platform and purchases access to homeowner leads or subscriptions for business growth.</p>

                <h3>2. Nature of Relationship</h3>
                <p>The Contractor acknowledges that they are an independent contractor and not an employee, partner, agent, or representative of ServiceLinksGTA.</p>
                <p>Nothing in this Agreement shall be interpreted as creating an employment, joint venture, or agency relationship.</p>
                <p>The Contractor is solely responsible for:</p>
                <ul>
                    <li>Income taxes, CPP, EI, and HST (if applicable)</li>
                    <li>Compliance with all business licensing, insurance, and professional requirements under Ontario law</li>
                </ul>
                <p>This Agreement complies with the Employment Standards Act, 2000 (Ontario) and ensures independent contractor classification.</p>

                <h3>3. Services</h3>
                <p>The Contractor agrees to:</p>
                <ul>
                    <li>Maintain an active, professional account on the ServiceLinksGTA platform;</li>
                    <li>Respond promptly to homeowner leads received;</li>
                    <li>Provide accurate and lawful service information; and</li>
                    <li>Deliver services to homeowners in accordance with applicable municipal, provincial, and federal laws.</li>
                </ul>
                <p>ServiceLinksGTA provides lead generation and marketing access only — it does not perform or guarantee services to homeowners.</p>

                <h3>4. Lead Access and Payment Terms</h3>

                <h6>(a) Lead Purchase or Subscription</h6>
                <p>Contractors may choose between:</p>
                <ul>
                    <li><strong>(i)</strong> a Pay-Per-Lead model where the Contractor pays a set amount per verified homeowner lead received; or</li>
                    <li><strong>(ii)</strong> a Subscription Plan where the Contractor pays a recurring monthly fee for a specified number of verified leads.</li>
                </ul>
                <p>Pricing and lead allocation are outlined in the Contractor’s online account dashboard or onboarding documents.</p>

                <h6>(b) Payment Terms</h6>
                <ul>
                    <li>All payments are processed securely through the ServiceLinksGTA platform using approved third-party payment providers compliant with PCI-DSS standards.</li>
                    <li>Fees are non-refundable once a verified lead has been delivered, except in cases of proven duplicate or invalid leads as verified by ServiceLinksGTA’s internal quality control.</li>
                    <li>ServiceLinksGTA reserves the right to adjust lead or subscription fees with prior written or electronic notice.</li>
                    <li>Late or failed payments may result in temporary suspension of account access or termination under Section 12.</li>
                </ul>

                <h3>5. Contractor Responsibilities</h3>
                <ul>
                    <li>Respond to leads in a timely, courteous, and professional manner;</li>
                    <li>Provide truthful, complete, and current information;</li>
                    <li>Maintain valid insurance, licenses, and certifications required for their trade;</li>
                    <li>Not engage in misleading, fraudulent, or harmful conduct toward homeowners or other platform users; and</li>
                    <li>Comply with the Consumer Protection Act, 2002 (Ontario) and Occupational Health and Safety Act (Ontario) in all dealings.</li>
                </ul>

                <h3>6. ServiceLinksGTA Responsibilities</h3>
                <ul>
                    <li>Deliver verified homeowner leads as per the Contractor’s chosen plan;</li>
                    <li>Maintain platform security and privacy per PIPEDA;</li>
                    <li>Uphold transparency in pricing, invoicing, and service terms; and</li>
                    <li>Investigate any disputed leads fairly and promptly.</li>
                </ul>

                <h3>7. Intellectual Property</h3>
                <p>All content, systems, designs, logos, and intellectual property associated with the ServiceLinksGTA platform remain the sole property of the Company.</p>
                <p>The Contractor is granted a limited, non-transferable license to use the platform solely for receiving and responding to homeowner leads. No other rights are granted.</p>

                <h3>8. Confidentiality</h3>
                <p>Both Parties agree to maintain the confidentiality of any proprietary, personal, or financial information received during the course of this Agreement.</p>
                <p>The Contractor shall not disclose homeowner data or platform information to third parties without written consent.</p>
                <p>This obligation survives termination indefinitely.</p>

                <h3>9. Non-Solicitation</h3>
                <p>During this Agreement and for 12 months after termination, the Contractor shall not:</p>
                <ul>
                    <li>Attempt to divert homeowners obtained through the platform to competing services;</li>
                    <li>Solicit ServiceLinksGTA’s employees, affiliates, or partners; or</li>
                    <li>Engage in actions that harm or attempt to bypass the platform’s business model.</li>
                </ul>

                <h3>10. Limitation of Liability</h3>
                <p>ServiceLinksGTA provides homeowner leads “as available” and makes no warranty of guaranteed conversions or revenue.</p>
                <p>The Company shall not be liable for any indirect, consequential, or punitive damages, including loss of profits or goodwill.</p>
                <p>The Contractor shall indemnify and hold harmless ServiceLinksGTA, its officers, and affiliates from all claims or damages arising from the Contractor’s performance, negligence, or misconduct.</p>

                <h3>11. Insurance</h3>
                <p>The Contractor must maintain adequate commercial liability insurance or trade-specific coverage as required by law or their profession and provide proof upon request.</p>

                <h3>12. Termination</h3>
                <ul>
                    <li>Either Party may terminate this Agreement for convenience upon 14 days’ written notice.</li>
                    <li>Either Party may terminate immediately if the other Party breaches material obligations or engages in misconduct.</li>
                    <li>Upon termination, outstanding payments for valid leads delivered shall remain due and payable.</li>
                    <li>The Contractor must cease all platform access and use upon termination.</li>
                </ul>

                <h3>13. Compliance with Laws</h3>
                <p>Both Parties agree to comply with all applicable Ontario and Canadian laws, including but not limited to:</p>
                <ul>
                    <li>Income Tax Act (Canada)</li>
                    <li>Employment Standards Act, 2000 (Ontario)</li>
                    <li>Consumer Protection Act, 2002 (Ontario)</li>
                    <li>Occupational Health and Safety Act (Ontario)</li>
                    <li>Human Rights Code (Ontario)</li>
                    <li>PIPEDA and other privacy statutes</li>
                </ul>

                <h3>14. Force Majeure</h3>
                <p>Neither Party shall be liable for delays or non-performance caused by circumstances beyond their control (e.g., natural disasters, internet outages, government actions, pandemics).</p>

                <h3>15. Governing Law and Jurisdiction</h3>
                <p>This Agreement shall be governed by and construed in accordance with the laws of Ontario and the laws of Canada applicable therein.</p>
                <p>The Parties agree that any disputes shall be resolved exclusively before the courts located within the Greater Toronto Area (GTA), Ontario.</p>

                <h3>16. Entire Agreement</h3>
                <p>This Agreement constitutes the full and complete understanding between the Parties regarding its subject matter and supersedes all prior agreements or discussions.</p>
                <p>Any amendments must be made in writing and signed by both Parties.</p>

                <h3>17. Notices</h3>
                <p>All formal notices must be in writing and delivered to:</p>

                <pre>
For ServiceLinksGTA:
ServiceLinksGTA
Greater Toronto Area, Ontario, Canada
legal@servicelinksgta.ca

For Contractor:
Name:
Business Name:
Address:
Email:
</pre>

                <h3>18. Counterparts & Electronic Execution</h3>
                <p>This Agreement may be executed in counterparts, including electronically or via digital signature, and all counterparts together form one binding document.</p>

                <h3>IN WITNESS WHEREOF</h3>
                <p>The Parties have executed this Agreement as of the Effective Date.</p>

                <div class="signature-block">
                    <p><strong>For ServiceLinksGTA (Company):</strong></p>
                    <p>Name: _________________________<br>
                        Title: _________________________<br>
                        Signature: _____________________<br>
                        Date: _________________________</p>
                </div>

                <div class="signature-block">
                    <p><strong>For Contractor (Pro):</strong></p>
                    <p>Name: _________________________<br>
                        Business Name: __________________<br>
                        Signature: _____________________<br>
                        Date: _________________________</p>
                </div>

            </div>
        </div>

    </div>
@endsection

