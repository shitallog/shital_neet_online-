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
                <!-- Add the "Create New Package" button -->
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="text-center">Exam</h4>
                    <a href="{{ route('Admin.packages.create') }}" class="btn btn-primary">Add New Package</a>
                </div>      

                <table id="dataTable" class="text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Exams</th>
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                        <tr>
                            <td>{{ $package->name }}</td>
                            <td>{{ implode(', ', json_decode($package->exams)) }}</td>

                            <td>{{ ucfirst($package->payment_type) }}</td>
                            <td>{{ $package->amount ?? 'Free' }}</td>
                            <td>{{ $package->active ? 'Active' : 'Inactive' }}</td>
                            <td>
    <a class="btn btn-lg btn-success" href="{{ route('packages.edit', $package) }}">Edit</a>
    
    <!-- Active/Deactive button -->
    <form action="{{ route('packages.toggleActive', $package) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-lg {{ $package->active ? 'btn-danger' : 'btn-success' }}">
            {{ $package->active ? 'Deactivate' : 'Activate' }}
        </button>
    </form>

    <form action="{{ route('packages.destroy', $package) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-lg btn-danger" type="submit">Delete</button>
    </form>
</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
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
