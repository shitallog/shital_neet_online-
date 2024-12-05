
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

<link rel="shortcut icon" href="images/favicon.png" />
<link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/responsive.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/style.css') }}"/>
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('online_exam/css/register.css') }}"/>

    <style>
  form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
}


.input-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button.btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form-footer {
    text-align: center;
    margin-top: 10px;
}

.form-footer a {
    color: #007bff;
    text-decoration: none;
}

.form-footer a:hover {
    text-decoration: underline;
}

  </style>

</head>


<body>

  <!-- Banner -->
<section class="container">
    <div class="row">
      <header>Sign Up</header>
      <form action="{{ route('Admin.User.registration_student') }}" method="POST" class="form">
    @csrf

    <div class=" input-group input-box">
    <label for="name">Student Name:</label>
    <input type="text" id="name" name="name" required><br>
    </div>
    <div class="input-group input-box">
        <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
</div>
<div class="input-group input-box">
    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required><br>
</div>
<div class=" text-center input-group">
 <label for="gender">Gender:</label>
    <select  style="width:600px; height:35px; font-size: 17px" id="gender" name="gender" required>
        <option class="text-bold"  value="male">Male</option>
        <option class="text-bold" value="female">Female</option>
        <option class="text-bold" value="other">Other</option>
    </select><br>
</div>
<div class="input-group input-box">

    <label for="father_name">Father's Name:</label>
    <input type="text" id="father_name" name="father_name" required><br>
</div>
<div class="input-group input-box">

    <label for="mother_name">Mother's Name:</label>
    <input type="text" id="mother_name" name="mother_name" required><br>
</div>
<div class="input-group input-box">

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>
</div>
<div class="input-group input-box">

    <label for="password">Password:Neet Online Entrance Exam</label>
    <input type="password" id="password" name="password" required><br>
</div>
<div class="input-group input-box">

    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required><br>
</div>
<div class="input-group">
                    <label for="category">Category:</label>
                    <select style="width:600px; height:35px;font-size: 17px" id="category" name="category" required>
                        <option value="" selected>Select Category</option>
                        <option value="general">General</option>
                        <option value="obc">OBC</option>
                        <option value="sc">SC</option>
                        <option value="st">ST</option>
                    </select>
                </div>

                  <!-- Reference Field -->
    <div class="input-group input-box">
        <label for="reference">Reference (Optional):</label>
        <input type="text" id="reference" name="reference"><br>
    </div>

    <div class="input-group input-box">
        <label for="cash">Cash Amount:</label>
        <input type="number" id="cash" name="cash" step="0.01" min="0"><br>
    </div>

<button class="btn btn-success pb-5 btn-lg w-60" type="submit">Register</button>
<br><br>
 <div class="form-footer " style="margin-top: -5px;">
    <p style="font-size: 20px;">Already have an account? <a class="btn"  href="{{ route('student.login') }}" id="registerNowBtn">Login</a></p>
</div>    
 </form>

</section>

  


  

    <!-- Javascript end-->

</body>

</html>
