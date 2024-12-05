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
<h4 class="text-center">Edit Exam Page</h4>
<form action="{{ route('Admin.Exam.update', $exam->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="exam_name">Exam Name:</label>
        <input type="text" id="exam_name" class="form-control" name="exam_name" value="{{ old('exam_name', $exam->exam_name) }}" required>
    </div>

    <div class="form-group">
        <label for="started_date">Started Date *</label>
        <input type="datetime-local" name="started_date" id="started_date" class="form-control" placeholder="Enter Start Date" 
               value="{{ old('started_date', \Carbon\Carbon::parse($exam->started_date)->format('Y-m-d\TH:i')) }}" required min="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
    </div>

    <div class="form-group">
        <label for="finish_date">Finish Date *</label>
        <input type="datetime-local" name="finish_date" id="finish_date" class="form-control" placeholder="Enter End Date" 
               value="{{ old('finish_date', \Carbon\Carbon::parse($exam->finish_date)->format('Y-m-d\TH:i')) }}" required min="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
    </div>

    <div class="form-group">
        <label for="timeLimit">Enter Time Limit (Seconds):</label>
        <input type="number" id="timeLimit" name="time_limit" class="form-control" value="{{ old('time_limit', $exam->time_limit) }}" required />
    </div>

    <div class="form-group">
        <label for="attempt">Number of Attempts:</label>
        <input type="number" min="1" id="attempt" name="attempt" class="form-control" value="{{ old('attempt', $exam->attempt) }}" required>
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
</form>


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