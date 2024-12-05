@extends('backend.layouts.master')

@section('title')
    {{ __('Admins - Admin Panel') }}
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML"></script>

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
<!-- Add the "Create New Quiz" button -->
<h2>Edit Question</h2>
<form action="{{ route('Admin.Q&A.update', $question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Question Text -->
        <div class="form-group">
            <label for="question_text">Question Text</label>
            <textarea name="question_text" id="editor1" class="ckeditor form-control" rows="3">{{ old('question_text', $question->question_text) }}</textarea>
        </div>

        <!-- Math Field (if applicable) -->
        <div class="form-group">
            <label for="math_field">Math Field (Optional)</label>
            <input type="text" name="math_field" id="math_field" class="form-control" value="{{ old('math_field', $question->math_field) }}">
        </div>

        <!-- Question Image -->
        <div class="form-group">
            <label for="question_image">Question Image</label>
            @if($question->question_image)
                <div>
                    <img src="{{ asset('public/questions/' . $question->question_image) }}" alt="Current Question Image" class="img-fluid mb-2">
                </div>
            @endif
            <input type="file" name="question_image" id="question_image" class="form-control">
        </div>

        <!-- Options A, B, C, and D with Images -->
        @foreach(['a', 'b', 'c', 'd'] as $option)
            <div class="form-group">
                <label for="option_{{ $option }}">Option {{ strtoupper($option) }}</label>
                <input type="text" name="option_{{ $option }}" id="option_{{ $option }}" class="form-control" value="{{ old('option_' . $option, $question->{'option_' . $option}) }}">
            </div>
            <div class="form-group">
                <label for="option_{{ $option }}_image">Option {{ strtoupper($option) }} Image (Optional)</label>
                @if($question->{'option_' . $option . '_image'})
                    <div>
                        <img src="{{ asset('public/options/' . $question->{'option_' . $option . '_image'}) }}" alt="Current Option {{ strtoupper($option) }} Image" class="img-fluid mb-2">
                    </div>
                @endif
                <input type="file" name="option_{{ $option }}_image" id="option_{{ $option }}_image" class="form-control">
            </div>
        @endforeach

        <!-- Save Button -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Question</button>
            <a href="{{ route('Admin.Q&A.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
   
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
     <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
    <script>
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

     
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
     </script>
     <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
@endsection