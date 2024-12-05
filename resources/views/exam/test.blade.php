<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
    <style>
        /* Your inline CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .nav-tabs {
            background-color: #343a40;
            border-radius: 10px;
        }
        .nav-tabs .nav-link {
            color: #fff;
            border-radius: 5px 5px 0 0;
        }
        .nav-tabs .nav-link.active {
            background-color: #e74c3c;
            color: white;
            font-weight: bold;
        }
        .tab-content {
            background-color: white;
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 20px;
            border-radius: 0 0 10px 10px;
        }
        .question h1 {
            font-size: 24px;
            color: #e74c3c;
            font-weight: bold;
        }
        .question h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #343a40;
        }
        .question p {
            font-size: 18px;
            color: #333;
        }
        .options label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
            cursor: pointer;
        }
        .options input[type="radio"] {
            margin-right: 10px;
            background-color: #007BFF; /* Background color when selected */
            border-color: #0056b3; /* Border color when selected */
        }
        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }
        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border-top: 2px solid #0056b3;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
       /* Navbar Styles */
    .navbar {
  
    width:1100px;
    text-align: center;
    background-color: #007bff; /* Bootstrap's primary blue color */
    border-bottom: 2px solid #0056b3; /* Darker blue border for a sharp look */
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: 700;
    color: #fff;
}

.navbar-toggler {
    border: none;
}

.navbar-toggler-icon {
    background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"%3E%3Cpath stroke="%23fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h20M5 15h20M5 23h20" /%3E%3C/svg%3E');
}

.nav-link {
    color: #fff !important;
    font-size: 1rem;
    padding: 0.5rem 1rem;
}

.nav-link:hover {
    color: #cce5ff !important;
    background-color: #0056b3;
    border-radius: 4px;
}

.navbar-nav .nav-item {
    margin-left: 1rem;

}

.navbar-nav .nav-item:first-child {
    margin-left: 0;
}

@media (max-width: 992px) {
    .navbar-collapse {
        margin-top: 1rem;
    }
}

        .section-tabs button {
            background-color: #008c95;
            color: white;
            margin-right: 10px;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        .section-tabs button.active {
            background-color: #006b75;
        }


        .question-panel {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .question-palette {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .palette-button {
            width: 40px;
            height: 40px;
            margin: 5px;
            border: none;
            border-radius: 50%;
        }

        .answered {
            background-color: #28a745;
            color: white;
        }

        .not-answered {
            background-color: #dc3545;
            color: white;
        }

        .review {
            background-color: #ffc107;
            color: white;
        }

        .visited {
            background-color: #007bff;
            color: white;
        }

        .not-marked {
            background-color: #6c757d;
            color: white;
        }

        .footer {
            width:1100px;

            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .user-info {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .user-info h6 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .timer {
            font-size: 18px;
            color: #ff0000;
        }

        .btn-group {
            margin-top: 10px;
        }

        .btn {
            padding: 10px 15px;
        }

        .status-labels {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 10px;
        }

        .status-labels span {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            min-width: 100px;
            flex: 1;
        }

        .status-answered {
            background-color: #28a745;
            color: white;
        }

        .status-not-answered {
            background-color: #dc3545;
            color: white;
        }

        .status-review {
            background-color: #ffc107;
            color: white;
        }

        .status-visited {
            background-color: #007bff;
            color: white;
        }

        .status-not-marked {
            background-color: #6c757d;
            color: white;
        }

        @media (max-width: 768px) {
            .col-md-8, .col-md-4 {
                width: 100%;
            }

            .section-tabs {
                display: flex;
                flex-wrap: wrap;
            }

            .section-tabs button {
                flex: 1 1 100%;
                margin-bottom: 10px;
            }

            .question-panel, .user-info, .question-palette {
                margin-bottom: 15px;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn-group .btn {
                margin-bottom: 10px;
            }

            .btn-group .btn:last-child {
                margin-bottom: 0;
            }
        }

        @media (max-width: 576px) {
            .palette-button {
                width: 30px;
                height: 30px;
            }

            .user-info h6, .timer {
                font-size: 14px;
            }

            .status-labels span {
                min-width: 80px;
                font-size: 12px;
            }

            .footer {
                font-size: 12px;
            }
        }

        /* Add your custom CSS in a file or <style> block */
.navbar-nav .nav-link {
    margin-left: 15px; /* Adjust spacing between items */
}

.navbar-brand {
    font-size: 1.5rem; /* Adjust font size for branding */
}

/* Custom styles for right-aligned content in the navbar */
.navbar-right-content {
    display: flex;
    align-items: center;
    margin-left: auto; /* Pushes the content to the right */
}

.navbar-right-content .nav-link {
    margin-left: 15px; /* Space between student info and quiz time */
    color: #fff; /* Adjust color if needed */
    font-size: 1rem; /* Adjust font size if needed */
}
/* Additional styling for responsiveness, if needed */
@media (max-width: 992px) {
    .navbar-right-content {
        margin-left: 0;
        flex-direction: column; /* Stack vertically on smaller screens */
        text-align: center; /* Center text on smaller screens */
    }

    .navbar-right-content .nav-link {
        margin-left: 0;
        margin-bottom: 10px; /* Space between items on smaller screens */
    }
}
.question {
            margin-bottom: 20px;
        }

        .options label {
            display: block;
        }

        /* Custom button styling */
        .btn-custom {
            background-color: #dc3545; /* Custom red color */
            color: #fff; /* White text color */
            border: none;
        }

        .btn-custom:hover {
            background-color: #c82333; /* Darker red on hover */
        }
   .instructions {
    background-color: #f9f9f9;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 20px;
    margin: 20px 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.instructions h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 15px;
}

.instructions ul {
    color: #555;
    font-size: 16px;
    line-height: 1.5;
    padding-left: 20px; /* Indent for the list */
}

.instructions ul li {
    margin-bottom: 10px; /* Space between list items */
}

.instructions strong {
    color: #007bff;
}
h2 {
    text-align: center;
            font-size: 24px;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body onload="initFullScreen()">
<div class="container" style=" padding-top: 27px">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Welcome to NEET Exam Monarch</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        
       <!-- Right-aligned content -->
       <div class="navbar-right-content">
            <span class="nav-link mb-0">User:    {{ auth()->user()->name }}</span>
            <span class="nav-link mb-0 timer"  id="timer">Time Left: {{ $quizTime }}</span>
        
        </div>
</nav>


<div class="container mt-4">
    <div class="row">
        <!-- Left Section -->
        <div class="col-md-12">
      

          <!-- Question Panel -->
<div class="question-panel" id="question-panel">
<div class="container">
<div class="instructions">
    
    <h2>Instructions</h2>
    <p>
    <i class="fas fa-info-circle"></i> Please follow the instructions below to complete the process:
</p>
<ul  style="text-decoration: none; list-style-type: none; padding: 0; margin: 0;">
<li><i class="fas fa-check-circle"></i> Step 1: Each correct answer scores <strong>+4 marks</strong>.</li>
<li><i class="fas fa-times-circle"></i> Step 2: Each incorrect answer deducts <strong>-1 mark</strong>.</li>
<li><i class="fas fa-list"></i> Step 3: Part A consists of <strong>35 questions</strong> per subject.</li>
<li><i class="fas fa-pencil-alt"></i> Step 4: Only the first <strong>10 answers</strong> in Part B will be accepted for scoring.</li>
</ul>

</div>
 <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-4">
    <!-- <form action="{{ route('quiz.submit') }}" method="POST" id="quizForm">
        @csrf
        <input type="hidden" name="exam_id" value="{{ $examId }}">
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="physics-tab" data-toggle="tab" href="#physics" role="tab" aria-controls="physics" aria-selected="true">Physics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="chemistry-tab" data-toggle="tab" href="#chemistry" role="tab" aria-controls="chemistry" aria-selected="false">Chemistry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="botany-tab" data-toggle="tab" href="#botany" role="tab" aria-controls="botany" aria-selected="false">Botany</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="zoology-tab" data-toggle="tab" href="#zoology" role="tab" aria-controls="zoology" aria-selected="false">Zoology</a>
            </li>
        </ul>

     
        <div class="tab-content mt-3">
            @foreach($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
                @foreach($examQuizzes->groupBy('subject_id') as $subjectId => $subjectQuizzes)
                    <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}" id="{{ strtolower($subjectQuizzes->first()->subject->name) }}" role="tabpanel" aria-labelledby="{{ strtolower($subjectQuizzes->first()->subject->name) }}-tab">
                        <div class="container mt-3">
                            @foreach($subjectQuizzes as $quiz)
                                @foreach($quiz->questions as $index => $question)
                                    <div class="question" id="question_{{ $question->id }}">
                                        <h1><strong style="text-transform: uppercase;">{{ $quiz->exam->exam_name }}</strong></h1>
                                        <h3><strong style="text-transform: uppercase;">{{ $quiz->subject->name }} ( Part: {{ $quiz->part }} )</strong></h3>
                                        <hr>
                                        <p><strong>Ques. No {{ $index + 1 }}. {{ $question->question_text }}</strong></p>
                                        @if($question->question_image)
                                            <img src="{{ asset($question->question_image) }}" alt="Question Image" style="max-width: 100%; height: auto;">
                                        @endif
                                        <div class="options">
                                            <label for="answer_{{ $question->id }}_a">
                                                <input type="radio" id="answer_{{ $question->id }}_a" name="answers[{{ $question->id }}]" value="a"> {{ $question->option_a }}
                                            </label><br>
                                            <label for="answer_{{ $question->id }}_b">
                                                <input type="radio" id="answer_{{ $question->id }}_b" name="answers[{{ $question->id }}]" value="b"> {{ $question->option_b }}
                                            </label><br>
                                            <label for="answer_{{ $question->id }}_c">
                                                <input type="radio" id="answer_{{ $question->id }}_c" name="answers[{{ $question->id }}]" value="c"> {{ $question->option_c }}
                                            </label><br>
                                            <label for="answer_{{ $question->id }}_d">
                                                <input type="radio" id="answer_{{ $question->id }}_d" name="answers[{{ $question->id }}]" value="d"> {{ $question->option_d }}
                                            </label><br>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>


       
        <div class="btn-group d-flex justify-content-between mt-3">
            <button type="button" class="btn btn-secondary" onclick="previousQuestion()">Previous</button>
            <button type="button" class="btn btn-warning" onclick="markForReview()">Mark for Review & Next</button>
            <button type="button" class="btn btn-primary" onclick="nextQuestion()">Next</button>
        </div>

    
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-lg btn-success btn-block">Submit Quiz</button>
        </div>
    </form> -->
    
    <form action="{{ route('quiz.submit') }}" method="POST" id="quizForm">
    @csrf
    <input type="hidden" name="exam_id" value="{{ $examId }}">
    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($quizzes->groupBy('subject_id') as $subjectId => $subjectQuizzes)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ strtolower($subjectQuizzes->first()->subject->name) }}-tab" data-toggle="tab" href="#{{ strtolower($subjectQuizzes->first()->subject->name) }}" role="tab" aria-controls="{{ strtolower($subjectQuizzes->first()->subject->name) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    {{ $subjectQuizzes->first()->subject->name }}
                </a>
            </li>
        @endforeach
    </ul>


    <!-- Tab panes -->
    <div class="tab-content mt-3">
        @foreach($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
            @foreach($examQuizzes->groupBy('subject_id') as $subjectId => $subjectQuizzes)
                <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}" id="{{ strtolower($subjectQuizzes->first()->subject->name) }}" role="tabpanel" aria-labelledby="{{ strtolower($subjectQuizzes->first()->subject->name) }}-tab">
                    <div class="container mt-3">
                        @foreach($subjectQuizzes as $quiz)
                        @foreach($quiz->questions as $index => $question)

                                <div class="question" id="question_{{ $question->id }}">
                                    <h1><strong style="text-transform: uppercase;">{{ $quiz->exam->exam_name }}</strong></h1>
                                    <h3><strong style="text-transform: uppercase;">{{ $quiz->subject->name }} ( Part: {{ $quiz->part }} )</strong></h3>
                                    <hr>
                                    <p><strong>Ques. No {{ $index + 1 }}. {!! $question->question_text !!}</strong></p>
                                    @if($question->question_image)
                                        <img src="{{ asset('public/questions/' . $question->question_image) }}" alt="Question Image" style="max-width: 30%; height: auto;">
                                    @endif
                                    <br>
                                    <br>
                                    <div class="options">
                                        <label for="answer_{{ $question->id }}_a">
                                            <input type="radio" id="answer_{{ $question->id }}_a" name="answers[{{ $question->id }}]" value="a">{!! $question->option_a !!} 
                                            @if($question->option_a_image)<img src="{{ asset('public/options/' . $question->option_a_image) }}" alt="Option A Image" class="img-fluid" style="max-width: 10%; height: auto;">   @endif
                                        </label><br>
                                        <label for="answer_{{ $question->id }}_b">
                                            <input type="radio" id="answer_{{ $question->id }}_b" name="answers[{{ $question->id }}]" value="b">{!! $question->option_b !!}
                                            @if($question->option_b_image)<img src="{{ asset('public/options/' . $question->option_b_image) }}" style="max-width: 10%; height: auto;"  alt="Option B Image" class="img-fluid">
                                            @endif
                                        </label><br>
                                        <label for="answer_{{ $question->id }}_c">
                                            <input type="radio" id="answer_{{ $question->id }}_c" name="answers[{{ $question->id }}]" value="c">{!! $question->option_c !!} 
                                             @if($question->option_c_image)  <img src="{{ asset('public/options/' . $question->option_c_image) }}" style="max-width: 10%; height: auto;" alt="Option c Image" class="img-fluid">
                                            @endif
                                        </label><br>
                                        <label for="answer_{{ $question->id }}_d">
                                            <input type="radio" id="answer_{{ $question->id }}_d" name="answers[{{ $question->id }}]" value="d">{!! $question->option_d !!} 
                                            @if($question->option_d_image)<img src="{{ asset('public/options/' . $question->option_d_image) }}" style="max-width: 10%; height: auto;" alt="Option D Image" class="img-fluid">
                                            @endif

                                        </label><br>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    <!-- Navigation Buttons -->
    <div class="btn-group d-flex justify-content-between mt-3">
        <button type="button" class="btn btn-secondary" onclick="previousQuestion()">Previous</button>
        <button type="button" class="btn btn-warning" onclick="markForReview()">Mark for Review & Next</button>
        <button type="button" class="btn btn-primary" onclick="nextQuestion()">Next</button>
    </div>

    <!-- Submit Button -->
    <div class="d-flex justify-content-center mt-3">
        <button type="submit" class="btn btn-lg btn-success btn-block">Submit Quiz</button>
    </div>
</form>
</div>




 @if(session('score'))
        <div class="alert alert-success">
            Your total score is: {{ session('score') }} Marks
        </div>
    @endif
</div>


</div>
 </div>
    </div>
</div>
 <footer class="footer bg-primary">
    <p class="text-white">&copy; NEET (UG)-2025 </p>
</footer>
</div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

// Function to submit quiz results
function submitQuizResults(studentEmail) {
    // You may want to send the totalScore to the server here using an AJAX request or a form submission
    fetch('/submi-quiz', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if needed
        },
        body: JSON.stringify({ score: totalScore, email: studentEmail })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        // Handle success response
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}



  let currentQuestionIndex = 0;  // Track the current question index
  const questions = document.querySelectorAll('.question');  // Select all question elements
const reviewedQuestions = new Set(); // Set to store the indices of reviewed questions

// Function to show the question at the specified index
function showQuestion(index) {
    questions.forEach((question, i) => {
        question.style.display = i === index ? 'block' : 'none';
    });
}

// Function to navigate to the previous question
function previousQuestion() {
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        showQuestion(currentQuestionIndex);
    }
}

// Function to navigate to the next question
function nextQuestion() {
    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++;
        showQuestion(currentQuestionIndex);
    }
}

// Function to mark the current question for review
function markForReview() {
    if (!reviewedQuestions.has(currentQuestionIndex)) {
        reviewedQuestions.add(currentQuestionIndex);
        alert(`Question ${currentQuestionIndex + 1} marked for review.`);
    }
    nextQuestion(); // Move to the next question after marking
}

// Initial display of the first question
showQuestion(currentQuestionIndex);

const submitContainer = document.getElementById('submitContainer');  // Select the Submit button container

function showNextQuestion(index) {
    // Hide the current question
    questions[index].style.display = 'none'; 
    
    // Increment question index
    currentQuestionIndex = index + 1; 

    // Show the next question or the submit button if there are no more questions
    if (currentQuestionIndex < questions.length) {
        questions[currentQuestionIndex].style.display = 'block';  // Show the next question
    } else {
        submitContainer.style.display = 'block';  // Show the Submit button
    }
}
//     function nextQuestion() {
//     var activeTab = $('.nav-tabs .active');
//     var nextTab = activeTab.parent().next().find('a');
//     if (nextTab.length) {
//         nextTab.tab('show'); // Show next tab
//     }
// }

// function previousQuestion() {
//     var activeTab = $('.nav-tabs .active');
//     var prevTab = activeTab.parent().prev().find('a');
//     if (prevTab.length) {
//         prevTab.tab('show'); // Show previous tab
//     }
// }


    // function markForReview() {
    //     // Logic to mark the current question for review
    //     // alert('Marked for review.');
    //     nextQuestion();
    // }

    // // Initialize the first question
    // showQuestion(currentQuestionIndex);

        function startTimer(duration) {
        const timerElement = document.getElementById('timer');
        let timer = duration, hours, minutes, seconds;

        const interval = setInterval(() => {
            hours = parseInt(timer / 3600, 10);
            minutes = parseInt((timer % 3600) / 60, 10);
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            timerElement.textContent = `Time Left: ${hours}:${minutes}:${seconds}`;
            timer--;

            if (timer < 0) {
                clearInterval(interval);
                timerElement.textContent = "Time is up!";
                // Optionally, you can handle exam submission here
                 submitExam();
            }
            
             // Function to handle exam submission
        function submitExam() {
            // Example: redirect to submission route
            window.location.href = "{{ route('exam.results') }}"; // Adjust this route as needed
        }

        }, 1000);
    }

  document.addEventListener('DOMContentLoaded', () => {
        let quizTimeInSeconds = {{ $quizTime }};
        startTimer(quizTimeInSeconds);
        // loadQuestions();
        // updatePalette();
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

        // Detect if the user leaves the page
        window.onbeforeunload = function() {
            window.location.href = "{{ route('exam.results') }}"; // Adjust this route as needed
        };

        // Optional: Prevent keyboard shortcuts (like Ctrl+T, Ctrl+N, etc.)
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && (e.key === 't' || e.key === 'n')) {
                e.preventDefault();
            }
        });
    </script> 

  <!-- Include Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript">



MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
</script>
<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>


</body>

</html>
