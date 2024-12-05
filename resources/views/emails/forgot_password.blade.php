<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <p>Hello {{ $student->name }},</p>
    <p>We received a request to reset your password. Click the link below to reset it:</p>
    <p><a href="{{ $link }}">Reset Password</a></p>
    <p>If you did not request this, please ignore this email.</p>
</body>
</html>
