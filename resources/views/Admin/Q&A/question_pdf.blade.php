<!DOCTYPE html>
<html>
<head>
    <title>Question PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details h2 {
            margin-bottom: 10px;
            font-size: 18px;
        }
        .details p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Question and Answer Details</h1>

   

    <div class="details">
        <h2>Questions</h2>
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Exam Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Subject</th>
           <th>Part</th>
          
          
        </tr>
    </thead>
    <tbody>
        @foreach($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
            <!-- @php
                $firstQuiz = $examQuizzes->first();
                $totalMark = $examQuizzes->sum('mark'); // Calculate total marks
            @endphp -->

            @foreach($examQuizzes as $index => $quiz)
                <tr>
                    @if($index === 0)
                       
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $loop->parent->iteration }}</td>
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $firstQuiz->exam->exam_name }}</td>
                      

                        <td rowspan="{{ $examQuizzes->count() }}">
                            <strong>Start:</strong> {{ \Carbon\Carbon::parse($firstQuiz->started_date)->format('l, F j, Y g:i A') }}
                        </td>
                        <td rowspan="{{ $examQuizzes->count() }}">
                            <strong>End:</strong> {{ \Carbon\Carbon::parse($firstQuiz->finish_date)->format('l, F j, Y g:i A') }}
                        </td>
                     
                       
                    @endif
                    
                    <!-- Subject and Part -->
                    <td>{{ $quiz->subject->name }}</td>
                    <td>{{ $quiz->part }}</td>
                    
                   
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
    </div>

    <div class="footer">
        <p>Generated on {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}</p>
    </div>


    <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/javascript">
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
</script>
</body>
</html>
