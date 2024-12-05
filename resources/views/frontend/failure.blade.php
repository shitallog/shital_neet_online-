<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS file -->
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8d7da;
            font-family: Arial, sans-serif;
        }
        .failure-container {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #f5c2c7;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .failure-container h1 {
            color: #842029;
        }
        .failure-container p {
            color: #6c757d;
        }
        .failure-container a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            color: #fff;
            background-color: #dc3545;
            text-decoration: none;
            border-radius: 5px;
        }
        .failure-container a:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="failure-container">
        <h1>Payment Failed</h1>
        <p>Unfortunately, your payment could not be processed. Please try again or contact support if the issue persists.</p>
      
    </div>
</body>
</html>
