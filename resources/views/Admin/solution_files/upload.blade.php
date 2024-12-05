@extends('backend.layouts.master')

@section('title')
    {{ __('Admins - Admin Panel') }}
@endsection

@section('styles')
    <!-- Start datatable css -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .view-btn {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
    font-size: 14px;
    padding: 8px 12px;
    border-radius: 25px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.view-btn:hover {
    background-color: #0056b3;
    border-color: #0056b3;
    color: white;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
}

.view-btn i {
    margin-right: 5px;
}

        .container {
            margin-top: 50px;
        }
        .upload-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .upload-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        .btn-upload {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-upload:hover {
            background-color: #218838;
        }
        .success-message, .error-message {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
        .success-message {
            color: #28a745;
        }
        .error-message {
            color: #dc3545;
        }
        .uploaded-image {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            border-radius: 10px;
            border: 2px solid #343a40;
        }
        .table-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            background-color: #343a40;
            color: white;
            text-align: center;
        }
        .table tbody td {
            text-align: center;
        }
        .btn-view {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .btn-view:hover {
            background-color: #0056b3;
        }
    </style>
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
                    <!-- File Upload Form -->
                    <div class="container">
                        <div class="upload-card col-md-6 offset-md-3">
                            <h2>Upload Your File</h2>
                            
                            @if(session('success'))
                                <p class="success-message">{{ session('success') }}</p>
                                <img src="{{ Storage::disk('public')->url(session('file')) }}" alt="Uploaded File" class="uploaded-image">
                            @endif

                            @if(session('error'))
                                <p class="error-message">{{ session('error') }}</p>
                            @endif

                            <form action="/upload" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <button type="submit" class="btn-upload">Upload</button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Uploaded Files Table -->
                    <div class="container">
                        <div class="table-card">
                            <h2 class="text-center mb-4">Uploaded Files</h2>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name </th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($files as $index => $file)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $file->name }}</td> 
                                            <td>
                                            <a  href="{{ route('viewPdf', ['id' => $file->id]) }}" class="btn btn-sm btn-primary" target="_blank">
                                            <i class="fas fa-eye"></i> View </a>
    <!-- Delete Button Form -->
    <form action="{{ route('file.delete', ['filename' => basename($file->path)]) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-lg">Delete</button>
</form>

                                            </td>

                                        



                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @if($files->hasPages())
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $files->links() }}  <!-- Laravel Pagination Links -->
                                </div>
                            @endif
                        </div>
                    </div>

                    <section class="footeroption">
                        <h2 style="color: white;">NEET (UG)-2024  &amp; Medical IIT-JEE Foundations</h2>
                    </section>
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
