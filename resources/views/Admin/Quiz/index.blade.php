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
            <table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Exam Name</th>
            <th>Time limit (min)</th>
            <th width="20%">{{ __('Total Mark') }}</th>
            <th width="20%">{{ __('Attempt_date') }}</th>
            <th width="20%">{{ __('Price') }}</th>
          
        
            <th>Actions</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
            @php
                $firstQuiz = $examQuizzes->first();
                $totalMark = $examQuizzes->sum('mark'); // Calculate total marks
            @endphp

            @foreach($examQuizzes as $index => $quiz)
                <tr>
                    @if($index === 0)
                        <!-- Exam Name, Time Limit, Total Mark, Start Date, End Date, Exam Status, and Publish -->
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $loop->parent->iteration }}</td>
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $firstQuiz->exam->exam_name }}</td>
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $firstQuiz->exam->time_limit }}</td>
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $totalMark }}</td>

                        <td rowspan="{{ $examQuizzes->count() }}">
                          
                        </td>
                        <td rowspan="{{ $examQuizzes->count() }}">
                          
                        </td>
                    
                        
                        
                        <td rowspan="{{ $examQuizzes->count() }}">
                            <a href="{{ route('quizzes.show', $firstQuiz->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('quizzes.edit', $firstQuiz->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('quizzes.destroy', $firstQuiz->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    @endif
                    
                   
                </tr>
            @endforeach
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
        $(document).ready(function() {
            if ($('#dataTable').length) {
                $('#dataTable').DataTable({
                    responsive: true
                });
            }
        });
    </script>
@endsection