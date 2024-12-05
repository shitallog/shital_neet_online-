
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
<style>
        embed {
            width: 100%;
            height: 800px;
            border: none;
        }
    </style>
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
                        <a href="{{ route('login') }}" class="btn btn-main btn-small"><i class="fa fa-sign-in-alt mr-2"></i>Login</a>
                        <a href="{{ route('register') }}" class="btn btn-main btn-small"><i class="fas fa-user-plus mr-2"></i>Registration</a>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="site-navigation main_menu" id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand">
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
</header>
        

 <!--search overlay start-->
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
            <h1>Class XI Solution</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
              Class XI Solution
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>


<section class="page-wrapper edutim-course-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="course-single-header">
    <div class="rating">
        <a href="#"><i class="fa fa-star"></i></a>
        <a href="#"><i class="fa fa-star"></i></a>
        <a href="#"><i class="fa fa-star"></i></a>
        <a href="#"><i class="fa fa-star"></i></a>
        <a href="#"><i class="fa fa-star"></i></a>
        <span>Medium English</span>
    </div>

    <h3 class="single-course-title">Target NEET 2025 </h3> 
    <h4>Course duration - 1 year</h4>
    <p>Our mission is to support medical aspirants in realizing their dreams of gaining admission to top medical institutes in India. We achieve this through exceptional teaching and technology-enabled systems. 
Monarch Institute offers comprehensive coaching services for medical entrance examinations, NEET.
</p>  
    
<div class="course-single-thumb">
      
      <div class="course-price-wrapper">
          <!-- <div class="course-price ml-3"><h4>Test Schedule & Syllabus</h4></div> -->
          <embed src="{{ asset('frontend/assets/pdf/Monarch Class 11th Key and Solutions.pdf') }}" type="application/pdf">
          </div>
  </div>
</div>

                <!--  Course Topics -->

<!--  COurse Topics End -->

      
            </div>

            <!-- <div class="col-lg-4">
                <div class="course-sidebar">
    <div class="course-single-thumb">
    <div class="course-widget single-info">
        <i class="bi bi-group"></i>
        Monarch Institute</span> 
    </div>
        <div class="course-price-wrapper">
            <div class="course-price ml-3"><h4>Test Schedule & Syllabus</span></h4></div>
            <div class="buy-btn"><a href="#" class="btn btn-main btn-block">Download</a></div>
        </div>
    </div>


   

    



    
    
</div>
            </div> -->
        </div>
    </div>
</section>





<a href="https://api.whatsapp.com/send?phone=9136431685&amp;text=%20Hi" class="float" target="_blank" style="position: fixed; bottom: 85px; left: 40px; width: 60px; height: 60px; border-radius: 50%; background-color: #25d366; display: flex; justify-content: center; align-items: center;z-index:1;">
    <i class="fab fa-whatsapp" style="font-size: 32px; color: #fff;"></i>
  </a>

  <a href="{{ route('register') }}" class="float" target="_blank" style="position: fixed; bottom: 85px; left: 135px; width: 120px; height: 60px; border-radius: 70%; Color:white; background-color:#8000d5; display: flex; justify-content: center; align-items: center;z-index:1;">
    <i class="fa fa-registered" style="font-size: 32px; color: #fff;"></i>egistration
  </a>
<section class="footer pt-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">About Us</h5>
					<p class="mt-3">Monarch Institute</p>
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
					<h5 class="widget-title">Information</h5>
				
					<ul class="list-unstyled">
						
                        <li><a class="text-white" href="{{ route('frontend.Refund') }}">Return and Refund Policy</a></li>
                        <li><a class="text-white" href="{{ route('frontend.Checkout') }}">	Privacy Policy</a></li>
						<li><a  class="text-white" href="{{ route('frontend.terms_and_condition') }}">Terms & Conditions</a>
							
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
						<li><a href="{{ route('register') }}">Admission Process (Online)
                  
                        <li><a href="{{ route('register') }}">   Download Admission Form</a></li>
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
        <div class="row justify-content-between align-items-center">
    <div class="col-lg-6">
        <div class="copyright">
            <p>&copy; Copyright reserved to Monarch.</p>
        </div>
    </div>
    <div class="col-lg-6 text-lg-right">
        <div class="design-by">
            <p>Design By <a href="#">Technobizzar</a></p>
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
   