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
    <style>
        .btn-custom {
            background-color: #007bff; /* Customize your color */
            color: white; /* Text color */
            border-radius: 25px; /* Rounded corners */
            padding: 10px 20px; /* Adjust padding */
            font-size: 16px; /* Font size */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transition */
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Darker shade on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
            color: white; /* Text color */
        }
        .btn-custom:active {
            background-color: #004494; /* Even darker shade when clicked */
            transform: scale(0.98); /* Slightly shrink on click */
        }
    </style>
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
        <br>
    <div class="w-100">
 <a href="{{ route('Admin.Mark.studentPdf') }}" class="btn btn-custom">Download PDF</a>
</div>
<br>
<!-- Add the "Create New Quiz" button -->
<div class="d-flex justify-content-between mb-3">
                    <h4 class="text-center">ELITE TEST SERIES NEET 2025</h4>
                    <a href="{{ route('Admin.Q&A.create') }}" class="btn btn-primary">Create New Quiz</a>
</div>

  
    <table class="table table-bordered">
    <thead class="bg-light text-capitalize">
        <tr>
            <th width="5%">{{ __('Sl') }}</th>
            <th>Student Name</th>
            <th>Exam Name</th>
            <th>Subject Name</th>
            <th>Attempt Date of Examination</th>
            <th width="20%">Attempt Time of Examination</th>
            <th>Correct</th>
            <th>Incorrect</th>
            <th>Attempted Questions</th>
            <th>Not Attempted Questions</th>
            <th>Total Marks</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
    @foreach($quizResults as $index => $result)
        <tr>
            @if($index === 0)
                <!-- Set rowspan to the count of quiz results -->
                <td rowspan="{{ $quizResults->count() }}">{{ $index + 1 }}</td> <!-- Serial number -->
                <td rowspan="{{ $quizResults->count() }}">{{ $result->user->name }}</td> <!-- Student name -->
                <td rowspan="{{ $quizResults->count() }}">{{ $result->exam->exam_name }}</td> <!-- Exam name -->
            @endif
            <td>{{ $result->subject->name }}</td> <!-- Subject name -->
            <td>{{ \Carbon\Carbon::parse($result->created_at)->format('d-m-Y') }}</td> <!-- Attempt Date -->
            <td>{{ \Carbon\Carbon::parse($result->created_at)->format('H:i:s') }}</td> <!-- Attempt Time -->
            <td>{{ $result->is_correct }}</td> <!-- Correct answers count -->
            <td>{{ $result->incorrect_count }}</td> <!-- Incorrect answers count -->
            <td>{{ $result->attempted_questions }}</td> <!-- Attempted questions count -->
            <td>{{ $result->not_attempted_questions }}</td> <!-- Not attempted questions count -->
            <td>{{ $result->total_score }}</td> <!-- Total marks -->
        </tr>
    @endforeach
</tbody>

    </tbody>
</table>



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