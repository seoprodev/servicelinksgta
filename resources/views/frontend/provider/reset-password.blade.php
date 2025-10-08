@extends('frontend.provider.partials.master')

@section('title', 'Reset Password')
@section('provider-dashboard-content')
    <div class="col-xl-12 col-lg-12">
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">Reset Password</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('provider.dashboard') }}"><i class="ti ti-home-2"></i></a></li>
                                <li class="breadcrumb-item">Provider</li>
                                <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('provider.update.password') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        {{-- Current Password --}}
                        <div class="mb-3 position-relative">
                            <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control password-field" name="current_password" id="current_password" required>
                            <span class="password-toggle" onclick="togglePassword('current_password')">
                            <i class="fa fa-eye"></i>
                        </span>
                            @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- New Password --}}
                        <div class="mb-3 position-relative">
                            <label for="new_password" class="form-label">New Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control password-field" name="new_password" id="new_password" required>
                            <span class="password-toggle" onclick="togglePassword('new_password')">
                            <i class="fa fa-eye"></i>
                        </span>
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Confirm New Password --}}
                        <div class="mb-3 position-relative">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control password-field" name="new_password_confirmation" id="new_password_confirmation" required>
                            <span class="password-toggle" onclick="togglePassword('new_password_confirmation')">
                            <i class="fa fa-eye"></i>
                        </span>
                            @error('new_password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-dark w-100">Reset Password</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 38px;
            cursor: pointer;
            color: #6c757d;
            font-size: 1rem;
            user-select: none;
        }
        .position-relative { position: relative; }
    </style>
@endpush

@push('scripts')
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i');
            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
@endpush
