<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Your Provider Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 20px;
            margin-bottom: 20px;
        }
        p {
            line-height: 1.6;
            font-size: 14px;
        }
        .code {
            display: block;
            font-size: 24px;
            font-weight: bold;
            color: #2d3748;
            margin: 20px 0;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 20px 0;
            font-size: 16px;
            color: #fff;
            background-color: #4F46E5;
            text-decoration: none;
            border-radius: 6px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>Hello {{ $user->name }},</h1>

    <p>Thank you for registering as a provider.</p>
    <p>Please use the verification code below to activate your account:</p>

    <span class="code">{{ $code }}</span>

    <p style="text-align: center;">
        <a href="{{ route('verify.email', ['token' => Crypt::encryptString($user->email)]) }}" class="btn">Verify Account</a>
    </p>

    <p>Thanks,<br>{{ config('app.name') }}</p>

    <div class="footer">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
</div>
</body>
</html>
