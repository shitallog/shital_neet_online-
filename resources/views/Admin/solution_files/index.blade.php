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
<style>
    .main-content-inner {
        padding: 20px;
    }

    .upload-button {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .card {
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 10px;
    }

    .title {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .success-message {
        color: green;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .solution-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .solution-table th, .solution-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .solution-table th {
        background-color: #f2f2f2;
    }

    .action-link {
        color: #007bff;
        text-decoration: none;
        margin-right: 10px;
    }

    .action-link:hover {
        text-decoration: underline;
    }

    .delete-button {
        background-color: #ff4d4d;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #e60000;
    }
</style>
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
    <div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <a href="{{ route('solution_files.create') }}" class="upload-button">Upload New File</a>
            <div class="card">
                <h1 class="title">Solution Files</h1>

                @if(session('success'))
                    <p class="success-message">{{ session('success') }}</p>
                @endif

                <table class="solution-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Solution Pdf</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>{{ $file->name }}</td>
                                <td>
    <a href="{{ route('soluPdf', ['id' => $file->id]) }}" class="btn btn-sm btn-primary" target="_blank">
        <i class="fas fa-eye"></i> View 
    </a>
</td>

                                <td>
                                    <a href="{{ route('solution_files.show', $file->id) }}" class="action-link">View</a>
                                    <a href="{{ route('solution_files.edit', $file->id) }}" class="action-link">Edit</a>
                                    <form action="{{ route('solution_files.destroy', $file->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="delete-button">Delete</button>
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