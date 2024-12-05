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
                    <h4>Quizzes</h4>
                    <a href="{{ route('Admin.Q&A.create') }}" class="btn btn-primary">Create New Quiz</a>
                </div>

    <table id="dataTable" class="text-center">
        <thead class="bg-light text-capitalize">
            <tr>
            <th width="5%">{{ __('Sl') }}</th>
                <th width="20%">{{ __('Subject') }}</th>
                <th width="20%">{{ __('part') }}</th>
                <th width="20%">{{ __('quetion') }}</th>
                  <th width="20%">{{ __('correct_answer') }}</th>
                 <th width="15%">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $index => $quiz)
        @foreach($quiz->questions as $question)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $quiz->subject->name }}</td>
                 <td>{{ $quiz->part }}</td>
                    <td><i class="fa fa-folder-open fa-1x text-success" aria-hidden="true" ><a href="{{ route('quizzes.show', $question->qns) }}" class="text-success">Qns View</a></i></td>
                <td><i class="fa fa-folder-open fa-1x text-success" aria-hidden="true" ><a href="{{ route('quizzes.show', $question->correct_answer) }}" class="text-success">Ans View</a></td>
                
                 <!--   <td></td>-->
                    <td>
                            <!-- Actions like view, edit, delete can go here -->
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
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
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
     </script>
@endsection