
<!DOCTYPE html>
<html>
<head>
    <title>Exam Notification</title>
</head>
<body>
    <h1>Dear Student,</h1>
    <p>An exam has been scheduled:</p>
    <ul>
        <li><strong>Exam Name:</strong> {{ $quiz->name }}</li>
        <li><strong>Date:</strong> {{ $quiz->date }}</li>
        <li><strong>Subject:</strong> {{ $quiz->subject }}</li>
    </ul>
    <p>Please make sure you are prepared. Good luck!</p>
    <p>Regards,<br>Your School</p>
</body>
</html>
