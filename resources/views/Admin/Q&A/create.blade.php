@extends('backend.layouts.master')

@section('title')
    {{ __('Admins - Admin Panel') }}
@endsection

@section('styles')
    <!-- Start datatable css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <script src="{{ asset('backend/assets/js/app.js') }}" defer></script>
    <link href="http://cdn-na.infragistics.com/igniteui/2024.1/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
    <link href="http://cdn-na.infragistics.com/igniteui/2024.1/latest/css/structure/infragistics.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/igniteui-webcomponents@latest/dist/css/igniteui-webcomponents.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-AMS_HTML"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>

    <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://unpkg.com/mathlive"></script>

    <script>window["sharedData"]=[];window["sharedDataNamespace"]="sharedData";window["shared"]=function(e){var n=void 0!==arguments[1]?arguments[1]:null;return[window.sharedDataNamespace].concat("string"==typeof e?e.split("."):[]).reduce(function(e,t){return e===n||"object"!=typeof e||void 0===e[t]?n:e[t]},window)};</script>        <link rel="stylesheet" href="https://demo.onlineexammanagement.com/plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Ignite UI for jQuery Required Combined JavaScript Files -->
    <script src="http://cdn-na.infragistics.com/igniteui/2024.1/latest/js/infragistics.core.js"></script>
    <script src="http://cdn-na.infragistics.com/igniteui/2024.1/latest/js/infragistics.lob.js"></script>
<style>
    .toolbar {
            margin-bottom: 10px;
        }
        .toolbar button {
            margin-right: 5px;
            padding: 5px 10px;
        }
        .editor {
            border: 1px solid #ccc;
            height: 400px;
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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <h1 class="text-center">Enter Exam Details</h1>
    <form action="{{ route('questionsnew.add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

    <table class="table table-sm">
        <tr>
            <td colspan="2" class="text-center">
                <h6 style="font-size: 14px; color: #c0392b; font-weight: bold; padding: 5px; border: 2px solid #e74c3c; border-radius: 5px; background-color: #f9ebea;">
                    <span style="font-size: 16px; font-weight: bold;">Exam :</span> {{ $quiz->exam->exam_name }} <br>
                    <span style="font-size: 16px; font-weight: bold;">Subject :</span> {{ $quiz->subject->name }} <br>
                    <span style="font-size: 16px; font-weight: bold;">Part:</span> {{ $quiz->part }} <br>
                    <span style="font-size: 16px; font-weight: bold;">Question:</span> {{ $nextQuestionId }}
                </h6>
            </td>
        </tr>
        
        <tr>
            <td><label for="question_text">Question:</label></td>
            <td><textarea  rows="2"  name="question_text" id="editor1" class="ckeditor form-control" placeholder="Write your question here..." required></textarea></td>
        </tr>
        
        <tr>
            <td><label for="question_image">Upload Image for Question:</label></td>
            <td><input type="file" name="question_image" id="question_image" class="form-control" accept="image/*"></td>
        </tr>
        
      
        <tr>
            <td><label for="solution_text">Solution for Question:</label></td>
            <td><textarea rows="3" name="solution_text" id="editor2" class="ckeditor form-control" placeholder="Write the solution here..." required></textarea></td>
        </tr>

       

        <tr>
            <td><label for="option_a">Option A:</label></td>
            <td><textarea rows="2" name="option_a" id="editor3" class="ckeditor form-control" placeholder="Enter option A" required></textarea></td>
        </tr>
        <tr>
            <td><label for="option_a_image">Upload Image for Option A:</label></td>
            <td><input type="file" name="option_a_image" id="option_a_image" class="form-control" accept="image/*"></td>
        </tr>

        <tr>
            <td><label for="option_b">Option B:</label></td>
            <td><textarea rows="2" name="option_b" id="editor4" class="ckeditor form-control" placeholder="Enter option B" required></textarea></td>
        </tr>
        <tr>
            <td><label for="option_b_image">Upload Image for Option B:</label></td>
            <td><input type="file" name="option_b_image" id="option_b_image" class="form-control" accept="image/*"></td>
        </tr>

        <tr>
            <td><label for="option_c">Option C:</label></td>
            <td><textarea rows="2" name="option_c" id="editor5" class="ckeditor form-control" placeholder="Enter option C" required></textarea></td>
        </tr>
        <tr>
            <td><label for="option_c_image">Upload Image for Option C:</label></td>
            <td><input type="file" name="option_c_image" id="option_c_image" class="form-control" accept="image/*"></td>
        </tr>

        <tr>
            <td><label for="option_d">Option D:</label></td>
            <td><textarea rows="2" name="option_d" id="editor6" class="ckeditor form-control" placeholder="Enter option D" required></textarea></td>
        </tr>
        <tr>
            <td><label for="option_d_image">Upload Image for Option D:</label></td>
            <td><input type="file" name="option_d_image" id="option_d_image" class="form-control" accept="image/*"></td>
        </tr>

        <tr>
            <td><label for="correct_answer">Correct Answer:</label></td>
            <td>
                <select id="correct_answer" name="correct_answer" class="form-control" required>
                    <option value="">Select the correct answer</option>
                    <option value="a">Option A</option>
                    <option value="b">Option B</option>
                    <option value="c">Option C</option>
                    <option value="d">Option D</option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="text-center">
                <button class="btn btn-sm btn-primary" type="submit">Create</button>
            </td>
        </tr>
    </table>
</form>


    </div>
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
     <script src="https://cdn.jsdelivr.net/npm/igniteui-webcomponents@latest/dist/igniteui-webcomponents.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/mathquill/0.10.1/mathquill.min.js"></script>
     <script src="https://unpkg.com/mathlive/dist/mathlive.min.js"></script>

     <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/javascript">
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
</script>
     <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

        $(() => {
  let popupInstance;
  const editorInstance = $('.html-editor').dxHtmlEditor({
    value: markup,
    toolbar: {
      items: [
        'undo', 'redo', 'separator',
        {
          name: 'header',
          acceptedValues: [false, 1, 2, 3, 4, 5],
          options: { inputAttr: { 'aria-label': 'Header' } },
        }, 'separator',
        'bold', 'italic', 'strike', 'underline', 'separator',
        'alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'separator',
        {
          widget: 'dxButton',
          options: {
            text: 'Show markup',
            stylingMode: 'text',
            onClick() {
              popupInstance.show();
            },
          },
        },
      ],
    },
  }).dxHtmlEditor('instance');

  popupInstance = $('#popup').dxPopup({
    showTitle: true,
    title: 'Markup',
    showCloseButton: true,
    onShowing() {
      $('.value-content').text(editorInstance.option('value'));
    },
  }).dxPopup('instance');
});

     </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
        const formulaField = document.getElementById('formula');
        const formulaSolutionField = document.getElementById('formulaSolution');

        const mathFieldInput = document.getElementById('math_field');
        const mathFieldSolutionInput = document.getElementById('math_field_solution');

        // Update the hidden input for question formula
        formulaField.addEventListener('input', () => {
            mathFieldInput.value = formulaField.value;
        });

        // Update the hidden input for solution formula
        formulaSolutionField.addEventListener('input', () => {
            mathFieldSolutionInput.value = formulaSolutionField.value;
        });
    });

</script>

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

      CKEDITOR.replace('editor4', {
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

      CKEDITOR.replace('editor5', {
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

      CKEDITOR.replace('editor6', {
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


<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/xml/xml.min.js"></script>
 

  <script>
    (function () {
      new FroalaEditor("#edit", {
        fullPage: true
      })
    })()
  </script>
@endsection
