
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

<link rel="shortcut icon" href="images/favicon.png"/>
 
    <!-- CSS Stylesheets -->
   
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/login.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/responsive.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/forgot-password.css') }}"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <style>
.form-gap {
    padding-top: 70px;
}
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  width: 100%;
  background: #2a9abd;
}
.container{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-width: 694px;
    width: 100%;
    height: 657px;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
}
.row .footer h5 {
    margin-top: 1em; }
  .row .footer p {
    margin-top: 2em; }
    .row .footer p .symbols {
      color: #444; }
  .row .footer a {
    color: inherit;
    text-decoration: none; }
        </style>
</head>
<body>
 



 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="width:530px; margin-left:-172px;margin-top: 25px;">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
                  @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form action="{{ route('student.forgot-password') }}" method="POST">

    @csrf <!-- This adds the CSRF token for form security -->

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
            <input id="email" name="email" placeholder="Email Address" class="form-control" type="email" required>
        </div>
    </div>
    
    <div class="form-group">
        <input name="recover-submit" class="btn btn-lg btn-success btn-block" value="Reset Password" type="submit">
    </div>
    
    <input type="hidden" name="token" id="token" value=""> 
</form>

                    <div class="footer">
			              <h5 style="font-size: 15px;">New here? <a href="{{ route('student.register') }}"class="btn" style="color:#337ab7" style="font-size: 20px;">Sign Up.</a></h5>
		              	<h5 style="font-size: 15px;">Already have an account? <a href="{{ route('student.login') }}"class="btn text-primary" style="color:#337ab7" style="font-size: 20px;">Sign In.</a></h5>
	              	</div>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<script src="{{ asset('online_exam/js/main.js') }}"></script>
</body>

</html>
