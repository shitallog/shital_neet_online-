<h1>Edit Solution File</h1>

    <form action="{{ route('solution_files.update', $solutionFile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">File Name:</label>
            <input type="text" id="name" name="name" value="{{ $solutionFile->name }}" required>
        </div>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('solution_files.index') }}">Back to Files</a>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif