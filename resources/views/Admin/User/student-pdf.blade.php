<!DOCTYPE html>
<html>
<head>
    <title>Student Details PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;">Monarch Institute NEET Online Student Details</h1>
   

    <p style="text-align: center;">Test Date: {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}</p>

    <table class="text-center">
        <thead class="bg-light text-capitalize">
            <tr>
                <th width="5%">Sl</th>
                <th width="20%">Name</th>
                <th width="20%">Email</th>
                <th width="20%">Registration Number</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Monarch {{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
