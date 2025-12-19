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

                <h2>Built for Ontario Standards & Consumer Protection Expectations</h2>
                
                <pre>
At ServiceLinksGTA, your safety, peace of mind, and satisfaction come first. Our Homeowner Protection Promise outlines exactly what you can expect when booking a plumbing professional through our platform. This promise is designed to meet Ontario consumer protection standards and ensures transparency, fairness, and accountability at every step.
</pre>

                <h3>1. Verified & Qualified Professionals Only</h3>
                <p>ServiceLinksGTA operates a digital platform that connects verified service professionals (“Pros”) with homeowners seeking property-related services within Ontario.</p>
                
                
                
                <p>Every plumber on our platform must meet the following mandatory requirements before being approved</p>
                
                <ul>
                    <li> Valid plumbing license or recognized trade certification in Ontario</li>
                    <li> Proof of liability insurance (minimum industry-standard coverage)</li>
                        <li>Clean safety record and compliance with Ontario Building & Plumbing Codes </li>
                            <li>Identity verification and work history review </li>
                                <li>Agreement to follow ServiceLinksGTA’s Code of Conduct </li>
                                   
                    
                    
                   
                   
                </ul>
                <p>If a plumber fails to maintain these standards, their access to our platform is removed immediately.</p>

                <h3>2. Transparent Pricing With No Hidden Fees</h3>
                
                <p>Homeowners will always receive:</p>
                
                <ul>
                    <li> A clear explanation of the service requested)</li>
                    <li>Transparent pricing information before the job begins</li>
                    <li>No surprise charges without homeowner approval</li>
                       <li>Emergency call-out charges disclosed upfront</li>
                          
                </ul>
                <p>We never allow plumbers to raise prices unexpectedly or add unauthorized fees.</p>

                <h3>3. Protection Against Contractor Misconduct</h3>
                <p>If a plumber acts unprofessionally, attempts to bypass the platform, or provides misleading information, you are protected. ServiceLinksGTA will:</p>
                <ul>
                    <li>Remove the plumber from future jobs</li>
                    <li>Assist you in resolving the issue fairly</li>
                    <li>Record the incident to prevent repeat behaviour</li>
                    <li>Support you with documentation if further action is required</li>
                </ul>
                <p>Your trust and safety come first.</p>
                
                

                <h3>4. Service Quality Assurance</h3>
                

               
                <p>If your plumber does not complete the job to professional standards, ServiceLinksGTA will:</p>
                <ul>
                    <li> Work with you to understand the issue</li>
                    <li>Arrange for a follow-up correction with the same or a different verified pro</li>
                    <li>Ensure that required standards are met at no additional matching cost</li>
                </ul>
                <p>While we do not provide the labour ourselves, we commit to making sure any issue is addressed promptly through our verified pros.</p>
                
                

             
               

                <h3>5. Secure Communication & Documentation</h3>
                 <ul>
                    <p>All job details, agreements, and communication through ServiceLinksGTA Messenger are:</p>
                    
                    <li>Securely stored</li>
                    <li>Time-stamped</li>
                    <li>Accessible to both you and our support team</li>
                   <p>This ensures clear records in case of questions, disputes, or follow-up support.</p>
                </ul>

                <h3>6. Your Personal Information is Protected</h3>
                <p>We follow Ontario privacy expectations and best practices.
We will never:</p>
                <ul>
                    <li>Sell your information</li>
                    <li>Share your details outside the service request</li>
                    <li>Allow pros to use your contact info for marketing or off-platform solicitation</li>
                    
                </ul>
                <p>Your data is used only to match you with a verified pro and support the job.</p>

                <h3>7. Guaranteed On-Platform Support</h3>
                
                <p>If anything goes wrong throughout your service experience, ServiceLinksGTA will:</p>
                    <ul>
                    <li>Respond to homeowner concerns within 24 hours</li>
                    <li>Provide guidance, support, and follow-up communication</li>
                    <li>Take action on any verified issue with a plumber</li>
                  
                    </ul>
                    
                
                <p> We stand behind every booking made through our platform.</p>

                <h3>8. No-Risk Booking Guarantee</h3>
                <p>If we match you with a plumber and you choose not to proceed before the work starts, you owe nothing beyond any disclosed call-out fee (where applicable). You will never be pressured to continue with work you do not approve.</p>
                
                

                <h3>9. Always Local, Always Accountable</h3>
                
                <p>ServiceLinksGTA operates within the GTA and surrounding areas only.
This means:</p>
                <ul>
                    <li> No overseas support lines</li>
                    <li>No hard-to-reach contractors</li>
                    <li>No third-party outsourcing</li>
                
                   
                </ul>
                <p>Your support, plumbers, and service teams are all based locally.</p>

                <h3>10. 100% Commitment to Fair, Honest Service</h3>
                
                <p>We promise: </p>
                 <ul>
                    <li>Honesty in communication</li>
                    <li>Accuracy in job matching</li>
                    <li>Respect for your home</li>
                    <li>Full transparency at every step
If any plumber fails to follow these principles, they are permanently removed from the platform</li>
                  
                   
                
                   
                </ul>
                
                
                
              

                <h3>Our Promise to You</h3>
                <p>ServiceLinksGTA connects you only with verified, insured, and dependable local plumbing professionals with transparency, protection, and accountability built into every job.</p>
                <p>Your trust is the foundation of our service, and we stand behind every booking made through our platform.</p>

               

              

            </div>
        </div>

    </div>
@endsection

