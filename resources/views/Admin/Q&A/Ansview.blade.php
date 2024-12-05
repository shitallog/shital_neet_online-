@extends('backend.layouts.master')

@section('title')
    {{ __('Admins - Admin Panel') }}
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
        }
        .btn-custom:active {
            background-color: #004494; /* Even darker shade when clicked */
            transform: scale(0.98); /* Slightly shrink on click */
        }
    </style>
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
 <div class="w-100">

 <a href="{{ route('Admin.Q&A.index') }}" class="btn  btn-primary"> Back </a>

 <a href="{{ route('Admin.Q&A.downloadAnsviewPdf', $id) }}" class="btn btn-custom">Download PDF</a>
</div>

                <br>

    <div class="card">
<!-- Add the "Create New Quiz" button -->


   <table id="dataTable" class="table text-center">
    <thead class="bg-light text-capitalize">
        <tr>
        <th>{{ __('Qution No') }}</th>
            <th>{{ __('sr No') }}</th>
            <th>Subject</th>
          
            <th width="20%">{{ __('Part') }}</th>
            <th width="20%">{{ __('Correct Answer') }}</th>
            <th width="20%">{{ __('Solution') }}</th>
            <th width="15%">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
    @forelse($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
        @foreach($examQuizzes as $quiz)
            @forelse($quiz->questions as $index => $question)
                <tr>
                <td>{{ $index + 1 }}</td>
                @if($index === 0)
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $loop->parent->iteration }}</td>
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $quiz->subject->name }}</td>
                            <td rowspan="{{ $quiz->questions->count() }}">{{ $quiz->part }}</td>
                        @endif
                    <td>{{ $question->correct_answer }}</td>
                    <td>{!! $question->solution_text !!}</td>
          <td>
                        <!-- Actions like view, edit, delete can go here -->
                        <a href="{{ route('Admin.Q&A.ansedit', $question->id) }}" class="btn btn-info btn-sm">Edit</a>
                       


                        <!-- Delete Button with Confirmation -->
                         
                    </td>  
                </tr>
            @empty
                <!-- Display if there are no questions for the current quiz -->
                <tr>
                    <td colspan="9">{{ __('No questions available.') }}</td>
                </tr>
            @endforelse
        @endforeach
    @empty
        <!-- Display if there are no quizzes available -->
        <tr>
            <td colspan="9">{{ __('No quizzes available.') }}</td>
        </tr>
    @endforelse
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
      <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/javascript">
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
</script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection