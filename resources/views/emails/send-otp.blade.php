<!DOCTYPE html>
<html>
<head>
    <title>Password Reset OTP</title>
</head>
<body>
<h2>Hello {{ $user->first_name ?? $user->name }},</h2>
<p>You requested to reset your password.</p>
<p>Your OTP is:</p>
<h1 style="letter-spacing: 5px; color:#2c3e50;">{{ $otp }}</h1>
<p>This OTP will expire in 15 minutes.</p>
<p>If you didn’t request this, you can ignore this email.</p>
<br>
<p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>
