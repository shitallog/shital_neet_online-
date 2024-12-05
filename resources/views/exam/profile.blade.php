<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Monarch Institute</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Monarch Institute - Offering quality education through coaching, distant learning, health coaching, and online courses.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
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
          <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('online_exam/css/student-dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    padding: 10px;
 

    background-color: #ecf0f1;
    border-radius: 8px;
}

.segment {
    margin-top: 30px;
    background-color: green;
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
</style>
    
</head>

<body>

<div class="phpcoding">
    <section class="headeroption"></section>
    <section class="maincontent">
        <div class="menu">
            <ul>
            <li><a href="{{ route('exam.index') }}">Exam</a></li>
                <li><a href="{{ route('exam.profile') }}">Profile</a></li>
                <li><a href="{{ route('exam.Qution_paper') }}">Question Paper</a></li>
                <li><a href="{{ route('exam.solution_paper') }}">Solution paper</a></li>

                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
           
        </div>
        <div class="main text-center">
        <!-- <h1>WELCOME TO NEET 2025 EXAM </h1> -->
        <div class="container">
  <div class="row">
    <!-- Empty column for spacing -->
    <div class="col-lg-2"></div>

    <!-- Main content column -->
    <div class="col-lg-8">
      <div class="card shadow-sm border-light rounded-lg">
        
        <!-- Card header with image -->
        <div class="card-header btn-success text-white text-center rounded-top">
          <img id="myImage" src="{{ asset('online_exam/images/single-img-02.jpg') }}" alt="Old Image" width="300">
        </div>

        <!-- Success message display -->
        @if(session('success'))
          <div class="alert alert-success text-center">
            {{ session('success') }}
          </div>
        @endif

        <!-- Student details -->
        <p class="mb-2">
          <strong class="pr-1 text-primary">Student Name:</strong>     {{ auth()->user()->name }}

        </p>
        
        <p class="mb-2">
          <strong class="pr-1 text-primary">Email:</strong>   {{ auth()->user()->email }}
        </p>

        <!-- Edit Profile Button -->
        <button class="btn btn-success mt-2 text-center" data-toggle="modal" data-target="#editProfileModal">
          Edit Profile
        </button>

      </div>
    </div>
  </div>
    <!-- Empty column for spacing -->
   
  </div>
</div>


 </div>
  
        <br>
        <section class="footeroption">
            <h2 style="color: white;">NEET (UG)-2025 </h2>
        </section>
      </div>
   
        </section>
    </div>
   




<script>
    document.getElementById('profile-picture').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('profile-img-preview').src = e.target.result;
        }
        reader.readAsDataURL(file);
      }
    });
  </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
