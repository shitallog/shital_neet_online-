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
                <table id="dataTable" class="text-center">
                    <thead class="bg-light text-capitalize">
                        <tr>
                            <th width="5%">{{ __('Sl') }}</th>
                            <th width="5%">{{ __('Subject') }}</th>
                            <th width="20%">{{ __('Student') }}</th>
                            <th width="20%">{{ __('Exam') }}</th>
                            <th width="20%">{{ __('Attempt_date') }}</th>
                            <th width="20%">{{ __('Price') }}</th>
                            <!-- <th width="20%">{{ __('Attempt Time') }}</th> -->
                            <th width="20%">{{ __('Plan') }}</th>
                            <th width="15%">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                                <td></td>
                                <td></td> 
                                <td></td>
                                <td></td> 
                                <td></td> <!-- Empty cell for 'Plan' -->
                                
                            </tr>
                    
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
