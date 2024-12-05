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
    <div class="container">
    <h1>Exam Details</h1>
    
    <div class="card">
        <div class="card-header">
            Exam: {{ $exam->exam_name }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $exam->id }}</p>
            <p><strong>Exam Name:</strong> {{ $exam->exam_name }}</p>
            <p><strong>Time Limit:</strong> {{ $exam->time_limit }}</p>
            <p><strong>Exam Start Date:</strong> {{ \Carbon\Carbon::parse($exam->started_date)->format('l, F j, Y h:i A') }}</p>
            <p><strong>Exam End Date:</strong> {{ \Carbon\Carbon::parse($exam->finish_date)->format('l, F j, Y h:i A') }}</p>
            <p><strong>Number of Attempts:</strong> {{ $exam->attempt }}</p>
        </div>
        <div class="card-footer">
           
            <a href="{{ route('Admin.Exam.index') }}" class="btn btn-secondary">Back to Exams</a>
        </div>
    </div>
</div>
</div>
</div>
</div>

        <!-- data table end -->

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