<!-- 
Responsive HTML Table With Pure CSS - Web Design/UI Design

Code written by:
👨🏻‍⚕️ Coding Design (Jeet Saru)

> You can do whatever you want with the code. However if you love my content, you can **SUBSCRIBED** my YouTube Channel.

🌎link: www.youtube.com/codingdesign 
 -->
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
  
    
   
    <title>Monarch Institute</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description" content="Monarch Institute - Offering quality education through coaching, distant learning, health coaching, and online courses.">

    <!-- Favicon -->
    <link href="{{ asset('dashboard/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('online_exam/css/student-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('online_exam/css/student-dashboard.css') }}" rel="stylesheet">

    <link href="{{ asset('online_exam/css/dashboard.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('online_exam/javascript/jquery.js') }}"></script>
    <link  rel="stylesheet"  src="{{ asset('online_exam/table/style.css') }}"></link>
  <style>

/* General Styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.headeroption, .footeroption {
    background-color: #2c3e50;
    color: white;
    text-align: center;
    padding: 10px;
}

.maincontent {
    background-color: #fff;
    padding: 20px;
    min-height: 500px;
}

.menu {
    background-color: #34495e;
    padding: 10px;
    margin-bottom: 20px;
}

.menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
}

.menu ul li {
    margin-right: 15px;
}

.menu ul li a {
    color: white;
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.menu ul li a:hover {
    background-color: #1abc9c;
}

.menu span {
    margin-top: 10px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.main {
    padding: 15px;
    background-color: #ecf0f1;
    border-radius: 8px;
}

.segment {
    margin-top: 30px;
    background-color: green;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
}

.segment h2 {
    color: white;
}

.segment ul {
    list-style: none;
    padding: 0;
}

.segment ul li {
    margin: 10px 0;
}

.segment ul li a {
    background-color: #f39c12;
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
}

.segment ul li a:hover {
    background-color: #d35400;
}

/* Responsive Styles */

/* Mobile Styles */
@media (max-width: 600px) {
    .menu ul {
        flex-direction: column;
        align-items: flex-start;
    }

    .menu ul li {
        margin-right: 0;
        margin-bottom: 10px;
    }

    .menu span {
        display: block;
        margin-top: 10px;
        font-size: 14px;
    }

    .main {
        padding: 10px;
    }

    .segment ul li a {
        padding: 8px 10px;
        font-size: 14px;
    }

    .footeroption h2 {
        font-size: 16px;
    }
}

/* Tablet Styles */
@media (min-width: 601px) and (max-width: 1024px) {
    .menu ul {
        flex-direction: row;
        justify-content: space-between;
    }

    .menu span {
        font-size: 16px;
    }

    .container {
        padding: 0 10px;
    }

    .main {
        padding: 20px;
    }

    .segment ul li a {
        padding: 10px 12px;
        font-size: 16px;
    }

    .footeroption h2 {
        font-size: 18px;
    }
}

/* Desktop Styles */
@media (min-width: 1025px) {
    .menu ul {
        justify-content: flex-start;
    }

    .menu span {
        font-size: 18px;
    }

    .container {
        padding: 0;
    }

    .main {
        padding: 25px;
    }

    .segment ul li a {
        padding: 12px 15px;
        font-size: 18px;
    }

    .footeroption h2 {
        font-size: 20px;
    }
}


.phpcoding {
    width: 100%;
    margin: auto;
    background-color: #006b21;
}



.table__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #004d17;
    color: #ffffff;
}

.table__header .input-group input {
    padding: 5px;
    font-size: 16px;
    width: 100%;
    max-width: 200px;
}

.table__header img {
    width: 20px;
    height: 20px;
    margin-left: 10px;
}

.table__body table {
    width: 100%;
    border-collapse: collapse;
    background-color: #ffffff;
}

.table__body th, .table__body td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: center;
}

.table__body th {
    background-color: #004d17;
    color: white;
}

.active-row {
    background-color: #f9f9f9;
}

.active-row:hover {
    background-color: #f1f1f1;
}

/* Media Queries */

/* Small Devices (Mobile) */
@media only screen and (max-width: 600px) {
    .menu ul {
        flex-direction: column;
        align-items: center;
    }

    .menu span {
        float: none;
        margin-top: 10px;
        text-align: center;
    }

    .table__header {
        flex-direction: column;
    }

    .table__header .input-group {
        margin-bottom: 10px;
        width: 100%;
    }

    .table__body th, .table__body td {
        font-size: 12px;
        padding: 6px;
    }
}

/* Medium Devices (Tablet) */
@media only screen and (min-width: 601px) and (max-width: 1024px) {
    .menu ul {
        flex-direction: row;
        flex-wrap: wrap;
    }

    .table__header .input-group input {
        max-width: 300px;
    }

    .table__body th, .table__body td {
        font-size: 14px;
        padding: 10px;
    }
}

/* Large Devices (Desktop) */
@media only screen and (min-width: 1025px) {
    .menu ul {
        flex-direction: row;
    }

    .table__header .input-group input {
        max-width: 400px;
    }

    .table__body th, .table__body td {
        font-size: 16px;
        padding: 12px;
    }
}

.button4 {
  background-color: green;
  color: white;
  border: 2px solid #017047;
}

.button4:hover {
  background-color: #014b70;
  color: white;
}
</style>
</head>

<body>
@php
    $currentDate = \Carbon\Carbon::now();
@endphp


    <div class="phpcoding">
 <section class="headeroption"></section>
        <section class="maincontent">
            <div class="menu">
                <ul>
                <li><a href="{{ route('exam.index') }}">Exam</a></li>
                   <li><a href="{{ route('exam.profile') }}">Profile</a></li>
                   <li><a href="{{ route('exam.Qution_paper') }}">Question Paper</a></li>
                   <li><a href="{{ route('exam.solution_paper') }}">Solution paper</a></li>

                  <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
                <span style="float:right;color:#fdfafb; font-family: 'Times New Roman', Georgia, serif;">
    Welcome 
    <strong>
    {{-- auth()->user()->name --}}
    {{dd(Auth::id())}}
    {{--Auth::User()->name--}}
    </strong> to this Exam....
</span>

            </div>
<br/>
<div class="main">
<main class="table" id="customers_table">
 
    <br>
    <section class="table__header" style=" border:black;   color:#006b21; background-color:#ecf0f1">
     <div class="input-group">
            <input type="search"  placeholder="Search Data...">
            <img src="{{ asset('online_exam/table/images/search.png') }}" alt="Search Icon">
        </div>
     </section>

    <br>
   <div class="container">          
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</div>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th> S.N <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Exam_Name <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Exam Start Date & Time <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Exam End Date & Time <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                </tr>
            </thead>
            <tbody class="border">
    @php 
        $currentDateTime = \Carbon\Carbon::now();
    @endphp

    @foreach($quizzes->groupBy('exam_id') as $examId => $examQuizzes)
        @php 
            $firstQuiz = $examQuizzes->first();
            $startDate = \Carbon\Carbon::parse($firstQuiz->exam->started_date);
            $endDate = \Carbon\Carbon::parse($firstQuiz->exam->finish_date);
            $isBeforeStart = $currentDateTime->isBefore($startDate); // Before exam starts
            $isAfterEnd = $currentDateTime->isAfter($endDate); // After exam ends
            $examStatus = $isBeforeStart ? 'Pending' : ($isAfterEnd ? 'Exam Finished' : 'Active');
            $isDisabled = $isBeforeStart || $isAfterEnd; // Disable if before start or after end

            // Check if the student has already attempted the exam
            $studentHasAttempted = $firstQuiz->exam->attempts->where('user_id', auth()->user()->id)->isNotEmpty();

            // Disable the button if the student has already attempted the exam
            $isDisabled = $isDisabled || $studentHasAttempted;
            $buttonText = $isDisabled ? ($studentHasAttempted ? 'Already Attempted' : 'Exam Not Available') : 'Start Exam';
            $buttonClass = $isDisabled ? 'btn-secondary' : 'btn-primary';
        @endphp

        @foreach($examQuizzes as $quizIndex => $quiz)
            <tr class="active-row">
                @if($quizIndex === 0)
                    <td rowspan="{{ $examQuizzes->count() }}">{{ $loop->parent->iteration }}</td>
                    <td rowspan="{{ $examQuizzes->count() }}">{{ $firstQuiz->exam->exam_name }}</td>
                    <td rowspan="{{ $examQuizzes->count() }}">
                        <strong>Start:</strong> {{ $startDate->format('l, F j, Y g:i A') }}
                    </td>
                    <td rowspan="{{ $examQuizzes->count() }}">
                        <strong>End:</strong> {{ $endDate->format('l, F j, Y g:i A') }}
                    </td>
                   <td rowspan="{{ $examQuizzes->count() }}">
                        {{ $examStatus }}
                    </td>
                    <td rowspan="{{ $examQuizzes->count() }}">
                        <button class="btn btn-md button button4 btn {{ $buttonClass }}" onclick="startExam('{{ $firstQuiz->exam->id }}')" {{ $isDisabled ? 'disabled' : '' }}>
                            {{ $buttonText }}
                        </button>
                    </td>
                @endif
            </tr>
        @endforeach
    @endforeach
</tbody>



        </table>
    </section>
</main>
</div>
<br>
<section class="footeroption">
        <h2 style="color: white;">NEET (UG)-2025  </h2>

        </section>

</div>
        <script>
function startExam(examId) {
    // Use the route helper and a placeholder for examId
    const url = `{{ route('exam.test', ['quizId' => 1, 'questionId' => 1, 'examId' => '__EXAM_ID__']) }}`.replace('__EXAM_ID__', examId);
    
    // Redirect to the constructed URL
    window.location.href = url;
}
</script>
    <!-- <script src="script.js"></script> -->
<script>


const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}

// 3. Converting HTML table to PDF

const pdf_btn = document.querySelector('#toPDF');
const customers_table = document.querySelector('#customers_table');


const toPDF = function (customers_table) {
    const html_code = `
    <!DOCTYPE html>
    <link rel="stylesheet" type="text/css" href="style.css">
    <main class="table" id="customers_table">${customers_table.innerHTML}</main>`;

    const new_window = window.open();
     new_window.document.write(html_code);

    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 400);
}

pdf_btn.onclick = () => {
    toPDF(customers_table);
}

// 4. Converting HTML table to JSON

const json_btn = document.querySelector('#toJSON');

const toJSON = function (table) {
    let table_data = [],
        t_head = [],

        t_headings = table.querySelectorAll('th'),
        t_rows = table.querySelectorAll('tbody tr');

    for (let t_heading of t_headings) {
        let actual_head = t_heading.textContent.trim().split(' ');

        t_head.push(actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase());
    }

    t_rows.forEach(row => {
        const row_object = {},
            t_cells = row.querySelectorAll('td');

        t_cells.forEach((t_cell, cell_index) => {
            const img = t_cell.querySelector('img');
            if (img) {
                row_object['customer image'] = decodeURIComponent(img.src);
            }
            row_object[t_head[cell_index]] = t_cell.textContent.trim();
        })
        table_data.push(row_object);
    })

    return JSON.stringify(table_data, null, 4);
}

json_btn.onclick = () => {
    const json = toJSON(customers_table);
    downloadFile(json, 'json')
}

// 5. Converting HTML table to CSV File

const csv_btn = document.querySelector('#toCSV');

const toCSV = function (table) {
    // Code For SIMPLE TABLE
    // const t_rows = table.querySelectorAll('tr');
    // return [...t_rows].map(row => {
    //     const cells = row.querySelectorAll('th, td');
    //     return [...cells].map(cell => cell.textContent.trim()).join(',');
    // }).join('\n');

    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => {
        let actual_head = head.textContent.trim().split(' ');
        return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
    }).join(',') + ',' + 'image name';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td'),
            img = decodeURIComponent(row.querySelector('img').src),
            data_without_img = [...cells].map(cell => cell.textContent.replace(/,/g, ".").trim()).join(',');

        return data_without_img + ',' + img;
    }).join('\n');

    return headings + '\n' + table_data;
}

csv_btn.onclick = () => {
    const csv = toCSV(customers_table);
    downloadFile(csv, 'csv', 'customer orders');
}

// 6. Converting HTML table to EXCEL File

const excel_btn = document.querySelector('#toEXCEL');

const toExcel = function (table) {
    // Code For SIMPLE TABLE
    // const t_rows = table.querySelectorAll('tr');
    // return [...t_rows].map(row => {
    //     const cells = row.querySelectorAll('th, td');
    //     return [...cells].map(cell => cell.textContent.trim()).join('\t');
    // }).join('\n');

    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => {
        let actual_head = head.textContent.trim().split(' ');
        return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
    }).join('\t') + '\t' + 'image name';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td'),
            img = decodeURIComponent(row.querySelector('img').src),
            data_without_img = [...cells].map(cell => cell.textContent.trim()).join('\t');

        return data_without_img + '\t' + img;
    }).join('\n');

    return headings + '\n' + table_data;
}

excel_btn.onclick = () => {
    const excel = toExcel(customers_table);
    downloadFile(excel, 'excel');
}

const downloadFile = function (data, fileType, fileName = '') {
    const a = document.createElement('a');
    a.download = fileName;
    const mime_types = {
        'json': 'application/json',
        'csv': 'text/csv',
        'excel': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    }
    a.href = `
        data:${mime_types[fileType]};charset=utf-8,${encodeURIComponent(data)}
    `;
    document.body.appendChild(a);
    a.click();
    a.remove();
}

    </script>



  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('dashboard/lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('dashboard/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('dashboard/js/main.js') }}"></script>
</body>

</html>
