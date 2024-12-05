@extends('layouts.admin')

@section('content')
<h1>{{ isset($package) ? 'Edit Package' : 'Add New Package' }}</h1>
<form action="{{ isset($package) ? route('packages.update', $package) : route('packages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($package)) @method('PUT') @endif
    <label for="name">Package Name</label>
    <input type="text" name="name" value="{{ $package->name ?? old('name') }}" required>

    <label for="exams">Select Exams</label>
    <select name="exams[]" multiple required>
        <option value="Exam 1">Exam 1</option>
        <option value="Exam 2">Exam 2</option>
        <option value="Exam 3">Exam 3</option>
        <!-- Add more options as needed -->
    </select>

    <label for="payment_type">Payment Type</label>
    <select name="payment_type" required>
        <option value="free" {{ (isset($package) && $package->payment_type == 'free') ? 'selected' : '' }}>Free</option>
        <option value="paid" {{ (isset($package) && $package->payment_type == 'paid') ? 'selected' : '' }}>Paid</option>
    </select>

    <label for="amount">Amount</label>
    <input type="number" name="amount" value="{{ $package->amount ?? old('amount') }}">

    <label for="description">Description</label>
    <textarea name="description">{{ $package->description ?? old('description') }}</textarea>

    <label for="image">Image</label>
    <input type="file" name="image">

    <label for="active">Active</label>
    <input type="checkbox" name="active" {{ (isset($package) && $package->active) ? 'checked' : '' }}>

    <button type="submit">{{ isset($package) ? 'Update' : 'Create' }} Package</button>
</form>
@endsection
