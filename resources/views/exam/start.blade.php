<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Exam</title>
</head>
<body>
    <h1>NEET Exam</h1>
    <form action="{{ route('exam.submit') }}" method="POST">
        @csrf
        @foreach($questions as $question)
            <div>
                <p>{{ $question->question_text }}</p>
                @foreach(json_decode($question->options) as $option)
                    <div>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}">
                        <label>{{ $option }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit">Submit</button>
    </form>
</body>
</html>
