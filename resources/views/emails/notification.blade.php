<!DOCTYPE html>
<html>
<head>
    <title>{{ $email->title }}</title>
</head>
<body>
    <h1>{{ $email->title }}</h1>
    <p>{{ $email->details }}</p>
    @if($email->photo)
        <img src="{{ asset('storage/' . $email->photo) }}" alt="{{ $email->title }}" width="300">
    @endif
    <p>Start Date: {{ $email->start_date }}</p>
    <p>End Date: {{ $email->end_date }}</p>
</body>
</html>
