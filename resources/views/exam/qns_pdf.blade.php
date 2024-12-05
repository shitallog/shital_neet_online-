<!DOCTYPE html>
<html>
<head>
    <title>{{ __('Quiz Questions PDF') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <style>
     body {
  font-family: "Trirong", serif;
    margin: 0;
    padding: 0;
}

.container {
    width: 100%;
    margin: 0 auto;
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
            margin-bottom: 20px;
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
    </style>
</head>
<body>
<div class="container">
    <h1>NEET Online Question Paper</h1>

    <div class="instructions">
    <h2><i class="fas fa-exclamation-circle"></i> Important Instructions:</h2>
    <ol>
        <li><i class="fas fa-pen"></i> The Answer Sheet is inside this Test Booklet. When you are directed to open the Test Booklet, take out the Answer Sheet and fill in the particulars on the ORIGINAL Copy carefully with blue/black ball point pen only.</li>
        <li><i class="fas fa-clock"></i> The test is of 3 hours 20 minutes duration and the Test Booklet contains 200 multiple-choice questions (four options with a single correct answer) from Physics, Chemistry, and Biology (Botany and Zoology). 50 questions in each subject are divided into two Sections (A and B) as per details given below:
            <ul>
                <li><i class="fas fa-list-ul"></i> Section A: Consists of 35 (Thirty-five) Questions in each subject (Question Nos 1 to 35, 51 to 85, 101 to 135, and 151 to 185). All questions are compulsory.</li>
                <li><i class="fas fa-question-circle"></i> Section B: Consists of 15 (Fifteen) questions in each subject (Question Nos 36 to 50, 86 to 100, 136 to 150, and 186 to 200). In Section B, a candidate needs to attempt any 10 (Ten) questions out of 15 (Fifteen) in each subject. Candidates are advised to read all 15 questions in each subject of Section B before they start attempting the question paper. In the event of a candidate attempting more than ten questions, the first ten questions answered by the candidate shall be evaluated.</li>
            </ul>
        </li>
        <li><i class="fas fa-calculator"></i> Each question carries 4 marks. For each correct response, the candidate will get 4 marks. For each incorrect response, one mark will be deducted from the total scores. The maximum marks are 720.</li>
        <li><i class="fas fa-pen-alt"></i> Use Blue/Black Ball Point Pen only for writing particulars on this page/marking responses on the Answer Sheet.</li>
    </ol>
</div>


        <div class="info-section">
            <h2>Candidate Information</h2>
            <p>Name of the Candidate (in Capitals): <input type="text" placeholder="Enter Name"></p>
            <p>Form Number: <input type="text" placeholder="Enter Form Number"></p>
            <p>Centre of Examination (in Capitals): <input type="text" placeholder="Enter Centre"></p>
            <p>Candidate's Signature: <input type="text" placeholder="Sign Here"></p>
            <p>Your Target is to secure Good Rank in Pre-Medical 2025</p>
           
        </div>
    </div>
    <div class="section">
    
        <div class="questions">
            @foreach($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
                @if($examQuizzes->isEmpty())
                    <p class="no-questions">{{ __('No quizzes available.') }}</p>
                @else
                    @foreach($examQuizzes as $quiz)
                  
                
                           
                    <div class="quiz-table-container">
    <table class="quiz-table">
        <thead>
            <tr>
                <th><H3>< {{ $quiz->subject->name }} (Part: {{ $quiz->part }})</H3></th>
              
            </tr>
        </thead>
        <tbody>
            @forelse($quiz->questions as $index => $question)
            <tr>
                <td><strong>Question {{ $index + 1 }}:</strong> {{ $question->question_text }}
               
                    <ol class="options-list">
                        <li>{{ $question->option_a }}</li>
                        <li>{{ $question->option_b }}</li>
                        <li>{{ $question->option_c }}</li>
                        <li>{{ $question->option_d }}</li>
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
    <div class="footer">
        <p>Generated on {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}</p>
    </div>
</body>
</html>
