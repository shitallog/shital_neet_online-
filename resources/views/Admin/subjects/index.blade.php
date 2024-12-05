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
<!-- Add the "Create New Quiz" button -->
<div class="d-flex justify-content-between mb-3">
                    <h4 class="text-center"> subject </h4>
                    <a href="{{ route('Admin.subjects.create') }}" class="btn btn-primary">Create New subject</a>
                </div>
                <table id="dataTable" class="text-center">
    <thead class="bg-light text-capitalize">
        <tr>
            <th width="5%">{{ __('Sl') }}</th>
            <th width="20%">{{ __('Subject') }}</th>
            <th width="15%">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $index => $subject)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $subject->name }}</td>
            <td>
                <a href="{{ route('Admin.subjects.view', $subject->id) }}" class="btn btn-success btn-sm">View</a>
                <a href="{{ route('Admin.subjects.edit', $subject->id) }}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{ route('Admin.subjects.destroy', $subject->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


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