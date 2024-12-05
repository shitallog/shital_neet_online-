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
    <div class="container">
    <br/>
    <br/>
    <h1 class="text-center">Create New class 12 pass</h1>
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       
    

        <form action="{{ route('class12.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                </div>
      <button type="submit" class="btn btn-danger btn-upload">Upload</button>
       
    </form>
    <br/>
    <br/>
    <br/>
    </div>
        <!-- data table end -->
    </div>
</div>
</div>


<div class="container" style="padding-top: 30px;">
    <h1>class 12 pass </h1>
   <br/><br/><br/> 
  

 
    <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>File Name</th>
            <th>Actions</th>
            <th>Delete</th> <!-- Add delete action header -->
        </tr>
    </thead>
    <tbody>
        @foreach($class12s as $class12) <!-- Updated variable name -->
        <tr>
            <td>{{ $class12->id }}</td>
            <td>{{ $class12->file_name }}</td>
            <td>
            <a href="{{ route('viewpdf', ['id' => $class12->id]) }}" class="btn btn-sm btn-primary" target="_blank">
    <i class="fas fa-eye"></i> View
</a>

            </td>
            <td>
                <form action="{{ route('uplode.destroy', $class12->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </tbody>
</table>



       <!-- Pagination links -->
     
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