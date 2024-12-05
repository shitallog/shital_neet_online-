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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/mathjax@2.7.7/MathJax.js?config=TeX-MML-AM_CHTML"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

<style>

.math-field {
    width: 100%;
    min-height: 50px;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 4px;
    font-size: 16px;
    

}

.math-field:focus {
    border-color: #66afe9;
    outline: none;
    box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
}

    </style>

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
     
    <div class="row">
    <div class="col-12 mt-5">
    <div class="card">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center">Enter Question Details</h1>
        <form action="{{ route('questions.add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="quizId" value="{{ $quizId }}">
    <input type="hidden" name="totalQuestions" value="{{ $totalQuestions }}">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2" class="text-center">Add Questions and Answers</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 1; $i <= $totalQuestions; $i++)
            <tr>
                <td colspan="2" class="text-center"><strong>Question {{ $i }}</strong></td>
            </tr>
            <tr>
                <td>
                    <label for="qns{{ $i }}">Question {{ $i }}:</label>
                </td>
                <td>
                    <textarea rows="2" name="qns{{ $i }}" id="editor1" class="ckeditor form-control" placeholder="Write question here..." required></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="qns{{ $i }}">Upload Image for Question {{ $i }}:</label>
                </td>
                <td>
                <input type="file" name="img{{ $i }}" id="img{{ $i }}" class="form-control" accept="image/*">
                </td>
            </tr>
        
            <tr>
                <td>
                    <label for="solution{{ $i }}">Solution:</label>
                </td>
                <td>
                    <textarea rows="4" name="solution{{ $i }}" id="editor2" class="ckeditor form-control" placeholder="Write solution here..." required></textarea>
                </td>
            </tr>
      
            </tr>
            @for($j = 1; $j <= 4; $j++)
            <tr>
                <td>
                    <label for="{{ $i }}{{ $j }}">Option {{ chr(96 + $j) }}:</label>
                </td>
                <td>
                    <textarea rows="2" name="{{ $i }}{{ $j }}" id="editor3" class="ckeditor form-control" placeholder="Enter option {{ chr(96 + $j) }}" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="{{ $i }}{{ $j }}">Upload Image for Option {{ chr(96 + $j) }}:</label>
                </td>
                <td>
                <input type="file" name="optImg{{ $i }}{{ $j }}" id="optImg{{ $i }}{{ $j }}" class="form-control" accept="image/*">
                </td>
            </tr>
            @endfor
            <tr>
                <td>
                    <label for="ans{{ $i }}">Correct Answer:</label>
                </td>
                <td>
                    <select id="ans{{ $i }}" name="ans{{ $i }}" class="form-control" required>
                        <option value="">Select the correct answer</option>
                        <option value="a">Option a</option>
                        <option value="b">Option b</option>
                        <option value="c">Option c</option>
                        <option value="d">Option d</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            @endfor
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </td>
            </tr>
        </tbody>
    </table>
</form>

    </div>
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


 <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
    <script>
        (function() {
      // Define math elements for MathML
      var mathElements = ['math', 'maction', 'maligngroup', 'malignmark', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mlongdiv', 'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms', 'mscarries', 'mscarry', 'msgroup', 'msline', 'mspace', 'msqrt', 'msrow', 'mstack', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover', 'semantics', 'annotation', 'annotation-xml'];

      // Load the MathJax library for rendering mathematical expressions
      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('editor1', {
        extraPlugins: 'ckeditor_wiris,print,format,font,colorbutton,justify,uploadimage,find,magicline,bidi,easyimage,image2,colordialog,tableresize,mathjax',
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML', // MathJax for rendering LaTeX
        format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
        contentsLangDirection: 'ltr',
        removeButtons: 'ExportPdf,Form,Checkbox,Radio,TextField,Select,Textarea,Button,ImageButton,HiddenField,NewPage,CreateDiv,Flash,Iframe,About,ShowBlocks,Maximize',
        toolbarGroups: [
          {name: 'clipboard', groups: ['clipboard', 'undo']},
          {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
          {name: 'links'},
          {name: 'insert'},
          {name: 'forms'},
          {name: 'tools'},
          {name: 'document', groups: ['mode', 'document', 'doctools']},
          {name: 'colors'},
          {name: 'others'},
          '/',
          {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
          {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
          {name: 'styles'},
          {name: 'math', groups: ['math', 'symbols']}  // Math tools and symbols group
        ],
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        removeDialogTabs: 'image:advanced;link:advanced',
        height: 100,  // Increased editor height for more comfortable editing
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula);h3{clear};h2{line-height};h2 h3{margin-left,margin-top}; div{border,background,text-align}',
        extraAllowedContent: 'math[*]{*}(*)',
          mathJaxClass: 'math-tex',
                mathJaxInline: '$$',
        // Configure Wiris Plugin for interactive editing of math symbols
        mathElements: [
          '\\alpha', '\\beta', '\\gamma', '\\delta', '\\epsilon', '\\zeta', '\\eta', '\\theta', '\\iota', '\\kappa', '\\lambda', '\\mu', '\\nu', '\\xi', '\\pi', '\\rho', '\\sigma', '\\tau', '\\upsilon', '\\phi', '\\chi', '\\psi', '\\omega',
          '\\sum', '\\prod', '\\int', '\\pm', '\\mp', '\\div', '\\times', '\\leq', '\\geq', '\\neq', '\\approx', '\\in', '\\notin',
          '\\sin', '\\cos', '\\tan', '\\log', '\\ln', '\\lim', '\\infty', '\\partial', '\\nabla', '\\sqrt', '\\frac', '\\binom', '\\cup', '\\cap'
        ]
      });

      // Insert LaTeX math formula dialog
      CKEDITOR.on('instanceReady', function(evt) {
        var editor = evt.editor;

        // Listen for the selection change in the editor to handle math dialog interaction
        editor.on('selectionChange', function() {
          var selection = editor.getSelection();
          var selectedElement = selection.getStartElement();

          if (selectedElement && selectedElement.hasClass('math')) {
            editor.execCommand('ckeditor_wiris');
          }
        });
      });
    }());


    (function() {
      // Define math elements for MathML
      var mathElements = ['math', 'maction', 'maligngroup', 'malignmark', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mlongdiv', 'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms', 'mscarries', 'mscarry', 'msgroup', 'msline', 'mspace', 'msqrt', 'msrow', 'mstack', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover', 'semantics', 'annotation', 'annotation-xml'];

      // Load the MathJax library for rendering mathematical expressions
      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('editor3', {
        extraPlugins: 'ckeditor_wiris,print,format,font,colorbutton,justify,uploadimage,find,magicline,bidi,easyimage,image2,colordialog,tableresize,mathjax',
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML', // MathJax for rendering LaTeX
        format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
        contentsLangDirection: 'ltr',
        removeButtons: 'ExportPdf,Form,Checkbox,Radio,TextField,Select,Textarea,Button,ImageButton,HiddenField,NewPage,CreateDiv,Flash,Iframe,About,ShowBlocks,Maximize',
        toolbarGroups: [
          {name: 'clipboard', groups: ['clipboard', 'undo']},
          {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
          {name: 'links'},
          {name: 'insert'},
          {name: 'forms'},
          {name: 'tools'},
          {name: 'document', groups: ['mode', 'document', 'doctools']},
          {name: 'colors'},
          {name: 'others'},
          '/',
          {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
          {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
          {name: 'styles'},
          {name: 'math', groups: ['math', 'symbols']}  // Math tools and symbols group
        ],
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        removeDialogTabs: 'image:advanced;link:advanced',
        height: 100,  // Increased editor height for more comfortable editing
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula);h3{clear};h2{line-height};h2 h3{margin-left,margin-top}; div{border,background,text-align}',
        extraAllowedContent: 'math[*]{*}(*)',
          mathJaxClass: 'math-tex',
                mathJaxInline: '$$',
        // Configure Wiris Plugin for interactive editing of math symbols
        mathElements: [
          '\\alpha', '\\beta', '\\gamma', '\\delta', '\\epsilon', '\\zeta', '\\eta', '\\theta', '\\iota', '\\kappa', '\\lambda', '\\mu', '\\nu', '\\xi', '\\pi', '\\rho', '\\sigma', '\\tau', '\\upsilon', '\\phi', '\\chi', '\\psi', '\\omega',
          '\\sum', '\\prod', '\\int', '\\pm', '\\mp', '\\div', '\\times', '\\leq', '\\geq', '\\neq', '\\approx', '\\in', '\\notin',
          '\\sin', '\\cos', '\\tan', '\\log', '\\ln', '\\lim', '\\infty', '\\partial', '\\nabla', '\\sqrt', '\\frac', '\\binom', '\\cup', '\\cap'
        ]
      });

      // Insert LaTeX math formula dialog
      CKEDITOR.on('instanceReady', function(evt) {
        var editor = evt.editor;

        // Listen for the selection change in the editor to handle math dialog interaction
        editor.on('selectionChange', function() {
          var selection = editor.getSelection();
          var selectedElement = selection.getStartElement();

          if (selectedElement && selectedElement.hasClass('math')) {
            editor.execCommand('ckeditor_wiris');
          }
        });
      });
    }());

    (function() {
      // Define math elements for MathML
      var mathElements = ['math', 'maction', 'maligngroup', 'malignmark', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi', 'mlabeledtr', 'mlongdiv', 'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom', 'mroot', 'mrow', 'ms', 'mscarries', 'mscarry', 'msgroup', 'msline', 'mspace', 'msqrt', 'msrow', 'mstack', 'mstyle', 'msub', 'msup', 'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover', 'semantics', 'annotation', 'annotation-xml'];

      // Load the MathJax library for rendering mathematical expressions
      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('editor2', {
        extraPlugins: 'ckeditor_wiris,print,format,font,colorbutton,justify,uploadimage,find,magicline,bidi,easyimage,image2,colordialog,tableresize,mathjax',
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML', // MathJax for rendering LaTeX
        format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
        contentsLangDirection: 'ltr',
        removeButtons: 'ExportPdf,Form,Checkbox,Radio,TextField,Select,Textarea,Button,ImageButton,HiddenField,NewPage,CreateDiv,Flash,Iframe,About,ShowBlocks,Maximize',
        toolbarGroups: [
          {name: 'clipboard', groups: ['clipboard', 'undo']},
          {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
          {name: 'links'},
          {name: 'insert'},
          {name: 'forms'},
          {name: 'tools'},
          {name: 'document', groups: ['mode', 'document', 'doctools']},
          {name: 'colors'},
          {name: 'others'},
          '/',
          {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
          {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
          {name: 'styles'},
          {name: 'math', groups: ['math', 'symbols']}  // Math tools and symbols group
        ],
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        removeDialogTabs: 'image:advanced;link:advanced',
        height: 100,  // Increased editor height for more comfortable editing
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula);h3{clear};h2{line-height};h2 h3{margin-left,margin-top}; div{border,background,text-align}',
        extraAllowedContent: 'math[*]{*}(*)',
          mathJaxClass: 'math-tex',
                mathJaxInline: '$$',
        // Configure Wiris Plugin for interactive editing of math symbols
        mathElements: [
          '\\alpha', '\\beta', '\\gamma', '\\delta', '\\epsilon', '\\zeta', '\\eta', '\\theta', '\\iota', '\\kappa', '\\lambda', '\\mu', '\\nu', '\\xi', '\\pi', '\\rho', '\\sigma', '\\tau', '\\upsilon', '\\phi', '\\chi', '\\psi', '\\omega',
          '\\sum', '\\prod', '\\int', '\\pm', '\\mp', '\\div', '\\times', '\\leq', '\\geq', '\\neq', '\\approx', '\\in', '\\notin',
          '\\sin', '\\cos', '\\tan', '\\log', '\\ln', '\\lim', '\\infty', '\\partial', '\\nabla', '\\sqrt', '\\frac', '\\binom', '\\cup', '\\cap'
        ]
      });

      // Insert LaTeX math formula dialog
      CKEDITOR.on('instanceReady', function(evt) {
        var editor = evt.editor;

        // Listen for the selection change in the editor to handle math dialog interaction
        editor.on('selectionChange', function() {
          var selection = editor.getSelection();
          var selectedElement = selection.getStartElement();

          if (selectedElement && selectedElement.hasClass('math')) {
            editor.execCommand('ckeditor_wiris');
          }
        });
      });
    }());
    </script>


<script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/javascript">
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
</script>
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/mathquill/0.10.1/mathquill.min.js"></script>
     <script src="https://unpkg.com/mathlive/dist/mathlive.min.js"></script>
     <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
     <script>
 if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }


     </script>
   
  

      

@endsection