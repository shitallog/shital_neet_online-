
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Monarch Institute - Offering quality education through coaching, distant learning, health coaching, and online courses.">
    <meta name="author" content="themeturn.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Monarch Institute</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap/bootstrap.css') }}">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bicon/css/bicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/themify/themify-icons.css') }}">
    
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/animate-css/animate.css') }}">
    
    <!-- WooCommerce CSS (if applicable) -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/woocommerce/woocommerce-layouts.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/woocommerce/woocommerce-small-screen.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/woocommerce/woocommerce.css') }}">
    
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl/assets/owl.theme.default.min.css') }}">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
</head>
<body>
    <!-- Your body content will go here -->
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>



</head>

<body id="top-header">
 

<header>
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <ul class="header-contact">
                        <li>
                            <span>Call :</span>
                            {{ env('CONTACT_PHONE', '(+91) 9136431685') }}
                        </li>
                        <li>
                            <span>Email :</span>
                            {{ env('CONTACT_EMAIL', 'info@monarchinstitute.in') }}
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header-right float-right">
                        <div class="header-socials">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <a href="{{ route('student.login') }}" class="btn btn-main btn-small"><i class="fa fa-sign-in-alt mr-2"></i>Login</a>
                        <a href="{{ route('student.register') }}" class="btn btn-main btn-small"><i class="fas fa-user-plus mr-2"></i>Registration</a>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="site-navigation main_menu" id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('frontend/assets/images/monoarclogo.jpeg') }}" alt="Edutim" class="img-fluid" style="max-width:40%;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.index') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Online  Courses<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                <a class="dropdown-item" href="">CLASS XI</a>
                                <a class="dropdown-item" href="{{ route('frontend.class12th') }}">CLASS XII</a>
                                <a class="dropdown-item" href="{{ route('frontend.class12thpassed') }}">CLASS XII PASSED</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('frontend.freemocktest') }}" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Free Mock test   <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                <a class="dropdown-item" href="{{ route('frontend.classxifreemocktest') }}">Class XI Full Syllabus </a>
                                <a class="dropdown-item" href="{{ route('frontend.XISolution') }}">Class XI Solution  </a>
                                <a class="dropdown-item" href="{{ route('frontend.classfullsylabuspaper') }}">Class XII Full Syllabus Paper</a>

                                <a class="dropdown-item" href="{{ route('frontend.XIISolution') }}">Class XII Solution  </a>
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog<i class="fa fa-angle-down"></i>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ route('frontend.contact') }}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


        
<div class="search-wrap">
    <div class="overlay">
        <form action="" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="{{ asset('frontend/assets/images/close.png') }}" srcset="assets/images/close%402x.png 2x" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Student Registration</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
              Student Registration
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>


<main class="site-main page-wrapper woocommerce single single-product">
    <section class="space-3">
        <div class="container">
            <div class="row">
            <div class="col-md-2"></div>

                <!-- Right Side with Form -->
                <div class="col-md-8">
    <!-- Login Form (initially visible) -->
    <div id="login-form" class="form-container">
        <h1 class="font-weight-bold text-center mb-4">Student Registration</h1>
        <form action="{{ route('student.register') }}" class="woocommerce-form woocommerce-form-login login p-4 border rounded shadow-sm" method="POST">
    @csrf

    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

    <div class="form-group">
        <label for="name">Student Name:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-user"></i>
                </span>
            </div>
            <input type="text" id="name" name="name" class="form-control" placeholder="Student Name" required>
        </div>
        @error('name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>
        @error('email')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-calendar"></i>
                </span>
            </div>
            <input type="date" id="dob" name="dob" class="form-control" required>
        </div>
        @error('dob')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="gender">Gender:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-venus-mars"></i>
                </span>
            </div>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        @error('gender')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="category">Category:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-tags"></i>
                </span>
            </div>
            <select class="form-control" id="category" name="category" required>
                <option value="" selected>Select Category</option>
                <option value="general">General</option>
                <option value="obc">OBC</option>
                <option value="sc">SC</option>
                <option value="st">ST</option>
            </select>
        </div>
        @error('category')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>
    <div class="form-group">
        <label for="course">Course:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-book"></i>
                </span>
            </div>
            <select class="form-control" id="course" name="course" required>
                <option value="" selected>Select Course</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
                <option value="XII PASS">XII PASS</option>
            </select>
        </div>
        @error('course')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>
    <div class="form-group">
        <label for="father_name">Father's Name:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                <i class="fas fa-user-circle"></i>
                </span>
            </div>
            <input type="text" id="father_name" name="father_name" class="form-control" placeholder="Father's Name" required>
        </div>
        @error('father_name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="mother_name">Mother's Name:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                <i class="fas fa-user-circle"></i>
                </span>
            </div>
            <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Mother's Name" required>
        </div>
        @error('mother_name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-user-circle"></i>
                </span>
            </div>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
        </div>
        @error('username')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="reference">Reference :</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-user-friends"></i>
                </span>
            </div>
            <input type="text" id="reference" name="reference" class="form-control" placeholder="Reference (Optional)">
        </div>
        @error('reference')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="password">Password: (This is required for NEET Online Entrance Exam)</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        @error('password')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">Password Confirmation:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
        </div>
        @error('password_confirmation')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
    </div>

    <div class="form-group row align-items-center">
        <div class="col-auto">
            <input type="checkbox" id="showPassword" onclick="togglePassword()">
        </div>
        <div class="col-auto">
            <label for="showPassword" class="mb-0">Show Password</label>
        </div>
    </div>

    <button type="submit" class="btn btn-main btn-block">Sign Up</button>

    <br/>
    <p class="dont-have-account text-center">
        Don't have an account? <a href="{{ route('student.login') }}">Sign In</a>
    </p>
</form>

<script>
function togglePassword() {
    var passwordInput = document.getElementById("password");
    var passwordConfirmationInput = document.getElementById("password_confirmation");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordConfirmationInput.type = "text";
    } else {
        passwordInput.type = "password";
        passwordConfirmationInput.type = "password";
    }
}
</script>

        </div>

    
</div>
<div class="col-md-2"></div>

            </div>
        </div>
    </section>
</main>


    </div>
</div>


<script>
    document.getElementById('show-register').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
});

document.getElementById('show-login').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
});
var swiper = new Swiper('.swiper-container', {
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
});
  </script>

<!-- <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>
   -->
<script src="{{ asset('online_exam/js/script.js') }}"></script>


 


<a href="https://api.whatsapp.com/send?phone=9136431685&amp;text=%20super-skills" class="float" target="_blank" style="position: fixed; bottom: 85px; left: 40px; width: 60px; height: 60px; border-radius: 50%; background-color: #25d366; display: flex; justify-content: center; align-items: center;z-index:1;">
    <i class="fab fa-whatsapp" style="font-size: 32px; color: #fff;"></i>
  </a>

  <a href="{{ route('student.register') }}" class="float" target="_blank" style="position: fixed; bottom: 85px; left: 135px; width: 120px; height: 60px; border-radius: 70%; Color:white; background-color:#8000d5; display: flex; justify-content: center; align-items: center;z-index:1;">
    <i class="fa fa-registered" style="font-size: 32px; color: #fff;"></i>egistration
  </a>
<section class="footer pt-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">About Us</h5>
				
                    <!-- <h5 class="widget-title">Contact </h5> -->
                    <p>
                    Monarch Institute offers comprehensive coaching services for medical entrance examinations, NEET.

<br>
<i class="bi bi-headphone"></i>   Telephone: 	(+91) 9136431685
<br>
<i class="bi bi-envelop"></i>      Email: info@monarchinstitute.in</p>
					<ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"> <a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget footer-contact mb-5 mb-lg-0">
					<h5 class="widget-title">ABOUT US </h5>
				
					<ul class="list-unstyled">
						<li>
								About Monarch 
							
							
						</li>
						<li>Terms & Conditions
							
						</li>
                        <li>Why Monarch 
							
						</li>
						<!-- <li><i class="bi bi-location-pointer"></i>
							<div>
								<strong>Office Address</strong>
								Moon Street Light Avenue
							</div>
						</li> -->
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">ADMISSION</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="{{ route('student.register') }}">Admission Process (Online)
                  
                        <li><a href="{{ route('student.register') }}">   Download Admission Form</a></li>
<!-- <li><a href="#">Download Prospectus</a></li> -->
<!-- <li><a href="#">Aakash National Talent Hunt Exam (ANTHE)
</a></li> -->
						<!-- <li><a href="#">Student Support</a></li> -->
					
					
					
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">STUDENT AREA</h5>
					<ul class="list-unstyled footer-links">
                    <li><a href="#"> Answers & Solutions</a></li>
                    <li><a href="#">Dispatch / Test Schedule</a></li>
                    <!-- <li><a href="#">FAQs</a></li>
                    <li><a href="#">Grievances</a></li> -->
                    <li><a href="#">Award & Prize Scheme at Monarch </a></li>
                    <!-- <li><a href="#">NEET Challenger App</a></li> -->
						
					</ul>
				</div>
			</div>
			
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<!-- <div class="footer-logo">
						<img src="assets/images/logo.png" alt="Edutim" class="img-fluid" style="max-width:40%;">
					</div> -->
				</div>
				<div class="col-lg-6">
					<div class="copyright text-lg-center">
						<p>@ Copyright reserved to Edutim.Proudly Crafted by <a href="#">Monarch</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>



    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="{{ asset('frontend/assets/vendors/jquery/jquery.js') }}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('frontend/assets/vendors/bootstrap/bootstrap.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('frontend/assets/vendors/counterup/waypoint.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery.isotope.js ') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/imagesloaded.js') }}"></script>
    <!--  Owlk Carousel-->
    <script src="{{ asset('frontend/assets/vendors/owl/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>



  </body>
  </html>
   
