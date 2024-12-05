<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Monarch Institute</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Monarch Institute - Offering quality education through coaching, distant learning, health coaching, and online courses.">

    <meta content="admin, dashboard, template" name="keywords">
    <meta content="An admin dashboard template using Bootstrap" name="description">

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
    width: 100%;
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

    
           /* Basic table styling */
           .table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: 'Arial', sans-serif;
        }
        .table th, .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            text-align: left;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Table header */
        .table thead th {
            background-color: #2c3e50;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Action button */
        .btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }
        .btn i {
            margin-right: 5px;
        }
        .btn:hover {
            background-color: #2980b9;
        }

        /* Tooltip */
        .btn[title] {
            position: relative;
        }
        .btn[title]:hover::after {
            content: attr(title);
            position: absolute;
            top: -30px;
            left: 0;
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            z-index: 1;
        }
        .new-label {
    display: inline-block;
    background-color: #ff6f61; /* Bright red color */
    color: white;
    font-weight: bold;
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 20px; /* Rounded edges */
    text-transform: uppercase;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    position: relative;
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

.new-label::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 8px;
    height: 8px;
    background-color: white;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
}
    </style>
   
</head>

<body onload="initFullScreen()">

<div class="phpcoding">
    <section class="headeroption"></section>
    <section class="maincontent">
        <div class="menu">
            <ul>
            <li><a href="{{ route('exam.index') }}">Exam</a></li>
                <li><a href="{{ route('exam.profile') }}">Profile</a></li>
                <li><a href="{{ route('exam.Qution_paper') }}">Question Paper</a></li>
                <li><a href="{{ route('exam.solution_paper') }}">solution paper</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
            <span style="float:right;color:#fdfafb; font-family: 'Times New Roman', Georgia, serif;">
    Welcome 
    <strong>
    {{ auth()->user()->name }}
    </strong> to this Exam....
</span>

        </div>
        <div class="main">
  
        <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Sr. No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($files as $index => $file)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $file->name }}</td> 
                <td>
                    <a id="pdfViewer" 
                       href="{{ route('soluPdf', ['id' => $file->id]) }}#toolbar=0" 
                       class="btn btn-sm btn-primary" 
                       target="_blank" 
                       title="View PDF">
                        <i class="fas fa-eye"></i> View
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> 
        </div>
        <br><br>
        <section class="footeroption">
            <h2 style="color: white;">NEET (UG)-2025</h2>
        </section>
    </section>
</div>
<script>
    document.addEventListener('keydown', function (e) {
        // Disable Ctrl+P (print)
        if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
            e.preventDefault();
            alert('Printing is disabled for this document.');
        }
    });

    // Disable right-click context menu
    document.getElementById('pdfViewer').addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });
</script>
<script>
       function initFullScreen() {
            // Request full-screen mode
            const elem = document.documentElement;
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) { // Firefox
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { // IE/Edge
                elem.msRequestFullscreen();
            }
            // Disable right-click context menu
            document.addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });

            // Show overlay when the exam starts
            document.getElementById('overlay').style.display = 'flex';
        }

</script>

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
