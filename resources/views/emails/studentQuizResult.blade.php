<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEET Exam Results</title>
    <style>
        /* Basic reset */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 2em;
        }

        p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
        }

        /* Score box */
        .score-box {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        .score-box strong {
            font-size: 1.2em;
            color: #333;
        }

        .score-box span {
            display: block;
            margin: 5px 0;
            font-size: 1.4em;
            font-weight: bold;
            color: #ff5722;
        }

        /* Subject results */
        .subject-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .subject-list li {
            background-color: #e0f7fa;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            color: #333;
        }

        .subject-list li span {
            color: #00796b;
        }

        /* Footer message */
        .footer {
            text-align: center;
            color: #888;
            font-size: 0.9em;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container" style="font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9;">
    <h1 style="color: #333;">Dear {{ $quizResult['user_name'] }}</h1>

    <h2 style="text-align: center; font-size: 20px; color: #2c3e50;">We hope this message finds you well. We are pleased to inform you that your results for the Monarch NEET Exam held on {{ $quizResult['exam_date'] }} are now available.</h2>

    <p style="margin-top: 20px; text-align: center; font-size: 16px;">Thank you for participating in the Exam :- <span style="color:#2980b9";>{{ $quizResult['exam_name'] }}</span>  ! Below are your results:</p>

    <!-- <h3 style="color: #34495e;">Registration Number: {{ $quizResult['registration_number'] }}</h3> -->

    <div class="score-box" style="margin: 20px 0; padding: 20px; border: 1px solid #ddd; background-color: #fff;">
        <h2 style="color: #16a085;">NEET Exam Result:</h2>
        <strong>Total Score:</strong>
        <span>{{ $totalScore }} / {{ $maxTotalMarks }}</span><br>
        <strong>Percentage:</strong>
        <span>{{ number_format($percentage, 2) }}%</span>
    </div>

    <h2 style="color: #2980b9;">Results by Subject</h2>
    <ul class="subject-list" style="list-style-type: none; padding: 0; color: #2c3e50;">
        @foreach ($results as $subject => $result)
    
            <li style="margin: 10px 0; padding: 10px; border-bottom: 1px solid #eee;">
                <span style="font-weight: bold;">{{ $subject }}:</span>
           
                <span>Total Score: {{ $result['total_score'] }}</span>
              
            </li>
            <li> <span>Attempted Questions: {{ $result['attempted_questions'] }} </span></li>
            <li> <span>Not Attempted Questions: {{ $result['not_attempted_questions'] }} </span></li>
        @endforeach
   

    </ul>
   
    <h1 style="margin-top: 20px; text-align: center; font-size: 16px;">We wish you all the best for your future exams with Monarch NEET Prep! Keep up the excellent work!</h1>

    
    <h3 style="text-align: center; font-size: 16px; color: #333;">[ Monarch Institution - Success Path of NEET Preparation ]</h3>
    <h5 style="text-align: center; font-size: 16px; color: #333;">Contact: (+91) 9136431685 | <a href="http://127.0.0.1:8000/frontend/index" style="color: #2980b9;">Visit our Website</a></h5>
</div>


</body>
</html>
