

@section('content')
    <div class="package-details">
        <h2>{{ $package->name }}</h2>
        <p>{{ $package->description }}</p>
        <p>Price: {{ $package->payment_type == 'free' ? 'Free' : '₹' . $package->amount }}</p>
        <!-- Display other package details here -->
    </div>
@endsection
