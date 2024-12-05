@extends('layouts.app')

@section('content')
<h1 class="text-center">Edit Email</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('Emails.update', $Email->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Title *</label>
    <input type="text" name="title" id="title" value="{{ $Email->title }}" required>

    <label for="start_date">Start Date *</label>
    <input type="datetime-local" name="start_date" id="start_date" value="{{ $Email->start_date->format('Y-m-d\TH:i') }}" required>

    <label for="end_date">End Date *</label>
    <input type="datetime-local" name="end_date" id="end_date" value="{{ $Email->end_date->format('Y-m-d\TH:i') }}" required>

    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo">
    @if($Email->photo)
        <img src="{{ asset('storage/' . $Email->photo) }}" alt="{{ $Email->title }}" width="100">
    @endif

    <label for="details">Details *</label>
    <textarea name="details" id="details" required>{{ $Email->details }}</textarea>

    <button class="btn btn-primary" type="submit">Update</button>
</form>
@endsection
