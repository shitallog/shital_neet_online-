<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Quiz Answers - Student Record</title>
    <style>
        /* Styling for the table */
        table {
            width: 50%; /* Increase width for better PDF layout */
            margin: 30px auto; /* Center the table */
            border-collapse: collapse;
            text-align: center;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }

        th, td {
            padding: 9px 10px;
            border: 1px solid #ddd;
        }

        th {
            font-size: 14px;
        }

        td {
            font-size: 13px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Footer styling */
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
      
    </style>
</head>
<body>
    <h2 style="text-align: center;">ELITE TEST SERIES NEET 2025 (Session : 2024 - 2025)</h2>

    <p style="text-align: center;">Test Date: {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }} (Test Pattern: NEET UG)</p>

        
 <div class="container">
    <table  style="width:50px;">
        <thead  style="width:50px;" class="thead-light">
            <tr>
                <th style="width:1px; font-size:8px;" rowspan="2">Sl</th>
                <th style="width:1px; font-size:8px;" rowspan="2">Student Name</th>
                <th style="width:1px; font-size:8px;" colspan="2">Exam Details</th> <!-- Colspan for two columns -->
                <th style="width:1px; font-size:8px;" rowspan="2">Attempt Date</th>
                <th style="width:1px; font-size:8px;" rowspan="2">Attempt Time</th>
                <th style="width:1px; font-size:8px;" colspan="5">Results</th> <!-- Colspan for result columns -->
            </tr>
            <tr>
                <!-- Headers for the "Exam Details" and "Results" columns -->
                <th style="width:1px;font-size:8px; ">Exam Name</th>
                <th style="width:1px;font-size:8px;">Subject Name</th>
                <th style="width:1px;font-size:8px;">Correct</th>
                <th style="width:1px;font-size:8px;">Incorrect</th>
                <th style="width:1px;font-size:8px;">Attempted</th>
                <th style="width:1px;font-size:8px;" >Not Attempted</th>
                <th style="width:1px;font-size:8px;">Total Marks</th>
            </tr>
        </thead>
        <tbody style="width:50px;" class="text-sm">
    @foreach($quizResults as $index => $result)
        <tr>
            @if($index === 0)
                <!-- Grouped Student Info, applies rowspan to group multiple exam attempts per student -->
                <td style="width:1px;font-size:8px;" rowspan="{{ $quizResults->count() }}">{{ $loop->iteration }}</td>
                <td style="width:1px;font-size:8px;" rowspan="{{ $quizResults->count() }}">{{ $result->user->name }}</td>
                <td style="width:1px;font-size:8px;" rowspan="{{ $quizResults->count() }}">{{ $result->exam->exam_name }}</td>
            @endif
            
            <!-- Individual Quiz Info -->
            <td style="width:1px;font-size:8px;">{{ $result->subject->name }}</td>
            <td style="width:1px;font-size:8px;">{{ \Carbon\Carbon::parse($result->attempt_date)->format('d/m/Y') }}</td>
            <td style="width:1px;font-size:8px;">{{ \Carbon\Carbon::parse($result->attempt_time)->format('H:i:s') }}</td>
            <td style="width:1px;font-size:8px;">{{ $result->is_correct }}</td>
            <td style="width:1px;font-size:8px;">{{ $result->incorrect_count }}</td>
            <td style="width:1px;font-size:8px;">{{ $result->attempted_questions }}</td>
            <td style="width:1px;font-size:8px;">{{ $result->not_attempted_questions }}</td>
            <td style="width:1px;font-size:8px;">{{ $result->total_score }}</td>
        </tr>
    @endforeach
</tbody>


    </table>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

</body>
</html>
