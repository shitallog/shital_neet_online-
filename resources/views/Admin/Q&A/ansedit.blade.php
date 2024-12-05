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
<div class="container">
                     
<h1>{{ __('Edit Question') }}</h1>

<form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="correct_answer">{{ __('Correct Answer') }}</label>
            <textarea rows="3" cols="5"  id="editor1" type="text" name="correct_answer"  class="ckeditor form-control" value="{{ $question->correct_answer }}" required></textarea>
        </div>

        <div class="form-group">
            <label for="solution_text">{{ __('Solution Text') }}</label>
            <textarea rows="3" cols="5"  name="solution_text" id="editor2" class="ckeditor form-control" required>{{ $question->solution_text }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Update Question') }}</button>
    </form>


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

        (function () {
            CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
            CKEDITOR.replace('editor1', {
                extraPlugins: 'ckeditor_wiris,mathjax',
                mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML',
                format_tags: 'p;h1;h2;h3;pre',
                contentsLangDirection: 'ltr',
                height: 400,
                toolbarGroups: [
                    { name: 'clipboard', groups: ['clipboard', 'undo'] },
                    { name: 'editing', groups: ['find', 'selection', 'spellchecker'] },
                    { name: 'insert' },
                    { name: 'styles' },
                    { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
                    { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align'] },
                    { name: 'tools' },
                    { name: 'about' }
                ],
                removeButtons: 'ExportPdf,Form,Flash,Iframe',
                extraAllowedContent: 'math[*]{*}(*)',
                removeDialogTabs: 'link:advanced;image:advanced',
                // Setting up MathJax rendering
                mathJaxClass: 'math-tex',
                mathJaxInline: '$$'
            });
        })();

        (function () {
            CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
            CKEDITOR.replace('editor2', {
                extraPlugins: 'ckeditor_wiris,mathjax',
                mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML',
                format_tags: 'p;h1;h2;h3;pre',
                contentsLangDirection: 'ltr',
                height: 400,
                toolbarGroups: [
                    { name: 'clipboard', groups: ['clipboard', 'undo'] },
                    { name: 'editing', groups: ['find', 'selection', 'spellchecker'] },
                    { name: 'insert' },
                    { name: 'styles' },
                    { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
                    { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align'] },
                    { name: 'tools' },
                    { name: 'about' }
                ],
                removeButtons: 'ExportPdf,Form,Flash,Iframe',
                extraAllowedContent: 'math[*]{*}(*)',
                removeDialogTabs: 'link:advanced;image:advanced',
                // Setting up MathJax rendering
                mathJaxClass: 'math-tex',
                mathJaxInline: '$$'
            });
        })();

     </script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection