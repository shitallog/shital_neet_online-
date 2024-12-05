<!DOCTYPE html>
<html>
<head>
    <title>{{ $email->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            color: #333333;
            line-height: 1.6;
        }
        .content img {
            display: block;
            margin: 20px auto;
            border-radius: 8px;
        }
        .dates {
            background-color: #f7f7f7;
            padding: 10px;
            margin: 20px 0;
            border-left: 4px solid #007bff;
        }
        .dates p {
            margin: 5px 0;
            font-size: 14px;
            color: #555555;
        }
        .footer {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            border-top: 1px solid #e0e0e0;
        }
        .footer a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $email->title }}</h1>
        </div>
        <div class="content">
            <p>{{ $email->details }}</p>
            @if($email->photo)
                <img src="{{ asset('storage/Email/' . $email->photo) }}" alt="{{ $email->title }}" width="100%">
            @endif
            <div class="dates">
                <p><strong>Start Date:</strong> {{ $email->start_date }}</p>
                <p><strong>End Date:</strong> {{ $email->end_date }}</p>
            </div>
            <p>Get ready for your NEET online entrance exam! Prepare well and give it your best shot.</p>
        </div>
        <div class="footer">
            <p>Need help? <a href="{{ url('/support') }}">Contact our support team</a></p>
            <p>&copy; 2024 NEET Online Entrance Exam</p>
        </div>
    </div>
</body>
</html>
