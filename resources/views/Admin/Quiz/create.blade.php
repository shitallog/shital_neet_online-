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
    <script src="{{ asset('backend/assets/js/app.js') }}" defer></script>

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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <h1 class="text-center">Enter Exam Details</h1>
 <form action="{{ route('Admin.Quiz.store') }}" method="POST">
            @csrf
       <div class="form-group">
     <label for="exam_name">Select Exam:</label>
    <select name="exam_id" id="exam_name" class="form-control" required>
        <option value="">Select an Exam</option>
        @foreach(\App\Models\Exam::all() as $exam)
            <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for="started_date">Select Start Date & Time:</label>
        <select name="started_date" id="started_date" class="form-control" required>
            <option value="">Start Date</option>
            @foreach(\App\Models\Exam::all() as $exam)
                <option value="{{ $exam->started_date }}">{{ \Carbon\Carbon::parse( $exam->started_date)->format('l, F j, Y h:i A') }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="finish_date">Select End Date & Time:</label>
        <select name="finish_date" id="finish_date" class="form-control" required>
            <option value="">finish_date</option>
            @foreach(\App\Models\Exam::all() as $exam)
                <option value="{{ $exam->finish_date}}">{{ \Carbon\Carbon::parse(  $exam->finish_date)->format('l, F j, Y h:i A') }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="subject">Subject:</label>
                <select name="subject_id" id="subject" class="form-control" required>
        <option value="">Subject</option>
            @foreach(\App\Models\Subject::all() as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
                <label for="total">Total Mark:</label>
                <input type="number" name="mark" id="mark" class="form-control" placeholder="Enter total mark of questions" required>
     </div>

        <div class="form-group">
                <label for="total">Total Questions:</label>
                <input type="number" name="total" id="total" class="form-control" placeholder="Enter total number of questions" required>
        </div>

          <div class="form-group">
                <label for="right">Marks for Correct Answer:</label>
                <input type="number" name="right" id="right" class="form-control" placeholder="Enter marks for correct answer" min="0" required>
          </div>

        <div class="form-group">
                <label for="wrong">Negative Marks for Wrong Answer:</label>
                <input type="number" name="wrong" id="wrong" class="form-control" placeholder="Enter minus marks for wrong answer" min="0" required>
        </div>

        <div class="form-group">
          <label for="time_limit">Time Limit (in minutes):</label>
           <select name="time_limit" id="time_limit" class="form-control" required>
             <option value="">Time Limit</option>
                       @foreach(\App\Models\Exam::all() as $exam)
              <option value="{{ $exam->time_limit }}"> {{ $exam->time_limit }} </option>
                      @endforeach
           </select>

        </div>

            <div class="form-group">
                <label for="part">Part:</label>
                <select name="part" id="part" class="form-control" required>
                    <option value="A">Part-A</option>
                    <option value="B">Part-B</option>
                </select>
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" class="form-control" rows="4" placeholder="Write description here..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
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