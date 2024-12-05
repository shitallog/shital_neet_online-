<h1>{{ $package->name }}</h1>
<p>Price: ₹{{ $package->price }}</p>
<form action="{{ route('package.purchase', $package->id) }}" method="POST">
    @csrf
    <button type="submit">Buy Now</button>
</form>
