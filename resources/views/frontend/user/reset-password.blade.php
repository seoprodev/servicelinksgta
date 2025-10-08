@extends('frontend.user.partials.master')

@push('styles')
@endpush

@section('title', 'Reset Password')

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-4">
                <h1>Reset Password</h1>
                <div class="col-md-12 mt-4">
                    <form method="POST" action="{{ route('user.update.password') }}">
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
