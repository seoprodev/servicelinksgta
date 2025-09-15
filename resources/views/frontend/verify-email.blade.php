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
                    <h2 class="breadcrumb-title mb-2">Email Verification</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active" aria-current="page">Email Verification</li>
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



    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-3">Verify Your Account</h3>
                        <p class="text-center text-muted">
                            We’ve sent a verification code to your email: <strong>{{ $email }}</strong>
                        </p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('verify.email.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="mb-3">
                                <label for="code" class="form-label">Enter Verification Code</label>
                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" placeholder="6-digit code" maxlength="6" required>
                                @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Verify</button>
                        </form>

                        <div class="text-center mt-3">
                            <p class="mb-0">Didn’t receive the code?
                                <a href="{{ route('resend.code', ['token' => Crypt::encryptString($email)]) }}" class="text-decoration-underline">Resend</a>
                            </p>
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
