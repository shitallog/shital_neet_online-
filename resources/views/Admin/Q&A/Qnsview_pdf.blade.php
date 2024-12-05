<!DOCTYPE html>
<html>
<head>
    <title>{{ __('Quiz Questions PDF') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML"></script>
    <style>

@media print {
    .page-break {
        page-break-after: always;
    }
}

     body {
  font-family: "Trirong", serif;
    margin: 0;
    padding: 0;
}

.btn-custom {
            background-color: #007bff; /* Customize your color */
            color: white; /* Text color */
            border-radius: 25px; /* Rounded corners */
            padding: 10px 20px; /* Adjust padding */
            font-size: 13px; /* Font size */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transition */
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Darker shade on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
        .btn-custom:active {
            background-color: #004494; /* Even darker shade when clicked */
            transform: scale(0.98); /* Slightly shrink on click */
        }

.container {
    width: 100%;
    margin: 0 auto;
    font-size: 13px; /* Font size */
    
}


.header, .instructions, .info-section {
    font-family: "Sofia", sans-serif;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
}

.header p, .info-section p {
    margin: 0;
    padding: 5px 0;
}

.header p {
    font-weight: bold;
}

.instructions h2, .info-section h2 {
    border-bottom: 2px solid #333;
    padding-bottom: 5px;
    margin-bottom: 15px;
    font-size: 10px; /* Font size */
}

.instructions ol {
    margin-left: 20px;
}

.instructions ul {
    margin-left: 40px;
}

input[type="text"] {
    border: 1px solid #ccc;
    padding: 5px;
    width: 100%;
    box-sizing: border-box;
}

input[type="text"]:focus {
    border-color: #333;
    outline: none;
}

strong {
    color: #d9534f;
}
 table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        td {
            vertical-align: top;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .no-questions {
            text-align: center;
            font-style: italic;
        }

.header-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.header-table td {
    padding: 10px;
    border: 1px solid #ddd;
}

.header-table td:first-child {
    font-weight: bold;
}

.header-table td:last-child {
    font-style: italic;
}

.section {
  padding-top: 50px;
    
}
    </style>
</head>
<body>
<h1>Monarch Institute  NEET Online Question Paper</h1>
<div class="container">
       <header><div>
        <table>
            <tr>
                <th>Details</th>
                <th>Information</th>
            </tr>
            <tr>
                <td>Course</td>
                <td>PRE-MEDICAL</td>
            </tr>
            <tr>
                <td>Test Date</td>
                <td>  {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}</td>
            </tr>
           
            <tr>
                <td>Academic Session</td>
                <td>2024-2025</td>
            </tr>
           
            <tr>
                <td>Language</td>
                <td>English</td>
            </tr>
        </table>
</div>
<h2><i class="fas fa-exclamation-circle"></i> Important Instructions:</h2>

<div class="container">


<table>
    <tr>
        <th>Instructions</th>
    </tr>
    <tr>
        <td>
            <ol>
                <li><i class="fas fa-pen"></i> The Answer Sheet is inside this Test Booklet. When you are directed to open the Test Booklet, take out the Answer Sheet and fill in the particulars on the ORIGINAL Copy carefully with blue/black ballpoint pen only.</li>
                <li><i class="fas fa-clock"></i> The test is of 3 hours 20 minutes duration and the Test Booklet contains 200 multiple-choice questions (four options with a single correct answer) from Physics, Chemistry, and Biology (Botany and Zoology). 50 questions in each subject are divided into two Sections (A and B) as per details given below:
                    <ul>
                        <li><i class="fas fa-list-ul"></i> Section A: Consists of 35 (Thirty-five) Questions in each subject (Question Nos 1 to 35, 51 to 85, 101 to 135, and 151 to 185). All questions are compulsory.</li>
                        <li><i class="fas fa-question-circle"></i> Section B: Consists of 15 (Fifteen) questions in each subject (Question Nos 36 to 50, 86 to 100, 136 to 150, and 186 to 200). In Section B, a candidate needs to attempt any 10 (Ten) questions out of 15 (Fifteen) in each subject. Candidates are advised to read all 15 questions in each subject of Section B before they start attempting the question paper. In the event of a candidate attempting more than ten questions, the first ten questions answered by the candidate shall be evaluated.</li>
                    </ul>
                </li>
                <li><i class="fas fa-calculator"></i> Each question carries 4 marks. For each correct response, the candidate will get 4 marks. For each incorrect response, one mark will be deducted from the total scores. The maximum marks are 720.</li>
                <li>Rough work is to be done in the space provided for this purpose in the Test Booklet only.</li>
                <li>On completion of the test, the candidate must hand over the Answer Sheet (<span class="highlight">ORIGINAL</span> and OFFICE Copy) to the Invigilator before leaving the Room/Hall. The candidates are allowed to take away this Test Booklet with them.</li>
                <li>The candidates should ensure that the Answer Sheet is not folded. Do not make any stray marks on the Answer Sheet. Do not write your Form No. anywhere else except in the specified space in the Test Booklet/Answer Sheet.</li>
                <li>The candidates should ensure that the Answer Sheet is not folded. Do not make any stray marks on the Answer Sheet. Do not write your Form No. anywhere else except in the specified space in the Test Booklet/Answer Sheet.</li>
                <li>Use of white fluid for correction is NOT permissible on the Answer Sheet.</li>
                <li>Each candidate must show on-demand his/her Allen ID Card to the Invigilator.</li>
                <li>No candidate, without special permission of the Invigilator, would leave his/her seat.</li>
                <li>The candidates should not leave the Examination Hall without handing over their Answer Sheet to the Invigilator on duty and sign (with time) the Attendance Sheet twice. Cases, where a candidate has not signed the Attendance Sheet second time, will be deemed not to have handed over the Answer Sheet and dealt with as an Unfair Means case.</li>
                <li>Use of Electronic/Manual Calculator is prohibited.</li>
                <li>The candidates are governed by all Rules and Regulations of the examination with regard to their conduct in the Examination Room/Hall. All cases of unfair means will be dealt with as per the Rules and Regulations of this examination.</li>
                <li>No part of the Test Booklet and Answer Sheet shall be detached under any circumstances.</li>
                <li>The candidates will write the Correct Test Booklet Code as given in the Test Booklet/Answer Sheet in the Attendance Sheet.</li>
                <li>Compensatory time of one hour five minutes will be provided for the examination of three hours and 20 minutes duration, whether such candidate (having a physical limitation to write) uses the facility of scribe or not.</li>
                <li><i class="fas fa-pen-alt"></i> Use Blue/Black Ball Point Pen only for writing particulars on this page/marking responses on the Answer Sheet.</li>
            </ol>
        </td>
    </tr>
</table>

</div>
</header>

<main>

 
    <div class="section" style="padding-top:-50px;">
    <div class="questions">
            @foreach($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
                @if($examQuizzes->isEmpty())
                    <p class="no-questions">{{ __('No quizzes available.') }}</p>
                @else
                    @foreach($examQuizzes as $quiz)
                  
                
                           
                    <div class="quiz-table-container" >
                  
    <table class="quiz-table" style="height: 100px;">
        <thead>
            <tr>
                <th><H3>< {{ $quiz->subject->name }} (Part: {{ $quiz->part }})</H3></th>
            </tr>
        </thead>
        <tbody>
            @forelse($quiz->questions as $index => $question)
            <tr>
                <td><strong>Question {{ $index + 1 }}:</strong> {!! $question->question_text !!} <br> 
                @if($question->question_image)
                <img height="100px" width="150px" src="{{ public_path("/public/questions/".$question->question_image) }}" alt="">


@endif









               
                    <ol class="options-list">
                        <li>{!! $question->option_a !!}<br>   @if($question->option_a_image)  <img height="80px" width="80px" src="{{ public_path("/public/options/".$question->option_a_image) }}" alt="">   @endif
                        </li>
                        <li>{!! $question->option_b !!} <br> @if($question->option_b_image)<img height="80px" width="80px" src="{{ public_path("/public/options/".$question->option_b_image) }}" alt=""> 
                        @endif</li>
                        <li>{!! $question->option_c !!}<br>
                        @if($question->option_c_image)  <img height="80px" width="80px" src="{{ public_path("/public/options/".$question->option_c_image) }}" alt="">
                        @endif</li>
                        <li>{!! $question->option_d !!}<br> 
                        @if($question->option_d_image)  <img height="80px" width="80px" src="{{ public_path("/public/options/".$question->option_d_image) }}" alt="">
                        @endif</li>
                    </ol>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="no-questions">{{ __('No questions available.') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</main>
    <div class="footer">
        <p>Generated on {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}</p>
    </div>
    <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
   
  <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/javascript">
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
</script>



<script type="text/php">
if (isset($pdf)) {
    $x = 502; // Horizontal position
    $y = 780; // Vertical position
    $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
    $size = 12; // Font size
    $color = [0, 0, 0]; // Black color in RGB
    $pdf->page_text($x, $y, $text, $font, $size, $color);
}
</script>

</body>
</html>
