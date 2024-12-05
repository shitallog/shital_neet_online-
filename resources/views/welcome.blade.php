
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Uniaro - Academics and Education Html Template" />
<meta name="author" content="https://www.themetechmount.com/" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Uniaro - Academics and Education </title>

<link rel="shortcut icon" href="{{ asset('online_exam/images/favicon.png') }}" />
 
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/animate.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/fontello.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/flaticon.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/font-awesome.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/themify-icons.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/prettyPhoto.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/shortcodes.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/megamenu.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/responsive.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/style.css') }}"/>

</head>


<body>

    <!--page start-->
    <div class="page">
       
        <!-- preloader start -->
       

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            <!-- top_bar -->
            <div class="top_bar ttm-textcolor-white clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-row align-items-center">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><i class="fa fa-envelope-o"></i></div><a href="mailto:info.uniaro@support.com">info.uniaro@support.com</a>
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><i class="fa fa-map-marker"></i></div>207 South Chestnut Lane Staten Island.
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-row align-items-center">
                            <div class="top_bar_contact_item ml-auto">
                                <div class="top_bar_social d-flex align-items-center">
                                    <span class="mr-2">Follow Us :</span>
                                    <ul class="social-icons">
                                        <li><a href="#" rel="noopener" aria-label="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" rel="noopener" aria-label="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" rel="noopener" aria-label="flickr"><i class="fa fa-flickr"></i></a></li>
                                        <li><a href="#" rel="noopener" aria-label="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="top_bar_contact_item">
    <a id="loginBtn" class="login_btn ttm-btn ttm-btn-style-fill" href="#">Login<i class="flaticon-right-arrow-1"></i></a>
    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <span class="close-btn text-danger">&times;</span>
           
            <div class="tab-switcher">
                <h3 class="text-danger">Student Login</h3>
            </div>
            <form id="candidateForm" class="text-center" method="POST" action="">
            @csrf
            <div class="input-group">
                <label for="candidate-username">Username (Registration Number)</label>
                <input type="text" id="candidate-username" name="candidate-username" required>
            </div>
            <div class="input-group">
                <label for="candidate-password">Password</label>
                <input type="password" id="candidate-password" name="candidate-password" required>
            </div>
            <button class="btn btn-outline-danger btn-lg w-60" type="submit" style="font-size: 15px;">Login</button>
            <div class="form-footer">
                <p><a href="#" id="forgotPasswordBtn">Forgot Password?</a></p>
            </div>
            <div class="form-footer" style="margin-top: -48px;">
                <p>New User? <a href="#" id="registerNowBtn">Register Now</a></p>
            </div>
        </form>
        </div>
    </div>

    <!-- Registration Popup -->
    <div id="registrationPopup" class="popup">
        <div class="popup-content">
            <span class="close-btn text-danger">&times;</span>
            <h4 class="text-danger">Student Registration</h4>
            <form id="registrationForm" method="POST" action="">
            @csrf
                <div class="input-group">
                    <label for="candidate-name">Student Name:</label>
                    <input type="text" id="candidate-name" name="name" required>
                </div>

                <div class="input-group">
                    <label for="candidate-name">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div> 

                 <div class="input-group">
                    <label for="dob">Date of Birth:</label>
                    <input style="height: 50px;" type="date" id="dob" name="dob" required>
                </div>

                <div class="input-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="father-name">Father's Name:</label>
                    <input type="text" id="father-name" name="father_name" required>
                </div>

                <div class="input-group">
                    <label for="mother-name">Mother's Name:</label>
                    <input type="text" id="mother-name" name="mother-name" required>
                </div>

                <div class="input-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="" disabled selected>Select Category</option>
                        <option value="general">General</option>
                        <option value="obc">OBC</option>
                        <option value="sc">SC</option>
                        <option value="st">ST</option>
                    </select>
                </div>

                <button class="btn btn-outline-danger btn-lg w-40" style="font-size: 15px;" type="submit">Register</button>
                <div class="form-footer">
                    <p>Already have an account? <a href="#" id="loginNowBtn">Login</a></p>
                </div>
                
            </form>
        </div>
    </div>
<!-- Forgot Password Popup -->
<div id="forgotPasswordPopup" class="popup">
    <div class="popup-content">
        <span class="close-btn text-danger">&times;</span>
        <h2>Forgot Password</h2>
       <form id="forgotPasswordForm" method="POST" action="">
            @csrf
            <div class="input-group">
                <label for="forgot-email">Email Address:</label>
                <input style="height: 35px;" type="email" id="forgot-email" name="forgot-email" required>
            </div>
            <button class="btn btn-outline-danger btn-lg w-60" type="submit" style="font-size: 15px;">Send Reset Link</button>
            <div class="form-footer">
                <p>Remembered your password? <a href="#" id="loginNowFromForgot">Login</a></p>
            </div>
        </form>
    </div>
</div>

</div>
  </div>
                    </div>
                </div>
            </div><!-- top_bar end-->
            <!-- site-header-menu -->
            <div id="site-header-menu"  style="overflow: hidden"  class="site-header-menu ttm-textcolor-dark">
                <div class="site-header-menu-inner ttm-stickable-header" style="overflow: hidden">
                    <div class="container">
                        <div class="ttm-bg ttm-col-bgcolor-yes ttm-right-span ttm-bgcolor-white z-index-2">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <!--site-navigation -->
                                <div class="site-navigation d-flex flex-row">
                                    <!-- site-branding -->
                                    <div class="site-branding">
                                        <a class="home-link" href="index-2.html" title="Uniaro" rel="home">
                                        <img id="logo-img" class="img-fluid auto_size" alt="image" width="136" height="45" src="{{ asset('online_exam/images/logo-img.svg') }}">

                                        </a>
                                    </div><!-- site-branding end -->
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box">
                                            <span class="menubar-inner"></span>
                                        </span>
                                    </div>
                                    <!-- menu -->
                                    <nav class="main-menu menu-mobile" id="menu">
                                        <ul class="menu">
                                            <li class="mega-menu-item active">
                                                <a href="index-2.html">Home</a>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="" class="mega-menu-link">Courses</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="courses.html">Courses</a></li>
                                                    <li><a href="courses-single.html">Course Single View</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-link">Pages</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="about-us-2.html">About Us 2</a></li>
                                                    <li><a href="our-team.html">Team</a></li>
                                                    <li><a href="team-details.html">Team Details</a></li>
                                                    <li><a href="faq.html">Faq</a></li>
                                                    <li><a href="error.html">Error Page</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="gallery.html">Gallery</a>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-link">Blog</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="blog.html">Blog Classic</a></li>
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-single.html">Blog Single View</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-link">Contact Us</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="contact-us-1.html">Contact Us 1</a></li>
                                                    <li><a href="contact-us-2.html">Contact Us 2</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="header_extra d-flex flex-row align-items-center justify-content-end ml-auto">
                                        <div class="header_search">
                                            <a href="#" class="btn-default search_btn" rel="noopener" aria-label="search"><i class="fa fa-search"></i></a>
                                            <div class="header_search_content">
                                                <form id="searchbox" method="get" action="#">
                                                    <input class="search_query" type="text" id="search_query_top" name="s" placeholder="Enter Keyword" value="">
                                                    <button type="submit" class="btn close-search" aria-label="Right Align"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="header_btn">
                                            <a class="ttm-btn ttm-btn-style-fill ttm-icon-btn-right ttm-btn-size-md ttm-btn-color-skincolor" href="contact-us-1.html">Get Course<i class="flaticon-right-arrow-1"></i></a>
                                        </div>
                                    </div>
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- site-header-menu end-->
        </header><!--header end-->

<!-- Banner -->
<div class="banner_slider">
    <div class="slide">
    <div class="slide_img" style="background-image: url({{ asset('online_exam/images/slides/slider-mainbg-001.png') }});"></div>

        <div class="slide__content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8">
                        <div class="slide__content--headings d-flex ttm-textcolor-white">
                            <div class="pt-30 pb-10">
                                <h2 data-animation="fadeInDown">Education is</h2>
                                <h2 data-animation="fadeInDown">the light of life</h2>
                                <p data-animation="fadeInDown" class="pr-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div data-animation="fadeInUp" data-delay="1.4">
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor ttm-icon-btn-right ttm_prettyphoto" href="https://youtu.be/7e90gBu4pas" target="_self">watch the video<i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slide">
        <div class="slide_img" style="background-image: url({{ asset('online_exam/images/slides/slider-mainbg-002.png') }});"></div>
        <div class="slide__content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8">
                        <div class="slide__content--headings d-flex ttm-textcolor-white">
                            <div class="pt-30 pb-10">
                                <h2 data-animation="fadeInDown">Educate!</h2>
                                <h2 data-animation="fadeInDown">smart is great.</h2>
                                <p data-animation="fadeInDown">*Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                <div class="d-sm-flex margin_top30 align-items-center res-767-margin_top25" data-animation="fadeInUp" data-delay="1.4">
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-white ttm-icon-btn-right mr-30" href="{{ url('about-us.html') }}">more detail<i class="flaticon-right-arrow-1"></i></a>
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor ttm-icon-btn-right margin_right15" href="{{ url('about-us-2-3.html') }}">about us<i class="flaticon-right-arrow-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end-->

    
        <!--site-main start-->
        <div class="site-main">


            <!--padding_zero-section-->
            <section class="ttm-row padding_zero-section clearfix">
                <div class="container">
                    <!-- slick_slider -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row mt_145 mb_15 res-1199-mt-35 slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "autoplay":false, "dots":false, "infinite":true, "responsive":[{"breakpoint":1100,"settings":{"slidesToShow": 2}},{"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                                <div class="col-lg-4 col-md-6 col-sm-10 m-auto">
                                    <!-- featured-imagebox-course -->
                                    <div class="featured-imagebox featured-imagebox-course_highlight">
                                        <div class="featured-thumbnail"> 
                                        <img class="img-fluid" src="{{ asset('online_exam/images/course/course-one-740x560.jpg') }}" alt="image">
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3><a href="courses-single.html">Get Support Funding</a></h3>
                                            </div>
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-square ttm-icon_element-color-darkgrey ttm-icon_element-size-sm">
                                                    <i class="flaticon-knowledge"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- featured-imagebox-course end-->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-10 m-auto">
                                    <!-- featured-imagebox-course -->
                                    <div class="featured-imagebox featured-imagebox-course_highlight">
                                        <div class="featured-thumbnail"> 
                                        <img class="img-fluid" src="{{ asset('online_exam/images/course/course-two-740x560.jpg') }}" alt="image">

                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3><a href="courses-single.html">Student Orientation</a></h3>
                                            </div>
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-square ttm-icon_element-color-darkgrey ttm-icon_element-size-sm">
                                                    <i class="flaticon-classroom"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- featured-imagebox-course end-->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-10 m-auto">
                                    <!-- featured-imagebox-course -->
                                    <div class="featured-imagebox featured-imagebox-course_highlight">
                                        <div class="featured-thumbnail"> 
                                        <img class="img-fluid" src="{{ asset('online_exam/images/course/course-three-740x560.jpg') }}" alt="image">

                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3><a href="courses-single.html">Career Opportunities</a></h3>
                                            </div>
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-square ttm-icon_element-color-darkgrey ttm-icon_element-size-sm">
                                                    <i class="flaticon-test"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- featured-imagebox-course end-->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-10 m-auto">
                                    <!-- featured-imagebox-course -->
                                    <div class="featured-imagebox featured-imagebox-course_highlight">
                                        <div class="featured-thumbnail"> 
                                        <img class="img-fluid" src="{{ asset('online_exam/images/course/course-two-740x560.jpg') }}" alt="image">

                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3><a href="courses-single.html">Student Orientation</a></h3>
                                            </div>
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-square ttm-icon_element-color-darkgrey ttm-icon_element-size-sm">
                                                    <i class="flaticon-college-graduation"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- featured-imagebox-course end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--padding_zero-section end-->


            <section class="ttm-row introduction-section clearfix">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-5 col-md-7 col-sm-9 mx-auto">
                            <!-- ttm_single_image-wrapper -->
                            <div class="ttm_single_image-wrapper d-inline-block pl-40 res-991-ml-15 res-991-mr-15">
                            <img class="img-fluid" src="{{ asset('online_exam/images/single-img-01.png') }}" alt="image">
                            <div class="d-flex justify-content-start mt_75 ml_40">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-without-icon ttm-bgcolor-white style1">
                                        <div class="ttm-fid-contents">
                                            <h2 class="ttm-fid-inner">
                                                <span   data-appear-animation="animateDigits" 
                                                        data-from="0" 
                                                        data-to="25" 
                                                        data-interval="2" 
                                                        data-before="" 
                                                        data-before-style="sup" 
                                                        data-after="" 
                                                        data-after-style="sub" 
                                                        class="numinate">
                                                    25
                                                </span><span>+</span>
                                            </h2>
                                            <h3 class="ttm-fid-title">Years Of Experience <br>We Just Achived</h3>
                                        </div>
                                    </div><!-- ttm-fid end -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="pt-45 res-991-pt-30 pl-40 res-991-pl-0">
                                <!-- section title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        <h3>about modern</h3>
                                        <h2 class="title">Educated Citizens Bring Development In The Country</h2>
                                    </div>
                                    <div class="title-desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum.</p></div>
                                </div><!-- section title end -->
                                <div class="d-sm-flex align-items-center pt-10">
                                    <div class="w-100 pr-50">
                                        <!--featured-icon-box-->
                                        <div class="featured-icon-box icon-align-before-title">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-square ttm-icon_element-color-grey ttm-icon_element-size-xs">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="featured-title">
                                                <h3 class="fs-16 font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                            </div>
                                        </div><!-- featured-icon-box end-->
                                        <!--featured-icon-box-->
                                        <div class="featured-icon-box icon-align-before-title">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-square ttm-icon_element-color-grey ttm-icon_element-size-xs">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="featured-title">
                                                <h3 class="fs-16 font-weight-normal">Lorem ipsum dolor sit amet, consectetur</h3>
                                            </div>
                                        </div><!-- featured-icon-box end-->
                                        <!--featured-icon-box-->
                                        <div class="featured-icon-box icon-align-before-title mb-0">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-style-square ttm-icon_element-color-grey ttm-icon_element-size-xs">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="featured-title">
                                                <h3 class="fs-16 font-weight-normal">sed do eiusmod tempor incididunt ut labore et dolore</h3>
                                            </div>
                                        </div><!-- featured-icon-box end-->
                                    </div>
                                    <div class="d-inline-block ttm-bgcolor-skincolor p-20 text-center res-575-mt-30">
                                        <a href="https://youtu.be/7e90gBu4pas" target="_self" class="ttm_prettyphoto fs-24">
                                            <i class="fa fa-play"></i>
                                            <h2 class="fs-18 mb-0 mt-10 pt-10 border-top">Watch The Video</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>


            <!--services-section-->
            <section class="ttm-row services-section bg-img1 ttm-bgcolor-grey ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title -->
                            <div class="section-title style2">
                                <div class="title-header">
                                    <h3>Our Service</h3>
                                    <h2 class="title">Educated Citizens Bring</h2>
                                </div>
                                <div class="title-desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. <a href="#" class="ttm-btn ttm-btn-size-md ttm-btn-color-skincolor btn-inline">Read More!</a></p>
                                </div>
                            </div><!-- section-title end -->
                        </div>
                    </div><!-- row end -->
                    <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "autoplay":false, "dots":false, "infinite":true, "responsive":[{"breakpoint":992,"settings":{"slidesToShow": 3}},{"breakpoint":860,"settings":{"slidesToShow": 2}},{"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                        <div class="col-md-4">
                            <!-- featured-imagebox -->
                            <div class="featured-icon-box icon-align-top-content text-center style1">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-darkgrey ttm-icon_element-size-lg">
                                        <i class="flaticon-degree"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Global Certificate</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                    </div>
                                    <a class="ttm-btn ttm-btn-style-square ttm-btn-style-border ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-dark" href="courses.html">Read more<i class="flaticon-right-arrow-1"></i></a>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                        <div class="col-md-4">
                            <!-- featured-imagebox -->
                            <div class="featured-icon-box icon-align-top-content text-center style1">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-darkgrey ttm-icon_element-size-lg">
                                        <i class="flaticon-idea"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Alumni Support</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                    </div>
                                    <a class="ttm-btn ttm-btn-style-square ttm-btn-style-border ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-dark" href="about-us.html">Read more<i class="flaticon-right-arrow-1"></i></a>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                        <div class="col-md-4">
                            <!-- featured-imagebox -->
                            <div class="featured-icon-box icon-align-top-content text-center style1">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-darkgrey ttm-icon_element-size-lg">
                                        <i class="flaticon-book"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Books & Library</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                    </div>
                                    <a class="ttm-btn ttm-btn-style-square ttm-btn-style-border ttm-btn-size-md ttm-icon-btn-right ttm-btn-color-dark" href="gallery.html">Read more<i class="flaticon-right-arrow-1"></i></a>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-20 text-center">Don’t hesitate, contact us for better help and services. <a href="courses-single.html" class="ttm-btn ttm-btn-size-md ttm-btn-color-skincolor btn-inline"> More About Services!</a></div>
                        </div>
                    </div>
                </div>
            </section>
            <!--services-section end-->


            <!--fid-section-->
            <section class="ttm-row fid-section bg-img2 ttm-bgcolor-darkgrey ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <!-- row -->
                    <div class="row no-gutters ttm-vertical_sep res-991-mt_15 res-991-mb_15">
                        <div class="col-md-3 col-sm-6">
                            <!-- ttm-fid -->
                            <div class="ttm-fid inside ttm-fid-with-icon style2 text-center">
                                <div class="ttm-fid-icon-wrapper">
                                    <i class="flaticon-university-1"></i>
                                </div>
                                <div class="ttm-fid-contents">
                                    <h4 class="ttm-fid-inner">
                                        <span   data-appear-animation="animateDigits" 
                                                data-from="0" 
                                                data-to="15000" 
                                                data-interval="15" 
                                                data-before="" 
                                                data-before-style="sup" 
                                                data-after="" 
                                                data-after-style="sub" 
                                                class="numinate">15000
                                        </span>
                                        <sub>+</sub>
                                    </h4>
                                    <h3 class="ttm-fid-title">Satisfied Students</h3>
                                </div>
                            </div><!-- ttm-fid end -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- ttm-fid -->
                            <div class="ttm-fid inside ttm-fid-with-icon style2 text-center">
                                <div class="ttm-fid-icon-wrapper">
                                    <i class="flaticon-classroom"></i>
                                </div>
                                <div class="ttm-fid-contents">
                                    <h4 class="ttm-fid-inner">
                                        <span   data-appear-animation="animateDigits" 
                                                data-from="0" 
                                                data-to="800" 
                                                data-interval="15" 
                                                data-before="" 
                                                data-before-style="sup" 
                                                data-after="" 
                                                data-after-style="sub" 
                                                class="numinate">800
                                        </span>
                                        <sub>+</sub>
                                    </h4>
                                    <h3 class="ttm-fid-title">Qualified Teachers</h3>
                                </div>
                            </div><!-- ttm-fid end -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- ttm-fid -->
                            <div class="ttm-fid inside ttm-fid-with-icon style2 text-center">
                                <div class="ttm-fid-icon-wrapper">
                                    <i class="flaticon-diploma"></i>
                                </div>
                                <div class="ttm-fid-contents">
                                    <h4 class="ttm-fid-inner">
                                        <span   data-appear-animation="animateDigits" 
                                                data-from="0" 
                                                data-to="200" 
                                                data-interval="15" 
                                                data-before="" 
                                                data-before-style="sup" 
                                                data-after="" 
                                                data-after-style="sub" 
                                                class="numinate">200
                                        </span>
                                        <sub>+</sub>
                                    </h4>
                                    <h3 class="ttm-fid-title">Honor & Awards Win</h3>
                                </div>
                            </div><!-- ttm-fid end -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- ttm-fid -->
                            <div class="ttm-fid inside ttm-fid-with-icon style2 text-center">
                                <div class="ttm-fid-icon-wrapper">
                                    <i class="flaticon-checklist"></i>
                                </div>
                                <div class="ttm-fid-contents">
                                    <h4 class="ttm-fid-inner">
                                        <span   data-appear-animation="animateDigits" 
                                                data-from="0" 
                                                data-to="400" 
                                                data-interval="15" 
                                                data-before="" 
                                                data-before-style="sup" 
                                                data-after="" 
                                                data-after-style="sub" 
                                                class="numinate">400
                                        </span>
                                        <sub>+</sub>
                                    </h4>
                                    <h3 class="ttm-fid-title">Trending Courses</h3>
                                </div>
                            </div><!-- ttm-fid end -->
                        </div>
                    </div><!-- row end -->
                    <div class="pb-100 res-991-p-0"></div>
                </div>
            </section>
            <!--fid-section-->


            <!--padding_bottom_zero-section-->
            <section class="ttm-row padding_zero-section bg-layer bg-layer-equal-height clearfix">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row no-gutters">
                                <div class="col-lg-5">
                                    <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-grey ttm-bg ttm-col-bgimage-yes ttm-left-span spacing-1 h-auto z-index-2">
                                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                            <div class="ttm-col-wrapper-bg-layer-inner"></div>
                                        </div>
                                        <div class="layer-content">
                                            <!-- section title -->
                                            <div class="section-title style2">
                                                <div class="title-header">
                                                    <h3>you can clean</h3>
                                                    <h2 class="title">Popular Courses Categories</h2>
                                                </div>
                                            </div><!-- section title end -->
                                            <!-- slick_slider -->
                                            <div class="row slick_slider slick-arrows-style2" data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows":true, "autoplay":false, "centerMode":true, "centerPadding":0, "infinite":true, "initialSlide":2, "responsive": [{"breakpoint":1100,"settings":{"slidesToShow": 3}} , {"breakpoint":777,"settings":{"slidesToShow": 2}},
                                            {"breakpoint":590,"settings":{"slidesToShow": 1}}]}'>
                                                <div class="ttm-box-col-wrapper col-lg-4">
                                                    <!-- featured-imagebox-course -->
                                                    <div class="featured-imagebox featured-imagebox-course">
                                                        <div class="featured-thumbnail"> 
                                                            <img class="img-fluid" src="images/course/course-1.jpg" alt="image"> 
                                                        </div>
                                                        <div class="featured-content">
                                                            <div class="ttm-lp-price">$27.00</div>
                                                            <div class="ttm-lp-rating">
                                                                <div class="ttm-ratting-star">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <span>(1 rating)</span>
                                                                </div>
                                                            </div>
                                                            <div class="featured-title">
                                                                <h3><a href="courses-single.html">Complete Beginner to the Web Design</a></h3>
                                                            </div>
                                                            <div class="ttm-course-box-meta">
                                                                <div class="ttm-enrolled">
                                                                    <span class="ttm-lessons ttm-meta-line"><i class="fa fa-file-text-o" aria-hidden="true"></i>07 lessons</span>
                                                                    <span class="ttm-students ttm-meta-line"><i class="icon-user-outline"></i>43 Students</span>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div><!-- featured-imagebox-course end-->
                                                </div>
                                                <div class="ttm-box-col-wrapper col-lg-4">
                                                    <!-- featured-imagebox-course -->
                                                    <div class="featured-imagebox featured-imagebox-course">
                                                        <div class="featured-thumbnail"> 
                                                        <img class="img-fluid" src="{{ asset('online_exam/images/course/course-2.jpg') }}" alt="image">

                                                        </div>
                                                        <div class="featured-content">
                                                            <div class="ttm-lp-price">$27.00</div>
                                                            <div class="ttm-lp-rating">
                                                                <div class="ttm-ratting-star">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <span>(1 rating)</span>
                                                                </div>
                                                            </div>
                                                            <div class="featured-title">
                                                                <h3><a href="courses-single.html">Learn PHP Programming  From Scratch</a></h3>
                                                            </div>
                                                            <div class="ttm-course-box-meta">
                                                                <div class="ttm-enrolled">
                                                                    <span class="ttm-lessons ttm-meta-line"><i class="fa fa-file-text-o" aria-hidden="true"></i>07 lessons</span>
                                                                    <span class="ttm-students ttm-meta-line"><i class="icon-user-outline"></i>43 Students</span>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div><!-- featured-imagebox-course end-->
                                                </div>
                                                <div class="ttm-box-col-wrapper col-lg-4">
                                                    <!-- featured-imagebox-course -->
                                                    <div class="featured-imagebox featured-imagebox-course">
                                                        <div class="featured-thumbnail"> 
                                                        <img class="img-fluid" src="{{ asset('online_exam/images/course/course-3.jpg') }}" alt="image">

                                                        </div>
                                                        <div class="featured-content">
                                                            <div class="ttm-lp-price">$27.00</div>
                                                            <div class="ttm-lp-rating">
                                                                <div class="ttm-ratting-star">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <span>(1 rating)</span>
                                                                </div>
                                                            </div>
                                                            <div class="featured-content-post-inner">
                                                                <div class="featured-title">
                                                                    <h3><a href="courses-single.html">Full Data Analysis Course For Beginner</a></h3>
                                                                </div>
                                                            </div>
                                                            <div class="ttm-course-box-meta">
                                                                <div class="ttm-enrolled">
                                                                    <span class="ttm-lessons ttm-meta-line"><i class="fa fa-file-text-o" aria-hidden="true"></i>07 lessons</span>
                                                                    <span class="ttm-students ttm-meta-line"><i class="icon-user-outline"></i>43 Students</span>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div><!-- featured-imagebox-course end-->
                                                </div>
                                                <div class="ttm-box-col-wrapper col-lg-4">
                                                    <!-- featured-imagebox-course -->
                                                    <div class="featured-imagebox featured-imagebox-course">
                                                        <div class="featured-thumbnail"> 
                                                        <img class="img-fluid" src="{{ asset('online_exam/images/course/course-4.jpg') }}" alt="image">

                                                        </div>
                                                        <div class="featured-content">
                                                            <div class="ttm-lp-price">$27.00</div>
                                                            <div class="ttm-lp-rating">
                                                                <div class="ttm-ratting-star">
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star active"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <span>(1 rating)</span>
                                                                </div>
                                                            </div>
                                                            <div class="featured-title">
                                                                <h3><a href="courses-single.html">Masters Course in Adobe Photoshop</a></h3>
                                                            </div>
                                                            <div class="ttm-course-box-meta">
                                                                <div class="ttm-enrolled">
                                                                    <span class="ttm-lessons ttm-meta-line"><i class="fa fa-file-text-o" aria-hidden="true"></i>07 lessons</span>
                                                                    <span class="ttm-students ttm-meta-line"><i class="icon-user-outline"></i>43 Students</span>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div><!-- featured-imagebox-course end-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12">
                                    <!-- col-img-img-one -->
                                    <div class="ttm-bg ttm-col-bgimage-yes col-bg-img-one ttm-right-span mt_100 res-991-mt-0 ml_25 res-991-ml-0">
                                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                        <div class="layer-content">
                                        </div>
                                    </div><!-- col-img-bg-img-one end-->
                                    <img class="img-fluid ttm-equal-height-image w-100" src="{{ asset('online_exam/images/bg-image/col-bgimage-1.jpg') }}" alt="bg-image">

                                </div>
                            </div><!-- row end -->
                        </div>
                    </div>
                </div>
            </section>
            <!--padding_bottom_zero-section-->



            <!--testimonial-section-->
            <section class="ttm-row testimonial-section bg-img3 clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title -->
                            <div class="section-title style2">
                                <div class="title-header">
                                    <h3>why uniaro</h3>
                                    <h2 class="title">Word From Our Happy Students</h2>
                                </div>
                            </div><!-- section-title end -->
                        </div>
                    </div><!-- row end -->
                    <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "autoplay":false, "dots":false, "infinite":true, "responsive":[{"breakpoint":992,"settings":{"slidesToShow": 2}},{"breakpoint":840,"settings":{"slidesToShow": 1}}]}'>
                        <div class="col-lg-6">
                            <!-- testimonials -->
                            <div class="testimonials ttm-testimonial-box-view-style1"> 
                                <div class="testimonial-content">
                                    <div class="testimonial-content-inner">
                                        <div class="d-flex align-items-center">
                                            <div class="testimonial-avatar">
                                                <!-- testimonials-img -->
                                                <div class="testimonial-img">
                                                <img class="img-fluid" src="{{ asset('online_exam/images/testimonial/01.jpg') }}" alt="testimonial-img">

                                                </div><!-- testimonials-img end-->
                                            </div>
                                            <!-- testimonials-caption -->
                                            <div class="testimonial-caption">
                                                <div class="star-ratings">
                                                    <ul class="rating">
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star-half-o"></i></li>
                                                    </ul>
                                                </div>
                                                <h3>Raymon Myers</h3>
                                                <label>CEO at Themetechmount</label>
                                            </div>
                                        </div><!-- testimonials-caption end -->
                                    </div>
                                    <blockquote>On the other hand, we denounce with righteous indig- nation and dislike men who are so beguiled and de- moralized by the charms.</blockquote>
                                </div>
                            </div>
                            <!-- testimonials END -->
                        </div>
                        <div class="col-lg-6">
                            <!-- testimonials -->
                            <div class="testimonials ttm-testimonial-box-view-style1">
                                <div class="testimonial-content">
                                    <div class="testimonial-content-inner">
                                        <div class="d-flex align-items-center">
                                            <div class="testimonial-avatar">
                                                <!-- testimonials-img -->
                                                <div class="testimonial-img">
                                                <img class="img-fluid" src="{{ asset('online_exam/images/testimonial/02.jpg') }}" alt="testimonial-img">

                                                </div><!-- testimonials-img end-->
                                            </div>
                                            <!-- testimonials-caption -->
                                            <div class="testimonial-caption">
                                                <div class="star-ratings">
                                                    <ul class="rating">
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star-half-o"></i></li>
                                                    </ul>
                                                </div>
                                                <h3>Rayan Methew</h3>
                                                <label>Student at Uniaro</label>
                                            </div>
                                        </div><!-- testimonials-caption end-->
                                    </div>
                                    <blockquote>On the other hand, we denounce with righteous indig- nation and dislike men who are so beguiled and de- moralized by the charms.</blockquote>
                                </div>
                            </div>
                            <!-- testimonials END -->
                        </div>
                        <div class="col-lg-6">
                            <!-- testimonials -->
                            <div class="testimonials ttm-testimonial-box-view-style1">
                                <!-- testimonials-content -->
                                <div class="testimonial-content">
                                    <div class="testimonial-content-inner">
                                        <div class="d-flex align-items-center">
                                            <div class="testimonial-avatar">
                                                <!-- testimonials-img -->
                                                <div class="testimonial-img">
                                                <img class="img-fluid" src="{{ asset('online_exam/images/testimonial/03.jpg') }}" alt="testimonial-img">

                                                </div><!-- testimonials-img end-->
                                            </div>
                                            <!-- testimonials-caption -->
                                            <div class="testimonial-caption">
                                                <div class="star-ratings">
                                                    <ul class="rating">
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star-half-o"></i></li>
                                                    </ul>
                                                </div>
                                                <h3>khon Martin</h3>
                                                <label>CEO at Founder</label>
                                            </div>
                                        </div><!-- testimonials-caption end-->
                                    </div>
                                    <blockquote>On the other hand, we denounce with righteous indig- nation and dislike men who are so beguiled and de- moralized by the charms.</blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- testimonials -->
                            <div class="testimonials ttm-testimonial-box-view-style1">
                                <div class="testimonial-content">
                                    <div class="testimonial-content-inner">
                                        <div class="d-flex align-items-center">
                                            <div class="testimonial-avatar">
                                                <!-- testimonials-img -->
                                                <div class="testimonial-img">
                                                <img class="img-fluid" src="{{ asset('online_exam/images/testimonial/04.jpg') }}" alt="testimonial-img">

                                                </div><!-- testimonials-img end-->
                                            </div>
                                            <!-- testimonials-caption -->
                                            <div class="testimonial-caption">
                                                <div class="star-ratings">
                                                    <ul class="rating">
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star"></i></li>
                                                        <li class="active"><i class="fa fa-star-half-o"></i></li>
                                                    </ul>
                                                </div>
                                                <h3>Braylin Rose</h3>
                                                <label>Student at Uniaro</label>
                                            </div>
                                        </div><!-- testimonials-caption end-->
                                    </div>
                                    <blockquote>On the other hand, we denounce with righteous indig- nation and dislike men who are so beguiled and de- moralized by the charms.</blockquote>
                                </div>
                            </div>
                            <!-- testimonials END -->
                        </div>
                    </div>
                </div>
            </section>
            <!--testimonial-section end-->


            <!--cta-section-->
            <section class="ttm-row bg-img4 ttm-bgcolor-skincolor ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center mt_10">
                                <h2 class="fs-52">Become An Instructor?</h2>
                                <p class="fs-24 mb-35">Join thousands of instructors and earn money hassle-free!</p>
                                <a class="ttm-btn ttm-btn-style-border ttm-icon-btn-right ttm-btn-size-md ttm-btn-color-white" href="contact-us-1.html">Get Started Now<i class="flaticon-right-arrow-1"></i></a>
                            </div><!-- section-title end -->
                        </div>
                    </div>
                </div>
            </section>
            <!--cta-section end-->


        <!--blog-section-->
<section class="ttm-row blog-section clearfix">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- section title -->
                <div class="section-title style2">
                    <div class="title-header">
                        <h3>our blogs</h3>
                        <h2 class="title">Our Latest Articles</h2>
                    </div>
                    <div class="title-desc">
                        <p>A comprehensive summary of the day’s most trending blog posts & news articles from the best Education websites. <a href="{{ url('blog-grid.html') }}" class="ttm-btn ttm-btn-size-md ttm-btn-color-skincolor btn-inline">View more!</a></p>
                    </div>
                </div><!-- section title end -->
            </div>
        </div>
        <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 3"}} , {"breakpoint":900,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
            <div class="col-lg-4">
                <!-- featured-imagebox-post -->
                <div class="featured-imagebox featured-imagebox-post style1">
                    <div class="featured-thumbnail">
                        <img class="img-fluid" src="{{ asset('online_exam/images/blog/blog-01.jpg') }}" alt="">
                    </div>
                    <div class="featured-content">
                        <div class="post-header">
                            <div class="post-meta">
                                <span class="ttm-meta-line date"><i class="fa fa-clock-o"></i>07 Oct, 2020</span>
                                <span class="ttm-meta-line byline"><i class="icon-user-outline"></i>Sara Lisbon</span>
                                <span class="ttm-meta-line comments-link"><i class="icon-chat-alt"></i>07</span>
                            </div><!-- post-meta end -->
                        </div>
                        <div class="featured-title">
                            <h3><a href="{{ url('blog-single.html') }}">I Turned A Challenge Into A Positive Thing</a></h3>
                        </div>
                        <div class="featured-desc">
                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div><!-- featured-imagebox-post end -->
            </div>
            <div class="col-lg-4">
                <!-- featured-imagebox-post -->
                <div class="featured-imagebox featured-imagebox-post style1">
                    <div class="featured-thumbnail">
                        <img class="img-fluid" src="{{ asset('online_exam/images/blog/blog-02.jpg') }}" alt="">
                    </div>
                    <div class="featured-content">
                        <div class="post-header">
                            <div class="post-meta">
                                <span class="ttm-meta-line date"><i class="fa fa-clock-o"></i>07 Oct, 2020</span>
                                <span class="ttm-meta-line byline"><i class="icon-user-outline"></i>Sara Lisbon</span>
                                <span class="ttm-meta-line comments-link"><i class="icon-chat-alt"></i>07</span>
                            </div><!-- post-meta end -->
                        </div>
                        <div class="featured-title">
                            <h3><a href="{{ url('blog-single.html') }}">Choose The Right Place, At The Right Time</a></h3>
                        </div>
                        <div class="featured-desc">
                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div><!-- featured-imagebox-post end -->
            </div>
            <div class="col-lg-4">
                <!-- featured-imagebox-post -->
                <div class="featured-imagebox featured-imagebox-post style1">
                    <div class="featured-thumbnail">
                        <img class="img-fluid" src="{{ asset('online_exam/images/blog/blog-03.jpg') }}" alt="">
                    </div>
                    <div class="featured-content">
                        <div class="post-header">
                            <div class="post-meta">
                                <span class="ttm-meta-line date"><i class="fa fa-clock-o"></i>07 Oct, 2020</span>
                                <span class="ttm-meta-line byline"><i class="icon-user-outline"></i>Sara Lisbon</span>
                                <span class="ttm-meta-line comments-link"><i class="icon-chat-alt"></i>07</span>
                            </div><!-- post-meta end -->
                        </div>
                        <div class="featured-title">
                            <h3><a href="{{ url('blog-single.html') }}">Build Responsive Real World Websites</a></h3>
                        </div>
                        <div class="featured-desc">
                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div><!-- featured-imagebox-post end -->
            </div>
            <div class="col-lg-4">
                <!-- featured-imagebox-post -->
                <div class="featured-imagebox featured-imagebox-post style1">
                    <div class="featured-thumbnail">
                        <img class="img-fluid" src="{{ asset('online_exam/images/blog/blog-04.jpg') }}" alt="">
                    </div>
                    <div class="featured-content">
                        <div class="post-header">
                            <div class="post-meta">
                                <span class="ttm-meta-line date"><i class="fa fa-clock-o"></i>07 Oct, 2020</span>
                                <span class="ttm-meta-line byline"><i class="icon-user-outline"></i>Sara Lisbon</span>
                                <span class="ttm-meta-line comments-link"><i class="icon-chat-alt"></i>07</span>
                            </div><!-- post-meta end -->
                        </div>
                        <div class="featured-title">
                            <h3><a href="{{ url('blog-single.html') }}">Orientation Program For The New Students</a></h3>
                        </div>
                        <div class="featured-desc">
                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div><!-- featured-imagebox-post end -->
            </div>
        </div>
    </div>
</section>
<!--blog-section end-->



           <!-- padding_top_zero-section -->
<section class="ttm-row padding_top_zero-section mt_60 mb_45 clearfix">
    <div class="container">
        <!-- slick_slider -->
        <div class="row slick_slider" data-slick='{"slidesToShow": 6, "slidesToScroll": 1, "arrows":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 5}}, {"breakpoint":1024,"settings":{"slidesToShow": 4}}, {"breakpoint":777,"settings":{"slidesToShow": 3}},{"breakpoint":575,"settings":{"slidesToShow": 2}}]}'>
            <div class="col-lg-12">
                <div class="client-box">
                    <div class="ttm-client-logo-tooltip" data-tooltip="client-01">
                        <div class="client-thumbnail">
                            <img class="img-fluid auto_size" width="106" height="78" src="{{ asset('online_exam/images/client/client-01.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="client-box">
                    <div class="ttm-client-logo-tooltip" data-tooltip="client-02">
                        <div class="client-thumbnail">
                            <img class="img-fluid auto_size" width="115" height="80" src="{{ asset('online_exam/images/client/client-02.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="client-box">
                    <div class="ttm-client-logo-tooltip" data-tooltip="client-03">
                        <div class="client-thumbnail">
                            <img class="img-fluid auto_size" width="89" height="79" src="{{ asset('online_exam/images/client/client-03.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="client-box">
                    <div class="ttm-client-logo-tooltip" data-tooltip="client-04">
                        <div class="client-thumbnail">
                            <img class="img-fluid auto_size" width="98" height="80" src="{{ asset('online_exam/images/client/client-04.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="client-box">
                    <div class="ttm-client-logo-tooltip" data-tooltip="client-05">
                        <div class="client-thumbnail">
                            <img class="img-fluid auto_size" width="106" height="78" src="{{ asset('online_exam/images/client/client-05.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="client-box">
                    <div class="ttm-client-logo-tooltip" data-tooltip="client-02">
                        <div class="client-thumbnail">
                            <img class="img-fluid auto_size" width="115" height="80" src="{{ asset('online_exam/images/client/client-02.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="client-box">
                    <div class="ttm-client-logo-tooltip" data-tooltip="client-04">
                        <div class="client-thumbnail">
                            <img class="img-fluid auto_size" width="98" height="80" src="{{ asset('online_exam/images/client/client-04.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- slick_slider end -->
    </div>
</section>
<!-- padding_top_zero-section end -->



            <section class="ttm-row title-section pt-50 pb-35 ttm-bgcolor-grey clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-lg-flex justify-content-between">
                                <div class="lt-side mb-15 pr-50 res-991-pr-0 res-991-pb-15">
                                    <div class="d-flex align-items-center">
                                        <div class="ttm-icon ttm-icon_element-style-square ttm-icon_element-fill ttm-icon_element-color-skincolor ttm-icon_element-size-md flex-grow-0 flex-shrink-0 mb-0">
                                            <i class="flaticon-telephone fs-30"></i>
                                        </div>
                                        <div class="pl-30">
                                            <h2 class="fs-34 mb-0"><span class="font-weight-normal">Do You Need A Help Contact Us :</span><span class="ttm-textcolor-skincolor font-weight-bold"> 9 ( 888 ) 123-4567</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="rt-side flex-grow-0 flex-shrink-0 mb-15">
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-dark ttm-icon-btn-right" href="contact-us-1.html">contact us<i class="flaticon-right-arrow-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>


        </div><!--site-main end-->


   <!--footer start-->
<footer class="footer ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
    <div class="second-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_text clearfix">
                        <div class="footer-logo">
                            <img id="footer-logo-img" class="img-fluid auto_size" alt="image" width="136" height="45" src="{{ asset('online_exam/images/footer-logo.svg') }}">
                        </div>
                        <div class="textwidget widget-text">
                            <p class="pb-10 pr-30 res-575-pr-0">Uniaro University was established by J.H Merthon in 1920 for the public benefit. Afterwards, it is recognized globally</p>
                        </div>
                    </div>
                    <div class="widget widget_timing clearfix">
                        <h3 class="widget-title">Opening Hours</h3>
                        <div class="ttm-timelist-block-wrapper">
                            <ul class="ttm-timelist-block pr-15">
                                <li>Mon - Sat <span class="service-time">09am - 05pm</span></li>
                                <li>Sunday<span class="service-time">Closed</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_nav_menu clearfix">
                        <h3 class="widget-title">Our Courses</h3>
                        <ul id="menu-footer-quick-links">
                            <li><a href="#">Physics &amp; Astronomy</a></li>
                            <li><a href="#">General Engineering</a></li>
                            <li><a href="#">Departments Services</a></li>
                            <li><a href="#">Geography &amp; Geology</a></li>
                            <li><a href="#">Campus Directions</a></li>
                            <li><a href="#">Academic Solutions</a></li>
                            <li><a href="#">About Our College</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_nav_menu clearfix">
                        <h3 class="widget-title">Contact Us</h3>
                        <ul class="widget_contact_wrapper">
                            <li>
                                <h3>Location:</h3> 207 South Chestnut Lane Staten Island.
                            </li>
                            <li>
                                <h3>Email Us:</h3>
                                <a href="mailto:info@example.com">info@example.com</a>
                            </li>
                            <li>
                                <h3>Call Us:</h3> 9 (800) 344-4987
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget-recent-post clearfix">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul class="widget-post ttm-recent-post-list pr-5">
                            <li>
                                <a href="blog-single.html"><img class="img-fluid" alt="post-img" src="{{ asset('online_exam/images/blog/blog-01-150x150.jpg') }}"></a>
                                <span class="post-date">August 12, 2019</span>
                                <a href="blog-single.html">I Turned A Challenge Into A Positive Thing</a>
                            </li>
                            <li>
                                <a href="blog-single.html"><img class="img-fluid" alt="post-img" src="{{ asset('online_exam/images/blog/blog-02-150x150.jpg') }}"></a>
                                <span class="post-date">September 28, 2019</span>
                                <a href="blog-single.html">Choose The Right Place, At The Right Time</a>
                            </li>
                            <li>
                                <a href="blog-single.html"><img class="img-fluid" alt="post-img" src="{{ asset('online_exam/images/blog/blog-03-150x150.jpg') }}"></a>
                                <span class="post-date">October 30, 2019</span>
                                <a href="blog-single.html">Build Responsive Real World Websites</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="bottom-lt-side-footer">
                        <div class="pb-5">Copyright © 2022 Uniaro Template by <a href="https://themetechmount.com/">ThemetechMount</a></div>
                        <div>
                            <ul id="menu-footer-menu" class="footer-nav-menu">
                                <li><a href="#">Employees</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms Of Use</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Webmaster Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bottom-rt-side-footer">
                        <div class="d-sm-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                            <img class="img-fluid auto_size" alt="award-one" width="238" height="50" src="{{ asset('online_exam/images/footer-award-one.png') }}">
                            <div class="ml-30 pl-30 border-left res-575-ml-0 res-575-pl-0 res-575-mt-20">
                                <img class="img-fluid auto_size" alt="award-two" width="118" height="52" src="{{ asset('online_exam/images/footer-award-two.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->

    <!--back-to-top start-->
    <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->

</div><!-- page end -->


   <!-- Javascript -->
<script src="{{ asset('online_exam/js/script.js') }}"></script>
<script src="{{ asset('online_exam/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('online_exam/js/jquery-migrate-3.3.2.min.js') }}"></script>
<script src="{{ asset('online_exam/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('online_exam/js/jquery.easing.js') }}"></script>
<script src="{{ asset('online_exam/js/jquery-waypoints.js') }}"></script>
<script src="{{ asset('online_exam/js/jquery-validate.js') }}"></script>
<script src="{{ asset('online_exam/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('online_exam/js/slick.min.js') }}"></script>
<script src="{{ asset('online_exam/js/numinate.min.js') }}"></script>
<script src="{{ asset('online_exam/js/imagesloaded.min.js') }}"></script>
<script src="{{ asset('online_exam/js/jquery-isotope.js') }}"></script>
<script src="{{ asset('online_exam/js/main.js') }}"></script>

    <!-- Javascript end-->

</body>

</html>
