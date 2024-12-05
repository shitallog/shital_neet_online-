<!DOCTYPE html>
<html>
<head>
    <title>Quiz Answers</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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
            background-color: #f2f2f2;
            font-weight: bold;
        }
        td {
            background-color: #fafafa;
        }
        .info-table {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
        .info-table th, .info-table td {
            border: none;
            padding: 8px 12px;
        }
        .info-table th {
            background-color: #e9ecef;
            text-align: left;
        }
        .info-table td {
            background-color: #f9f9f9;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        h2 {
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
<h1>Monarch Institute NEET Online Answer Paper</h1>


<table class="info-table">
    <tbody>
        <tr>
            <th scope="col">Academic Session</th>
            <td>2024 - 2025</td>
        </tr>
       
      
     
       
        <tr>
            <th scope="col">Test Pattern</th>
            <td>NEET (UG)</td>
        </tr>
    </tbody>
</table>

<h2>Answers Table</h2>
<table>
    <thead>
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Subject</th>
            <th scope="col">SECTION</th>
            <th scope="col">Question No</th>
            <th scope="col">Correct Answer</th>
        </tr>
    </thead>
    <tbody>
        @php
            $questionIndex = 1; // Initialize a global question index
        @endphp
        
        @forelse($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
            @foreach($examQuizzes as $quiz)
                @forelse($quiz->questions as $index => $question)
                    <tr>
                        @if($index === 0)
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $loop->parent->iteration }}</td>
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $quiz->subject->name }}</td>
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $quiz->part }}</td>
                        @endif
                        <td>{{ $questionIndex }}</td> <!-- Display the global question index -->
                        <td>{{ $question->correct_answer }}</td>
                    </tr>
                    @php
                        $questionIndex++; // Increment the global question index after each question
                    @endphp
                @empty
                    <tr>
                        <td colspan="5">No questions available.</td>
                    </tr>
                @endforelse
            @endforeach
        @empty
            <tr>
                <td colspan="5">No quizzes available.</td>
            </tr>
        @endforelse
    </tbody>
</table>


<h2>Solutions Table</h2>
<table>
    <thead>
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Subject</th>
            <th scope="col">SECTION</th>
            <th scope="col">Question No</th>
            <th scope="col">Solution</th>
        </tr>
    </thead>
    <tbody>
        @php
            $questionIndex = 1; // Initialize a global question index
        @endphp
        
        @forelse($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
            @foreach($examQuizzes as $quiz)
                @forelse($quiz->questions as $index => $question)
                    <tr>
                        @if($index === 0)
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $loop->parent->iteration }}</td>
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $quiz->subject->name }}</td>
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $quiz->part }}</td>
                        @endif
                        <td>{{ $questionIndex }}</td> <!-- Display the global question index -->
                        <td>{!! $question->solution_text !!}</td>
                    </tr>
                    @php
                        $questionIndex++; // Increment the global question index after each question
                    @endphp
                @empty
                    <tr>
                        <td colspan="5">No questions available.</td>
                    </tr>
                @endforelse
            @endforeach
        @empty
            <tr>
                <td colspan="5">No quizzes available.</td>
            </tr>
        @endforelse
    </tbody>
</table>


<div class="footer">
    <p>Generated on {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}</p>
</div>
<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
    <script>
        (function () {
            CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
            CKEDITOR.replace('editor1', {
                extraPlugins: 'ckeditor_wiris,mathjax',
                mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML',
                format_tags: 'p;h1;h2;h3;pre',
                contentsLangDirection: 'ltr',
                height: 400,
                toolbarGroups: [
                    { name: 'clipboard', groups: ['clipboard', 'undo'] },
                    { name: 'editing', groups: ['find', 'selection', 'spellchecker'] },
                    { name: 'insert' },
                    { name: 'styles' },
                    { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
                    { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align'] },
                    { name: 'tools' },
                    { name: 'about' }
                ],
                removeButtons: 'ExportPdf,Form,Flash,Iframe',
                extraAllowedContent: 'math[*]{*}(*)',
                removeDialogTabs: 'link:advanced;image:advanced',
                // Setting up MathJax rendering
                mathJaxClass: 'math-tex',
                mathJaxInline: '$$'
            });
        })();
    </script>
  <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/javascript">
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
</script>
</body>
</html>
