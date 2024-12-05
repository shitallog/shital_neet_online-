<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEET Examination Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #004d99;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            font-size: 20px;
            color: #333;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .content ul {
            list-style: none;
            padding: 0;
        }
        .content ul li {
            padding: 8px 0;
            font-size: 16px;
        }
        .footer {
            background-color: #f1f1f1;
            color: #666;
            text-align: center;
            padding: 10px;
            border-radius: 0 0 8px 8px;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            color: #fff;
            background-color: #004d99;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #003366;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>NEET Examination Registration Confirmation</h1>
        </div>
        <div class="content">
            <h2>Dear {{ $user->name }},</h2>
            <p>Thank you for registering for the NEET Online Examination. We have successfully received your registration and created your profile.</p>
            <p>Below are your registration details:</p>
            <ul>
              
                <li><strong>Name:</strong> {{ $user->name }}</li>
               
               <li><strong>Registration ID:</strong>Monarch 000{{ substr($user->id, 0, 4) }}</li>

               
            </ul>
            <p>We recommend that you keep this email for your records. You can log in to our portal to view your registration details or make any necessary updates.</p>
            <a href="{{ route('login') }}" class="btn " style="color:white;">Go to Login</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} NEET Examination Board. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
