<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monarch Institute</title>
    <meta name="description" content="Monarch Institute - Offering quality education through coaching, distant learning, health coaching, and online courses.">
    <link href="{{ asset('online_exam/css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('online_exam/js/jquery.js') }}"></script>
    <script src="{{ asset('online_exam/js/main.js') }}"></script>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .headeroption, .footeroption {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 10px;
        }
        .maincontent {
            background-color: #fff;
            padding: 20px;
            min-height: 500px;
        }
        .menu {
            background-color: #34495e;
            padding: 10px;
            margin-bottom: 20px;
        }
        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
        }
        .menu ul li {
            margin-right: 15px;
        }
        .menu ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .menu ul li a:hover {
            background-color: #1abc9c;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .main {
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 8px;
        }
        .icon {
            padding-left: 483px;
            text-align: center;
            font-size: 126px;
            color: green;
        }
        .message {
            color: green;
            margin-top: 20px;
            font-size: 34px;
        }
        .alert {
            padding: 15px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .footeroption h2 {
            color: white;
        }
        /* Add your media queries here */
    </style>
</head>
<body>

<div class="phpcoding">
    <header class="headeroption"></header>
    <main class="maincontent">
        <nav class="menu">
            <ul>
                <li><a href="{{ route('exam.index') }}">Exam</a></li>
                <li><a href="{{ route('exam.profile') }}">Profile</a></li>
                <li><a href="{{ route('exam.Qution_paper') }}">Question Paper</a></li>
                <li><a href="{{ route('exam.solution_paper') }}">Solution Paper</a></li>
                <!-- <li><a href="{{ route('logout') }}">Logout</a></li> -->
            </ul>
        </nav>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
           <h1>     <strong>Success!</strong> {{ session('success') }}</h1>
                
            </div>
        @endif

        <div class="main">
            <div class="container">
                <i class="fa fa-smile-o icon"></i>
                <p class="message">Congratulations! You have just completed the Test ( Neet Exam 2025 ) .</p>
            </div>
        </div>
    </main>
    <footer class="footeroption">
        <h2>NEET (UG)-2025</h2>
    </footer>
    </div>
</body>
</html>
