<!doctype html>
<html>
<head>
    <title>Online Exam System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link href="{{ asset('online_exam/css/dashboard.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('online_exam/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('online_exam/js/main.js') }}"></script>
    <style>
        .result-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .result-container th, .result-container td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .result-container th {
            background-color: #f2f2f2;
        }
        .result-container tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .result-container tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="phpcoding">
        <section class="headeroption"></section>
        <section class="maincontent">
            <div class="menu">
                <ul>
                    <!--<li><a href="{{ route('profile') }}">Profile</a></li>-->
                    <li><a href="{{ route('exam') }}">Exam</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
                <span style="float:right; color:#fdfafb; font-family: 'Times New Roman', Georgia, serif;">
                    Welcome <strong>{{ $student->name }}</strong> to this Exam....
                </span>
            </div>
            <div class="main">
                <h1>You are Done!</h1>
                <div class="starttest">
                    <p>Congratulations! You have just completed the test.</p>
                    <p>Your Final Score: {{ $finalScore }}</p>
                    <a href="{{ route('view-answers') }}">View Correct Answers</a>
                    <div class="result-container">
                        <h1>Result for {{ $student->name }}</h1>
                        <p>Total Marks Obtained: {{ $totalMarksObtained }}</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Questions Attempted</th>
                                    <th>Correct Answers</th>
                                    <th>Negative Marks</th>
                                    <th>Total Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjectsResults as $result)
                                <tr>
                                    <td>{{ $result['subject'] }}</td>
                                    <td>{{ $result['attempted'] }}</td>
                                    <td>{{ $result['correct'] }}</td>
                                    <td>{{ $result['negative'] }}</td>
                                    <td>{{ $result['score'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section class="footeroption">
            <h2>Dept. of Computer Science &amp; Engineering, JUST</h2>
        </section>
    </div>
</body>
</html>
