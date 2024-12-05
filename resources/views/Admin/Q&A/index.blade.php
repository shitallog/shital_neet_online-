@extends('backend.layouts.master')

@section('title')
    {{ __('Admins - Admin Panel') }}
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.custom-btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #007bff; /* Primary color */
    border: none;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.3s;
}

.custom-btn:hover {
    background-color: #0056b3; /* Darker shade for hover */
    transform: scale(1.05); /* Slight zoom effect on hover */
}

.custom-btn:active {
    background-color: #004085; /* Even darker shade for active state */
    transform: scale(0.95); /* Slight shrink effect on click */
}
    </style>
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
        <a href="{{ route('Admin.Q&A.downloadPdf') }}" class="btn btn-lg btn-primary custom-btn">Download PDF</a>
        </div>
<br></br>
    <div class="card">
 
<!-- Add the "Create New Quiz" button -->
<div class="d-flex justify-content-between mb-3">
                    <h4 class="text-center">Question and Answer Details</h4>
                                  

                
                </div>

           

                @if(session('success'))
  <p >{{ session('success') }}</p>
 @endif
 <table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Exam Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Exam Status</th>
            <th>Publish</th>
            
            <th>Question Details</th>
            <th>Answer Details</th>
           
            <th>Subject</th>
            <th>Part</th>
            <th>Question</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
            @foreach($examQuizzes as $index => $quiz)
                <tr>
                    @if($index === 0)
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $loop->parent->iteration }}</td>
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $quiz->exam->exam_name }}</td>

                        <td rowspan="{{ $examQuizzes->count() }}">
                            <strong>Start:</strong> {{ \Carbon\Carbon::parse($quiz->started_date)->format('l, F j, Y g:i A') }}
                        </td>
                        <td rowspan="{{ $examQuizzes->count() }}">
                            <strong>End:</strong> {{ \Carbon\Carbon::parse($quiz->finish_date)->format('l, F j, Y g:i A') }}
                        </td>
                        <td rowspan="{{ $examQuizzes->count() }}">{{ $quiz->exam_status }}</td>
                        <td rowspan="{{ $examQuizzes->count() }}">
                            <form action="{{ route('exams.togglePublish', $quiz->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <div class="input-group">
                                    <select name="publish" onchange="this.form.submit()" class="form-select btn btn-outline-primary btn-sm">
                                        <option value="yes" {{ $quiz->publish ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ !$quiz->publish ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </form>
                        </td>
                    
                        <td rowspan="{{ $examQuizzes->count() }}">
    <i class="fa fa-folder-open fa-1x text-success" aria-hidden="true"></i>
    <a href="{{ route('Admin.Q&A.Qnsview', $examId) }}" class="text-success btn-sm">View Question</a>
</td>
<td rowspan="{{ $examQuizzes->count() }}">
    <i class="fa fa-folder-open fa-1x text-success" aria-hidden="true"></i>
    <a href="{{ route('Admin.Q&A.Ansview', $examId) }}" class="text-success">View Answer</a>
</td>




                    @endif
                    <td>{{ $quiz->subject->name }}</td>
                    <td>{{ $quiz->part }}</td>
                    <td>
    <a href="{{ route('Admin.Q&A.create', [
        'exam_id' => $examId,
        'subject' => $quiz->subject_id,
        'part' => $quiz->part,
        'quiz_id' => $quiz->id,
        'questions_id' => $nextQuestionsId // This should be calculated
    ]) }}" class="btn btn-primary btn-sm">
        Add Question
    </a>
</td>


<td>
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
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.activate-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const quizId = this.getAttribute('data-id');
            const form = document.getElementById(`activate-form-${quizId}`);

            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the button text and style based on the new status
                    if (data.status == 1) {
                        this.classList.remove('btn-outline-success');
                        this.classList.add('btn-outline-danger');
                        this.textContent = 'ACTIVE';
                    } else {
                        this.classList.remove('btn-outline-danger');
                        this.classList.add('btn-outline-success');
                        this.textContent = 'INACTIVE';
                    }
                    alert('Status updated successfully.');
                }
            });
        });
    });
});

        </script>




     <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
     </script>
@endsection