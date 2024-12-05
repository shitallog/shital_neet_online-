@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('notifications.update', $notification->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title *</label>
    <input type="text" name="title" id="title" value="{{ $notification->title }}" required>

    <label for="date">Date *</label>
    <input type="date" name="date" id="date" value="{{ $notification->date }}" required>

    <label for="notice">Notice *</label>
    <textarea name="notice" id="notice" required>{{$notification->notice}}</textarea>

    <button type="submit">Update</button>
</form>
@endsection