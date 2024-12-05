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
                    <h4 class="text-center"> Notification</h4>
                    <a href="{{ route('Admin.Notification.create') }}" class="btn btn-primary">Create New Notification</a>
                </div>
                <table id="dataTable" class="text-center">
    <thead class="bg-light text-capitalize">
        <tr>
            <th width="5%">Sl</th>
            <th width="20%">Title</th>
            <th width="20%">Date</th>
            <th width="20%">Notice</th>
            <th width="20%">Pdf</th>
            <th width="20%">Status</th>
           
            <th width="20%">Send Notification</th>
          
        
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($notifications as $index => $notification)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $notification->title }}</td>
                <td>{{ $notification->date }}</td>
                <td>{{ $notification->notice }}</td>
                <td>{{ $notification->pdf }}</td>
                <td>
                    @if($notification->status)
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('notifications.activate', $notification->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-{{ $notification->status ? 'warning' : 'primary' }} btn-sm" type="submit">
                            {{ $notification->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </td>
                <td>
                    <p><a class="btn btn-success btn-sm" href="{{ route('notifications.edit', $notification->id) }}">Edit</a></p>
                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notification?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
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