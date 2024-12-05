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
        <!-- data table start -->
        <div class="col-12 mt-5">
       
    <div class="card">
<br><br>
<div class="w-100">
    <a href="{{ route('Admin.user.studentPdf') }}" class="btn btn-lg btn-primary custom-btn">Download PDF</a>
</div>

            <div class="d-flex justify-content-between mb-3">
                <br><br>
  
    <a href="{{ route('Admin.User.registration_student') }}" class="btn btn-primary">Create New registration_student</a>
</div>
                <div class="card-body">
                 
                    <div class="clearfix"></div>
                    
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        
<div class="main-content-inner">
    <div class="row">
  
    <div class="col-12 mt-5">
    <div class="card">
    <table id="dataTable" class="text-center">
    <thead class="bg-light text-capitalize">
                <tr>
                    <th width="5%">{{ __('Sl') }}</th>
                    <th width="20%">{{ __('Name') }}</th>
                    <th width="20%">{{ __('Email') }}</th>
                    <th width="20%">{{ __('Registration Number') }}</th>
                    <th width="20%">{{ __('Payment Status') }}</th>
                    <th width="20%">{{ __('status') }}</th>
                </tr>
            </thead>
            <tbody>
        @if($users->isEmpty())
            <tr>
                <td colspan="6">No users found.</td>
            </tr>
        @else
            @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Monarch 000{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ ucfirst($user->payment_status) }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('/admin/student/' . $user->id) }}">View Details</a>
                        <form action="{{ route('Admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
        </table>
    </div>
        <!-- data table end -->
    </div>
</div>
</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
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