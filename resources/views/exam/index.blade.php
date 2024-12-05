<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Monarch Institute</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Monarch Institute - Offering quality education through coaching, distant learning, health coaching, and online courses.">

    
    <!-- Favicon -->    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('dashboard/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('online_exam/css/student-dashboard.css') }}" rel="stylesheet">

    <link href="{{ asset('online_exam/css/dashboard.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('online_exam/javascript/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('online_exam/javascript/main.js') }}"></script>

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

.menu span {
    margin-top: 10px;
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

.segment {
    margin-top: 30px;
    background-color:#3a7b3a;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
}

.segment h2 {
    color: white;
}

.segment ul {
    list-style: none;
    padding: 0;
}

.segment ul li {
    margin: 10px 0;
}

.segment ul li a {
    background-color: #f39c12;
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
}

.segment ul li a:hover {
    background-color: #d35400;
}

/* Responsive Styles */

/* Mobile Styles */
@media (max-width: 600px) {
    .menu ul {
        flex-direction: column;
        align-items: flex-start;
    }

    .menu ul li {
        margin-right: 0;
        margin-bottom: 10px;
    }

    .menu span {
        display: block;
        margin-top: 10px;
        font-size: 14px;
    }

    .main {
        padding: 10px;
    }

    .segment ul li a {
        padding: 8px 10px;
        font-size: 14px;
    }

    .footeroption h2 {
        font-size: 16px;
    }
}

/* Tablet Styles */
@media (min-width: 601px) and (max-width: 1024px) {
    .menu ul {
        flex-direction: row;
        justify-content: space-between;
    }

    .menu span {
        font-size: 16px;
    }

    .container {
        padding: 0 10px;
    }

    .main {
        padding: 20px;
    }

    .segment ul li a {
        padding: 10px 12px;
        font-size: 16px;
    }

    .footeroption h2 {
        font-size: 18px;
    }
}


.button4 {
  background-color: white;
  color: black;
  border: 2px solid #017047;
}

.button4:hover {
  background-color: #014b70;
  color: white;
}


/* Desktop Styles */
@media (min-width: 1025px) {
    .menu ul {
        justify-content: flex-start;
    }

    .menu span {
        font-size: 18px;
    }

    .container {
        padding: 0;
    }

    .main {
        padding: 25px;
    }

    .segment ul li a {
        padding: 12px 15px;
        font-size: 18px;
    }

    .footeroption h2 {
        font-size: 20px;
    }
}
.course-item {
    margin-bottom: 20px;
    width: 300px; /* Ensures image size is consistent */
}

.course-block {
    background-color: #f9f9f9; /* Light background for a modern look */
    transition: transform 0.2s; /* Add a subtle hover effect */
}

.course-block:hover {
    transform: translateY(-5px); /* Lifts the block slightly on hover */
}

.course-img img {
    width: 400px; /* Ensures image size is consistent */
    height: 350px;
    border-radius: 8px; /* Slightly round the corners of the image */
}

.button {
    background-color: #007bff; /* Button color */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #0056b3; /* Darker blue on hover */
    color: white;
}

.text-center {
    text-align: center;
}

        </style>
</head>

<body>
<div class="phpcoding">
    <!-- Header Section -->
    <section class="headeroption"></section>
    
    <!-- Main Content Section -->
    <section class="maincontent">
        
        <!-- Navigation Menu -->
        <div class="menu">
            <ul>
                <li><a href="{{ route('exam.index') }}">Exam</a></li>
                <li><a href="{{ route('exam.profile') }}">Profile</a></li>
                <li><a href="{{ route('exam.Qution_paper') }}">Question Paper</a></li>
                <li><a href="{{ route('exam.solution_paper') }}">Solution Paper</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
            <!-- Welcome message floated to the right -->
            <span style="float:right;color:#fdfafb; font-family: 'Times New Roman', Georgia, serif;">
                Welcome 
                <strong> {{ auth()->user()->name }}</strong> to this Exam....
            </span>
        </div>
        
        <!-- Container for Main Content -->
        <div class="container">
        <h1 class="text-center">Monarch Institute NEET (UG)-2025</h1>

            <div class="main">
               
                <!-- Notification Section -->
                @if($activeNotification = \App\Models\Notification::where('status', 1)->orderBy('date', 'desc')->first())
                    <marquee behavior="scroll" direction="left">
                        <p class="font-weight-bold text-warning">
                            <span class="new-label">New</span>
                            {{ $activeNotification->title }} - {{ $activeNotification->pdf }} - {{ $activeNotification->date }} 
                            <span class="text-info">{{ $activeNotification->notice }}</span>
                        </p>
                    </marquee>
                @endif

                <div class="segment py-5">
    <h2 class="text-center mb-5" style="color: #343a40;">Start Test From Here</h2>

    <div class="row justify-content-center">
        @foreach($package as $pkg) <!-- Iterate over packages -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-lg" style="background-color: #2344ba; border-radius: 10px;">
                <div class="card-body">
                    <h4 class="card-title" style="color: #ffffff;">{{ $pkg->name }}</h4>
                  
                    <p style="color: white;" class="font-weight-bold">Price: 
                        {{ $pkg->payment_type == 'free' ? 'Free' : '₹' . number_format($pkg->amount, 2) }}
                    </p>
                    
                    
                  
                   
                    
                   <!-- Paid Exam Button -->
@if(!$user->is_paid) <!-- Assuming $user contains the logged-in user's details -->
    <form action="{{ route('subscription.checkout') }}" method="POST">
        @csrf
        <button class="btn btn-lg btn-primary" type="submit">Subscribe </button>
    </form>
@else
    <a href="{{ route('exam.starttest') }}" class="btn btn-lg btn-success">Go to Dashboard</a>
@endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

          

     
</div>
 </div> <!-- End of segment -->


                
      
        </div>

        <br> 
</div>
        <!-- Footer Section -->
        <section class="footeroption">
            <h2 style="color: white;">NEET (UG)-2025</h2>
        </section>
    </section>
</div>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('dashboard/lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('dashboard/js/main.js') }}"></script>
</body>

</html>
