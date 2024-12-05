@extends('backend.layouts.master')

@section('title')
    {{ __('Admins - Admin Panel') }}
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('admin-content')



   
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">{{ __('Admins') }}</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li><span>{{ __('All Admins') }}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

                       
<div class="main-content-inner">
    <div class="row">
    <div class="col-12 mt-5">
    <div class="card">
    <div class="container">
    <h1>Edit Test Series Package</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('test_series_packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT for updating a resource -->
        
        <div class="form-group">
            <label for="package_name">Package Name</label>
            <input type="text" class="form-control" id="package_name" name="package_name" value="{{ old('package_name', $package->package_name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $package->price) }}" required>
        </div>
        
        <div class="form-group">
            <label for="original_price">Original Price</label>
            <input type="number" step="0.01" class="form-control" id="original_price" name="original_price" value="{{ old('original_price', $package->original_price) }}">
        </div>
        
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <small class="form-text text-muted">Leave blank to keep the current image.</small>
            @if($package->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $package->image) }}" alt="Current Image" style="max-width: 150px; max-height: 150px;">
                </div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $package->year) }}" required>
        </div>
        
        <button type="submit" class="btn btn-success">Update Package</button>
        <a href="{{ route('Admin.Payment.create') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
        <!-- data table end -->
    </div>
</div>
</div>


@endsection

@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
     </script>
@endsection